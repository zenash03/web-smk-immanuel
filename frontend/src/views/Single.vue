<template>
    <div id="home">
        <div id="transition"></div>

        <Nav></Nav>

        <main class="mb-5">
            <div class="container pt-5">
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="thumbnail mb-5">
                            <h2 class="title mb-4">{{ data.title }}</h2>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="details mb-3">
                                    <p>{{ data.author }} - {{ data.date }}</p>
                                </div>
                            </div>

                            <img :src="data.image" alt="Image">

                            <hr>
                        </div>

                        <div class="row">
                            <article>
                                <pre class="content">{{ data.content }}</pre>
                            </article>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <h5 class="title text-center fly-down fly-up">Lainnya</h5>

                        <div v-for="a in all.slice(0, 25)" :key="a.id" class="news-list mb-2 fly-down fly-up">
                            <i class="fas fa-hashtag"></i>
                            <p><router-link :to="`/read/${$route.params.type}/${a.id}`">{{ a.title }}</router-link></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <Footer></Footer>
    </div>
</template>

<script>
import Nav from '@/components/Nav.vue'
import Footer from '@/components/Footer.vue'
import axios from 'axios'

export default {
    components: {
        Nav,
        Footer
    },
    data() {
        return {
            all: '',
            data: ''
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
        setTimeout(() => {
			this.removeTransition();

			$(window).scroll(function() {
				let wScroll = $(this).scrollTop();

				// Footer Section
				if (wScroll > $('.footer').offset().top - 500) {
					$('.footer .pop-out').each(function(i) {
						setTimeout(() => {
							$('.footer .pop-out').eq(i).addClass('fade');
						}, 100 * i);
					});
				}
			});
		}, 0);
    },
    destroyed() {
		$(window).off();
	},
}
</script>

<style scoped>

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

.content {
    line-height: 1.8;
    font-size: 1rem;
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

.news-list {
    display: flex;
    align-items: center;
    border-bottom: 1px solid lightgray;
    padding: 5px 0;
}

.news-list p {
    font-weight: 600;
    margin: 0;
    font-size: .8rem;
}

.news-list i {
    margin-right: 1rem;
    font-size: 2rem;
    color: var(--primary-blue);
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
}

</style>