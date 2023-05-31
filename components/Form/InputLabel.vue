<script setup>
defineProps(['value']);
</script>

<template>
	<label class="block font-medium text-sm text-fuchsia-800">
		<span v-if="value">{{ value }}</span>
		<span v-else><slot /></span>
	</label>
</template>


<style scoped>
label{
	@apply text-fuchsia-800 leading-none font-bold;
}
</style>