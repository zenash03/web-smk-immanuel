<template>
	<div id="home">
		<Nav></Nav>

		<div id="transition"></div>

		<header class="fade">
			<Slideshow></Slideshow>
		</header>

		<main>
			<section class="headline padding" id="headline">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="image-main fade-out">
								<img :src="headline.image_url" alt="">
							</div>
						</div>

						<div class="hide-content col-lg-6 text-left">
							<h2 class="title fade-out mb-4">{{ headline.title }}</h2>
							<p class="fade-out mb-5">{{ String(headline.content).slice(0, 300) }} ...</p>

							<router-link :to="`/read/news/${headline.id}`" class="read-more-btn fade-out">
								<span>Read More</span>
							</router-link>
						</div>
					</div>
				</div>
			</section>

			<section class="news padding pt-0" id="news">
				<div class="container">
					<div class="row">
						<h2 class="title font-weight-bold text-center pop-out mb-5">Berita Terbaru</h2>

						<div class="col-lg-8">
							<div class="row">
								<div v-for="n in news.slice(0, 4)" :key="n.id" class="col-lg-6 mb-2">
									<div class="news-card zoom-out">
										<div class="img">
											<img :src="n.image_url" alt="">	
										</div>	

										<div class="content">
											<div class="tag">{{ n.tag }}</div>

											<h5 class="title"><router-link :to="`/read/news/${n.id}`">{{ n.title }}</router-link></h5>

											<div class="details">
												<p>{{ n.author }} - {{ n.date }}</p>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<h5 class="title title-more font-weight-bold pop-out text-left mt-3 mb-3">Lainnya</h5>

							<div v-for="n in news.slice(0, 15)" :key="n.id" class="news-list mb-2 fly-up">
								<i class="fas fa-hashtag"></i>
								<p><router-link :to="`/read/news/${n.id}`">{{ n.title }}</router-link></p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="jurusan padding" id="jurusan">
				<div class="container">
					<h2 class="title font-weight-bold text-center mb-5 fade-out">Jurusan</h2>

					<div class="majors">
						<div class="row">
							<div class="col-lg-4 mb-4">
								<div class="card pop-out">
									<div class="card-header tkj pop-out">
										<i class="fas fa-server"></i>
									</div>

									<div class="card-content">
										<h5 class="mb-4 mt-4 pop-out" style="color: #396C8F">Teknik Komputer dan Jaringan</h5>
										<p class="pop-out">Di jurusan ini kamu akan mempelajari bagaimana menggunakan teknologi komputer secara optimal guna menangani masalah transformasi atau pengolahan data dengan proses logika.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 mb-4">
								<div class="card pop-out">
									<div class="card-header akl pop-out">
										<i class="fas fa-calculator"></i>
									</div>

									<div class="card-content">
										<h5 class="mb-4 mt-4 pop-out" style="color: #4F967F">Akutansi dan Keuangan Lembaga</h5>
										<p class="pop-out">Jurusan ini mempelajari materi terkait metode pencatatan dan penyusunan laporan keuangan yang berguna membantu pemangku kepentingan dalam proses pengambilan keputusan.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 mb-4">
								<div class="card pop-out">
									<div class="card-header bdp pop-out">
										<i class="far fa-lightbulb"></i>
									</div>

									<div class="card-content">
										<h5 class="mb-4 mt-4 pop-out" style="color: #C39A40">Bisnis Daring dan Pemasaran</h5>
										<p class="pop-out">Di jurusan ini kamu akan mempelajari bagaimana melakukan pemasaran produk, pembukuan dan pengelolaan keuangan serta hal-hal terkait keberlanjutan dari suatu usaha.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="prestasi" id="prestasi">
				<div class="container">
					<h2 class="title font-weight-bold text-center mb-5 fly-up">Prestasi Kami</h2>

					<div class="row justify-content-center" v-for="(p, i) in prestasi.slice(0, 2)" :key="p.id">
						<div v-if="i % 2 == 0" class="prestasi-post post-left fly-up">
							<div class="news-card left">
								<div class="content">
									<h4 class="title mb-4 fly-up"><router-link :to="`/read/prestasi/${p.id}`">{{ p.title }}</router-link></h4>
									<p class="mb-4 fly-up">{{ p.excerpt }}</p>

									<router-link :to="`/read/prestasi/${p.id}`" class="read-more-btn">
										<span>Read More</span>
									</router-link>
								</div>
							</div>

							<div class="news-image fly-up">
								<img :src="p.image_url" alt="">
							</div>
						</div>

						<div v-if="i % 2 != 0" class="prestasi-post post-right fly-up">
							<div class="news-image fly-up">
								<img :src="p.image_url" alt="">
							</div>

							<div class="news-card right">
								<div class="content">
									<h4 class="title mb-4 fly-up"><router-link :to="`/read/prestasi/${p.id}`">{{ p.title }}</router-link></h4>
									<p class="mb-4 fly-up">{{ p.excerpt }}</p>

									<router-link :to="`/read/prestasi/${p.id}`" class="read-more-btn">
										<span>Read More</span>
									</router-link>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</section>

			<section class="ekskul padding" id="ekskul">
				<Ekskul></Ekskul>
			</section>
		</main>

		<Footer></Footer>
	</div>
