<template>
    <div class="app">
        <div class="d-flex" style="width: 100%;">
            <Sidebar></Sidebar>

            <main>
                <Header></Header>

                <div class="content p-5">
                    <div class="container p-5">
                        <router-view/>
                    </div>
                </div>

                <Footer></Footer>
            </main>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import Header from '@/components/Header.vue'
import Sidebar from '@/components/Sidebar.vue'
import Footer from '@/components/Footer.vue'

export default {
    components: {
        Sidebar,
        Header,
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
            axios.get(`auth/admin/me?token=${this.token}`)
                .then(res => {
                    this.me = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);

                    if (err.response.status == 401) this.$router.push('/');
                }); 
        }
    },
    created() {
        this.getMe();
    },
}
</script>

<style scoped>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

.app {
	font-family: 'Poppins', sans-serif;
    height: 100%;
    background-color: #eef0f8;
}

main {
    min-height: 100vh;
    width: 100%;
    display: flex;
    flex-direction: column;
}

.content {
    flex: 1 0 auto;
}

img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.content .container {
    background-color: white;
    box-shadow: 0px 0px 28px 0px rgb(82 63 105 / 8%);
    border-radius: 10px;
}

@media screen and (max-width: 768px) {
    .content {
        padding: 2rem !important;
    }

    .content .container {
        padding: 2rem !important;
    }

    .info-title {
        font-size: 1rem;
    }
}

@media screen and (max-width: 375px) {
    .content {
        padding: 1rem !important;
    }

    .content .container {
        padding: 2rem 1.5rem !important;
    }

    h4 {
        font-size: 1.25rem !important;
    }

    h3 {
        font-size: 1.4rem !important;
        margin-bottom: 1.5rem !important;
    }

    .info-title {
        font-size: .8rem !important;
    }
}

</style>