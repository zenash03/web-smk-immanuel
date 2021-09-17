<template>
    <div>
        <div class="alert alert-success" role="alert" v-if="alertSuccess">{{ alertSuccess }}</div>
        <div class="alert alert-danger" role="alert" v-if="alertDanger">{{ alertDanger }}</div>

        <h3 class="mb-5">Daftar Perusahaan</h3>

        <h6 v-if="dataPerusahaan.length == 0" class="tidak-ada">Belum ada data apapun saat ini :( </h6>

        <div class="row">
            <div class="col-lg-4 mb-4" v-for="perusahaan in dataPerusahaan" :key="perusahaan.id">
                <div class="card">
                    <h5 class="title">{{ perusahaan.nama_perusahaan }}</h5>
                    <p class="alamat">{{ perusahaan.alamat }}</p>

                    <p class="tersedia text-success" v-if="perusahaan.slot_tersedia != 0">{{ perusahaan.slot_tersedia }} Slot Tersedia</p>
                    <p class="tersedia text-danger" v-if="perusahaan.slot_tersedia == 0">Tidak Ada Slot Tersedia</p>

                    <template v-if="statusDaftar">
                        <router-link v-if="perusahaan.slot_tersedia != 0 && (!statusDaftar || statusDaftar.disetujui == 'n')" :to="`/pendaftaran-magang/daftar/${perusahaan.id}`" class="apply-button bg-primary">Apply</router-link>
                        <router-link v-else-if="perusahaan.slot_tersedia <= 0 || statusDaftar.disetujui == 'y' || statusDaftar.disetujui == null" :to="`/pendaftaran-magang/daftar/${perusahaan.id}`" class="apply-button bg-primary">Lihat</router-link>
                    </template>

                    <template v-else>
                        <router-link v-if="perusahaan.slot_tersedia != 0 && (!statusDaftar || statusDaftar.disetujui == 'n')" :to="`/pendaftaran-magang/daftar/${perusahaan.id}`" class="apply-button bg-primary">Apply</router-link>
                        <router-link v-else-if="perusahaan.slot_tersedia <= 0" :to="`/pendaftaran-magang/daftar/${perusahaan.id}`" class="apply-button bg-primary">Lihat</router-link>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: localStorage.getItem('token'),
            dataPerusahaan: '',
            alertSuccess: '',
            alertDanger: '',
            statusDaftar: ''
        }
    },
    methods: {
        getData() {
            axios.get(`magang?token=${this.token}`)
                .then(res => {
                    this.dataPerusahaan = res.data;
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
        }
    },
    created() {
        this.getData();
        this.getStatus();
    },
}
</script>

<style scoped>

.card {
    padding: 1rem;
}

.alamat {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
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
    color: inherit;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.tersedia {
    font-size: 13px;
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

    .tidak-ada {
        font-size: .75rem;
    }
}

</style>