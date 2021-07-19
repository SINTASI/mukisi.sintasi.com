import axios from "axios";

export default ({ app }) => {
    axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    app.config.globalProperties.$axios = axios;
};

export { axios };
