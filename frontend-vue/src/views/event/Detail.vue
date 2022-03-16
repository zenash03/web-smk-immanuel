<template>
  <div class="px-16 py-16">
    <p class="text-xl mb-5">Event Detail</p>
    <img class="w-full h-96 object-cover rounded-lg" src="@/assets/img/web.png" />
    <div class="grid grid-cols-6 mt-5 gap-x-8">
      <div class="grid gap-y-4 col-span-4">
        <p class="text-lg font-extrabold text-primary-blue">Coding With Erick Chandra</p>
        <div class="grid grid-flow-col auto-cols-max items-center">
          <img class="w-12 h-12 border-2 rounded-full object-contain" alt="" src="@/assets/img/logo.png" />
          <div class="grid ml-4">
            <p class="text-md font-medium">Erick Chandra</p>
            <p class="text-sm text-dark-50">15 January 2022, 4:00 - 15:00</p>
          </div>
        </div>
        <div class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md">
          <p class="font-normal max-h-44 text-ellipsis overflow-auto">
            Coding is a list of step-by-step instructions that get computers to do what you want them to do. Coding makes it possible for us to create
            computer software, games, apps and websites. Coders, or programmers, are people who write the programmes behind everything we see and do
            on a computerCoding is a list of step-by-step instructions that get computers to do what you want them to do. Coding makes it possible for
            us to create computer software, games, apps and websites. Coders, or programmers, are people who write the programmes behind everything we
            see and do on a computer.
          </p>
        </div>
      </div>
      <div class="col-span-2 grid grid-flow-row auto-rows-max gap-y-3">
        <p class="text-lg font-extrabold text-primary-blue">Participants From</p>
        <p class="text-base font-medium text-primary-blue">6 classes</p>
        <chart-doughnut width="400" height="100"></chart-doughnut>
        <button class="bg-state-blue text-light-100 rounded-md p-4 self-end hover:shadow-lg hover:ease-in-out duration-200">Join Now!!</button>
      </div>
    </div>
  </div>
</template>

<script>
import ChartDoughnut from "@/components/chart/Doughnut.vue";

export default {
  components: { ChartDoughnut },
};
</script>

<style></style>
