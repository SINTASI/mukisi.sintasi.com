import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

import { ZiggyVue } from "ziggy";

import { Quasar } from "quasar";

import axios from "boot/axios";

import createStore from "~/store/index";
import { bootFiles, quasarUserOptions } from "./quasar-user-options";

const publicPath = `/`;
const urlPath = window.location.href.replace(window.location.origin, "");
let hasRedirected = false;

const redirect = (url) => {
    hasRedirected = true;
    window.location.href = url;
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

const setBoot = async (params, fileBoot) => {
    for (const bootName in fileBoot) {
        if (
            hasRedirected === false &&
            typeof fileBoot[bootName].default === "function"
        ) {
            try {
                await fileBoot[bootName].default(params);
            } catch (err) {
                if (err && err.url) {
                    window.location.href = err.url;
                    return;
                }
                console.warn(`[boot/${bootName}.js] boot file error: `, err);
                return;
            }
        }
    }
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
                const fileBoot = await Promise.all(bootFiles);
                await setBoot(
                    {
                        app: App,
                        Ziggy,
                        store,
                        props,
                        Inertia,
                        urlPath,
                        redirect,
                        publicPath,
                    },
                    fileBoot
                );

                App.use(store);
                App.use(plugin);
                App.use(ZiggyVue, Ziggy);
                App.use(Quasar, quasarUserOptions);
                App.mount(el);
                delete App._container.dataset.page;
            });
        },
    });
};

void setVueApp();
