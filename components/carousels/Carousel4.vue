<script setup>
import Slider from './CarouselLayout'

defineProps({ data: Array })
</script>


<template>
	<div class="">
		<Slider :data="data">
			<swiper-slide 
				v-for="p in data" 
				:key="Math.floor(Math.random() * 1000000).toString()">

				<div class="bg-slate-100 w-full h-32 rounded-lg"></div>
				<h3 class="text-lg font-medium leading-tight mt-3" v-html="p.title" />
				<div class="mt-6">
					<nuxt-link 
						:to="p.file.url" 
						target="_blank"
						class="inline-flex transition-all hover:opacity-80">
						<img src="/img/icon-download.svg" alt="Icono de descarga" class="w-8 h-8">
					</nuxt-link>
				</div>

			</swiper-slide>
		</Slider>
	</div>
</template>