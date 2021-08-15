<template>
    <q-page :style-fn="myTweak" padding>
        <q-card class="my-card">
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
                :rows="slider"
                :filter="filter"
                :columns="columns"
                :pagination="{ rowsPerPage: 0 }"
            >
                <template v-slot:body-cell-images="props">
                    <q-td :props="props" auto-width>
                        <q-img
                            :src="props.value"
                            width="250px"
                            height="120px"
                        />
                    </q-td>
                </template>

                <template v-slot:body-cell-seq_no="props">
                    <q-td :props="props" auto-width>
                        <q-popup-edit
                            v-model="props.row.seq_no"
                            buttons
                            @update:modelValue="
                                (val) => onUpdate(props, 'seq_no', val)
                            "
                            v-slot="scope"
                        >
                            <q-input
                                dense
                                autofocus
                                type="number"
                                v-model="scope.value"
                                @keyup.enter="scope.set"
                            />
                        </q-popup-edit>
                        {{ props.value }}
                    </q-td>
                </template>

                <template v-slot:body-cell-btn="props">
                    <q-td :props="props" auto-width>
                        <div class="q-gutter-sm">
                            <q-btn
                                dense
                                color="red"
                                icon="delete"
                                @click="deleteItem(props)"
                            />
                        </div>
                    </q-td>
                </template>
            </q-table>
        </q-card>

        <add-slider v-model="dialogAdd" />
    </q-page>
</template>

<script>
import AddSlider from "./AddSlider.vue";
export default {
    components: { AddSlider },
    data() {
        return {
            dialogAdd: false,
            filter: "",
            columns: [
                {
                    label: "IMAGES",
                    field: "images",
                    name: "images",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "NAMA",
                    field: "name",
                    name: "name",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "URUTAN",
                    field: "seq_no",
                    name: "seq_no",
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
        };
    },
    computed: {
        slider() {
            return this.$page.props.data;
        },
    },
    methods: {
        onUpdate({ row }, key, value) {
            this.$inertia.put(`/admin/slider/${row.id}`, {
                key,
                value,
            });
        },
        deleteItem({ row }) {
            this.$q
                .dialog({
                    title: `Hapus ${row.name} ? `,
                    message: `<div class='text-center'><img src='${row.images}' width='368px'></div>`,
                    html: true,
                    cancel: true,
                    ok: "Hapus",
                })
                .onOk(() => {
                    this.$inertia.delete(`/admin/slider/${row.id}`);
                });
        },
    },
};
</script>

<style></style>
