<template>
	<div id="home">
		<Nav></Nav>

		<div id="transition"></div>
		<header class="mb-5">
			<div class="container">
				<div class="row">
					<div class="hide-content d-flex flex-column col-lg-4 pt-5 pb-5">
						<h2 class="header-title">SMK Kristen Immanuel</h2>

						<button type="button" onclick="location.href = '#headline'" class="button-primary">Explore More</button>

						<div class="information">
							<p>Jl. Letnan Jendral Sutoyo, Parit Tokaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78113</p>
							<p>+62 8952-4435-865</p>
						</div>
					</div>

					<div class="hide-content col-lg-8 pt-3 pl-5 pt-5 pb-5">
						<Slideshow></Slideshow>
					</div>
				</div>
			</div>
		</header>

		<main class="pt-5">
			<section class="headline" id="headline">
				<div class="container">
					<div class="row">
						<div class="hide-content col-lg-4">
							<h2 class="headline-title fade-out">{{ headline.title }}</h2>
							<p class="fade-out mb-5">{{ headline.excerpt }}</p>

							<button type="button" onclick="location.href = '#news'" class="fade-out button-primary">Explore More</button>
						</div>

						<div class="position-relative col-lg-8">
							<div class="image-main fade-out">
								<img :src="headline.image_url" alt="">
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="news pt-5 mb-5" id="news">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
						<h2 class="title pop-out">Berita Terbaru</h2>
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
												<div class="author">
													<i class="far fa-user"></i>
													<p>{{ n.author }}</p>
												</div>

												<div class="date">
													<i class="far fa-clock"></i>
													<p>{{ n.date }}</p>
												</div>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<h2 class="title pop-out text-center">More</h2>

							<div class="container">
								<div v-for="n in news.slice(0, 15)" :key="n.id" class="news-list mb-2 fly-up">
									<i class="fas fa-hashtag"></i>
									<p><router-link :to="`/read/news/${n.id}`">{{ n.title }}</router-link></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="jurusan pt-5" id="jurusan">
				<div class="container d-flex">
					<div class="content">
						<h2 class="mb-5 fade-out"><span class="line"></span> Jurusan <span class="line"></span></h2>

						<div class="majors">
							<div class="row">
								<div class="col-lg-4">
									<img src="images/slideshow/1.jpeg" class="img-jurusan fade-out">
									<h5 class="fade-out">Akutansi dan Keuangan Lembaga</h5>
									<p class="pop-out">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit alias eaque ratione voluptatum quis libero fuga mollitia totam deleniti sint dolorem modi aliquid rem, accusamus fugit eius nesciunt vero quibusdam.</p>
								</div>

								<div class="col-lg-4">
									<img src="images/slideshow/1.jpeg" class="img-jurusan fade-out">
									<h5 class="fade-out">Teknik Komputer dan Jaringan</h5>
									<p class="pop-out">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit alias eaque ratione voluptatum quis libero fuga mollitia totam deleniti sint dolorem modi aliquid rem, accusamus fugit eius nesciunt vero quibusdam.</p>
								</div>
								
								<div class="col-lg-4">
									<img src="images/slideshow/1.jpeg" class="img-jurusan fade-out">
									<h5 class="fade-out">Bisnis Daring dan Pemasaran</h5>
									<p class="pop-out">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit alias eaque ratione voluptatum quis libero fuga mollitia totam deleniti sint dolorem modi aliquid rem, accusamus fugit eius nesciunt vero quibusdam.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="prestasi pt-5 pb-5" id="prestasi">
				<div class="container">
					<h2 class="title text-center mb-5 fly-up">Prestasi</h2>

					<div class="row">
						<div v-for="p in prestasi" :key="p.id" class="col-lg-6 mb-2">
							<div class="news-card zoom-out">
								<div class="img">
									<img :src="p.image_url" alt="">	
								</div>	

								<div class="content">
									<h5 class="title mt-2"><router-link :to="`/read/prestasi/${p.id}`">{{ p.title }}</router-link></h5>
									<p>{{ p.excerpt }}</p>

									<div class="details">
										<div class="author">
											<i class="far fa-user"></i>
											<p>{{ p.author }}</p>
										</div>

										<div class="date">
											<i class="far fa-clock"></i>
											<p>{{ p.date }}</p>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</section>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ececec" fill-opacity="1" d="M0,256L48,240C96,224,192,192,288,192C384,192,480,224,576,202.7C672,181,768,107,864,106.7C960,107,1056,181,1152,208C1248,235,1344,213,1392,202.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

			<section class="ekskul pt-5 pb-5 mb-5" id="ekskul">
				<div class="container">
					<h2 class="title mb-5 fly-up">Ekskul</h2>

					<Ekskul class="fade-out"></Ekskul>
				</div>
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

				// Prestasi Section
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
			});
		}, 1200);
	},
}
</script>