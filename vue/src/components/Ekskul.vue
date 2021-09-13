<template>
	<div>
		<div class="container ekskul">
			<h2 class="title font-weight-bold mb-5">Ekstra Kurikuler</h2>

			<div class="slider">
				<div class="card fade-out" style="background-color: #FF4954">
					<div class="icon">
						<i class="fas fa-code"></i>
					</div>

					<p>Web Design</p>
				</div>
			
				<div class="card fade-out" style="background-color: #019688">
					<div class="icon">
						<i class="fab fa-uncharted"></i>
					</div>

					<p>IT Software</p>
				</div>
			
				<div class="card fade-out" style="background-color: #FF4882">
					<div class="icon">
						<i class="fab fa-unity"></i>
					</div>

					<p>3d Design</p>
				</div>
			
				<div class="card fade-out" style="background-color: #FF8B4A">
					<div class="icon">
						<i class="fas fa-server"></i>
					</div>

					<p>Networking</p>
				</div>
			
				<div class="card fade-out" style="background-color: #4986FF">
					<div class="icon">
						<i class="fas fa-robot"></i>
					</div>

					<p>Robotic</p>
				</div>
			
				<div class="card fade-out" style="background-color: #64E368">
					<div class="icon">
						<i class="fas fa-palette"></i>
					</div>

					<p>Graphic Design</p>
				</div>
			
				<div class="card fade-out" style="background-color: #B259E9">
					<div class="icon">
						<i class="far fa-file-video"></i>
					</div>

					<p>Video Editing</p>
				</div>
			
				<div class="card fade-out" style="background-color: #FF65E6">
					<div class="icon">
						<i class="fas fa-mobile-alt"></i>
					</div>

					<p>Mobile Dev</p>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped>

.ekskul {
	width: 100%;
	overflow: hidden;
	text-align: center;
}

.col-lg-10 {
	position: relative;
	display: flex;
	align-items: center;
	overflow: hidden;
}

.col-lg-2 {
	display: flex;
	align-items: center;
	justify-content: center;
	color: white;
}

.col-lg-2 h1 {
	font-weight: 600;
}

.slider {
	display: flex;
	justify-content:space-evenly;
	flex-wrap: wrap;
}

.card {
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	padding: 1rem;
	width: 200px;
	height: 200px;
	margin: 1rem;
	border: none;
}

.card p {
	text-align: center;
	color: white !important;
	font-weight: bold;
}

.card .icon {
	color: white;
	font-size: 3rem;
}

@keyframes fade {
    100% {
        opacity: 1;
    }
}

@media only screen and (max-width: 995px) {
	.card {
		justify-content: flex-start;
		flex-direction: row;
		width: 100%;
		height: 100px;
		margin: 0;
		border-radius: 0;
	}

	.card .icon {
		width: 15%;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.card p {
		margin: 0;
		margin-left: 2rem;
		font-size: 1.5rem;
	}
}

@media only screen and (max-width: 375px) {
	.card p {
		font-size: 1rem;
	}

	.container {
		padding: 0;
		width: 100%;
	}
}

</style>