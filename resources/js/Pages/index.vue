<template>
    <q-page class="row flex flex-center" padding>
        <div class="col-md-4 col-sm-6 col-12">
            <q-card class="my-card">
                <q-form @submit="onSubmit">
                    <q-card-section>
                        <div class="text-h6 text-center">ADMIN LOGIN</div>
                    </q-card-section>

                    <q-card-section>
                        <q-input
                            v-model="form.username"
                            type="text"
                            label="Username"
                        />
                        <q-input
                            v-model="form.password"
                            type="password"
                            label="Password"
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
                            :loading="form.loading"
                        />
                    </q-card-actions>
                </q-form>
            </q-card>
        </div>
    </q-page>
</template>

<script>
import { computed, watch, reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { Notify } from "quasar";

export default {
    layout: "AuthLayout",

    setup() {
        const form = reactive({
            username: "",
            password: "",
            loading: false,
            remember: false,
        });

        watch(
            computed(() => usePage().props.value.message),
            (val) => {
                if (val && val !== null) {
                    Notify.create({
                        type: "negative",
                        message: val,
                        progress: true,
                    });
                }
            }
        );

        const onSubmit = () => {
            form.loading = true;
            Inertia.post("/admin/login", form, {
                onFinish: () => (form.loading = false),
            });
        };

        return {
            form,
            onSubmit,
        };
    },
};
</script>

<style></style>
