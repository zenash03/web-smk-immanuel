<template>
    <div>
        <h3 class="mb-5">Pendaftaran Kamu</h3>

        <h6 v-if="!data[0]" class="belum-daftar">Kamu Belum Mendaftar Magang 😑</h6>

        <div class="row p-0 pb-2 box mb-4" v-for="d in data" :key="d.id">
            <header>
                <p v-if="!d.didaftarkan_oleh">Kamu Mendaftar magang di, <router-link :to="`/pendaftaran-magang/daftar/${d.id}`" class="font-weight-bold text-success">{{ d.magang.nama_perusahaan }}</router-link></p>
                <p v-if="d.didaftarkan_oleh">Kamu Didaftarkan oleh <b>{{ d.didaftarkan_oleh }}</b> di, <router-link :to="`/pendaftaran-magang/daftar/${d.id}`" class="font-weight-bold text-success">{{ d.magang.nama_perusahaan }}</router-link></p>
            </header>

            <main>
                <p v-if="d.disetujui == 'y'">Status Dizinkan, <b class="text-success">Disetujui 🥳</b></p>
                <p v-if="d.disetujui == 'n'">Status Dizinkan, <b class="text-danger">Tidak Di Setujui 😢</b></p>
                <p v-if="!d.disetujui">Status Dizinkan, <b class="text-info">Menunggu Persetujuan 😱</b></p>
            </main>

            <p class="info m-0 mt-3" v-if="d.disetujui == 'y'">Telah disetujui oleh <b>{{ d.penyetuju.name }}</b> pada tanggal {{ d.tanggal_disetujui }}</p>
            <p class="info m-0 mt-3" v-if="d.disetujui == 'n'"><b>{{ d.penyetuju.name }}</b> tidak menyetujui tempat magang anda :(((</p>
        </div>

    </div>
</template>

<script>
import axios from 'axios'

export default {
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

                    if (err.response.status == 401) this.$router.push('/login');
                }); 
        },
        getData() {
            axios.get(`pendaftaran/1?token=${this.token}`)
                .then(res => {
                    this.data = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);

                    if (err.response.status == 401) this.$router.push('/login');
                }); 
        }
    },
    created() {
        this.getData();
        this.getMe();
    },
}
</script>

<style scoped>

.info {
    font-style: italic;
    font-size: 14px;
}

.box {
    border: 1px solid rgba(0, 0, 0, .05);
    padding: 1rem 0;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .05);
    overflow: hidden;
}

.box header {
    background-color: #eeeff8;
    padding: 1rem;
    display: flex;
    align-items: center;
}

.box header p, .box main p {
    margin: 0;
}

.box main {
    padding: 1rem;
}

@media screen and (max-width: 768px) {
    .content {
        padding: 2rem !important;
    }

    .content .container {
        padding: 2rem !important;
    }
}

@media screen and (max-width: 500px) {
    header p {
        font-size: 14px;
    }

    .info {
        font-size: 12px;
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

    .belum-daftar {
        font-size: .75rem;
    }
}

</style>