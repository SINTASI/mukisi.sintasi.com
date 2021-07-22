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
            ],
        };
    },
    computed: {
        slider() {
            return this.$page.props.data;
        },
    },
};
</script>

<style></style>
