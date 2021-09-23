<template>
    <div>
        <div class="alert alert-success" role="alert" v-if="alertSuccess">{{ alertSuccess }}</div>
        <div class="alert alert-danger" role="alert" v-if="alertDanger">{{ alertDanger }}</div>

        <h3 class="mb-5">Data Pendaftar</h3>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pendaftar</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Action</th>
                        <th scope="col">Izinkan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(d, i) in data" :key="d.id">
                        <th scope="row">{{ i + 1 }}</th>
                        <td>{{ d.nama }}</td>
                        <td>{{ d.magang.nama_perusahaan }}</td>
                        <td class="d-flex">
                            <button @click="modalData = d, openModal = true" type="button" class="form-control btn-primary mr-1">Detail</button>
                            <button @click="deleteData(d.id)" type="button" class="form-control btn-danger ml-1">Delete</button>
                        </td>
                        <td>
                            <div class="toggle-radio">
                                <input @change="toggle(d.id, 'y')" type="radio" :name="`${d.id}-radio`" :id="`${d.id}-yes`" class="yes" :checked="d.disetujui == 'y'">
                                <input @change="toggle(d.id, 'n')" type="radio" :name="`${d.id}-radio`" :id="`${d.id}-no`" class="no" :checked="d.disetujui == 'n'">

                                <div class="switch">
                                    <label :for="`${d.id}-no`" class="l-no">No</label>
                                    <span></span>
                                    <label :for="`${d.id}-yes`" class="l-yes">Yes</label>
                                </div>
                            </div>
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
                                    <p class="font-weight-bold">{{ modalData.magang.nama_perusahaan }}</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="kuota">Kuota</label>
                                    <p class="font-weight-bold">{{ modalData.magang.kuota }}</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="tersedia">Slot Tersedia</label>
                                    <p :class="['font-weight-bold', modalData.magang.slot_tersedia > 0 ? 'text-success' : 'text-danger' ]">{{ modalData.magang.slot_tersedia }}</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="kota">Kota</label>
                                    <p class="font-weight-bold">{{ modalData.magang.kota }}</p>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="keterangan">Keterangan</label>
                                    <p class="font-weight-bold">{{ modalData.magang.keterangan }}</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="telp">No Telp</label>
                                    <p class="font-weight-bold">{{ modalData.magang.telp }}</p>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="pic">PIC</label>
                                    <p class="font-weight-bold">{{ modalData.magang.pic }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="alamat">Alamat</label>
                            <p class="font-weight-bold">{{ modalData.magang.alamat }}</p>
                        </div>
                    </div>

                    <div class="button-group">
                        <button @click="openModal = false, modalData = ''" type="button" class="form-control btn-primary">Close</button>
                    </div>

                    <p class="info m-0 mt-3">Tempat ini didaftarkan Oleh <b>{{ modalData.magang.creator_name }}</b> pada tanggal {{ modalData.magang.tanggal_didaftarkan }}</p>
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
            alertSuccess: '',
            alertDanger: ''
        }
    },
    methods: {
        getData() {
            axios.get(`admin/pendaftaran?token=${this.token}`)
                .then(res => {
                    this.data = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);

                    if (err.response.status == 401) this.$router.push('/');
                }); 
        },
        deleteData(id) {
            axios.delete(`admin/pendaftaran/${id}?token=${this.token}`)
                .then(res => {
                    console.log(res.data)
                    this.alertSuccess = res.data.message;

                    this.getData();
                })
                .catch(err => {
                    this.alertDanger = err.response.data.message;
                }); 
        },
        toggle(id, state) {
            axios.put(`admin/pendaftaran/${id}?token=${this.token}`, {state: state})
                .then(res => {
                    this.getData();
                })
                .catch(err => {
                    console.log(err.response.data);

                    if (err.response.status == 401) this.$router.push('/');
                })
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