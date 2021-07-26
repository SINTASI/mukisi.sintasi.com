import { boot } from "quasar/wrappers";
import { Notify } from "quasar";

function ShowNotify(type, message, params) {
    Notify.create({
        ...params,
        message,
        progress: true,
        type,
    });
}

export const $showError = (message, params = {}) => {
    ShowNotify("negative", message, params);
};

export const $showInfo = (message, params = {}) => {
    ShowNotify("info", message, params);
};

export const $showSuccess = (message, params = {}) => {
    ShowNotify("positive", message, params);
};

export const $parseError = (err, params = {}) => {
    if (err.hasOwnProperty("response")) {
        if (err.response.hasOwnProperty("data")) {
            if (err.response.data.hasOwnProperty("message")) {
                console.error(err.response.data);
                ShowNotify("negative", err.response.data.message, params);
            }
        }
    } else {
        console.error(err);
    }
};

export default boot(({ app }) => {
    app.config.globalProperties.$showInfo = $showInfo;
    app.config.globalProperties.$showError = $showError;
    app.config.globalProperties.$parseError = $parseError;
    app.config.globalProperties.$showSuccess = $showSuccess;
});
