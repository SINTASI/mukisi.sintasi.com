<template>
    <q-card class="my-card" flat>
        <q-card-section class="row">
            <!-- <q-btn
                color="primary"
                icon="add"
                label="tambah data"
                @click="dialogAdd = true"
            /> -->
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
            :pagination="{ rowsPerPage: 10 }"
        >
            <template v-slot:body-cell-verified="props">
                <q-td :props="props">
                    <div>
                        <q-chip
                            v-if="props.value"
                            square
                            color="positive"
                            text-color="white"
                            icon="check"
                            dense
                            style="width: 70px"
                        >
                            <q-tooltip>
                                {{ props.row.name }} Sudah melakukan verifikasi
                                email
                            </q-tooltip>
                            AKTIF
                        </q-chip>

                        <q-chip
                            v-else
                            square
                            color="negative"
                            text-color="white"
                            icon="cancel"
                            dense
                        >
                            <q-tooltip>
                                {{ props.row.name }} Perlu melakukan verifikasi
                                email
                            </q-tooltip>
                            NONAKTIF
                        </q-chip>
                    </div>
                </q-td>
            </template>

            <template v-slot:body-cell-btn="props">
                <q-td :props="props">
                    <div class="q-gutter-xs">
                        <q-btn
                            color="positive"
                            icon="send"
                            dense
                            size="sm"
                            :disable="props.row.verified"
                            @click="resendEmail(props)"
                        >
                            <q-tooltip>
                                Kirim ulang link verifikasi ke
                                {{ props.row.email }}
                            </q-tooltip>
                        </q-btn>

                        <q-btn
                            color="blue"
                            icon="how_to_reg"
                            dense
                            size="sm"
                            :disable="props.row.verified"
                            @click="verifikasi(props)"
                        >
                            <q-tooltip>
                                Verifikasi email tanpa mengirim link
                            </q-tooltip>
                        </q-btn>
                    </div>
                </q-td>
            </template>
        </q-table>
    </q-card>
</template>

<script>
import sameMixin from "./sameMixin";
export default {
    mixins: [sameMixin],
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
                    label: "Profesi",
                    field: "profesi",
                    name: "profesi",
                    sortable: true,
                    align: "left",
                    format: (v) => v.name,
                },
                {
                    label: "Alamat",
                    field: "alamat",
                    name: "alamat",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "STATUS",
                    field: "verified",
                    name: "verified",
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
                    type: "personal",
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
