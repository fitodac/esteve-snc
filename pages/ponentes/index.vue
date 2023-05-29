<script setup>
import Layout from '@/layouts/Layout'
import PageHeader from '@/components/PageHeader'
import CarouselPosts from '@/components/carousels/CarouselPosts'
import CarouselFiles from '@/components/carousels/CarouselFiles'
import FetchError from '@/components/FetchError'
import ModalPassword from '@/components/ModalPassword'

const config = useRuntimeConfig()

const {data, pending, error } = await useAsyncData(() => $fetch(`${config.public.API_URL}/options/ponentes`) );

if( error.value ) console.log(`Error: ${error.value}`)

const {
	posts_row_16: row16,
	posts_row_17: row17,
	posts_row_18: row18,
	posts_row_19: row19,
	posts_row_20: row20
} = data.value
</script>

<template>
	<Layout>
		<PageHeader
		bg="purple-dark"
		title="
		<p class='text-4xl font-bold md:text-4xl md:leading-none lg:text-5xl'>PARA PONENTES</p>
		<p class='text-xl leading-tight font-light mt-2 lg:text-2xl'>Acceso exclusivo para ponentes de formaciones para la actualización científica</p>
		" />


		<section class="py-14">
			<CarouselFiles
			v-if="row16"
			:data="row16"
			title="PROYECTO PADEAN/CASOS CLÍNICOS:"
			subtitle="FORMACIÓN PARA EL MÉDICO DE AP"
			color="pink" />

			<FetchError v-else/>
		</section>


		<section class="bg-pink-50 pt-16 pb-20">
			<CarouselFiles
			v-if="row17"
			:data="row17"
			title="APSAM:"
			subtitle="INTERCONSULTA ENTRE ATENCIÓN PRIMARIA Y PSIQUIATRÍA PARA EL ABORDAJE DE LA SALUD MENTAL"
			color="pink" />

			<FetchError v-else/>
		</section>


		<section class="py-14">
			<CarouselPosts
			v-if="row18"
			:data="row18"
			title="PSIQUIACTUAL"
			subtitle="PROYECTO DE ACTUALIZACIÓN PROFESIONAL Y DEBATE DE TEMAS CANDENTES EN PSIQUIATRÍA"
			color="pink" />

			<FetchError v-else/>
		</section>


		<section class="bg-pink-50 pt-16 pb-20">
			<CarouselFiles
			v-if="row19"
			:data="row19"
			title="XERIMEETINGS"
			color="pink" />

			<FetchError v-else/>
		</section>


		<section class="py-14">
			<CarouselFiles
			v-if="row20"
			:data="row20"
			title="MEET ALZHEIMER PROGRAM"
			color="soft-blue" />

			<FetchError v-else/>
		</section>

	</layout>
	<teleport to="body">
		<ModalPassword />
	</teleport>
</template>

<style scoped></style>
