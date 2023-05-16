<script setup>
defineProps({
	data: Object
})
</script>

<template>
	<div class="px-6 2xl:px-0">
		<div class="container max-w-5xl mx-auto">
			<div v-html="data.innerHTML" />
		</div>
	</div>
</template>