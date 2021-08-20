<template>
    <div class="row q-col-gutter-md">
        <div
            class="col-xl-3 col-md-4 col-xs-12"
            v-for="(card, index) in cards"
            :key="index"
        >
            <q-card :class="`bg-${card.color} text-white`">
                <q-card-section class="row q-pb-xs">
                    <div class="col">
                        <q-avatar
                            size="60px"
                            font-size="40px"
                            color="teal"
                            text-color="white"
                            :icon="!loading ? card.icon : 'refresh'"
                        />
                    </div>
                    <div class="text-h3 col-auto">
                        <span v-if="!loading">{{ card.count }}</span>
                        <span v-else>0</span>
                    </div>
                </q-card-section>
                <q-card-section class="text-h6 q-pt-none">
                    <span v-if="!loading">{{ card.label }}</span>
                    <span v-else>Loading...</span>
                </q-card-section>

                <q-inner-loading :showing="loading">
                    <q-spinner-facebook size="30px" color="teal" />
                </q-inner-loading>
            </q-card>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cards: [],
            loading: true,
        };
    },
    created() {
        this.getCardsData();
    },
    methods: {
        reloadData() {
            this.loading = true;
            this.getCardsData();
        },
        getCardsData() {
            this.$axios
                .get("/admin/dashboard", {
                    params: {
                        xhr: true,
                        method: "__cards",
                    },
                })
                .then((result) => {
                    this.cards = result.data;
                })
                .catch((err) => {})
                .finally(() => (this.loading = false));
        },
    },
};
</script>

<style></style>
