<template>
	<div>
		<div class="slider">
			<div class="content">
				<img v-if="window > 768" src="@/assets/images/banner/1920 x 600/Banner 1920 x 600 (1).jpg" class="banner-img" alt="Banner">
				<img v-if="window > 768" src="@/assets/images/banner/1920 x 600/Banner 1920 x 600 (2).jpg" class="banner-img" alt="Banner">
				<img v-if="window > 768" src="@/assets/images/banner/1920 x 600/Banner 1920 x 600 (3).jpg" class="banner-img" alt="Banner">

				<img v-if="window <= 768 && window > 375" src="@/assets/images/banner/1280 x 700/Banner 1280 x 700 (1).jpg" class="banner-img" alt="Banner">
				<img v-if="window <= 768 && window > 375" src="@/assets/images/banner/1280 x 700/Banner 1280 x 700 (2).jpg" class="banner-img" alt="Banner">
				<img v-if="window <= 768 && window > 375" src="@/assets/images/banner/1280 x 700/Banner 1280 x 700 (3).jpg" class="banner-img" alt="Banner">

				<img v-if="window <= 375" src="@/assets/images/banner/1080 x 1080/Banner 1080 x 1080 (1).jpg" class="banner-img" alt="Banner">
				<img v-if="window <= 375" src="@/assets/images/banner/1080 x 1080/Banner 1080 x 1080 (2).jpg" class="banner-img" alt="Banner">
				<img v-if="window <= 375" src="@/assets/images/banner/1080 x 1080/Banner 1080 x 1080 (3).jpg" class="banner-img" alt="Banner">
			</div>
		</div>
	</div>
</template>

<script scoped>
import axios from 'axios'

export default {
	data() {
		return {
			banners: '',
			window: screen.width
		}
	},
	methods: {
		getBanner() {
			axios.get(`banner`)
				.then(res => {
					this.banners = res.data;
				})
				.catch(err => {
					console.log(err.response.data);
				})
		}
	},
	created() {
		this.getBanner();

		window.addEventListener('resize', e => {
			this.window = screen.width;

			console.log(this.window)
		});
	},
	mounted() {
		const container = document.querySelector('.content');
		const banners = document.querySelectorAll('.banner-img');

		let max = banners.length - 1;
		let i = 0;

		move();
		function move() {
			container.style.transform = `translateX(${banners[i].clientWidth * -i}px)`;

			i++;

			if (i > max) i = 0;

			setTimeout(move, 3000);
		}
	}
}
</script>

<style scoped>

.slider {
	overflow: hidden;
}

.content {
	display: flex;
	transition: .5s;
}

</style>