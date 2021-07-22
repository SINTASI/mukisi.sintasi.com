<template>
    <q-layout view="lHh Lpr lFf">
        <Header :title="title ? `${title} - ${APP_NAME}` : APP_NAME" />

        <q-header elevated class="bg-green-5">
            <q-toolbar>
                <q-btn flat @click="drawer = !drawer" round dense icon="menu" />
                <q-toolbar-title>Header</q-toolbar-title>
            </q-toolbar>
        </q-header>
        <q-drawer
            v-model="drawer"
            show-if-above
            bordered
            content-class="bg-grey-1"
            :width="301"
            elevated
        >
            <q-scroll-area
                style="height: calc(100% - 150px); margin-top: 140px"
            >
                <main-menu
                    class="q-mt-sm"
                    v-show="!loading"
                    @loading="(l) => (loading = l)"
                />
            </q-scroll-area>
            <q-inner-loading :showing="loading" style="background: white">
                <q-spinner-bars size="40px" color="blue" />
            </q-inner-loading>

            <!-- <q-scroll-area
                style="
                    height: calc(100% - 150px);
                    margin-top: 150px;
                    border-right: 1px solid #ddd;
                "
            >
                <q-list padding dense>
                    <q-item
                        clickable
                        v-ripple
                        @click="route('admin.dashboard')"
                    >
                        <q-item-section avatar>
                            <q-icon name="dashboard" />
                        </q-item-section>
                        <q-item-section> Dashboard </q-item-section>
                    </q-item>

                    <q-item clickable v-ripple @click="logOut">
                        <q-item-section avatar>
                            <q-icon name="logout" />
                        </q-item-section>
                        <q-item-section> Logout </q-item-section>
                    </q-item>
                </q-list>
            </q-scroll-area> -->

            <q-img
                class="absolute-top"
                src="https://cdn.quasar.dev/img/material.png"
                style="height: 150px"
            >
                <div class="absolute-bottom bg-transparent">
                    <q-avatar size="56px" class="q-mb-sm">
                        <img src="https://cdn.quasar.dev/img/boy-avatar.png" />
                    </q-avatar>
                    <div class="text-weight-bold">{{ user.name }}</div>
                    <div>@{{ user.username }}</div>
                </div>
            </q-img>
        </q-drawer>
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
    </q-layout>
</template>

<script>
import MainMenu from "components/MainMenu";
export default {
    components: { MainMenu },
    props: {
        title: String,
    },
    data() {
        return {
            drawer: false,
            loading: false,
        };
    },
    computed: {
        user() {
            return this.$page.props.auth.user;
        },
    },
    methods: {
        logOut() {
            this.$inertia.get("/admin/logout");
        },
    },
};
</script>

<style></style>
