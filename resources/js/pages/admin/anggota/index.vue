<template>
    <q-page :style-fn="myTweak" padding>
        <q-card class="my-card">
            <q-tabs v-model="tab" inline-label class="full-width">
                <q-tab name="institusi" icon="mail" label="Institusi" />
                <q-tab name="personal" icon="alarm" label="Personal" />
            </q-tabs>

            <q-tab-panels v-model="tab" animated>
                <q-tab-panel name="institusi">
                    <institusi />
                </q-tab-panel>
                <q-tab-panel name="personal" disables>
                    <personal />
                </q-tab-panel>
            </q-tab-panels>
        </q-card>
    </q-page>
</template>

<script>
import institusi from "./institusi.vue";
import personal from "./personal.vue";
export default {
    components: { institusi, personal },
    data() {
        return {
            tab: "institusi",
        };
    },
    mounted() {
        // console.log(this.route().params());
    },
};
</script>

<style></style>
