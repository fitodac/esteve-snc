<script setup>
import { onMounted } from 'vue'
import { register } from 'swiper/element/bundle'

register()

const props = defineProps({ data: Array })

// console.log('data', props.data)

const slider_id = `slider-${Math.floor(Math.random() * 1000000).toString()}`

onMounted(() => {
	const slider = document.getElementById(slider_id)
	console.log('slider', slider)

	Object.assign(slider, {
		slidesPerView: 1,
		breakpoints: {
			620: {
				slidesPerView: 2
			},
			700: {
				slidesPerView: 3,
				centeredSlides: props.data.length > 2 ? true : false
			}
		},
		spaceBetween: 20,
	})

	slider.initialize()
})
</script>


<template>
	<swiper-container 
		init="false" 
		:id="slider_id"
		class="mx-6 mt-6">
		<slot />
	</swiper-container>
</template>