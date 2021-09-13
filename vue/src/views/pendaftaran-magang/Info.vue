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
                        <h3 class="mb-5">Halo, <b>{{ me.name }}</b>!</h3>

                        <h6 v-if="!data">Kamu Belum Mendaftar Magang 😑</h6>

                        <div class="row">
                            <div class="col-lg-8" v-if="data != ''">
                                <p>Kamu Mendaftar magang di, <b class="text-success">{{ data.magang.nama_perusahaan }}</b></p>
                            </div>

                            <div class="col-lg-8" v-if="data">
                                <p v-if="data.disetujui == 'y'">Status Dizinkan, <b class="text-success">Disetujui 😊</b></p>
                                <p v-if="data.disetujui == 'n'">Status Dizinkan, <b class="text-danger">Tidak Di Setujui 😥</b></p>
                                <p v-if="!data.disetujui">Status Dizinkan, <b class="text-danger">Menunggu Persetujuan 😱</b></p>
                            </div>
                        </div>

                        <p class="info m-0 mt-3" v-if="data.disetujui == 'y'">Telah disetujui oleh <b>{{ data.creator_name }}</b> pada tanggal {{ data.date_created }}</p>
                    </div>
                </div>

                <Footer></Footer>
            </main>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import Sidebar from '@/components/pendaftaran-magang/Sidebar.vue'
import Footer from '@/components/pendaftaran-magang/Footer.vue'

export default {
    components: {
        Sidebar,
        Footer
    },
    data() {
        return {
            token: localStorage.getItem('token'),
            me: '',
            data: ''
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
        },
        getData() {
            axios.get(`pendaftaran/1?token=${this.token}`)
                .then(res => {
                    this.data = res.data;
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

        this.getData();
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

.profile {
    margin: 0;
    padding: 10px;
    transition: .5s;
    cursor: pointer;
    border-radius: 5px;
}

.profile:hover {
    background-color: #f5f7fd;
}

.profile span {
    font-weight: 700;
}

.header {
    width: 100%;
    height: 70px;
    background-color: white;
}

.header .container-fluid {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    height: 100%;
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

.info {
    font-style: italic;
    font-size: 14px;
}

@media screen and (max-width: 768px) {
    .content {
        padding: 2rem !important;
    }

    .content .container {
        padding: 2rem !important;
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
}

</style>