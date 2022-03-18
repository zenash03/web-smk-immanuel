<template>
  <div class="px-16 py-16">
    <div class="p-16">
      <p class="text-xl mb-5">Event</p>
        <EventBoxs />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import EventBoxs from '@/components/EventBoxs.vue';

export default {
  name : 'List',
  components: { EventBoxs },
};
</script>

<style></style>
