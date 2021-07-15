<template>
    <q-page padding>
        <div>Hello {{ user.name }}</div>
    </q-page>
</template>

<script>
export default {
    computed: {
        user() {
            return this.$page.props.auth.user;
        },
    },
};
</script>

<style></style>
