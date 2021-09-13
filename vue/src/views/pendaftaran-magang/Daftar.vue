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

                        <h3 class="mb-5">Daftarkan Dirimu</h3>

                        <form @submit.prevent="daftar">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="nama_perusahaan">Nama Perusahaan</label>
                                        <p class="font-weight-bold">{{ data.nama_perusahaan }}</p>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="tersedia">Slot Tersedia</label>
                                        <p :class="['font-weight-bold', data.slot_tersedia > 0 ? 'text-success' : 'text-danger' ]">{{ data.slot_tersedia }}</p>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="keterangan">Keterangan</label>
                                        <p class="font-weight-bold">{{ data.keterangan }}</p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <label for="telp">No Telp</label>
                                        <p class="font-weight-bold">{{ data.telp }}</p>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="pic">PIC</label>
                                        <p class="font-weight-bold">{{ data.pic }}</p>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="alamat">Alamat</label>
                                        <p class="font-weight-bold">{{ data.alamat }}</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">&nbsp;</label>
                                    <button v-if="data.slot_tersedia == 0" type="button" class="form-control btn-primary" disabled>Daftar</button>
                                    <button @click="openModal = true" v-if="data.slot_tersedia != 0" type="button" class="form-control btn-primary">Daftar</button>
                                </div>

                                <transition name="fade">
                                    <div class="daftar-modal" v-if="openModal">
                                        <div class="modal-inner">
                                            <h6 class="mb-4">Apakah Kamu yakin untuk mendaftar di <b>{{ data.nama_perusahaan }}?</b></h6>
                                            
                                            <p class="text-danger modal-info">Setelah menekan yakin, anda tidak dapat menbatalkan pendaftaran anda</p>
                                            <div class="button-group">
                                                <button type="submit" class="form-control btn-primary">Yakin Dong 😎</button>
                                                <button @click="openModal = false" type="button" class="form-control btn-danger">Engga Yakin 😖</button>
                                            </div>
                                        </div>
                                    </div>
                                </transition>
                            </div>

                            <p class="info m-0">Tempat ini didaftarkan Oleh <b>{{ data.creator_name }}</b> pada tanggal {{ data.tanggal_didaftarkan }}</p>
                        </form>
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
            id: this.$route.params.id,
            token: localStorage.getItem('token'),
            me: '',
            siswas: '',
            data: '',
            formData: {
                pendaftar: ''
            },
            alertSuccess: '',
            alertDanger: '',
            openModal: false
        }
    },
    methods: {
        getMe() {
            axios.get(`auth/me?token=${this.token}`)
                .then(res => {
                    this.me = res.data;

                    this.formData.pendaftar = res.data.username;
                })
                .catch(err => {
                    console.log(err.response.data);
                }); 
        },
        getSiswa() {
            axios.get(`auth/siswa?token=${this.token}`)
                .then(res => {
                    this.siswas = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                }); 
        },
        getData() {
            axios.get(`magang/${this.id}?token=${this.token}`)
                .then(res => {
                    this.data = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                }); 
        },
        daftar() {
            axios.put(`magang/${this.id}?token=${this.token}`, this.formData)
                .then(res => {
                    this.alertSuccess = res.data.message;
                    this.openModal = false;

                    this.getData();
                })
                .catch(err => {
                    this.alertSuccess = '';
                    this.openModal = false;
                    this.alertDanger = err.response.data.message;
                }); 
        }
    },
    created() {
        if (!this.token) {
            this.$router.push('/login');

            return;
        }

        this.getSiswa();
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

button[type=submit]:disabled {
    background-color: lightgray;
    border-color: lightgray;
}

.info {
    font-style: italic;
    font-size: 14px;
}

.mobile {
    display: none;
}

.desktop {
    display: block;
}

.daftar-modal {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 100vw;
    z-index: 10000;
    background-color: rgba(0, 0, 0, .6);
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-inner {
    background-color: white;
    padding: 2rem;
    border-radius: 10px;
}

.modal-inner .button-group {
    display: flex;
    justify-content: space-between;
}

.modal-inner .button-group button {
    width: 45%;
}

.modal-inner .modal-info {
    font-size: 12px;
    font-style: italic;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
}

@media screen and (max-width: 991px) {
    .desktop {
        display: none;
    }

    .mobile {
        display: block;
    }
}

@media screen and (max-width: 768px) {
    .desktop {
        display: none;
    }

    .mobile {
        display: block;
    }

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

    .modal-inner .button-group button {
        width: 48%;
        font-size: 14px;
    }
}

</style>