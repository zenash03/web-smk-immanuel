<template>
    <div class="app">
        <div class="d-flex" style="width: 100%;">
            <Sidebar></Sidebar>

            <main>
                <header class="header">
                    <div class="container-fluid">
                        <p class="profile">Hi, <span>{{ me.name }}</span></p>
                    </div>
                </header>

                <div class="content p-5">
                    <div class="container p-5">
                        <h4 class="m-0">Welcome, <b>{{ me.name }}</b></h4>
                    </div>
                </div>

                <Footer></Footer>
            </main>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import Sidebar from '@/components/Sidebar.vue'
import Footer from '@/components/Footer.vue'

export default {
    components: {
        Sidebar,
        Footer
    },
    data() {
        return {
            token: localStorage.getItem('token'),
            me: ''
        }
    },
    methods: {
        getMe() {
            axios.get(`auth/me?token=${this.token}`)
                .then(res => {
                    this.me = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                }); 
        }
    },
    created() {
        if (!this.token) {
            this.$router.push('/login');

            return;
        }

        this.getMe();
    },
}
</script>

<style scoped>




</style>