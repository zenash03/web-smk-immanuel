<template>
	<div id="home">
		<Nav></Nav>

		<main>
			<section class="news padding pt-0" id="news">
				<div class="container">
					<div class="row">
						<h2 class="title font-weight-bold text-center pop-out mb-5 mt-5">Prestasi Terbaru</h2>

						<div class="col-lg-8">
							<div class="row">
								<div v-for="n in prestasi" :key="n.id" class="col-lg-6 mb-2">
									<div class="news-card zoom-out">
										<div class="img">
											<img :src="n.image" alt="">	
										</div>	

										<div class="content">
											<div class="tag">{{ n.tag }}</div>

											<h5 class="title"><router-link :to="`/read/achievements/${n.id}`">{{ n.title }}</router-link></h5>

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

							<div v-for="n in prestasi" :key="n.id" class="news-list mb-2 fly-up">
								<i class="fas fa-hashtag"></i>
								<p><router-link :to="`/read/achievements/${n.id}`">{{ n.title }}</router-link></p>
							</div>
						</div>
					</div>
				</div>
			</section>
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
			news: '',
			prestasi: ''
		}
	},
	methods: {
		getPrestasi() {
			axios.get(`achievements`)
				.then(res => {
					this.prestasi = res.data;

					this.scroll();
				})
				.catch(err => {
					console.log(err.response.data);
				})
		},
		scroll() {
			scrollTo(0, 5);
		}
	},
	created() {
		this.getPrestasi();
	},
	mounted() {
		setTimeout(() => {
			$(window).scroll(function() {
				let wScroll = $(this).scrollTop();
				
				// Prestasi Section
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

@media only screen and (max-width: 991px) {
	.news .container .col-lg-4 {
		width: 100%;
		flex: 0 0 100%;
	}
}

@media only screen and (max-width: 768px) {
	.headline .title {
		font-size: 2rem;
		margin-top: 2rem;
	}
}

@media only screen and (max-width: 590px) {
	.news .col-lg-6 {
		width: 100%;
		flex: 0 0 100%;
	}

	.news h5.title {
		font-size: 1rem;
	}
}

@media only screen and (max-width: 375px) {
	.headline .title {
		font-size: 1.5rem;
		margin-top: 2rem;
	}
}

/* News Style End */


</style>