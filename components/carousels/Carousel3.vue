<script setup>
import Slider from './CarouselLayout'
import Image from './carousel_image'
import BtnIconLink from '../ButtonIconLink'
import sliderProps from '@/composables/sliderProps'

defineProps({...sliderProps})
</script>


<template>
	<div class="">
		<Slider :data="data" :title="title">
			<swiper-slide 
				v-for="p in data" 
				:key="Math.floor(Math.random() * 1000000).toString()"
				class="max-w-[320px]">

				<Image :src="p.post.featured_image" :alt="p.post.title" />

				<h3 class="text-lg font-medium leading-tight mt-3" v-html="p.post.post_title" />
				<div class="text-sm leading-tight mt-4">{{ p.post.post_excerpt }}</div>
				
				<div class="mt-6">
					<nuxt-link 
						:to="`/depresion-ansiedad/${p.post.post_name}`" 
						class="inline-flex transition-all hover:opacity-80">
						<BtnIconLink />
					</nuxt-link>
				</div>

			</swiper-slide>

			<swiper-slide></swiper-slide>
		</Slider>
	</div>
</template>