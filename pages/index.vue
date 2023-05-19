<script setup>
import Layout from '@/layouts/Layout'
import Hero from '@/components/Hero'

const config = useRuntimeConfig()
const {data, pending, error } = await useAsyncData(() => $fetch(`${config.API_URL}/options/home`) );
// console.log('data', data)
</script>

<template>
  <Layout navbarColor="dark">
		
		<Hero />
		<!-- <img src="/img/hero.webp" alt=""> -->

		<section class="px-6 pt-20 2xl:px-0">
			<div class="container mx-auto">
				<h3 class="section-title text-pink">
					Depresión y ansiedad
				</h3>
			</div>
		</section>


		<section class="px-6 pt-20 2xl:px-0">
			<div class="container mx-auto">
				<h3 class="section-title text-navy">
					Enfermedad de Alzheimer
				</h3>
			</div>
		</section>

		
		<section class="px-6 pt-20 2xl:px-0">
			<div class="container mx-auto">
				<h3 class="section-title text-aqua">
					Para tus pacientes
				</h3>
			</div>
		</section>

  </Layout>
</template>

<style scoped>

</style>
