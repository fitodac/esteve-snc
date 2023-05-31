<script setup>
import { ref, onMounted } from 'vue'
import { useWindowSize } from '@vueuse/core'
import gsap from 'gsap'

const { path } = useRoute()
const win_size = useWindowSize()
const menu_status = ref(false)
const logo_classname = 'w-24 h-full lg:w-32'

const props = defineProps({ navbarColor: String })

const navbarToggler = totop => {
	if( !menu_status.value ){
		gsap.to('#mainNavbar', { height: 'auto', duration: .3 })
		menu_status.value = true
	}else{
		gsap.to('#mainNavbar', { height: 0, duration: .3 })
		menu_status.value = false
	}

	if( totop ) window.scrollTo({ top: 0, behavior: 'smooth' })
}

if( win_size.width.value <= 768 ){
	menu_status.value = true
	navbarToggler()
}

const ntcn_base = 'navbar-toggler text-white h-8 w-8 ml-6 grid place-content-center transition-all dark:text-purple md:hidden'
const ntcn = ref(ntcn_base)

onMounted(() => {
	window.addEventListener('resize', () => {
		const _w = window.innerWidth
		menu_status.value = _w <= 768 ? true : false
		navbarToggler()
	})

	window.addEventListener('scroll', () => {
		ntcn.value = window.scrollY >= 85 ? `${ntcn_base} bg-purple fixed right-3 top-3 p-6 rounded-full z-10 dark:text-white` : ntcn_base
	})
})
</script>


<template>
<header id="mainHeader" :class="navbarColor">

	<!-- TOPBAR -->
	<div id="mainHeader--topbar">

		<div class="lg:flex-1">
			<h1 v-if="'/' === path">
				<img 
					:src="navbarColor === 'dark' ? `/img/brand.svg` : `/img/brand-white.svg`" 
					alt="Canal Esteve SNC"
					:class="logo_classname">
					<span class="sr-only">Canal Esteve SNC</span>
			</h1>

			<div v-else>
				<NuxtLink href="/" class="">
				<img 
					:src="navbarColor === 'dark' ? `/img/brand.svg` : `/img/brand-white.svg`" 
					alt="Canal Esteve SNC"
					:class="logo_classname">
				<span class="sr-only">Canal Esteve SNC</span>
				</NuxtLink>
			</div>
		</div>

		<div class="flex justify-end">
			<ul class="nav">
				<li>
					<NuxtLink 
						href="/registro"
						class="nav-link">Registro</NuxtLink>
				</li>

				<li class="border-l border-white border-opacity-60 h-4 pl-2">
					<NuxtLink 
						href="/login"
						class="nav-link">Iniciar sesión</NuxtLink>
				</li>

				<li class="border-l border-white border-opacity-60 h-4 pl-2">
					<NuxtLink 
						href="/contacto"
						class="nav-link">Contacto</NuxtLink>
				</li>

				<li class="pl-2">
					<NuxtLink 
						href="/ponentes"
						class="nav-button">
						Para ponentes
					</NuxtLink>
				</li>
			</ul>

			<button 
				:class="ntcn"
				@click="navbarToggler(true)">
				<i v-if="!menu_status" class="ri-menu-3-line text-2xl leading-none"></i>
				<i v-if="menu_status" class="ri-arrow-up-line text-2xl leading-none"></i>
			</button>
		</div>
	</div>
	<!-- TOPBAR end -->


	<!-- Main navbar -->
	<div id="mainNavbar">
		<div class="container mx-auto">
			<nav id="mainMenu">

				<div class="menu-item">
					<NuxtLink href="/depresion-ansiedad" class="menu-link">
						Depresión y Ansiedad
					</NuxtLink>
				</div>

				<div class="menu-item">
					<NuxtLink	href="/alzheimer-demencia" class="menu-link">
						Enfermedad de Alzheimer y Demencia
					</NuxtLink>
				</div>

				<div class="menu-item">
					<NuxtLink href="/parkinson" class="menu-link">
						Enfermedad de Parkinson
					</NuxtLink>
				</div>

				<div class="menu-item">
					<NuxtLink href="/tratamientos" class="menu-link">
						Tratamientos
					</NuxtLink>
				</div>

				<div class="menu-item">
					<NuxtLink href="/pacientes" class="menu-link">
						Para tus pacientes
					</NuxtLink>
				</div>

			</nav>

			<ul 
			class="border-t space-y-3 px-3 pt-6 mx-6 select-none pb-6 
			md:hidden">
				<li>
					<NuxtLink 
						href="/"
						class="text-white font-medium leading-none">Registro</NuxtLink>
				</li>

				<li class="">
					<NuxtLink 
						href="/"
						class="text-white font-medium leading-none">Iniciar sesión</NuxtLink>
				</li>

				<li class="">
					<NuxtLink 
						href="/"
						class="text-white font-medium leading-none">Contacto</NuxtLink>
				</li>

				<li class="pt-2">
					<NuxtLink 
						href="/"
						class="bg-purple text-white px-10 pt-2 pb-2.5 inline-block rounded-lg">
						Para ponentes
					</NuxtLink>
				</li>
			</ul>
		</div>
	</div>
	<!-- Main navbar -->




	<div class="w-16 left-0 top-[-1px] absolute md:w-[100px] md:h-[85px] lg:w-[134px] lg:h-[115px]">
		<img 
			src="/img/corner.svg" 
			alt="Esteve"
			class="w-full h-full object-cover">
	</div>

</header>
</template>