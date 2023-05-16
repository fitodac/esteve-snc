<script setup>
const date = new Date()

const classLink = `leading-none inline-block select-none hover:text-purple`

const logos = [
	{
		idx: `logo-${Math.floor(Math.random() * 1000000).toString()}`,
		img: '/img/footer/esteve-sistema-nervioso-central.webp',
		alt: 'Esteve Sistema Nervicoso Central',
		link: '#'
	},
	{
		idx: `logo-${Math.floor(Math.random() * 1000000).toString()}`,
		img: '/img/footer/inbrija.webp',
		alt: 'Inbrija',
		link: '#'
	},
	{
		idx: `logo-${Math.floor(Math.random() * 1000000).toString()}`,
		img: '/img/footer/xeristar.webp',
		alt: 'Xeristar',
		link: '#'
	},
	{
		idx: `logo-${Math.floor(Math.random() * 1000000).toString()}`,
		img: '/img/footer/alzerta.webp',
		alt: 'Alzerta',
		link: '#'
	},
	{
		idx: `logo-${Math.floor(Math.random() * 1000000).toString()}`,
		img: '/img/footer/alzerta-dos-por-semana.webp',
		alt: 'Alzerta parche transdermico - 2 por semana',
		link: '#'
	}
]
</script>

<template>
  <div class="border-t border-stone-100 leading-tight text-center px-6 py-14 2xl:px-0">
		<div class="container mx-auto">
			<div class="grid gap-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

				<div 
					v-for="prod in logos"
					:key="prod.idx"
					class="space-y-3">
					<img 
						:src="prod.img" 
						:alt="prod.alt"
						class="h-14 mx-auto object-contain">
					<div>
						<NuxtLink :href="prod.link" class="">Ficha técnica</NuxtLink>
					</div>
				</div>

			</div>
		</div>
	</div>

	<section class="bg-stone-50 text-sm pt-14 pb-20 px-6 2xl:px-0">
		<div class="container mx-auto">
			<div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-12">

				<div class="lg:col-span-3 xl:col-span-2">
					<h4 class="font-bold">Canal Esteve SNC</h4>

					<ul class="mt-2">
						<li><NuxtLink href="/depresion-ansiedad" :class="classLink">Depresión y ansiedad</NuxtLink></li>
						<li><NuxtLink href="/alzheimer-demencia" :class="classLink">Enfermedad de Alzheimer y Demencia</NuxtLink></li>
						<li><NuxtLink href="/parkinson" :class="classLink">Enfermedad de Parkinson</NuxtLink></li>
						<li><NuxtLink href="/tratamientos" :class="classLink">Tratamientos</NuxtLink></li>
						<li><NuxtLink href="/pacientes" :class="classLink">Para tus pacientes</NuxtLink></li>
						<li><NuxtLink href="/ponentes" :class="classLink">Para Ponentes</NuxtLink></li>
					</ul>
				</div>


				<div class="lg:col-span-3 xl:col-span-2">
					<h4 class="font-bold">Productos</h4>

					<ul class="mt-2">
						<li><NuxtLink href="/tratamientos/inbrija" :class="classLink">Inbrija</NuxtLink></li>
						<li><NuxtLink href="/tratamientos/xeristar" :class="classLink">Xeristar</NuxtLink></li>
						<li><NuxtLink href="/tratamientos/azerta" :class="classLink">Alzerta</NuxtLink></li>
						<li><NuxtLink href="/tratamientos/alzerta-dos-por-semana" :class="classLink">Alzerta - Dos por semana</NuxtLink></li>
					</ul>
				</div>


				<div class="lg:col-span-2">
					<h4 class="font-bold">Legal</h4>

					<ul class="mt-2">
						<li><NuxtLink href="//google.com" target="_blank" :class="classLink">Privacidad</NuxtLink></li>
						<li><NuxtLink href="//google.com" target="_blank" :class="classLink">Política de cookies</NuxtLink></li>
						<li><NuxtLink href="//google.com" target="_blank" :class="classLink">Aviso legal</NuxtLink></li>
						<li><NuxtLink href="//google.com" target="_blank" :class="classLink">Contacto</NuxtLink></li>
					</ul>
				</div>



				<div class="lg:col-span-4 xl:col-span-6">
					<h4 class="font-bold">Última actualización XXXXXXXX  |  © 1996-{{ date.getFullYear() }} Esteve</h4>

					<div class="text-xs">
						El Sitio Web pone a disposición del usuario, únicamente para la búsqueda de, 
						y acceso a, contenidos y servicios disponibles en Internet, hiperenlaces o 
						dispositivos técnicos de enlace, que permiten al usuario el acceso a sitios 
						web o portales de Internet pertenecientes a, o gestionados por, terceros 
						(los "Sitios Web de Terceros"). Los Sitios Web de Terceros referidos anteriormente 
						no están bajo el control de Esteve y, en consecuencia, Esteve (o cualesquiera 
						sociedades pertenecientes al grupo al que pertenece Esteve) no es responsable 
						del contenido y servicios de ninguno de los Sitios Web de Terceros.<br>
						Estos Sitios Web de Terceros se proporcionan únicamente para informarle sobre la 
						existencia de otras fuentes de información sobre un tema concreto y la inclusión 
						de un enlace en el presente Sitio Web no implica la aprobación de los Sitios 
						Web de Terceros por parte de Esteve.
					</div>
				</div>

			</div>
		</div>
	</section>
</template>

<style scoped></style>
