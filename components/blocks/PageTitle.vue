<script setup>
defineProps({
	data: Object
})
</script>

<template>
<div class="px-6 2xl:px-0">
	<div class="container max-w-5xl mx-auto">
		<div class="text-white pt-12 pb-20 select-none md:pt-8">
			<p 
				v-if="data.attrs.data.small_title" 
				class="tet-sm uppercase font-medium md:text-base">
				{{ data.attrs.data.small_title }}
			</p>
			
			<h2 
				v-if="data.attrs.data.page_title" 
				class="text-3xl leading-none font-bold select-none sm:text-4xl sm:leading-none md:text-4xl md:leading-none lg:text-5xl md:leading-none">
				{{ data.attrs.data.page_title }}
			</h2>
			
			<h3 
				v-if="data.attrs.data.intro"
				class="text-xl font-light leading-none mt-3 ">
				{{ data.attrs.data.intro }}
			</h3>
		</div>
	</div>
</div>
</template>