import { createApp, h } from "vue";
import { createInertiaApp, Head } from "@inertiajs/inertia-vue3";

import { ZiggyVue } from "ziggy";

import { Quasar } from "quasar";
import quasarUserOptions from "./quasar-user-options";

import axios from "boot/axios";

import createStore from "~/store/index";

const bootFiles = [axios];
const urlPath = window.location.href.replace(window.location.origin, "");
let hasRedirected = false;

const redirect = (url) => {
    hasRedirected = true;
    window.location.href = url;
    // const normalized =
    //     Object(url) === url ? router.resolve(url).route.fullPath : url;
    // window.location.href = normalized;
};

const setGlobalConfig = (app) => {
    app.component("Header", Head);
    app.config.globalProperties.APP_NAME = process.env.MIX_APP_NAME;
    app.config.globalProperties.myTweak = (offset) => {
        return { minHeight: offset ? `calc(100vh - ${offset}px)` : "100vh" };
    };
    return app;
};

const setBootFile = async (params) => {
    for (let i = 0; hasRedirected === false && i < bootFiles.length; i++) {
        if (typeof bootFiles[i] !== "function") {
            continue;
        }
        try {
            await bootFiles[i]({
                redirect,
                urlPath,
                ...params,
            });
        } catch (err) {
            if (err && err.url) {
                window.location.href = err.url;
                return;
            }
            console.error("boot error:", err);
            return;
        }
    }
};

const setRoutes = async (callback) => {
    try {
        const { data } = await axios.get("/api/ziggy");
        callback(data);
    } catch (err) {
        callback(err);
    }
};

const setStore = async (App) => {
    const store =
        typeof createStore === "function"
            ? await createStore(App)
            : createStore;
    return store;
};

const setVueApp = () => {
    if (hasRedirected === true) {
        return;
    }

    createInertiaApp({
        resolve: (name) => {
            const page = require(`./pages/${name}`).default;
            if (page.layout === undefined) {
                page.layout = require(`./layouts/default`).default;
            } else {
                if (typeof page.layout !== "object") {
                    page.layout = require(`./layouts/${page.layout}`).default;
                }
            }
            return page;
        },
        setup({ el, app, props, plugin }) {
            setRoutes(async (Ziggy) => {
                const App = createApp({ render: () => h(app, props) });
                const store = await setStore(App);
                setGlobalConfig(App);

                App.use(store);
                App.use(plugin);
                App.use(ZiggyVue, Ziggy);
                App.use(Quasar, quasarUserOptions);

                await setBootFile({
                    el,
                    store,
                    props,
                    Ziggy,
                    Quasar,
                    quasarUserOptions,
                    plugin,
                    app: App,
                });

                App.mount(el);
            });
        },
    });
};

void setVueApp();
