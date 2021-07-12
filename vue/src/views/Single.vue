<template>
    <div>
        <div id="transition"></div>

        <div>
            <svg class="main-wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,128L40,149.3C80,171,160,213,240,208C320,203,400,149,480,117.3C560,85,640,75,720,90.7C800,107,880,149,960,165.3C1040,181,1120,171,1200,170.7C1280,171,1360,181,1400,186.7L1440,192L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
            <nav>
                <div class="container d-flex justify-content-between">
                    <ul class="nav-links">
                        <li><router-link to="/">Kembali ke Home</router-link></li>
                    </ul>
                </div>
            </nav>
        </div>

        <main class="mb-5">
            <div class="container pt-5">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="thumbnail mb-5">
                            <h2 class="title">{{ data.title }}</h2>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="tag">{{ data.tag }}</div>

                                <div class="details">
                                    <div class="author">
                                        <i class="far fa-user"></i>
                                        <p>{{ data.author }}</p>
                                    </div>

                                    <div class="date">
                                        <i class="far fa-clock"></i>
                                        <p>{{ data.date }}</p>
                                    </div>
                                </div>
                            </div>

                            <img :src="data.image_url" alt="">

                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-lg-4"></div>

                            <div class="col-lg-8">
                                <article>
                                    <p class="content">{{ data.content }}</p>
                                </article>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="container">
                            <h2 class="title text-center fly-down fly-up">More</h2>
                            <div v-for="a in all.slice(0, 25)" :key="a.id" class="news-list mb-2 fly-down fly-up">
                                <i class="fas fa-hashtag"></i>
                                <p><router-link :to="`/${$route.params.type}/${a.id}`">{{ a.title }}</router-link></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <Footer></Footer>
    </div>
</template>

<script>
import Footer from '@/components/Footer.vue'
import axios from 'axios'

export default {
    components: {
        Footer
    },
    data() {
        return {
            all: '',
            data: ''
        }
    },
    watch:{
        $route() {
            this.getData();
        }
    }, 
    methods: {
        getData() {
            axios.get(`${this.$route.params.type}/${this.$route.params.id}`)
                .then(res => {
                    this.data = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                })
        },
        getAllData() {
            axios.get(`${this.$route.params.type}`)
                .then(res => {
                    this.all = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                })
        },
        removeTransition() {
			const transition = document.getElementById('transition');

			setTimeout(() => {
				transition.classList.add('out');
			}, 50);
		},
    },
    created() {
        scrollTo(0, 0);

        this.getData();
        this.getAllData();
    },
    mounted() {
        this.removeTransition();
    },
}
</script>

<style scoped>
svg {
    position: absolute;
    z-index: -100;
    transition: 1s;
    transform: translateY(-100px);
}

nav {
    padding-top: 2rem;
}

nav.nav {
    display: flex;
    justify-content: space-between;
}

.nav-right {
    display: flex;
    flex-direction: column;
    padding: 20px 0;
}

.nav-links {
    display: flex;
    align-items: center;
    list-style: none;
    color: black;
    font-weight: bold;
    font-size: 20px;
    padding: 0;
}

.nav-links li {
    margin-right: 25px;
}

.nav-links li a {
    text-decoration: none;
}

.nav-links li:last-child {
    margin-right: 0;
}

.nav-links li button {
    border: none;
    padding: 5px 10px;
    background-color: white;
    font-size: 15px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    transition: .1s;
}

.nav-links li button:hover {
    transform: translateY(-2px);
}

/* Responsive */
@media(max-width: 767px) {
    .logo {
        width: 80px !important;
        height: 80px !important;
    }

    .nav-links li {
        font-size: .8rem;
    }
}

@media(max-width: 574px) {
    .logo {
        display: none;
    }

    .nav-links li {
        padding-top: 0;
        font-size: .9rem;
    }

    .social {
        align-self: flex-start;
    }

    svg {
        transform: translateY(0);
    }
}

.thumbnail img {
    border-radius: 5px;
}

.details p {
    margin-bottom: 0;
    height: fit-content;
}

.details, .author, .date {
    height: fit-content;
}
</style>