<template>
    <q-card class="my-card" flat>
        <q-card-section class="row">
            <q-btn
                color="primary"
                icon="add"
                label="tambah data"
                @click="dialogAdd = true"
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
            flat
            dense
            :rows="anggota"
            :filter="filter"
            :loading="loading"
            :columns="columns"
            :pagination="{ rowsPerPage: 100 }"
        >
        </q-table>
    </q-card>
</template>

<script>
export default {
    data() {
        return {
            dialogAdd: false,
            filter: "",
            columns: [
                {
                    label: "NAMA",
                    field: "name",
                    name: "name",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "EMAIL",
                    field: "email",
                    name: "email",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "ACT",
                    field: "btn",
                    name: "btn",
                    align: "left",
                },
            ],
            loading: true,
            anggota: [],
        };
    },
    mounted() {
        this.loadAnggota();
    },
    methods: {
        async loadAnggota() {
            this.loading = true;
            const { data } = await this.$axios.get("/admin/anggota", {
                params: {
                    type: "institusi",
                    xhr: true,
                },
            });
            this.anggota = data;
            this.loading = false;
        },
    },
};
</script>

<style></style>
