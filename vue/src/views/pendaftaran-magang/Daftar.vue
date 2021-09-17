<template>
    <div>
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
                        <p class="font-weight-bold">{{ data.keterangan || '-' }}</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="telp">No Telp Perusahaan</label>
                        <p class="font-weight-bold">{{ data.telp }}</p>
                    </div>

                    <div class="form-group mb-4">
                        <label for="pic">No Telp PIC (Person in Charge)</label>
                        <p class="font-weight-bold">{{ data.pic }}</p>
                    </div>

                    <div class="form-group mb-4">
                        <label for="alamat">Alamat</label>
                        <p class="font-weight-bold">{{ data.alamat }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">&nbsp;</label>

                    <template v-if="statusDaftar == undefined || statusDaftar.disetujui == 'n'">
                        <button @click="openModal = true" v-if="data.slot_tersedia != 0" type="button" class="form-control btn-primary">Daftar</button>
                    </template>
                </div>
            </div>

            <p class="info m-0">Didaftarkan Oleh <b>{{ data.creator_name }}</b> pada tanggal {{ data.tanggal_didaftarkan }}</p>

            <transition name="fade">
                <div class="daftar-modal" v-if="openModal">
                    <div class="modal-inner">
                        <h6 class="mb-4">Apakah Kamu yakin untuk mendaftar di <b>{{ data.nama_perusahaan }}?</b></h6>
                        
                        <p class="text-danger modal-info">Setelah menekan yakin, anda tidak dapat membatalkan pendaftaran anda</p>
                        <div class="button-group">
                            <button type="submit" class="form-control btn-primary">Yakin Dong 😎</button>
                            <button @click="openModal = false" type="button" class="form-control btn-danger">Engga Yakin 😖</button>
                        </div>
                    </div>
                </div>
            </transition>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
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
            statusDaftar: '',
            openModal: false
        }
    },
    methods: {
        getMe() {
            axios.get(`auth/me?token=${this.token}`)
                .then(res => {
                    this.formData.pendaftar = res.data.username;
                })
                .catch(err => {
                    console.log(err.response.data);
                }); 
        },
        getStatus() {
            axios.get(`pendaftaran/1?token=${this.token}`)
                .then(res => {
                    this.statusDaftar = res.data[0];
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
            axios.post(`pendaftaran?id=${this.id}&token=${this.token}`, this.formData)
                .then(res => {
                    scrollTo(0, 0);
                    
                    this.alertSuccess = res.data.message;
                    this.openModal = false;

                    this.getData();
                    this.getStatus();
                })
                .catch(err => {
                    scrollTo(0, 0);

                    this.alertSuccess = '';
                    this.openModal = false;
                    this.alertDanger = err.response.data.message;
                }); 
        }
    },
    created() {
        this.getMe();
        this.getSiswa();
        this.getStatus();
        this.getData();
    },
}
</script>

<style scoped>

button[type=button]:disabled {
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

    .col-lg-6 {
        width: 100%;
        flex: 0 0 100%;
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

    .font-weight-bold {
        font-size: .8rem;
    }

    .info {
        font-size: 10px;
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