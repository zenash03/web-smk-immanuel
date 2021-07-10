<template>
	<div>
		<Nav></Nav>

		<header>
			<div class="container">
				<div class="row">
					<div class="hide-text col-lg-4 pt-5">
						<h4 class="header-title">SMK Kristen Immanuel</h4>

						<button type="button" class="button-primary">Explore More</button>
					</div>

					<div class="col-lg-8">
						<div class="rect"></div>
					</div>
				</div>
			</div>
		</header>
	</div>
</template>

<script>
import Nav from '@/components/Nav.vue'

export default {
	components: {
		Nav
	}
}
</script>