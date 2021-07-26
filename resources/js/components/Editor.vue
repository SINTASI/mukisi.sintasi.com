<template>
    <div :id="holder"></div>
</template>

<script>
import { defineComponent, onMounted, reactive } from "vue";
// import { axios } from "boot/axios";

export default defineComponent({
    name: "Editor",
    props: {
        holder: {
            type: String,
            default: () => "vue-editor",
            require: true,
        },
        config: {
            type: Object,
            default: () => ({}),
            require: true,
        },
        initialized: {
            type: Function,
            default: () => {},
        },
    },
    setup(props) {},
});
</script>

<style></style>
