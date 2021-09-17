<template>
	<div class="ekskul">
		<div class="container">
			<h2 class="title text-center font-weight-bold mb-5">Ekstra Kurikuler</h2>

			<div class="row">
				<div class="col-lg-3">
					<div class="ekskul-card fade-out" style="--color: #FF4954">
						<div class="icon">
							<i class="fas fa-code"></i>
						</div>

						<p>Web Design</p>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="ekskul-card fade-out" style="--color: #019688">
						<div class="icon">
							<i class="fab fa-uncharted"></i>
						</div>

						<p>IT Software</p>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="ekskul-card fade-out" style="--color: #FF4882">
						<div class="icon">
							<i class="fab fa-unity"></i>
						</div>

						<p>3d Design</p>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="ekskul-card fade-out" style="--color: #FF8B4A">
						<div class="icon">
							<i class="fas fa-server"></i>
						</div>

						<p>Networking</p>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="ekskul-card fade-out" style="--color: #4986FF">
						<div class="icon">
							<i class="fas fa-robot"></i>
						</div>

						<p>Robotic</p>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="ekskul-card fade-out" style="--color: #64E368">
						<div class="icon">
							<i class="fas fa-palette"></i>
						</div>

						<p>Graphic Design</p>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="ekskul-card fade-out" style="--color: #B259E9">
						<div class="icon">
							<i class="far fa-file-video"></i>
						</div>

						<p>Video Editing</p>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="ekskul-card fade-out" style="--color: #FF65E6">
						<div class="icon">
							<i class="fas fa-mobile-alt"></i>
						</div>

						<p>Mobile Dev</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped>

.ekskul-card {
	display: flex;
	justify-content: flex-start;
	align-items: center;
	width: 100%;
	height: 70px;
	background-color: white;
	margin-bottom: 1rem;
	border: none;
	border-left: 4px solid var(--color);
}

.ekskul-card p {
	color: gray !important;
	font-weight: bold;
	margin: 0;
}

.ekskul-card .icon {
	display: flex;
	justify-content: center;
	width: 35%;
	color: var(--color);
	font-size: 2.5rem;
}

@keyframes fade {
    100% {
        opacity: 1;
    }
}

@media only screen and (max-width: 995px) {
	.ekskul-card .icon {
		width: 25%;
	}

	.col-lg-3 {
		width: 50%;
		flex: 0 0 50%;
	}
}

@media only screen and (max-width: 600px) {
	.ekskul-card .icon {
		width: 35%;
	}
}

@media only screen and (max-width: 500px) {
	.ekskul-card p {
		font-size: 1rem;
	}

	.col-lg-3 {
		width: 100%;
		flex: 0 0 100%;
	}
}

</style>