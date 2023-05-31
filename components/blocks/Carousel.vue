<script setup>
import getImage from '@/composables/getImage'

import Slider from '@/components/carousels/CarouselLayout'
import Image from '@/components/carousels/CarouselImage'
import BtnIconLink from '@/components/ButtonIconLink'

const props = defineProps({ data: Object })

const { blocks: total, title } = props.data.attrs.data
const data = props.data.attrs.data

const imgPromise = img_id => new Promise((resolve) => resolve(getImage(img_id)))
const promises = []

for(let i = 0; i < total; i++) promises.push(imgPromise(data[`blocks_${i}_image`]))

Promise.all(promises)
	.then(resp => {
		resp.forEach((e,i) => {
			data[`blocks_${i}_image_src`] = e.src
			data[`blocks_${i}_image_alt`] = e.alt
		})
	})
	.catch(err => console.log('Error al obtener imágenes del carousel', err))

let color = 'pink'
if( props.data.attrs.className.indexOf('is-style-blue') >= 0 ) color = 'navy'
if( props.data.attrs.className.indexOf('is-style-purple') >= 0 ) color = 'purple'
</script>


<template>
<div 
	v-if="total" 
	class="px-6 pt-16 pb-28 2xl:px-0">
	<Slider :data="{length: total}" :title="title" :color="color">
		<swiper-slide 
			v-for="(n, i) in total" 
			:key="`slide-${Math.floor(Math.random() * 1000000).toString()}`"
			class="max-w-[320px]">

			<Image 
				v-if="data[`blocks_${i}_image_src`]"
				:src="data[`blocks_${i}_image_src`]" 
				:alt="data[`blocks_${i}_image_alt`]" />

			<h3 class="text-lg font-medium leading-tight mt-3">{{ data[`blocks_${i}_title`] }}</h3>
			
			<div 
				class="text-sm leading-tight mt-4">
				{{ data[`blocks_${i}_description`] }}
			</div>
			
			<div 
				v-if="data[`blocks_${i}_link`]"
				class="mt-3">
				<nuxt-link 
					:to="data[`blocks_${i}_link`]"
					:target="!parseInt(data[`blocks_${i}_target_blank`]) ? '_self' : '_blank'">
					<BtnIconLink />
				</nuxt-link>
			</div>
			
		</swiper-slide>
	</Slider>
</div>
</template>