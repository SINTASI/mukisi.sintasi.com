<template>
    <q-page :style-fn="myTweak" padding>
        <q-card class="my-card">
            <q-tabs
                v-model="tab"
                dense
                class="text-grey"
                active-color="primary"
                indicator-color="primary"
                align="justify"
                mobile-arrows
            >
                <q-tab name="basic" label="UMUM" />
                <q-tab name="blog" label="BLOG" />
                <q-tab name="pages" label="PAGES" />
            </q-tabs>
            <q-separator />
            <q-tab-panels v-model="tab" animated>
                <q-tab-panel name="basic">
                    <component :is="tab" />
                </q-tab-panel>

                <q-tab-panel name="blog">
                    <div class="text-h6">Blog</div>
                    <component :is="tab" />
                </q-tab-panel>

                <q-tab-panel name="movies">
                    <div class="text-h6">PAGES</div>
                    <component :is="tab" />
                </q-tab-panel>
            </q-tab-panels>
        </q-card>
    </q-page>
</template>

<script>
import basic from "./basic";
export default {
    components: { basic },
    data() {
        return {
            tab: "basic",
            setting: [],
        };
    },
    computed: {
        data() {
            const data = this.getProps("data");
            this.setting = { ...data };
            return data;
        },
    },
    mounted() {},
};
</script>

<style></style>
