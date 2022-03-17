<script>
import { Doughnut } from "vue-chartjs";

export default {
  extends: Doughnut,
  data: () => ({
    chartdata: {
      labels: ["10 TKJ 1", "11 TKJ 1"],
      datasets: [
        {
          label: "Dataset",
          data: [150, 450],
          backgroundColor: ["#FEC953", "#FE6961"],
          hoverOffset: 4,
        },
      ],
    },
    options: {
      cutoutPercentage: 80,
      scales: {
        myScale: {
          type: "logarithmic",
          position: "right", // `axis` is determined by the position as `'y'`
        },
      },
    },
  }),

  mounted() {
    this.renderChart(this.chartdata, this.options);
  },
};
</script>
