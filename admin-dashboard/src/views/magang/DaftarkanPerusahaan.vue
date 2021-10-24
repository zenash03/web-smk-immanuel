<template>
    <div>
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
                        <label for="kuota">Kuota</label>
                        <input type="number" class="form-control" id="kuota" v-model="formData.kuota" min="1" max="4" placeholder="Max 4">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" v-model="formData.alamat">
                    </div>

                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" id="kota" v-model="formData.kota">
                    </div>

                    <div class="form-group">
                        <label for="telp">No Telp Perusahaan</label>
                        <input type="tel" class="form-control" id="telp" v-model="formData.telp">
                    </div>

                    <div class="form-group">
                        <label for="pic">No Telp PIC (Person in Charge)</label>
                        <input type="tel" class="form-control" id="pic" v-model="formData.pic" placeholder="">
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
                    <div class="form-group" v-for="(i, x) in parseInt(formData.kuota) || 0" :key="i">
                        <label for="">Pilih Siswa {{ i }}</label>
                        <select class="form-select" v-model="formData.pendaftar[x]">
                            <option :value="siswa.username" v-for="siswa in siswas" :key="siswa.username">{{ siswa.name }} - {{ siswa.username }}</option>
                        </select>
                    </div>

                    <button type="submit" class="mobile form-control btn-primary mt-5">Submit</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            token: localStorage.getItem('token'),
            siswas: '',
            formData: {
                nama_perusahaan: '',
                kuota: '',
                alamat: '',
                kota: '',
                telp: '',
                pic: '',
                keterangan: '',
                pendaftar: []
            },
            alertSuccess: '',
            alertDanger: ''
        }
    },
    watch : {
        'formData.telp'(value) {
            this.formData.telp = value.replace(/[^\d]/g, '');
        },
        'formData.pic'(value) {
            this.formData.pic = value.replace(/[^\d]/g, '');
        },
        'formData.kuota'(value) {
            if (value >= 4) this.formData.kuota = 4;
            if (value < 0) this.formData.kuota = 1;
        }
    },
    methods: {
        getSiswa() {
            axios.get(`auth/siswa?token=${this.token}`)
                .then(res => {
                    this.siswas = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);

                    if (err.response.status == 401) this.$router.push('/');
                }); 
        },
        submitData() {
            const buttonDesktop = document.querySelector('.desktop');
            const buttonMobile = document.querySelector('.mobile');

            buttonDesktop.disabled = true;
            buttonMobile.disabled = true;

            buttonDesktop.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`;
            buttonMobile.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`;

            this.formData.pendaftar = this.formData.pendaftar.slice(0, this.formData.kuota);

            axios.post(`admin/magang?token=${this.token}`, this.formData)
                .then(res => {
                    this.alertSuccess = res.data.message;
                    
                    setTimeout(() => {
                        this.$router.push('/magang/pendaftar');
                    }, 400);
                })
                .catch(err => {
                    scrollTo(0, 0);

                    buttonDesktop.disabled = false;
                    buttonMobile.disabled = false;

                    buttonDesktop.innerHTML = `Submit`;
                    buttonMobile.innerHTML = `Submit`;

                    this.alertDanger = err.response.data.message;

                    if (err.response.status == 401) this.$router.push('/');
                });
        }
    },
    created() {
        this.getSiswa();
    },
}
</script>

<style scoped>

button[type=submit]:disabled {
    background-color: lightgray;
    border-color: lightgray;
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