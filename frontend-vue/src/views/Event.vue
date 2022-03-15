<template>
    <div class="bg-light-75">
        <div class="w-full min-h-screen text-dark-100 flex">
            <Sidebar></Sidebar>

            <main class="flex-1 flex flex-col">
                <Header></Header>

                <div class="px-16 py-16">
                    <div class="px-8 py-8 text-dark-50 bg-white rounded-lg">
                        <p class="text-h7 font-h7">Welcome, <span class="font-bold">Jeki Gates</span></p>
                    </div>
                </div>

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
    name: "Event",
};
</script>

<style></style>
