<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <img :src="url" alt="Kartu Pelajar" class="student-card">
                <button type="button" class="btn btn-primary form-control mt-2" @click="downloadColor">Download</button>
            </div>

            <div class="col-lg-6">
                <img :src="url" alt="Kartu Pelajar" class="student-card card-gray">
                <button type="button" class="btn btn-primary form-control mt-2" @click="downloadGrayscale">Download</button>
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
            me: '',
            baseUrl: 'http://localhost:8000/',
            url: ''
        }
    },
    methods: {
        getMe() {
            axios.get(`auth/me?token=${this.token}`)
                .then(res => {
                    this.me = res.data;

                    this.generateUrl();
                })
                .catch(err => {
                    console.log(err.response.data.message);
                }); 
        },
        generateUrl() {
            let url = `${this.baseUrl}kartu_pelajar/card_${this.me.username}.jpg`;

            this.url = url;

            this.draw();
        },
        downloadColor() {
            window.open(`${this.API_URL}card/color?token=${this.token}`);
        },
        downloadGrayscale() {
            window.open(`${this.API_URL}card/grayscale?token=${this.token}`);
        }
    },
    created() {
        this.getMe();
    },
}
</script>

<style scoped>

.student-card {
    object-fit: contain;
}

.card-gray {
    filter: grayscale();
}

.col-lg-6 {
    height: fit-content;
}

@media only screen and (max-width: 991px) {
    .col-lg-6 {
        height: fit-content;
        width: 100%;
        flex: 0 0 100%;
    }

    .col-lg-6:first-child {
        margin-bottom: 2rem;
    }

	.container {
		max-width: 100% !important;
		width: 90% !important;
		margin: auto;
	}
}

</style>