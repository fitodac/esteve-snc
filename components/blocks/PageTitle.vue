<script setup>
defineProps({
	data: Object
})
</script>

<template>
	<div class="container mx-auto">
		<div class="text-white py-20">
			<p v-if="data.data.small_title">{{ data.data.small_title }}</p>
			<h2 v-if="data.data.page_title" class="text-4xl font-bold select-none">{{ data.data.page_title }}</h2>
			<h3 v-if="data.data.intro">{{ data.data.intro }}</h3>
		</div>
	</div>
	<!-- <pre>{{ data }}</pre> -->
</template>