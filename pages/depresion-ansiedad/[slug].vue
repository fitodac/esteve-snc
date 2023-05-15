<script setup>
import { reactive } from 'vue'
import Layout from '@/layouts/Layout'

import PageTitle from '@/components/blocks/PageTitle.vue'
import Hero from '@/components/blocks/Hero.vue'
import Heading from '@/components/blocks/Heading.vue'
import Paragraph from '@/components/blocks/Paragraph.vue'
import Spacer from '@/components/blocks/Spacer.vue'


const config = useRuntimeConfig()
const { params } = useRoute()
const router = useRouter()
// const post = reactive({})
const blocks = reactive([])
const {data, pending, error } = await useAsyncData(() => $fetch( `${config.API_URL}/posts/?slug=${params.slug}`) );


if( !pending.value ){
	console.log('cargando datos')

	if( error.value ){
		console.log('Se ha productido un error')
	}else{
		if( !data.value.length ) router.push('/error404')
		// Object.assign(post, data.value[0])
		// Object.assign(blocks, data.value[0].blocks.filter(e => e.blockName))
		Object.assign(blocks, data.value[0].blocks)
	}
}

console.log('blocks', blocks)
</script>

<template>
	<Layout>
		<section 
			class="bg-pink text-white px-6 pb-0 md:pt-60 md:-mt-48 xl:px-0">
		</section>

		<section 
			v-for="block in blocks"
			:key="`block-${Math.floor(Math.random() * 1000000).toString()}`"
			:ref="block.blockName"
			class="wp-block px-6 2xl:px-0"
			:class="block.attrs.className">

			<PageTitle v-if="'acf/page-title' === block.blockName" :data="block.attrs"/>
			<Hero v-if="'acf/hero' === block.blockName" :data="block.attrs"/>
			<Heading v-if="'core/heading' === block.blockName" :data="block"/>
			<Paragraph v-if="'core/paragraph' === block.blockName" :data="block.innerContent"/>
			<Spacer v-if="'core/spacer' === block.blockName" :data="block" />
		</section>
	</Layout>
</template>

<style scoped>
.wp-block.is-style-default{ @apply bg-pink; }
.wp-block.is-style-blue{ @apply bg-navy; }
.wp-block.is-style-purple{ @apply bg-prod-inbrija; }
</style>