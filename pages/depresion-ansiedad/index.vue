<script setup>
import { ref, reactive, onMounted } from 'vue'
import { register } from 'swiper/element/bundle'

import Layout from '@/layouts/Layout'
import Carousel1 from '@/components/carousels/Carousel1'
import Carousel2 from '@/components/carousels/Carousel2'
import Carousel3 from '@/components/carousels/Carousel3'
import Carousel4 from '@/components/carousels/Carousel4'
import BtnIconDiagonal from '@/components/ButtonIconDiagonal'
import BtnIconLink from '@/components/ButtonIconLink'

register()
const config = useRuntimeConfig()
const row3 = ref([])
const row4 = ref([])
const row5 = ref([])
const row6 = ref([])

const b1 = ref(false)
const banners_loading = reactive({
	banner1: false,
	banner2: false,
})
const bannerLoaded = n => {
	// const l = {...banners_loading}
	// l[n] = true
	// Object.assign()
	console.log('banners_loading', n, banners_loading)
	banners_loading[n] = true
}

const {data, pending, error } = await useAsyncData(() => $fetch(`${config.API_URL}/options/depresion-ansiedad`) );

if( !pending.value ){
	console.log('cargando datos...')

	if( error.value ){
		console.log('Se ha productido un error:', error)
	}else{
		if( Object.keys(data.value).length ){
			row3.value = [...data.value.posts_row_3]
			row4.value = [...data.value.posts_row_4]
			row5.value = [...data.value.posts_row_5]
			row6.value = [...data.value.posts_row_6]
		}

		// console.log(row6.value)
	}
}
</script>

<template>
  <Layout>
		<section 
			class="bg-pink bg-[url('/img/bg-page-header.svg')] bg-no-repeat bg-right-top bg-70vw 
			text-white px-6 pb-20
			md:pt-60 md:-mt-48
			xl:px-0">
			<div class="max-w-5xl mx-auto">
				<h1 class="text-6xl font-bold leading-none md:text-5xl md:leading-none lg:text-6xl">
					DEPRESIÓN <br>Y ANSIEDAD
				</h1>
				<h2 class="sr-only"></h2>
			</div>
		</section>


		<section class="py-14">
			<Carousel1 v-if="row3.length" :data="row3" title="Newsletter Depression & Anxiety Today" />
		</section>


		<section class="bg-pink-100 pt-16 pb-20">
			<Carousel2 v-if="row4.length" :data="row4" title="Casos clínicos Parean para atención primaria" />
		</section>


		<section class="px-6 py-20 2xl:px-0">
			<div class="max-w-5xl mx-auto">
				<h3 class="section-title text-pink">Hablemos de psiquiatría legal</h3>

				<div class="max-w-sm mt-6 md:grid md:grid-cols-2 md:gap-x-10 md:max-w-full">
					<div class="">
						<img 
							src="img/hablemos-de-psiquiatria-banner.webp" 
							alt="Banner sobre Hablemos de psiquiatría legal"
							class="aspect-video">
					</div>

					<div class="mt-5 md:mt-0">
						<h4 class="text-xl font-bold leading-tight lg:text-2xl lg:leading-tight">Implicaciones legales en la práctica psiquiátrica diaria</h4>
						<p class="leading-tight mt-3 lg:text-lg lg:leading-tight">Iniciativa enfocada a solucionar dudas y consultas sobre implicaciones legales en la práctica clínica diaria en psiquiatría.</p>
						
						<div class="mt-10">
							<nuxt-link 
								to="https://estevepsiquiatrialegal.es/" 
								target="_blank"
								class="inline-flex transition-all hover:opacity-80">
								<BtnIconDiagonal />
							</nuxt-link>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="bg-pink-100 pt-16 pb-20">
			<Carousel3 v-if="row5.length" :data="row5" title="Webinars" />
		</section>


		<section class="px-6 py-20 2xl:px-0">
			<div class="max-w-5xl mx-auto">
				<h3 class="section-title text-pink">Curso DE&CO</h3>

				<div class="max-w-sm mt-6 md:grid md:grid-cols-2 md:gap-x-10 md:max-w-full">
					<div class="">
						<img 
							src="img/de&co.webp" 
							alt="Banner sobre Hablemos de psiquiatría legal"
							class="aspect-video">
					</div>

					<div class="mt-5 md:mt-0">
						<h4 class="text-xl font-bold leading-tight lg:text-2xl lg:leading-tight">DE&CO: Formación<br>en Depresión y Comorbilidades</h4>
						<p class="leading-tight mt-3 lg:text-lg lg:leading-tight">Programa formativo en el que se valora la depresión como una entidad que puede asociarse con otras patologías, como otros trastornos de la salud mental o enfermedades neurodegenerativas, así como su relación con el dolor y su abordaje en poblaciones especiales</p>

						<div class="mt-10">
							<nuxt-link 
								to="https://estevepsiquiatrialegal.es/" 
								target="_blank"
								class="inline-flex transition-all hover:opacity-80">
								<BtnIconLink />
							</nuxt-link>
						</div>
					</div>
				</div>

				<div class="max-w-4xl grid gap-8 mt-10 select-none md:grid-cols-2 md:gap-10 lg:ml-10">
					<div class="grid gap-x-10 sm:flex sm:items-center md:items-start">
						<div 
							class="text-xs leading-tight order-2 sm:text-sm sm:leading-tight lg:pt-2">
							Con el aval científico de la Sociedad Española de Psiquiatría
						</div>
						<div class="w-32 md:w-56 lg:w-32">
							<img 
								src="img/logo-sociedad-espanola-de-psiquiatria.webp" 
								alt="Sociedad Española de Psiquiatría"
								class="h-20 mx-auto object-contain">
						</div>
					</div>

					<div class="grid gap-x-10 sm:flex sm:items-center md:items-start">
						<div 
							class="text-xs leading-tight order-2 sm:text-sm sm:leading-tight lg:pt-2">
							Con el aval científico de la Sociedad Española de Psiquiatría Biológica
						</div>
						<div class="w-32 md:w-56 lg:w-32">
							<img 
								src="img/logo-sociedad-espanola-de-psiquiatria-biologica.webp" 
								alt="Sociedad Española de Psiquiatría Biológica"
								class="h-20 mx-auto object-contain">
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="bg-pink-100 pt-16 pb-20">
			<Carousel4 v-if="row6.length" :data="row6" title="Artículos" />
		</section>

  </layout>
</template>

<style scoped></style>
