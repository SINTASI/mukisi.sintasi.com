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
// Nama, Email, Nama Institusi, No Hp, Hp PIC, Kategori, Tipe, Alamat
export default {
    data() {
        return {
            dialogAdd: false,
            filter: "",
            columns: [
                {
                    label: "Nama Lengkap",
                    field: "name",
                    name: "name",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "Email",
                    field: "email",
                    name: "email",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "Nama Institusi",
                    field: "institusi_name",
                    name: "institusi_name",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "No Hp",
                    field: "no_tlp",
                    name: "no_tlp",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "Hp PIC",
                    field: "no_pic",
                    name: "no_pic",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "Kategori",
                    field: "category",
                    name: "category",
                    sortable: true,
                    align: "left",
                    format: (v) => (v.name != null ? v.name : ""),
                },
                {
                    label: "Tipe",
                    field: "rs_type",
                    name: "rs_type",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "Alamat",
                    field: "alamat",
                    name: "alamat",
                    sortable: true,
                    align: "left",
                },
                // {
                //     label: "ACT",
                //     field: "btn",
                //     name: "btn",
                //     align: "left",
                // },
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
