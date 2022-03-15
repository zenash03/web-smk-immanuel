<template>
  <div class="bg-light-75">
    <div class="w-full min-h-screen text-dark-100 flex">
      <Sidebar></Sidebar>

      <main class="flex-1 flex flex-col">
        <Header></Header>

        <router-view></router-view>

        <Footer></Footer>
      </main>
    </div>
  </div>
</template>

<script>
import Sidebar from "../components/Sidebar.vue";
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";

export default {
  components: { Sidebar, Header, Footer },
};
</script>

<style></style>
