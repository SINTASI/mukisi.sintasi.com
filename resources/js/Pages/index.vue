<template>
    <q-page class="row flex flex-center" padding>
        <div class="col-md-4 col-sm-6 col-12">
            <q-card class="my-card">
                <q-form
                    @submit="onSubmit"
                    autocorrect="off"
                    autocapitalize="off"
                    autocomplete="off"
                    spellcheck="false"
                    ref="form"
                >
                    <q-card-section>
                        <div class="text-h6 text-center">ADMIN LOGIN</div>
                    </q-card-section>

                    <q-card-section>
                        <q-input
                            v-model="form.username"
                            type="text"
                            label="Username"
                            lazy-rules
                            :rules="[
                                (val) =>
                                    (val && val.length > 0) ||
                                    'Please type something',
                            ]"
                            :error-message="validation.username.message"
                            :error="!validation.username.valid"
                        />
                        <q-input
                            v-model="form.password"
                            type="password"
                            label="Password"
                            lazy-rules
                            :rules="[
                                (val) =>
                                    (val && val.length > 0) ||
                                    'Please type something',
                            ]"
                            :error-message="validation.password.message"
                            :error="!validation.password.valid"
                        />
                    </q-card-section>

                    <q-card-actions align="left">
                        <q-checkbox
                            dense
                            color="primary"
                            v-model="form.remember"
                            label="Remember Me"
                        />
                    </q-card-actions>

                    <q-card-actions align="center">
                        <q-btn
                            label="Login"
                            type="submit"
                            color="primary"
                            class="full-width"
                            :loading="loading"
                        />
                    </q-card-actions>
                </q-form>
            </q-card>
        </div>
    </q-page>
</template>

<script>
export default {
    layout: "AuthLayout",
    data() {
        return {
            form: {
                username: "",
                password: "",
                remember: false,
            },
            validation: {
                password: {
                    valid: true,
                    message: "",
                },
                username: {
                    valid: true,
                    message: "",
                },
            },
            loading: false,
        };
    },
    watch: {
        "$page.props.errors"(type) {
            for (const key in this.validation) {
                this.validation[key].valid = true;
            }
            for (const key in type) {
                this.validation[key].valid = false;
                this.validation[key].message = type[key];
            }
        },
    },
    mounted() {},
    methods: {
        onSubmit() {
            this.loading = true;
            this.$inertia.post("/admin/login", this.form, {
                onFinish: () => (this.loading = false),
            });
        },
    },
};
</script>

<style></style>
