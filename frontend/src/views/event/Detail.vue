<template>
  <div class="px-16 py-16">
    <p class="text-xl mb-5">Event Detail</p>
    <img class="w-full h-96 object-cover rounded-lg" :src="urlImage + event.image" alt="" />
    <div class="grid grid-cols-6 mt-5 gap-x-8">
      <div class="grid gap-y-2 col-span-4 grid-flow-row grid-rows-4">
        <p class="text-lg font-extrabold text-primary-blue">{{ event.name }}</p>
        <div class="grid grid-flow-col auto-cols-max items-center">
          <img class="w-12 h-12 border-2 rounded-full object-contain" alt="" :src="urlImage + event.image" />
          <div class="grid ml-4">
            <p class="text-md font-medium">{{ event.user }}</p>
            <p class="text-sm text-dark-50">15 January 2022, 4:00 - 15:00</p>
          </div>
        </div>
        <div class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md row-span-2">
          <p class="font-normal max-h-44 text-ellipsis overflow-auto">
            {{ event.description }}
          </p>
        </div>
      </div>
      <div class="col-span-2 grid grid-flow-row auto-rows-max gap-y-3">
        <p class="text-lg font-extrabold text-primary-blue">Participants From</p>
        <p class="text-base font-medium text-primary-blue">6 classes</p>
        <chart-doughnut class="w-48"></chart-doughnut>
        <button class="bg-state-blue text-light-100 rounded-md p-4 self-end hover:shadow-lg hover:ease-in-out duration-200">Join Now!!</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import ChartDoughnut from "@/components/chart/Doughnut.vue";

export default {
  name : 'Detail',
  components: { ChartDoughnut },
  methods: {
    getEventData() {
      const getEvents = async () => {
        try{
          await axios.get(this.URL + `events/${this.$route.params.id}`).
          then((response) => {
            // this.events = response.data['data']
            // console.log(response.data.data)
            this.fetchData(response.data.data)
          })
        }
        catch (err) {
          console.log(err);
        }
      }
      getEvents();
    },
    fetchData(data){
      const date = new Date(data.start_time)
      console.log(date) 
      const obj = {
        'id':  data.id,
        'name': data.name,
        'image': data.image,
        'description': data.description,
        'start_time': data.start_time,
        'end_time': data.end_time,
        'participants' : data.participants,
        'user' : data.user.name,
      }
      this.event = obj
    }
  },
  data : () => ({
    URL: `http://localhost:8000/api/event_organizer/`,
    event : {},
    months: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
    urlImage: "http://localhost:8000/storage/",
  }),
  created() {
      this.getEventData();    
      this.fetchData()  
  },
};
</script>

<style></style>
