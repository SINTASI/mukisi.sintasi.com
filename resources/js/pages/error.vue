<template>
    <q-page :style-fn="myTweak" padding class="flex flex-center row">
        <q-card class="my-card" flat style="width: 450px;max-width 350px;">
            <q-card-section class="text-center">
                <div class="text-h1">{{ status }}</div>
                <div class="text-h5">{{ title }}</div>
                <div class="text-subtitle2">{{ description }}</div>
            </q-card-section>

            <q-card-actions vertical align="center">
                <q-btn flat label="Back" @click="goBack" />
            </q-card-actions>
        </q-card>
    </q-page>
</template>

<script>
export default {
    layout: "AuthLayout",
    props: {
        status: Number,
    },
    computed: {
        title() {
            return {
                503: "503: Service Unavailable",
                500: "500: Server Error",
                404: "404: Page Not Found",
                403: "403: Forbidden",
            }[this.status];
        },
        description() {
            return {
                503: "Sorry, we are doing some maintenance. Please check back soon.",
                500: "Whoops, something went wrong on our servers.",
                404: "Sorry, the page you are looking for could not be found.",
                403: "Sorry, you are forbidden from accessing this page.",
            }[this.status];
        },
    },
    methods: {
        goBack() {
            window.history.go(-1);
            return false;
        },
    },
};
</script>
