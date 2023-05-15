<script setup>
defineProps({
	data: Object
})

let className = ``
</script>

<template>
	<div class="">
	<div v-html="data.innerHTML" />
	</div>
</template>