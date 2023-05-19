<script setup>
import { ref } from 'vue'

defineProps({ src: String, alt: String })

const loading = ref(true)

const imageLoaded = el => loading.value = false
</script>

<template>
<div class="w-full">

	<figure v-if="src" class="relative aspect-video">
		<img 
			:src="src" 
			:alt="alt"
			class="w-full aspect-video object-cover rounded-xl"
			@load="imageLoaded">
		
		<div 
			v-if="loading"
			class="w-full h-full grid place-content-center top-0 absolute rounded-xl">
			<i class="border-4 border-gray-200 border-l-pink w-6 h-6 block rounded-full animate-spin"></i>
		</div>
	</figure>


	<div 
		v-else 
		class="bg-pink-200 text-pink-100 grid place-content-center aspect-video rounded-xl opacity-50">
		<i class="ri-camera-off-fill text-4xl"></i>
	</div>

</div>
</template>