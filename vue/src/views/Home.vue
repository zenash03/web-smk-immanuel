<template>
	<div>
		<Nav></Nav>

		<div id="transition"></div>
		<header>
			<div class="container">
				<div class="row">
					<div class="hide-content position-relative col-lg-4 pt-5 pb-5">
						<h4 class="header-title">SMK Kristen Immanuel</h4>

						<button type="button" class="button-primary">Explore More</button>

						<div class="information mb-5">
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
	</div>
</template>

<script>
import Nav from '@/components/Nav.vue'
import Slideshow from '@/components/Slideshow.vue'

export default {
	components: {
		Nav,
		Slideshow
	},
	methods: {
		removeTransition() {
			const transition = document.getElementById('transition');

			transition.classList.add('out');
		}
	},
	mounted() {
		this.removeTransition();
	},
}
</script>