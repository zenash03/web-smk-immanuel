<template>
    <div>
        <img :src="url" :alt="me.name" class="student-card">
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: localStorage.getItem('token'),
            me: '',
            url: '@/assets/kartu_pelajar/card_4000.jpg'
        }
    },
    methods: {
        getMe() {
            axios.get(`auth/me?token=${this.token}`)
                .then(res => {
                    this.me = res.data;

                    this.generateUrl();
                })
                .catch(err => {
                    console.log(err.response.data);
                }); 
        },
        generateUrl() {
            let url = `@/assets/kartu_pelajar/card_4000.jpg`;
        }
    },
    created() {
        this.getMe()
    },
}
</script>

<style scoped>



</style>