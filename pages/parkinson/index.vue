<script setup>
import Layout from '@/layouts/Layout'
import PageHeader from '@/components/PageHeader'
import CarouselPosts from '@/components/carousels/CarouselPosts'
import CarouselLinks from '@/components/carousels/CarouselLinks'
import FetchError from '@/components/FetchError'

const config = useRuntimeConfig()

const { data, pending, error } = await useFetch(`${config.public.API_URL}/options/parkinson`)

const {
  posts_row_21: row21,
  posts_row_22: row22
} = data.value

</script>

<template>
  <Layout>
		<PageHeader bg="prod-inbrija"  title="ENFERMEDAD <br>DE PARKINSON" />

    <section class="bg-pink-50 pt-16 pb-20">
      <CarouselPosts
          v-if="row21"
          :data="row21"
          title="SIMPOSIOS"
          color="prod-inbrija" />

      <FetchError v-else/>
    </section>

    <div class="banner-inbrija">
      <div class="container-inbrija">
        <img src="/img/products/inbrija/hero-product-2.webp" alt="Inbrija"/>
        <a href="/tratamientos/inbrija/resumen/">
          Conoce sus beneficios para profesionales sanitarios y pacientes
        </a>
      </div>
    </div>

    <section class="banner banner-patient">

      <div class="max-w-5xl mx-auto px-6">
        <h3 class="text">PARA <strong>TUS PACIENTES</strong></h3>
      </div>

      <CarouselLinks
				v-if="row22"
				:data="row22"
				class="text-white" />

      <FetchError v-else/>

    </section>

  </layout>
</template>

<style scoped></style>
