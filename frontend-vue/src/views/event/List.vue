<template>
  <div class="px-16 py-16">
    <div class="p-16">
      <p class="text-xl mb-5">Event</p>
      <div class="grid grid-cols-2 gap-y-10">
        <router-link to="/dashboard/event/detail" class="max-w-md bg-white rounded-lg border border-gray-200 shadow-md">
          <img class="rounded-t-lg" src="@/assets/img/web.png" alt="" />
          <div class="p-5 grid grid-cols-8">
            <div class="grid col-span-2 bg-primary-light-blue place-items-center text-light-100 rounded-lg p-1">
              <p class="text-sm">Jan</p>
              <p class="text-md">08</p>
            </div>
            <div class="grid content-between col-span-6 ml-3">
              <p class="text-base font-bold">Coding With Erick Chandra</p>
              <div class="grid grid-flow-col items-center text-sm">
                <div class="grid grid-flow-col auto-cols-max items-center">
                  <svg
                    class="h-4 w-4 text-dark-50"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <circle cx="12" cy="12" r="9" />
                    <polyline points="12 7 12 12 15 15" />
                  </svg>
                  <span class="ml-2 text-dark-50">14:00 - 15:00</span>
                </div>
                <p class="text-sm text-dark-50 justify-self-end">30 Participants</p>
              </div>
            </div>
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style></style>
