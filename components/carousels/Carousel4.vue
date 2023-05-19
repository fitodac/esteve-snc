<script setup>
import Slider from './CarouselLayout'
import BtnIconDownload from '../ButtonIconDownload'
import sliderProps from '@/composables/sliderProps'

defineProps({...sliderProps})
</script>


<template>
	<div class="">
		<Slider :data="data" :title="title">
			<swiper-slide 
				v-for="p in data" 
				:key="Math.floor(Math.random() * 1000000).toString()">

				<div class="bg-slate-100 w-full rounded-lg">
					<div class="h-40 aspect-video"></div>
				</div>
				<h3 class="text-lg font-medium leading-tight mt-3" v-html="p.post.post_title" />
				<div class="">{{ p.post.excerpt }}</div>
				<!-- <div class="mt-6">
					<nuxt-link 
						:to="p.file.url" 
						target="_blank"
						class="inline-flex transition-all hover:opacity-80">
						<BtnIconDownload />
					</nuxt-link>
				</div> -->

			</swiper-slide>
			
			<swiper-slide></swiper-slide>
		</Slider>
	</div>
</template>