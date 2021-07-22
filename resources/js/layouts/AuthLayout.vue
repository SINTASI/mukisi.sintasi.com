<template>
    <q-layout view="lHh Lpr lFf">
        <!-- <q-page-container>
            <slot />
        </q-page-container> -->

        <q-page-container ref="container" class="bg-white">
            <transition
                appear
                enter-active-class="animated fadeIn"
                leave-active-class="animated fadeOut"
            >
                <slot />
            </transition>
            <q-page-scroller
                position="bottom-left"
                :scroll-offset="600"
                :duration="250"
            >
                <q-btn
                    fab
                    icon="keyboard_arrow_up"
                    color="primary"
                    style="background: rgb(0 136 255 / 43%) !important"
                />
            </q-page-scroller>
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
