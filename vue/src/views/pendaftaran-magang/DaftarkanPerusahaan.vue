<template>
    <div class="app">
        <div class="d-flex" style="width: 100%;">
            <Sidebar></Sidebar>

            <main>
                <header class="header">
                    <div class="container-fluid">
                        <!-- <button type="button" class="button-menu" @click="toggleMenu">☰</button> -->

                        <p class="profile">Hi, <span>{{ me.name }}</span></p>
                    </div>
                </header>

                <div class="content p-5">
                    <div class="container p-5">

                        <div class="alert alert-success" role="alert" v-if="alertSuccess">{{ alertSuccess }}</div>
                        <div class="alert alert-danger" role="alert" v-if="alertDanger">{{ alertDanger }}</div>

                        <h3 class="mb-5">Daftarkan Perusahaan</h3>

                        <form @submit.prevent="submitData">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama_perusahaan">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="nama_perusahaan" v-model="formData.nama_perusahaan">
                                    </div>

                                    <div class="form-group">
                                        <label for="kouta">Kuota</label>
                                        <input type="number" class="form-control" id="kouta" placeholder="Max 4" v-model="formData.kouta">
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" v-model="formData.alamat">
                                    </div>

                                    <div class="form-group">
                                        <label for="telp">No Telp</label>
                                        <input type="text" class="form-control" id="telp" v-model="formData.telp">
                                    </div>

                                    <div class="form-group">
                                        <label for="pic">PIC</label>
                                        <input type="text" class="form-control" id="pic" v-model="formData.pic">
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea id="keterangan" class="form-control" v-model="formData.keterangan"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">&nbsp;</label>
                                        <button type="submit" class="desktop form-control btn-primary">Submit</button>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group" v-for="i in parseInt(formData.kouta) || 0" :key="i">
                                        <label for="">Pilih Siswa {{ i }}</label>
                                        <select class="form-select" v-model="formData.pendaftar[i]">
                                            <option :value="siswa.username" v-for="siswa in siswas" :key="siswa.username">{{ siswa.name }}</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="mobile form-control btn-primary mt-5">Submit</button>
                                </div>
                            </div>
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
            token: localStorage.getItem('token'),
            me: '',
            siswas: '',
            formData: {
                nama_perusahaan: '',
                kouta: '',
                alamat: '',
                telp: '',
                pic: '',
                keterangan: '',
                pendaftar: {

                }
            },
            alertSuccess: '',
            alertDanger: ''
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
        getSiswa() {
            axios.get(`auth/siswa?token=${this.token}`)
                .then(res => {
                    this.siswas = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                }); 
        },
        submitData() {
            axios.post(`magang?token=${this.token}`, this.formData)
                .then(res => {
                    this.alertSuccess = res.data.message;

                    this.$router.push('/pendaftaran-magang/dafar-perusahaan');
                })
                .catch(err => {
                    this.alertDanger = err.response.data.message;
                });
        }
    },
    created() {
        if (!this.token) {
            this.$router.push('/login');

            return;
        }

        this.getMe();
        this.getSiswa();
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

.mobile {
    display: none;
}

.desktop {
    display: block;
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
}

</style>