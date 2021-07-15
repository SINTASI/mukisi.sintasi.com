<template>
    <q-page :style-fn="myTweak" padding>
        <q-card class="my-card">
            <q-card-section class="row">
                <q-btn
                    color="primary"
                    icon="add"
                    label="tambah data"
                    @click="promptAdd = true"
                />
                <q-space />
                <q-input
                    dense
                    outlined
                    debounce="0"
                    v-model="filter"
                    placeholder="Cari"
                >
                    <template v-slot:append>
                        <q-icon name="search" />
                    </template>
                </q-input>
            </q-card-section>

            <q-table
                dense
                title="ROLE"
                row-key="id"
                :rows="data"
                :filter="filter"
                :columns="columns"
            >
            </q-table>
        </q-card>
    </q-page>
</template>

<script>
export default {
    data() {
        return {
            filter: "",
            columns: [],
            promptAdd: false,
        };
    },
    computed: {
        data() {
            return this.$page.props.data;
        },
    },
};
</script>

<style></style>