</template>

<script>

import Nav from '@/components/Nav.vue'
import Footer from '@/components/Footer.vue'
import Slideshow from '@/components/Slideshow.vue'
import Ekskul from '@/components/Ekskul.vue'
import axios from 'axios'

export default {
	components: {
		Footer,
		Nav,
		Slideshow,
		Ekskul
	},
	data() {
		return {
			headline: '',
			news: '',
			prestasi: ''
		}
	},
	methods: {
		removeTransition() {
			const transition = document.getElementById('transition');

			setTimeout(() => {
				transition.classList.add('out');
			}, 50);
		},
		getHeadline() {
			axios.get(`headline`)
				.then(res => {
					this.headline = res.data;
				})
				.catch(err => {
					console.log(err.response.data);
				})
		},
		getNews() {
			axios.get(`news`)
				.then(res => {
					this.news = res.data;
				})
				.catch(err => {
					console.log(err.response.data);
				})
		},
		getPrestasi() {
			axios.get(`prestasi`)
				.then(res => {
					this.prestasi = res.data;
				})
				.catch(err => {
					console.log(err.response.data);
				})
		}
	},
	created() {
		this.getHeadline();
		this.getNews();
		this.getPrestasi();
	},
	mounted() {
		setTimeout(() => {
			this.removeTransition();

			$(window).scroll(function() {
				let wScroll = $(this).scrollTop();
				
				// Headline Section
				if (wScroll > $('.headline').offset().top - 300) {
					$('.headline .fade-out').each(function(i) {
						setTimeout(() => {
							$('.headline .fade-out').eq(i).addClass('fade');
						}, 100 * i);
					});
				}

				// News Section
				if (wScroll > $('.news').offset().top - 300) {
					$('.news .pop-out').each(function(i) {
						setTimeout(() => {
							$('.news .pop-out').eq(i).addClass('pop-up');
						}, 100 * i);
					});

					$('.news .zoom-out').each(function(i) {
						setTimeout(() => {
							$('.news .zoom-out').eq(i).addClass('zoom-in');
						}, 100 * i);
					});

					$('.news .fly-up').each(function(i) {
						setTimeout(() => {
							$('.news .fly-up').eq(i).addClass('fly-down');
						}, 100 * i);
					});
				}

				// Majors Section
				if (wScroll > $('.jurusan').offset().top - 300) {
					$('.jurusan .pop-out').each(function(i) {
						setTimeout(() => {
							$('.jurusan .pop-out').eq(i).addClass('pop-up');
						}, 100 * i);
					});

					$('.jurusan .fade-out').each(function(i) {
						setTimeout(() => {
							$('.jurusan .fade-out').eq(i).addClass('fade');
						}, 100 * i);
					});
				}

				// Prestasi Section
				if (wScroll > $('.prestasi').offset().top - 300) {
					$('.prestasi .zoom-out').each(function(i) {
						setTimeout(() => {
							$('.prestasi .zoom-out').eq(i).addClass('zoom-in');
						}, 100 * i);
					});

					$('.prestasi .fly-up').each(function(i) {
						setTimeout(() => {
							$('.prestasi .fly-up').eq(i).addClass('fly-down');
						}, 100 * i);
					});
				}

				// Ekskul Section
				if (wScroll > $('.ekskul').offset().top - 300) {
					$('.ekskul .fade-out').each(function(i) {
						setTimeout(() => {
							$('.ekskul .fade-out').eq(i).addClass('fade');
						}, 100 * i);
					});

					$('.ekskul .fly-up').each(function(i) {
						setTimeout(() => {
							$('.ekskul .fly-up').eq(i).addClass('fly-down');
						}, 100 * i);
					});
				}

				// Footer Section
				if (wScroll > $('.footer').offset().top - 400) {
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

a::before{
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    width: 0;
    height: 2px;
    background-color: var(--primary-blue);
    transition: width 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}

@media (hover: hover) and (pointer: fine) {
    a:hover::before{
        left: 0;
        right: auto;
        width: 100%;
    }
}

/* Transition */

#transition {
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 1000;
    top: 0;
    transition: .5s ease-in;
    background-color: var(--primary-blue);
}

#transition.out {
    width: 0;
}

/* Transition Style End */

/* Home Header Style */

header.fade {
    animation: fade .5s 2s forwards;
}

/* Home Header Style End */


/* Headline Style */
.headline {
    height: fit-content;
}

.headline .read-more-btn {
	background-color: var(--primary-blue);
}

.image-main {
	max-height: 400px;
    width: 100%;
}

.image-main img {
	width: 100%;
	height: 100%;
	max-height: 400px;
	object-fit: cover;
}

@media only screen and (max-width: 768px) {
	.news .col-lg-6 {
		width: 50%;
		flex: 0 0 50%;
	}
}

@media only screen and (max-width: 375px) {
	.news .col-lg-6 {
		width: 100%;
		flex: 0 0 100%;
	}
}

/* Headline Style End */


/* News Style */
.news-card img {
    border-radius: 5px;
}

.news .img {
    height: 200px;
}

.news .title-more {
	color: var(--primary-blue);
}

.tag {
    font-size: 14px;
    margin: 10px 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    width: fit-content;
    color: white;
    padding: 2px 20px;
    font-weight: bold;
    border-radius: 100px;
    background-color: var(--primary-blue);
}

.details {
    display: flex;
    color: gray;
    align-items: center;
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

@media only screen and (max-width: 768px) {
	.headline .title {
		font-size: 2rem;
		margin-top: 2rem;
	}
}

@media only screen and (max-width: 375px) {
	.headline .title {
		font-size: 1.5rem;
		margin-top: 2rem;
	}
}

/* News Style End */


/* Jurusan Style */
.jurusan {
    background-color: #eff9ff;
    padding: 100px 0;
}

.jurusan .majors {
    text-align: center;
}

.jurusan .card {
    width: 100%;
    height: 450px;
}

.jurusan .card h5 {
    width: 80%;
    font-weight: 600;
}

.jurusan .card p {
    width: 90%;
    font-size: .9rem;
}

.jurusan .card-header {
    height: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: white;
}

.jurusan .card-header.tkj {
    background-color: #62b8f4;
}

.jurusan .card-header.akl {
    background-color: #75dfbd;
}

.jurusan .card-header.bdp {
    background-color: #ffc953;
}

.jurusan .card-content {
    height: 250px;
    display: flex;
	align-items: center;
    justify-content: center;
    flex-direction: column;
}

.jurusan .img-jurusan {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 1rem;
}

@media only screen and (max-width: 995px) {
	.jurusan .row {
		justify-content: center;
	}

	.jurusan .col-lg-4 {
		width: 50%;
		flex: 0 0 50%;
	}
}

@media only screen and (max-width: 375px) {
	.jurusan .col-lg-4 {
		width: 100%;
		flex: 0 0 100%;
	}
}

/* Jurusan Style End*/


/* Prestasi Style */
.prestasi {
    padding: 100px 0;
    background-color: white;
}

.prestasi-post {
    width: 100%;
    min-height: 400px;
	display: flex;
    padding: 0;
}

.prestasi .news-image {
	height: 100%;
	width: 50%;
}

.prestasi .news-image img {
	max-height: 400px;
}

.prestasi .news-card {
    height: 100%;
	width: 50%;
    background-color: var(--primary-blue);
    padding: 4rem 1.7rem;
    color: white;
    display: flex;
    align-items: center;
    position: relative;
}

.prestasi .news-card .title a {
    color: white;
    font-weight: 600;
    color: white;
}

.prestasi .left {
    background-color: var(--primary-blue);
}

.prestasi .left::before {
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    right: -25px;
    border-top: 18px solid transparent;
    border-left: 25px solid var(--primary-blue);
    border-bottom: 18px solid transparent;
	z-index: 100;
}

.prestasi .right {
    background-color: var(--primary-yellow);
}

.prestasi .right::before {
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    left: -25px;
    border-top: 18px solid transparent;
    border-right: 25px solid var(--primary-yellow);
    border-bottom: 18px solid transparent;
	z-index: 100;
}

.prestasi .details {
    color: white;
}

.read-more-btn {
    color: #FFF;
    transition: all 0.5s;
    position: relative;
    padding: .7rem 2rem;
}

.read-more-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    background-color: rgba(255,255,255,0.1);
    transition: all 0.3s;
}

.read-more-btn:hover {
    text-decoration: none;
    color: white;
}

.read-more-btn:hover::before {
    opacity: 0 ;
    transform: scale(0.5,0.5);
}

.read-more-btn::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0;
    transition: all 0.3s;
    border: 1px solid rgba(255,255,255,0.5);
    transform: scale(1.2,1.2);
}

.read-more-btn:hover::after {
    opacity: 1;
    transform: scale(1,1);
}

@media only screen and (max-width: 768px) {
	.prestasi-post {
		flex-direction: column;
	}

	.prestasi-post.post-left {
		flex-direction: column-reverse;
	}

	.prestasi .news-image {
		height: 100%;
		width: 100%;
	}

	.prestasi .news-card {
		height: 100%;
		width: 100%;
		padding: 4rem 1.7rem;
		color: white;
		display: flex;
		align-items: center;
		position: relative;
	}

    .prestasi .right::before, .prestasi .left::before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        left: 50%;
        top: -40px;
        transform: translateX(-50%);
        border-right: 25px solid transparent;
        border-left: 25px solid transparent;
        border-bottom: 25px solid var(--primary-yellow);
    }

	.prestasi .left::before {
        border-bottom: 25px solid var(--primary-blue);
	}

    .prestasi .row {
        flex-direction: column;
    }

    .prestasi-post {
        width: 100%;
        min-height: fit-content;
    }
}

@media only screen and (max-width: 375px) {
    .prestasi .news-card {
		padding: 2rem 1.7rem;
	}

    .prestasi .row {
        flex-direction: column;
    }

    .prestasi-post {
        width: 100%;
    }
}

/* Prestasi Style End */


/* Eskull Style */

.ekskul {
	background-color: #eff9ff;
}

/* Eskull Style End */

</style>