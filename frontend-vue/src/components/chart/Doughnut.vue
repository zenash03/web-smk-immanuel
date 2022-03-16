<script>
import { Doughnut } from "vue-chartjs";

export default {
  extends: Doughnut,
  data: () => ({
    chartdata: {
      labels: ["10 TKJ 1", "11 TKJ 1"],
      datasets: [
        {
          label: "My First Dataset",
          data: [150, 400],
          backgroundColor: ["rgb(255, 205, 86)", "rgb(255, 99, 132)"],
          hoverOffset: 4,
        },
      ],
    },
    options: {
      cutoutPercentage: 80,
    },
  }),

  mounted() {
    this.renderChart(this.chartdata, this.options);
  },
};
</script>
