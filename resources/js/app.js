import "~/bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp, Head } from "@inertiajs/inertia-vue3";
// import { InertiaProgress } from "@inertiajs/progress";
// InertiaProgress.init();
import { ZiggyVue } from "ziggy";

import { Quasar } from "quasar";
import quasarUserOptions from "./quasar-user-options";

function loadRoutes() {
    return new Promise(async (resolve, reject) => {
        try {
            const response = await fetch("/api/ziggy");
            resolve(response.json());
        } catch (err) {
            reject(err);
        }
    });
}

createInertiaApp({
    // resolve: (name) => import(`~/pages/${name}`),
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
        loadRoutes().then((Ziggy) => {
            const apps = createApp({ render: () => h(app, props) });
            setGlobalConfig(apps)
                .use(plugin)
                .use(ZiggyVue, Ziggy)
                .use(Quasar, quasarUserOptions);

            apps.mount(el);
        });
    },
});

function setGlobalConfig(app) {
    app.component("Header", Head);
    app.config.globalProperties.APP_NAME = process.env.MIX_APP_NAME;
    app.config.globalProperties.myTweak = (offset) => {
        return { minHeight: offset ? `calc(100vh - ${offset}px)` : "100vh" };
    };
    return app;
}
