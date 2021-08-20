<template>
    <q-card>
        <q-card-section>
            <div class="text-h6">Wilayah Anggota</div>
        </q-card-section>

        <q-card-section>
            <div ref="maps" class="chartmaps q-pt-md"></div>
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
            chart: null,
            loading: true,
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
            let chart = this.am4core.create(this.$refs.maps, am4charts.XYChart);
            chart.scrollbarX = new this.am4core.Scrollbar();

            const params = "xhr=true&method=__maps";
            chart.dataSource.url = `/admin/dashboard?${params}`;

            chart.dataSource.parser = new this.am4core.JSONParser();
            chart.dataSource.updateCurrentData = true;

            chart.dataSource.events.on("done", () => (this.loading = false));

            chart.events.on("datavalidated", function (ev) {
                chart.series.each(function (series) {
                    series.appear();
                });
            });

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "label";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;

            // Create series
            let series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "value";
            series.dataFields.categoryX = "label";
            series.tooltipText = "[{categoryX}: bold]{valueY} Anggota[/]";
            series.columns.template.strokeWidth = 0;

            series.tooltip.pointerOrientation = "vertical";

            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            // on hover, make corner radiuses bigger
            let hoverState =
                series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;

            series.columns.template.adapter.add(
                "fill",
                function (fill, target) {
                    return chart.colors.getIndex(target.dataItem.index);
                }
            );

            // Cursor
            chart.cursor = new am4charts.XYCursor();
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

<style></style>
