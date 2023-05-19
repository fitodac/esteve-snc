<script setup>
import { reactive } from 'vue'
import Slider from './CarouselLayout'
import Image from './carousel_image'
import BtnIconDownload from '../ButtonIconDownload'
import sliderProps from '@/composables/sliderProps'
import getImage from '@/composables/getImage'

const props = defineProps({...sliderProps})
const posts = reactive([])
props.data.forEach(async e => {
	const image = await getImage(e.image)
	posts.push({...e, image})
})
</script>


<template>
	<div class="">
		<Slider :data="data">
			<swiper-slide 
				v-for="p in posts" 
				:key="Math.floor(Math.random() * 1000000).toString()">

				<Image :src="p.image.src" :alt="p.image.alt" />

				<h3 class="text-lg font-medium leading-tight mt-3" v-html="p.title" />
				<div class="mt-6">
					<nuxt-link 
						:to="p.file.url" 
						target="_blank"
						class="inline-flex transition-all hover:opacity-80">
						<BtnIconDownload />
					</nuxt-link>
				</div>

			</swiper-slide>

			<swiper-slide></swiper-slide>
		</Slider>
	</div>
</template>