<template>
    <q-form @submit="onSubmit" class="q-gutter-md" style="min-height: 450px">
        <div v-for="input in setting" :key="input.id">
            <div v-if="!input.is_image">
                <q-input
                    v-model="input.value"
                    dense
                    type="text"
                    :label="input.label"
                    lazy-rules
                    hide-bottom-space
                    :rules="[
                        (val) =>
                            (val && val.length > 0) ||
                            `${input.label} Tidak boleh kosong`,
                    ]"
                />
            </div>

            <div v-if="input.is_image">
                <q-uploader
                    url=""
                    flat
                    accept="image/*"
                    bordered
                    hide-upload-btn
                    @added="(file) => onUpload(input, file)"
                    :ref="input.key"
                    :label="input.label"
                    :value="input.value"
                />
                <q-img :src="input.value" width="200px" height="200px" />
            </div>
        </div>
        <q-btn label="simpan" type="submit" color="primary" />
        <q-inner-loading :showing="loading">
            <q-spinner-facebook size="50px" color="primary" />
        </q-inner-loading>
    </q-form>
</template>

<script>
export default {
    data() {
        return {
            loading: true,
            setting: [],
        };
    },
    mounted() {
        this.loadSetting();
    },
    methods: {
        async onUpload(input, file) {
            this.loading = true;
            try {
                const form = new FormData();
                form.append("images", file[0]);
                form.append("key", input.key);
                form.append("id", input.id);
                await this.$axios.post("/admin/setting", form);
                this.$refs[input.key].reset();
            } catch (err) {
                this.$parseError(err);
            }
            this.loadSetting();
        },
        async loadSetting() {
            this.loading = true;
            try {
                const { data } = await this.$axios.get("/admin/setting", {
                    params: {
                        type: "basic",
                    },
                });
                this.setting = data.data;
            } catch (err) {
                this.$parseError(err);
            }
            this.loading = false;
        },
        async onSubmit() {
            this.loading = true;
            try {
                const { data } = await this.$axios.put("/admin/setting/basic", {
                    setting: this.setting,
                });
                this.$showSuccess(`Berhasil mengupdate ${data} data`);
            } catch (err) {
                this.$parseError(err);
            }
            this.loadSetting();
        },
    },
};
</script>

<style></style>
