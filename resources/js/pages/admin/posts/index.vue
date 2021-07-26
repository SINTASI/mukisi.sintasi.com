<template>
    <q-page :style-fn="myTweak" padding>
        <Editor />
    </q-page>
</template>

<script>
import Editor from "components/Editor";
export default {
    components: {
        Editor,
    },
};
</script>

<style></style>
