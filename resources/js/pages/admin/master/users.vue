<template>
    <q-page :style-fn="myTweak" padding>
        <q-card class="my-card">
            <q-card-section>
                <div class="text-h6">Our Changing Planet</div>
                <div class="text-subtitle2">by John Doe</div>
            </q-card-section>

            <q-table
                title="Table Title"
                row-key="id"
                :data="data"
                :columns="columns"
            />
        </q-card>
    </q-page>
</template>

<script>
export default {
    data() {
        return {
            data: [],
            columns: [],
        };
    },
};
</script>

<style></style>
