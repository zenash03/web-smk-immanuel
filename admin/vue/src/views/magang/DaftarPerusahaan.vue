<template>
    <div>
        <div class="alert alert-success" v-if="alertMsg">{{ alertMsg }}</div>

        <h3 class="mb-5">List Perusahaan</h3>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Didaftarkan Oleh</th>
                        <th scope="col">Tanggal Di daftarkan</th>
                        <th scope="col">Slot Tersedia</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(d, i) in data" :key="d.id">
                        <th scope="row">{{ i + 1 }}</th>
                        <td>{{ d.nama_perusahaan }}</td>
                        <td>{{ d.creator_name }}</td>
                        <td>{{ d.tanggal_didaftarkan }}</td>
                        <td>{{ d.slot_tersedia }}</td>
                        <td>
                            <router-link :to="`/magang/daftar-perusahaan/${d.id}`" class="form-control btn-warning text-center text-decoration-none mb-1">Edit</router-link>
                            <button @click="modalData = d, openModal = true" type="button" class="form-control btn-primary">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <transition name="fade">
            <div class="info-modal" v-if="openModal">
                <div class="modal-inner">
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="nama_perusahaan">Nama Perusahaan</label>
                                    <p class="font-weight-bold">{{ modalData.nama_perusahaan }}</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="kuota">Kuota</label>
                                    <p class="font-weight-bold">{{ modalData.kuota }}</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="tersedia">Slot Tersedia</label>
                                    <p :class="['font-weight-bold', modalData.slot_tersedia > 0 ? 'text-success' : 'text-danger' ]">{{ modalData.slot_tersedia }}</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="kota">Kota</label>
                                    <p class="font-weight-bold">{{ modalData.kota || '-' }}</p>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="keterangan">Keterangan</label>
                                    <p class="font-weight-bold">{{ modalData.keterangan }}</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="telp">No Telp</label>
                                    <p class="font-weight-bold">{{ modalData.telp }}</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="pic">PIC</label>
                                    <p class="font-weight-bold">{{ modalData.pic }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="alamat">Alamat</label>
                            <p class="font-weight-bold">{{ modalData.alamat }}</p>
                        </div>
                    </div>

                    <div class="button-group">
                        <button @click="deleteData(modalData.id)" type="button" class="form-control btn-danger">Delete</button>
                        <button @click="openModal = false, modalData = ''" type="button" class="form-control btn-primary">Close</button>
                    </div>

                    <p class="info m-0 mt-3">Tempat ini didaftarkan Oleh <b>{{ modalData.creator_name }}</b> pada tanggal {{ modalData.tanggal_didaftarkan }}</p>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: localStorage.getItem('token'),
            data: '',
            openModal: false,
            modalData: '',
            alertMsg: ''
        }
    },
    methods: {
        getData() {
            axios.get(`admin/magang?token=${this.token}`)
                .then(res => {
                    this.data = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);

                    if (err.response.status == 401) this.$router.push('/');
                }); 
        },
        deleteData(id) {
            axios.delete(`admin/magang/${id}?token=${this.token}`)
                .then(res => {
                    this.alertMsg = res.data.message;

                    this.openModal = false;
                    this.modalData = true;
                    this.getData();
                })
                .catch(err => {
                    console.log(err.response.data);

                    if (err.response.status == 401) this.$router.push('/');
                }); 
        }
    },
    created() {
        this.getData();
    },
}
</script>

<style scoped>

.table-container {
    width: 100%;
    overflow-x: auto;
}

.info {
    font-style: italic;
    font-size: 14px;
}

.info-modal {
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
    max-width: 85%;
    max-height: 95%;
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

@media only screen and (max-width: 768px) {
    table {
        min-width: 750px;
    }
}

/* Toggle Style  */

.switch {
    min-width: 120px;
    width: 100%;
    height: 30px;
    text-align: center;
    background: lightgray;
    transition: all 0.2s ease;
    border-radius: 25px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 0 .5rem;
}

.switch span {
    width: 20px;
    height: 4px;
    background: #fff;
    display: block;
    transform: rotate(-45deg);
    transition: all 0.2s ease;
}

.switch span:after {
    content: "";
    display: block;
    position: absolute;
    width: 4px;
    height: 12px;
    margin-top: -8px;
    background: #fff;
    transition: all 0.2s ease;
}

input[type=radio] {
    display: none;
}

.switch label {
    cursor: pointer;
    color: rgba(0,0,0,0.2);
    margin: 0;
    transition: all 0.2s ease;
}

.yes:checked ~ .switch {
    background: #00bc9c;
}

.no:checked ~ .switch {
    background: #eb4f37;
}

.no:checked ~ .switch span {
    background: #fff;
    margin-left: -8px;
}

.no:checked ~ .switch span:after {
    background: #fff;
    height: 20px;
    margin-top: -8px;
    margin-left: 8px;
}

.yes:checked ~ .switch .l-yes {
    color: #fff;
}

.no:checked ~ .switch label.l-no {
    color: #fff;
}

</style>