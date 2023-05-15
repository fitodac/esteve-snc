<script setup>
import Loader from '@/components/Loader'

const nuxtApp = useNuxtApp()
const loading = ref(false)

nuxtApp.hook("page:start", () => {
	loading.value = true
})

nuxtApp.hook("page:finish", () => {
	setTimeout(() => {
		loading.value = false
	}, 2000)
})
</script>


<template>
  <div>
		<NuxtLayout>
			<Loader v-if="loading" />
			<NuxtPage />
		</NuxtLayout>
  </div>
</template>