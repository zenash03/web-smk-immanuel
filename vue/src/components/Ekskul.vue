<template>
	<div>
		<div class="slider2">
			<div class="slide2 active">
				<img src="images/ekskul/webdesign.jpg" alt="">
				<div class="info">
					<h2>Web Design</h2>
				</div>
			</div>
			<div class="slide2">
				<img src="images/ekskul/itsoftware.jpg" alt="">
				<div class="info">
					<h2>IT Software</h2>
				</div>
			</div>
			<div class="slide2">
				<img src="images/ekskul/3ddesign.jpg" alt="">
				<div class="info">
					<h2>3D Design</h2>
				</div>
			</div>
			<div class="slide2">
				<img src="images/ekskul/networking.jpg" alt="">
				<div class="info">
					<h2>Networking</h2>
				</div>
			</div>
			<div class="slide2">
				<img src="images/ekskul/robotic.jpg" alt="">
				<div class="info">
					<h2>Robotic</h2>
				</div>
			</div>
			<div class="slide2">
				<img src="images/ekskul/graphicdesign.jpg" alt="">
				<div class="info">
					<h2>Graphic Design</h2>
				</div>
			</div>
			<div class="slide2">
				<img src="images/ekskul/videoediting.jpg" alt="">
				<div class="info">
					<h2>Video Editing</h2>
				</div>
			</div>
			<div class="slide2">
				<img src="images/ekskul/mobiledev.jpg" alt="">
				<div class="info">
					<h2>Mobile Dev</h2>
				</div>
			</div>
			<div class="navigation">
				<i class="fas fa-chevron-left prev-btn2"></i>
				<i class="fas fa-chevron-right next-btn2"></i>
			</div>
			<div class="navigation-visibility">
				<div class="slide2-icon active"></div>
				<div class="slide2-icon"></div>
				<div class="slide2-icon"></div>
				<div class="slide2-icon"></div>
				<div class="slide2-icon"></div>
				<div class="slide2-icon"></div>
				<div class="slide2-icon"></div>
				<div class="slide2-icon"></div>
			</div>
		</div>
	</div>
</template>

<style scoped>

.slider2 {
	position: relative;
	background: #000116;
	width: 100%;
	height: 400px;
	overflow: hidden;
	border-radius: 10px;
	opacity: 0;
	animation: fade .5s .5s forwards;
}

.slider2 .slide2 {
	position: absolute;
	width: 100%;
	height: 100%;
	clip-path: circle(0% at 0 50%);
}

.slider2 .slide2.active {
	clip-path: circle(150% at 0 50%);
	transition: 2s;
}

.slider2 .slide2 img {
	position: absolute;
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.slider2 .slide2 .info {
	position: absolute;
	color: #222;
	background: rgba(0, 0, 0, 0.4);
	width: 75%;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	padding: 20px;
	border-radius: 5px;
	box-shadow: 0 5px 25px rgb(1 1 1 / 15%);
	display: flex;
	align-items: center;
	justify-content: center;
	font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.slider2 .slide2 .info h2 {
	color: white;
	font-size: 2em;
	font-weight: 800;
}

.slider2 .slide2 .info p {
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

.slider2:hover .navigation {
  	opacity: 1;
}

.prev-btn2, .next-btn2 {
	z-index: 999;
	font-size: 2em;
	color: #222;
	background: rgba(255, 255, 255, 0.8);
	padding: 10px;
	cursor: pointer;
}

.prev-btn2 {
	border-top-right-radius: 3px;
	border-bottom-right-radius: 3px;
}

.next-btn2 {
	border-top-left-radius: 3px;
	border-bottom-left-radius: 3px;
}

.navigation-visibility {
	z-index: 999;
	display: flex;
	justify-content: center;
}

.navigation-visibility .slide2-icon {
	z-index: 999;
	background: rgba(255, 255, 255, 0.5);
	width: 20px;
	height: 10px;
	transform: translateY(-50px);
	margin: 0 6px;
	border-radius: 2px;
	box-shadow: 0 5px 25px rgb(1 1 1 / 20%);
}

.navigation-visibility .slide2-icon.active {
  	background: #4285F4;
}

@media (max-width: 500px) {
	.slider2 .slide2 .info h2 {
		font-size: 1.8em;
		line-height: 40px;
	}

	.slider2 .slide2 .info p {
		font-size: 0.9em;
	}
}

@keyframes fade {
    100% {
        opacity: 1;
    }
}

</style>

<script scoped>
export default {
	mounted() {
		const slider2 = document.querySelector(".slider2");
		const nextBtn2 = document.querySelector(".next-btn2");
		const prevBtn2 = document.querySelector(".prev-btn2");
		const slides2 = document.querySelectorAll(".slide2");
		const slideIcons2 = document.querySelectorAll(".slide2-icon");
		const numberOfSlides2 = slides2.length;
		let slideNumber2 = 0;

		//image slider2 next button
		nextBtn2.addEventListener("click", () => {
			slides2.forEach((slide2) => {
				slide2.classList.remove("active");
			});
			slideIcons2.forEach((slideIcon) => {
				slideIcon.classList.remove("active");
			});

			slideNumber2++;

			if(slideNumber2 > (numberOfSlides2 - 1)){
				slideNumber2 = 0;
			}

			slides2[slideNumber2].classList.add("active");
			slideIcons2[slideNumber2].classList.add("active");
		});

		//image slider2 previous button
		prevBtn2.addEventListener("click", () => {
			slides2.forEach((slide2) => {
				slide2.classList.remove("active");
			});
			slideIcons2.forEach((slideIcon) => {
				slideIcon.classList.remove("active");
			});

			slideNumber2--;

			if(slideNumber2 < 0){
				slideNumber2 = numberOfSlides2 - 1;
			}

			slides2[slideNumber2].classList.add("active");
			slideIcons2[slideNumber2].classList.add("active");
		});

		//image slider2 autoplay
		let playSlider2;

		let repeater2 = () => {
			playSlider2 = setInterval(function(){
					slides2.forEach((slide2) => {
					slide2.classList.remove("active");
				});
					slideIcons2.forEach((slideIcon) => {
					slideIcon.classList.remove("active");
				});

				slideNumber2++;

				if(slideNumber2 > (numberOfSlides2 - 1)){
					slideNumber2 = 0;
				}

				slides2[slideNumber2].classList.add("active");
				slideIcons2[slideNumber2].classList.add("active");
			}, 4000);
		}
		repeater2();

		//stop the image slider2 autoplay on mouseover
		slider2.addEventListener("mouseover", () => {
			clearInterval(playSlider2);
		});

		//start the image slider2 autoplay again on mouseout
		slider2.addEventListener("mouseout", () => {
			repeater2();
		});
	}
}

</script>