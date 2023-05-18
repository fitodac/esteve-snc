<script setup>
import { ref, onMounted } from 'vue'
import { register } from 'swiper/element/bundle'

import Layout from '@/layouts/Layout'
import Carousel1 from '@/components/carousels/Carousel1'
import Carousel2 from '@/components/carousels/Carousel2'
import Carousel3 from '@/components/carousels/Carousel3'
import Carousel4 from '@/components/carousels/Carousel4'

register()
const config = useRuntimeConfig()
const row3 = ref([])
const row4 = ref([])
const row5 = ref([])
const row6 = ref([])

const {data, pending, error } = await useAsyncData(() => $fetch(`${config.API_URL}/options/depresion-ansiedad`) );

if( !pending.value ){
	console.log('cargando datos...')

	if( error.value ){
		console.log('Se ha productido un error')
	}else{
		if( Object.keys(data.value).length ){
			row3.value = [...data.value.posts_row_3]
			row4.value = [...data.value.posts_row_4]
			row5.value = [...data.value.posts_row_5]
			row6.value = [...data.value.posts_row_6]
		}
	}
}


onMounted(() => {
	const slider1 = document.getElementById('slider1')

	Object.assign(slider1, {
		slidesPerView: 1,
		breakpoints: {
			620: {
				slidesPerView: 2
			},
			700: {
				slidesPerView: 3,
				centeredSlides: row3.value.length > 2 ? true : false
			}
		},
		spaceBetween: 20,
	})

	slider1.initialize()
})

// console.log('data', row4.value)
</script>

<template>
  <Layout>
		<section 
			class="bg-pink bg-[url('/img/bg-page-header.svg')] bg-no-repeat bg-right-top bg-70vw 
			text-white px-6 pb-20
			md:pt-60 md:-mt-48
			xl:px-0">
			<div class="container mx-auto">
				<h1 class="text-6xl font-bold leading-none md:text-5xl md:leading-none lg:text-6xl">
					DEPRESIÓN <br>Y ANSIEDAD
				</h1>
				<h2 class="sr-only"></h2>
			</div>
		</section>


		<section class="pt-20">
			<div class="px-6 2xl:px-0">
				<div class="container mx-auto">
					<h3 class="section-title text-pink">Newsletter Depression & Anxiety Today</h3>
				</div>
			</div>

			<Carousel1 v-if="row3.length" :data="row3" />
		</section>


		<section class="pt-20">
			<div class="px-6 2xl:px-0">
				<div class="container mx-auto">
					<h3 class="section-title text-pink">Casos clínicos Parean para atención primaria</h3>
				</div>
			</div>

			<Carousel2 v-if="row4.length" :data="row4" />
		</section>


		<section class="px-6 pt-20 2xl:px-0">
			<div class="container mx-auto">
				<h3 class="section-title text-pink">
					Hablemos de psiquiatría legal
				</h3>

				<div class="mt-6">
					<img src="img/hablemos-de-psiquiatria-banner.webp" alt="Banner sobre Hablemos de psiquiatría legal">

					<div class="mt-5">
						<h4 class="text-xl leading-tight fonr-semibold">Implicaciones legales en la práctica psiquiátrica diaria</h4>
						<p class="mt-3">Iniciativa enfocada a solucionar dudas y consultas sobre implicaciones legales en la práctica clínica diaria en psiquiatría.</p>
						<div class="mt-8">
							<nuxt-link 
								to="https://estevepsiquiatrialegal.es/" 
								target="_blank"
								class="inline-flex transition-all hover:opacity-80">
								<img src="/img/icon-link-diagonal.svg" alt="Icono de descarga" class="w-8 h-8">
							</nuxt-link>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="px-6 pt-20 2xl:px-0">
			<div class="container mx-auto">
				<h3 class="section-title text-pink">
					Webinars
				</h3>
			</div>
		</section>


		<section class="px-6 pt-20 2xl:px-0">
			<div class="container mx-auto">
				<h3 class="section-title text-pink">
					Curso DE&CO
				</h3>
			</div>
		</section>


		<section class="px-6 pt-20 2xl:px-0">
			<div class="container mx-auto">
				<h3 class="section-title text-pink">
					Artículos
				</h3>
			</div>
		</section>

  </layout>
</template>

<style scoped></style>
