<template>
    <div class="grid grid-cols-2 gap-y-10">
    <router-link :to="{name : 'event.detail', params: {id: event.id}}" class="max-w-md bg-white rounded-lg border border-gray-200 shadow-md" v-for="event in events" :key="event.id">
    <img class="rounded-t-lg" :src="urlImage + event.image" alt="" />
        <div class="p-5 grid grid-cols-8">
            <div class="grid col-span-2 bg-primary-light-blue place-items-center text-light-100 rounded-lg p-1">
                <p class="text-sm">{{ getMonthFormat(event.start_time) }}</p>
                <p class="text-md">{{ getDayFormat(event.start_time) }}</p>
            </div>
            <div class="grid content-between col-span-6 ml-3">
            <p class="text-base font-bold">{{ event.name }}</p>
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
                        <span class="ml-2 text-dark-50">{{
                            event.start_time.split(" ")[1].substring(0, 5) + " - " + event.end_time.split(" ")[1].substring(0, 5)
                            }}</span>
                    </div>
                <p class="text-sm text-dark-50 justify-self-end">{{ event.participants }} Participants</p>
                </div>
            </div>
        </div>
    </router-link>
    </div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';

export default {
  name : 'EventsBoxs',
  methods: {
    getEventData() {
      const getEvents = async () => {
        try{
          await axios.get(this.URL + 'userEvents').
          then((response) => {
            this.events = response.data['data']
            // console.log(response)
          })
        }
        catch (err) {
          console.log(err);
        }
      }
      getEvents();
    },
    getMonthFormat(date){
      return moment(date).format('MMM')
    },
    getDayFormat(date){
      return moment(date).format('D')
    }
  },
  data : () => ({
    URL: "http://localhost:8000/api/event_organizer/",
    events: [],
    urlImage: "http://localhost:8000/storage/",
  }),
  created() {
      this.getEventData();      
  },
};
</script>

<style>

</style>