// import "@quasar/extras/roboto-font";
// import "@quasar/extras/material-icons";
// import "css/app.scss";
import "quasar/dist/quasar.css";
import langId from "quasar/lang/id";

import * as Qplugins from "quasar";
export const parsePlugin = (plugins) =>
    plugins.reduce(
        (obj, item) => Object.assign(obj, { [item]: Qplugins[item] }),
        {}
    );

export const quasarUserOptions = {
    config: { loadingBar: { color: "primary", position: "top", size: "4px" } },
    lang: langId,
    plugins: parsePlugin([
        "Dialog",
        "Notify",
        "Cookies",
        "LoadingBar",
        "LocalStorage",
    ]),
};

export const bootFiles = [
    import("boot/axios"),
    import("boot/helper"),
    import("boot/notif"),
];
