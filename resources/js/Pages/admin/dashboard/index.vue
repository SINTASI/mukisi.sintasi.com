<template>
    <q-page padding class="row q-col-gutter-md">
        <div class="col-12 text-right">
            <q-btn
                color="green"
                icon="refresh"
                size="sm"
                @click="reloadData"
                :loading="loading"
            >
                <q-tooltip> Reload data </q-tooltip>
            </q-btn>
        </div>
        <div class="col-12">
            <card-anggota ref="cardAnggota" />
        </div>

        <div class="col-md-6 col-xs-12">
            <chart-category
                ref="chartCategory"
                :am4core="am4core"
                :loading="loading"
            />
        </div>

        <div class="col-md-6 col-xs-12">
            <chart-profesi ref="chartProfesi" :am4core="am4core" />
        </div>

        <div class="col-12">
            <chart-wilayah ref="chartWilayah" :am4core="am4core" />
        </div>
    </q-page>
</template>

<script>
import * as am4core from "@amcharts/amcharts4/core";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
am4core.useTheme(am4themes_animated);

import ChartCategory from "./ChartCategory.vue";
import ChartProfesi from "./ChartProfesi.vue";
import ChartWilayah from "./ChartWilayah.vue";
import CardAnggota from "./CardAnggota.vue";
export default {
    components: { ChartCategory, ChartProfesi, ChartWilayah, CardAnggota },
    data() {
        return {
            loading: false,
            chart: null,
            am4core,
            autoreload: 0,
        };
    },
    computed: {
        user() {
            return this.$page.props.auth.user;
        },
    },
    created() {},
    methods: {
        reloadData() {
            for (const key in this.$refs) {
                this.$refs[key].reloadData();
            }
        },
    },
};
</script>

<style>
.chartdiv {
    width: 100%;
    height: 350px;
    margin: auto;
}

.chartmaps {
    height: 600px;
}
</style>
