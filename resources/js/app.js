import "~/bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { ZiggyVue } from "ziggy";

InertiaProgress.init();

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
    id: "page",
    resolve: (name) => import(`./Pages/${name}`),
    setup({ el, app, props, plugin }) {
        loadRoutes().then((Ziggy) => {
            createApp({ render: () => h(app, props) })
                .use(plugin, ZiggyVue, Ziggy)
                .mount(el);
        });
    },
});
