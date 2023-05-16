<script setup>
import { reactive } from 'vue'
import Layout from '@/layouts/Layout'

import PageTitle from '@/components/blocks/PageTitle.vue'
import Hero from '@/components/blocks/Hero.vue'
import Heading from '@/components/blocks/Heading.vue'
import Paragraph from '@/components/blocks/Paragraph.vue'
import Spacer from '@/components/blocks/Spacer.vue'
import List from '@/components/blocks/List.vue'


const config = useRuntimeConfig()
const { params } = useRoute()
const router = useRouter()
// const post = reactive({})
const blocks = reactive([])
const {data, pending, error } = await useAsyncData(() => $fetch(`${config.API_URL}/posts/?slug=${params.slug}`) );


if( !pending.value ){
	console.log('cargando datos...')

	if( error.value ){
		console.log('Se ha productido un error')
	}else{
		if( !data.value.length ) router.push('/error404')
		// Object.assign(post, data.value[0])
		// Object.assign(blocks, data.value[0].blocks.filter(e => e.blockName))

		const _blocks = [...data.value[0].blocks.filter(e => e.blockName)]

		_blocks.forEach((e,i) => {
			let c = 'wp-block-'

			switch(e.blockName){
				case 'acf/page-title': 	c += 'page-title'; break;
				case 'acf/hero': 				c += 'hero'; break;
				case 'core/heading': 		c += 'heading'; break;
				case 'core/paragraph': 	c += 'paragraph'; break;
				case 'core/spacer': 		c += 'spacer'; break;
				case 'core/list': 			c += 'list'; break;
			}

			if( e.attrs.className ){
				_blocks[i].attrs.className += ` ${c}`
			}else{
				_blocks[i].attrs.className = c
			}
		})

		Object.assign(blocks, _blocks)
	}
}

// console.log('blocks', blocks)
</script>


<template>
	<Layout>
		<section 
			class="bg-pink text-white px-6 pb-0 md:pt-60 md:-mt-48 xl:px-0">
		</section>


		<div class="post-content pb-40">
			<section 
				v-for="block in blocks"
				:key="`block-${Math.floor(Math.random() * 1000000).toString()}`"
				:ref="block.blockName"
				class="wp-block"
				:class="block.attrs.className">

				<PageTitle v-if="'acf/page-title' === block.blockName" :data="block"/>
				<Hero v-if="'acf/hero' === block.blockName" :data="block"/>
				<Heading v-if="'core/heading' === block.blockName" :data="block"/>
				<Paragraph v-if="'core/paragraph' === block.blockName" :data="block"/>
				<Spacer v-if="'core/spacer' === block.blockName" :data="block" />
				<List v-if="'core/list' === block.blockName" :data="block" />
			</section>
		</div>
	</Layout>
</template>


<style scoped>
.wp-block{
	position: relative;
}
</style>