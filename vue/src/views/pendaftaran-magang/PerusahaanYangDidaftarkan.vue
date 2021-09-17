<template>
    <div>
        <div class="alert alert-success" role="alert" v-if="alertSuccess">{{ alertSuccess }}</div>
        <div class="alert alert-danger" role="alert" v-if="alertDanger">{{ alertDanger }}</div>

        <h3 class="mb-5">Perusahaan Yang Kamu Daftarkan</h3>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Tanggal Di Daftarkan</th>
                        <th scope="col">kuota</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(d, i) in data" :key="d.id">
                        <th scope="row">{{ i + 1 }}</th>
                        <td>{{ d.nama_perusahaan }}</td>
                        <td>{{ d.tanggal_didaftarkan }}</td>
                        <td>{{ d.kuota }}</td>
                        <td class="d-flex">
                            <router-link :to="`/pendaftaran-magang/edit-perusahaan/${d.id}`" class="form-control btn-primary text-center">Edit</router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: localStorage.getItem('token'),
            data: '',
            alertSuccess: '',
            alertDanger: ''
        }
    },
    methods: {
        getData() {
            axios.get(`magang/my-list?token=${this.token}`)
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

</style>