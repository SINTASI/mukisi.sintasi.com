import { boot } from "quasar/wrappers";
import { Head } from "@inertiajs/inertia-vue3";
Array.prototype.moveUp = function (value, by) {
    var index = this.indexOf(value),
        newPos = index - (by || 1);

    if (index === -1) throw new Error("Element not found in array");

    if (newPos < 0) newPos = 0;

    this.splice(index, 1);
    this.splice(newPos, 0, value);
    return this;
};

Array.prototype.moveDown = function (value, by) {
    var index = this.indexOf(value),
        newPos = index + (by || 1);
    console.log(index);
    if (index === -1) throw new Error("Element not found in array");

    if (newPos >= this.length) newPos = this.length;

    this.splice(index, 1);
    this.splice(newPos, 0, value);
    return this;
};

export default boot(({ app }) => {
    app.config.globalProperties.APP_NAME = "MUKISI";
    // app.config.globalProperties.APP_NAME = process.env.MIX_APP_NAME;
    app.config.globalProperties.myTweak = (offset) => {
        return { minHeight: offset ? `calc(100vh - ${offset}px)` : "100vh" };
    };
    app.config.globalProperties.getProps = function (key = false) {
        if (!key) {
            return this.$page.props;
        }
        return this.$page.props[key];
    };
    app.component("Header", Head);
});
