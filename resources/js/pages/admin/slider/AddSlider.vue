<template>
    <q-dialog
        :value="value"
        @input="(value) => $emit('input', value)"
        persistent
    >
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
                                (val && val.length > 0) || 'Tidak boleh kosong',
                        ]"
                    />
                    <q-toggle
                        v-model="form.isUpload"
                        color="primary"
                        label="Upload Images"
                    />
                    <q-input
                        v-if="!form.isUpload"
                        filled
                        hide-bottom-space
                        v-model="form.images"
                        label="URL IMAGES"
                        dense
                        lazy-rules
                        :rules="[
                            (val) =>
                                (val && val.length > 0) || 'Tidak boleh kosong',
                        ]"
                    />
                </q-card-section>
                <q-card-section v-if="form.isUpload">
                    <q-uploader
                        url=""
                        label="Upload Images"
                        flat
                        bordered
                        class="full-width"
                        color="primary"
                        accept="image/*"
                        :max-files="1"
                        @added="(file) => (form.file = file[0])"
                        @removed="(file) => (form.file = [])"
                    />
                </q-card-section>
                <q-card-actions align="right">
                    <q-btn
                        flat
                        label="Batal"
                        color="red"
                        @click="$emit('update:modelValue', false)"
                    />
                    <q-btn flat label="Simpan" color="primary" type="submit" />
                </q-card-actions>
            </q-form>

            <q-inner-loading :showing="loading">
                <q-spinner-gears size="50px" color="primary" />
            </q-inner-loading>
        </q-card>
    </q-dialog>
</template>

<script>
export default {
    props: {
        value: Boolean,
    },
    data() {
        return {
            loading: false,
            form: {
                file: null,
                name: "",
                images: "",
                isUpload: false,
            },
        };
    },
    methods: {
        onSubmit() {
            this.loading = true;
            this.$inertia.post("/admin/slider", this.form, {
                forceFormData: true,
                onFinish: () => {
                    this.loading = false;
                    this.$emit("update:modelValue", false);
                    this.form = {
                        name: "",
                        images: "",
                        file: null,
                        isUpload: false,
                    };
                },
            });
        },
    },
};
</script>

<style></style>
