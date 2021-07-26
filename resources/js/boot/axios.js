import axios from "axios";
import { boot } from "quasar/wrappers";

export default boot(({ app }) => {
    axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    app.config.globalProperties.$axios = axios;
});

export { axios };
