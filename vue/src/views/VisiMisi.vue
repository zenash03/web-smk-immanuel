<template>
	<div>
		<Nav></Nav>

		<div id="transition"></div>

		<main>
			<section class="visi-misi padding">
				<div class="container">
					<div class="grid-area">
                        <div class="misi">
                            <div class="misi-card fly-up">
                                <h4 class="title mb-4 fly-up">Misi</h4>

                                <p class="pop-out">
                                    Mendidik siswa menjadi manusia yang berkualitas secara akademik, fisik, mental, dan spiritual, serta memiliki kemampuan dan kegemaran belajar seumur hidup sehingga dapat memberi dampak bagi lingkungan sekitar dengan nilai-nilai kristiani.
                                    <br><br>
                                    To educate students to excel academically, physically, mentally, and spiritually, and to cultivate lifelong love of learning in order to bring about impact to the surroundings with Christian values.
                                    <br><br>
                                    栽培子弟成爲品學兼優，身心靈安康，以及終生好學上進，實踐基督信仰的價值啓迪身邊的人。
                                    <br><br>
                                    学問的や肉体的や精神的などの見所のある及び一生学び続ける才能がある学生たちを作り出す、そうするとキリスト教の価値観で社会によい影響を与えられる人材になる.
                                    <br><br>
                                    학생들이 학문적, 신체적, 정신적, 영적으로 우수한 인간이 되도록 교육하고, 기독교적 가치로 주변 환경에 영향을 미칠 수있도록 평생학습에 대한 능력과 열정을 갖도록 교육한다.
                                </p>
                            </div>
                        </div>

                        <div class="visi">
                            <div class="visi-card fly-up">
                                <h4 class="title mb-4 fly-up">Visi</h4>

                                <p class="pop-out">
                                    Sekolah Kristen berkualitas dalam mendidik anak bangsa dengan nilai-nilai Kristiani.
                                    <br><br>
                                    A Christian school that provides a quality education for the nation with Christian values.
                                    <br><br>
                                    具備高素質的基督教學校, 以基督信仰的價值培育國家子弟。
									<br><br>
									クリスト教の価値観で人材を教育するの優秀な学校になる.
									<br><br>
									아이들을 기독교 가치로 교육하는 양질의 기독학교.
                                </p>
                            </div>

                            <div class="motto-card fly-up">
                                <h4 class="title mb-4 fly-up">Motto</h4>

                                <p class="pop-out">
                                	Cerdas, Bijak, Bertanggung Jawab
                                	<br><br>
                                	Smart, Wise, Accountable
                                	<br><br>
                                	聪明的, 明智的, 负责的
                                	<br><br>
                                	頭いい, 賢い, 責任をもつ
                                	<br><br>
                                	지능적인, 지혜로운, 책임이있는
                            	</p>
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
			headline: '',
			news: ''
		}
	},
	methods: {
		removeTransition() {
			const transition = document.getElementById('transition');

			setTimeout(() => {
				transition.classList.add('out');
			}, 50);
		}
	},
	mounted() {
		setTimeout(() => {
			this.removeTransition();

			$(window).scroll(function() {
				let wScroll = $(this).scrollTop();
				
				// News Section
				if (wScroll > $('.visi-misi').offset().top - 300) {
					$('.visi-misi .pop-out').each(function(i) {
						setTimeout(() => {
							$('.visi-misi .pop-out').eq(i).addClass('pop-up');
						}, 100 * i);
					});

					$('.visi-misi .zoom-out').each(function(i) {
						setTimeout(() => {
							$('.visi-misi .zoom-out').eq(i).addClass('zoom-in');
						}, 100 * i);
					});

					$('.visi-misi .fly-up').each(function(i) {
						setTimeout(() => {
							$('.visi-misi .fly-up').eq(i).addClass('fly-down');
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

		setTimeout(() => {
			scrollTo(0, 0);
		}, 200);
	},
	destroyed() {
		$(window).off();
	},
}
</script>

<style scoped>

.visi-card, .misi-card, .motto-card {
    background-color: white;
    padding: 1rem;
    border-left: 5px solid var(--primary-blue);
	height: 100%;
}

.grid-area {
    display: grid;
    grid-template-areas: "misi visi";
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr;
    grid-gap: 20px;
}

.misi {
    grid-area: misi;
}

.visi {
    display: grid;
    grid-area: visi;
    grid-template-areas: "visi-card" "motto-card";
    grid-gap: 20px;
}

.visi-card {
    grid-area: visi-card;
}

.motto-card {
    grid-area: motto-card;
}

@media only screen and (max-width: 820px) {
    .padding {
        padding: 50px 0;
    }

    .grid-area {
        grid-template-areas: "misi" "visi";
        grid-template-columns: 1fr;
    }
}

</style>