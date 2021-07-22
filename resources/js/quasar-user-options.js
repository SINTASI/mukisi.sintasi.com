// import "@quasar/extras/roboto-font";
// import "@quasar/extras/material-icons";
import "css/app.scss";
import "quasar/dist/quasar.css";
import langId from "quasar/lang/id";
import { Cookies, LoadingBar, Notify } from "quasar";
export default {
    config: {
        loadingBar: { color: "primary", position: "top", size: "4px" },
    },
    lang: langId,
    plugins: { LoadingBar, Cookies, Notify },
};
