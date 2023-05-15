<script setup>
defineProps({
	data: Object
})
</script>

<template>
	<div v-html="data.innerHTML" />
	<!-- <pre>{{ data }}</pre> -->
</template>