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

                        <div class="alert alert-success" role="alert" v-if="alertSuccess">{{ alertSuccess }}</div>
                        <div class="alert alert-danger" role="alert" v-if="alertDanger">{{ alertDanger }}</div>

                        <h3 class="mb-5">Daftar Perusahaan</h3>

                        <h6 v-if="dataPerusahaan.length == 0">Belum ada data apapun saat ini :( </h6>

                        <div class="row">
                            <div class="col-lg-4 mb-4" v-for="perusahaan in dataPerusahaan" :key="perusahaan.id">
                                <div class="card">
                                    <h5 class="title">{{ perusahaan.nama_perusahaan }}</h5>
                                    <p class="alamat">{{ perusahaan.alamat }}</p>

                                    <p class="tersedia text-success" v-if="perusahaan.slot_tersedia != 0">{{ perusahaan.slot_tersedia }} Slot Tersedia</p>
                                    <p class="tersedia text-danger" v-if="perusahaan.slot_tersedia == 0">Tidak Ada Slot Tersedia</p>

                                    <router-link v-if="perusahaan.slot_tersedia != 0" :to="`/pendaftaran-magang/dafar/${perusahaan.id}`" class="apply-button bg-primary">Apply</router-link>
                                </div>
                            </div>
                        </div>
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
            dataPerusahaan: '',
            alertSuccess: '',
            alertDanger: '',
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
            axios.get(`magang?token=${this.token}`)
                .then(res => {
                    this.dataPerusahaan = res.data;
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

.card {
    padding: 1rem;
}

.alamat {
    font-size: 12px;
}

.apply-button {
    padding: .5em 1em;
    border-radius: 5px;
    text-align: center;
    color: white;
}

.apply-button:hover {
    text-decoration: none;
}

.title {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
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