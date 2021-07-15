<template>
    <q-layout view="lHh Lpr lFf">
        <q-page-container>
            <slot />
        </q-page-container>
        <Header :title="title ? `${title} - ${APP_NAME}` : APP_NAME" />
    </q-layout>
</template>
<script>
export default {
    props: {
        title: String,
    },
};
</script>

<style></style>
