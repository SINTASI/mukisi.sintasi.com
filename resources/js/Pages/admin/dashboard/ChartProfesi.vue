<template>
    <q-card>
        <q-card-section>
            <div class="text-h6">Profesi Anggota</div>
        </q-card-section>

        <q-card-section>
            <div ref="profesi" class="chartdiv q-pt-md"></div>
        </q-card-section>

        <q-inner-loading :showing="loading">
            <q-spinner-facebook size="50px" color="green" />
        </q-inner-loading>
    </q-card>
</template>

<script>
import * as am4charts from "@amcharts/amcharts4/charts";

export default {
    props: {
        am4core: Object,
    },
    data() {
        return {
            loading: true,
            chart: null,
            test: [],
        };
    },
    mounted() {
        this.initChart();
    },
    methods: {
        reloadData() {
            if (this.chart) {
                this.loading = true;
                this.chart.dataSource.load();
            }
        },
        initChart() {
            let chart = this.am4core.create(
                this.$refs.profesi,
                am4charts.PieChart
            );
            const params = "xhr=true&method=__profesis";
            chart.dataSource.url = `/admin/dashboard?${params}`;
            chart.dataSource.parser = new this.am4core.JSONParser();
            chart.dataSource.updateCurrentData = true;

            chart.dataSource.events.on("done", () => (this.loading = false));

            chart.events.on("datavalidated", function (ev) {
                chart.series.each(function (series) {
                    series.appear();
                });
            });

            let pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "value";
            pieSeries.dataFields.category = "label";

            chart.innerRadius = this.am4core.percent(30);

            pieSeries.slices.template.stroke = this.am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            // change the cursor on hover to make it apparent the object can be interacted with
            pieSeries.slices.template.cursorOverStyle = [
                {
                    property: "cursor",
                    value: "pointer",
                },
            ];

            pieSeries.alignLabels = false;
            pieSeries.labels.template.bent = true;
            pieSeries.labels.template.radius = 3;
            pieSeries.labels.template.padding(0, 0, 0, 0);

            pieSeries.slices.template.configField = "config";

            pieSeries.labels.template.disabled = true;
            pieSeries.ticks.template.disabled = true;

            // Create a base filter effect (as if it's not there) for the hover to return to
            let shadow = pieSeries.slices.template.filters.push(
                new this.am4core.DropShadowFilter()
            );
            shadow.opacity = 0;

            // Create hover state
            let hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists

            // Slightly shift the shadow and make it more prominent on hover
            let hoverShadow = hoverState.filters.push(
                new this.am4core.DropShadowFilter()
            );
            hoverShadow.opacity = 0.7;
            hoverShadow.blur = 5;
            // Add a legend
            chart.legend = new am4charts.Legend();
            this.chart = chart;
        },
    },
    beforeDestroy() {
        if (this.chart) {
            this.chart.dispose();
        }
    },
};
</script>
