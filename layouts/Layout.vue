<script setup>
import Header from '@/components/Header'
import Footer from '@/components/Footer'

defineProps({
	navbarColor: String
})
</script>

<template>
  <div>
		<Header :navbarColor="navbarColor ?? ''"/>
    <slot />
		<Footer />
  </div>
</template>

<style scoped>

</style>

