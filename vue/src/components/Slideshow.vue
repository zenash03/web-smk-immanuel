<template>
	<div>
		<div class="slider">
			<div class="slide active">
				<img src="images/slideshow/1.jpg" alt="">
				<div class="info">
					<h2>Winter Mountains</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
			<div class="slide">
				<img src="images/slideshow/2.jpg" alt="">
				<div class="info">
					<h2>Tropical Desert</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
			<div class="slide">
				<img src="images/slideshow/3.jpg" alt="">
				<div class="info">
					<h2>Steaming Volcanoes</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
			<div class="slide">
				<img src="images/slideshow/4.jpg" alt="">
				<div class="info">
					<h2>Mountain River</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
			<div class="slide">
				<img src="images/slideshow/5.jpg" alt="">
				<div class="info">
					<h2>Egypt Pyramids</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
			<div class="navigation">
				<i class="fas fa-chevron-left prev-btn"></i>
				<i class="fas fa-chevron-right next-btn"></i>
			</div>
			<div class="navigation-visibility">
				<div class="slide-icon active"></div>
				<div class="slide-icon"></div>
				<div class="slide-icon"></div>
				<div class="slide-icon"></div>
				<div class="slide-icon"></div>
			</div>
		</div>
	</div>
</template>

<style scoped>

.slider {
	position: relative;
	background: #000116;
	width: 100%;
	height: 400px;
	overflow: hidden;
	border-radius: 10px;
	opacity: 0;
	animation: fade .5s .5s forwards;
}

.slider .slide {
	position: absolute;
	width: 100%;
	height: 100%;
	clip-path: circle(0% at 0 50%);
}

.slider .slide.active {
	clip-path: circle(150% at 0 50%);
	transition: 2s;
}

.slider .slide img {
	position: absolute;
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.slider .slide .info {
	position: absolute;
	color: #222;
	background: rgba(255, 255, 255, 0.3);
	width: 75%;
	margin-top: 50px;
	margin-left: 50px;
	padding: 20px;
	border-radius: 5px;
	box-shadow: 0 5px 25px rgb(1 1 1 / 5%);
}

.slider .slide .info h2 {
	font-size: 2em;
	font-weight: 800;
}

.slider .slide .info p {
	font-size: 1em;
	font-weight: 400;
}

.navigation {
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: space-between;
	opacity: 0;
	transition: opacity 0.5s ease;
}

.slider:hover .navigation {
  	opacity: 1;
}

.prev-btn, .next-btn {
	z-index: 999;
	font-size: 2em;
	color: #222;
	background: rgba(255, 255, 255, 0.8);
	padding: 10px;
	cursor: pointer;
}

.prev-btn {
	border-top-right-radius: 3px;
	border-bottom-right-radius: 3px;
}

.next-btn {
	border-top-left-radius: 3px;
	border-bottom-left-radius: 3px;
}

.navigation-visibility {
	z-index: 999;
	display: flex;
	justify-content: center;
}

.navigation-visibility .slide-icon {
	z-index: 999;
	background: rgba(255, 255, 255, 0.5);
	width: 20px;
	height: 10px;
	transform: translateY(-50px);
	margin: 0 6px;
	border-radius: 2px;
	box-shadow: 0 5px 25px rgb(1 1 1 / 20%);
}

.navigation-visibility .slide-icon.active {
  	background: #4285F4;
}

@media (max-width: 900px) {
	.slider{
		width: 100%;
	}

	.slider .slide .info {
		position: relative;
		width: 80%;
		margin-left: auto;
		margin-right: auto;
	}
}

@media (max-width: 500px) {
	.slider .slide .info h2 {
		font-size: 1.8em;
		line-height: 40px;
	}

	.slider .slide .info p {
		font-size: 0.9em;
	}
}

@keyframes fade {
    100% {
        opacity: 1;
    }
}

</style>

<script>
export default {
	mounted() {
		const slider = document.querySelector(".slider");
		const nextBtn = document.querySelector(".next-btn");
		const prevBtn = document.querySelector(".prev-btn");
		const slides = document.querySelectorAll(".slide");
		const slideIcons = document.querySelectorAll(".slide-icon");
		const numberOfSlides = slides.length;
		let slideNumber = 0;

		//image slider next button
		nextBtn.addEventListener("click", () => {
			slides.forEach((slide) => {
				slide.classList.remove("active");
			});
			slideIcons.forEach((slideIcon) => {
				slideIcon.classList.remove("active");
			});

			slideNumber++;

			if(slideNumber > (numberOfSlides - 1)){
				slideNumber = 0;
			}

			slides[slideNumber].classList.add("active");
			slideIcons[slideNumber].classList.add("active");
		});

		//image slider previous button
		prevBtn.addEventListener("click", () => {
			slides.forEach((slide) => {
				slide.classList.remove("active");
			});
			slideIcons.forEach((slideIcon) => {
				slideIcon.classList.remove("active");
			});

			slideNumber--;

			if(slideNumber < 0){
				slideNumber = numberOfSlides - 1;
			}

			slides[slideNumber].classList.add("active");
			slideIcons[slideNumber].classList.add("active");
		});

		//image slider autoplay
		let playSlider;

		let repeater = () => {
			playSlider = setInterval(function(){
					slides.forEach((slide) => {
					slide.classList.remove("active");
				});
					slideIcons.forEach((slideIcon) => {
					slideIcon.classList.remove("active");
				});

				slideNumber++;

				if(slideNumber > (numberOfSlides - 1)){
					slideNumber = 0;
				}

				slides[slideNumber].classList.add("active");
				slideIcons[slideNumber].classList.add("active");
			}, 4000);
		}
		repeater();

		//stop the image slider autoplay on mouseover
		slider.addEventListener("mouseover", () => {
			clearInterval(playSlider);
		});

		//start the image slider autoplay again on mouseout
		slider.addEventListener("mouseout", () => {
			repeater();
		});
	}
}

</script>