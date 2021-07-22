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
                row-key="id"
                :rows="menu"
                :filter="filter"
                :columns="columns"
                :pagination="{ rowsPerPage: 0 }"
            >
                <template v-slot:header="props">
                    <q-tr :props="props">
                        <q-th auto-width />
                        <q-th
                            v-for="col in props.cols"
                            :key="col.name"
                            :props="props"
                        >
                            {{ col.label }}
                        </q-th>
                    </q-tr>
                </template>
                <template v-slot:body="props">
                    <q-tr :props="props" no-hover>
                        <q-td auto-width>
                            <div class="q-gutter-xs">
                                <q-btn
                                    icon="arrow_upward"
                                    size="sm"
                                    color="indigo-14"
                                    round
                                    dense
                                    :disable="props.rowIndex === 0"
                                    @click="upMenu(props)"
                                />
                                <q-btn
                                    icon="arrow_downward"
                                    size="sm"
                                    color="deep-purple-10"
                                    round
                                    dense
                                    :disable="
                                        menu.length - 1 === props.rowIndex
                                    "
                                    @click="downMenu(props)"
                                />
                                <q-btn
                                    size="sm"
                                    color="primary"
                                    round
                                    dense
                                    v-if="props.row.child.length > 0"
                                    @click="props.expand = !props.expand"
                                    :icon="
                                        props.expand
                                            ? 'visibility_off'
                                            : 'visibility'
                                    "
                                />
                            </div>
                        </q-td>

                        <q-td
                            v-for="col in props.cols"
                            :key="col.name"
                            :props="props"
                        >
                            <q-popup-edit
                                v-model="props.row[col.field]"
                                :title="`EDIT ${col.label}`"
                                @update:model-value="onEdit(props)"
                                v-slot="scope"
                            >
                                <q-input
                                    v-model="scope.value"
                                    dense
                                    autofocus
                                    counter
                                    @keyup.enter="scope.set"
                                />
                            </q-popup-edit>
                            {{ col.value }}
                        </q-td>
                    </q-tr>

                    <q-tr v-show="props.expand" :props="props" no-hover>
                        <q-td colspan="100%">
                            <q-table
                                :title="`${props.row.name} SUB MENU`"
                                :rows="props.row.child"
                                :columns="columns"
                                row-key="id"
                                dense
                                flat
                                hide-bottom
                                :pagination="{ rowsPerPage: 0 }"
                            >
                                <template v-slot:header="props">
                                    <q-tr :props="props">
                                        <q-th auto-width />
                                        <q-th
                                            v-for="col in props.cols"
                                            :key="col.name"
                                            :props="props"
                                        >
                                            {{ col.label }}
                                        </q-th>
                                    </q-tr>
                                </template>

                                <template v-slot:body="props2">
                                    <q-tr :props="props2" no-hover>
                                        <q-td auto-width>
                                            <div class="q-gutter-xs">
                                                <q-btn
                                                    icon="arrow_upward"
                                                    size="sm"
                                                    color="indigo-14"
                                                    round
                                                    dense
                                                    :disable="
                                                        props2.rowIndex === 0
                                                    "
                                                    @click="
                                                        upMenu(
                                                            props2,
                                                            'child',
                                                            props.row.child
                                                        )
                                                    "
                                                />
                                                <q-btn
                                                    icon="arrow_downward"
                                                    size="sm"
                                                    color="deep-purple-10"
                                                    round
                                                    dense
                                                    :disable="
                                                        menu.length - 1 ===
                                                        props2.rowIndex
                                                    "
                                                    @click="
                                                        downMenu(
                                                            props2,
                                                            'child',
                                                            props.row.child
                                                        )
                                                    "
                                                />
                                            </div>
                                        </q-td>

                                        <q-td
                                            v-for="col in props2.cols"
                                            :key="col.name"
                                            :props2="props2"
                                        >
                                            <q-popup-edit
                                                v-model="props2.row[col.field]"
                                                :title="`EDIT ${col.label}`"
                                                @update:model-value="
                                                    onEdit(props2)
                                                "
                                                v-slot="scope"
                                            >
                                                <q-input
                                                    v-model="scope.value"
                                                    dense
                                                    autofocus
                                                    counter
                                                    @keyup.enter="scope.set"
                                                />
                                            </q-popup-edit>
                                            {{ col.value }}
                                        </q-td>
                                    </q-tr>
                                </template>
                            </q-table>
                        </q-td>
                    </q-tr>
                </template>
            </q-table>
        </q-card>

        <q-dialog v-model="promptAdd" persistent>
            <q-card style="min-width: 450px; max-width: 700px">
                <q-form @submit="onSubmit">
                    <q-card-section> TAMBAH DATA </q-card-section>
                    <q-card-section class="q-gutter-md">
                        <q-input
                            filled
                            hide-bottom-space
                            v-model="form.name"
                            label="NAME"
                            dense
                            lazy-rules
                            :rules="[
                                (val) =>
                                    (val && val.length > 0) ||
                                    'Tidak boleh kosong',
                            ]"
                        />

                        <q-input
                            filled
                            hide-bottom-space
                            v-model="form.link"
                            label="URL"
                            dense
                            lazy-rules
                            :rules="[
                                (val) =>
                                    (val && val.length > 0) ||
                                    'Tidak boleh kosong',
                            ]"
                        />

                        <q-input
                            filled
                            hide-bottom-space
                            v-model="form.icon"
                            label="ICON"
                            dense
                            lazy-rules
                            :rules="[
                                (val) =>
                                    (val && val.length > 0) ||
                                    'Tidak boleh kosong',
                            ]"
                            hint="URL : https://fonts.google.com/icons"
                        />
                    </q-card-section>
                    <q-card-actions align="right">
                        <q-btn flat label="Batal" color="red" v-close-popup />
                        <q-btn
                            flat
                            label="Simpan"
                            color="primary"
                            type="submit"
                        />
                    </q-card-actions>
                </q-form>
            </q-card>
        </q-dialog>
    </q-page>
</template>

<script>
export default {
    data() {
        return {
            data: [],
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
                    label: "LINK",
                    field: "link",
                    name: "link",
                    sortable: true,
                    align: "left",
                },
                {
                    label: "ICON",
                    field: "icon",
                    name: "icon",
                    sortable: true,
                    align: "left",
                },
            ],
            form: {
                name: "",
                icon: "",
                link: "",
                parent: 0,
            },
            promptAdd: false,
        };
    },
    computed: {
        menu() {
            return this.$page.props.auth.menu;
        },
    },
    methods: {
        onSubmit() {
            this.$inertia.post("/admin/master/menu", this.form, {
                onFinish: () => (this.promptAdd = false),
            });
        },
        async onEdit({ row }) {
            const { data } = await this.$axios.put(
                `/admin/master/menu/${row.id}`,
                row
            );
            this.$showSuccess(data.message);
        },
        async upMenu({ row }, type = "parent", child = []) {
            const menu =
                type === "parent"
                    ? this.menu.moveUp(row, 1)
                    : child.moveUp(row, 1);
            await this.$axios.post(`/admin/master/menu/drop-down`, {
                menu,
            });
        },
        async downMenu({ row }, type = "parent", child = []) {
            const menu =
                type === "parent"
                    ? this.menu.moveDown(row, 1)
                    : child.moveDown(row, 1);
            await this.$axios.post(`/admin/master/menu/drop-down`, {
                menu,
            });
        },
    },
};
</script>

<style></style>
