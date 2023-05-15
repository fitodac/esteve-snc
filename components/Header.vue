<script setup>
import { ref } from 'vue'
import { useWindowSize } from '@vueuse/core'
import gsap from 'gsap'


const { path } = useRoute()
const win_size = useWindowSize()
const menu_status = ref(false)

const props = defineProps({
	navbarColor: String
})

if( win_size.width.value <= 768 ){
	gsap.set('#mainNavbar', { 
		height: 0,
		overflow: 'hidden'
	})
}


const navbarToggler = () => {
	if( !menu_status.value ){
		gsap.to('#mainNavbar', { height: 'auto', duration: .3 })
		menu_status.value = true
	}else{
		gsap.to('#mainNavbar', { height: 0, duration: .3 })
		menu_status.value = false
	}
}

</script>


<template>
<header id="mainHeader" :class="navbarColor">

	<!-- TOPBAR -->
	<div id="mainHeader--topbar">
		<ul class="nav">
			<li>
				<NuxtLink 
					href="/"
					class="nav-link">Registro</NuxtLink>
			</li>

			<li class="border-l border-white border-opacity-60 h-4 pl-2">
				<NuxtLink 
					href="/"
					class="nav-link">Iniciar sesión</NuxtLink>
			</li>

			<li class="border-l border-white border-opacity-60 h-4 pl-2">
				<NuxtLink 
					href="/"
					class="nav-link">Contacto</NuxtLink>
			</li>

			<li class="pl-2">
				<NuxtLink 
					href="/"
					class="nav-button">
					Para ponentes
				</NuxtLink>
			</li>
		</ul>
	</div>
	<!-- TOPBAR end -->



	<!-- Main header -->
	<div 
		class="flex justify-between items-center pl-16 pr-6 py-3.5 
		sm:pt-2 md:justify-center md:pt-6 md:pb-0">
		<h1 v-if="'/' === path">
			<img 
				:src="navbarColor === 'dark' ? `/img/brand.svg` : `/img/brand-white.svg`" 
				alt="Canal Esteve SNC"
				class="w-full h-full">
				<span class="sr-only">Canal Esteve SNC</span>
		</h1>

		<div v-else>
			<NuxtLink href="/" class="">
			<img 
				:src="navbarColor === 'dark' ? `/img/brand.svg` : `/img/brand-white.svg`" 
				alt="Canal Esteve SNC"
				class="w-full h-full">
			<span class="sr-only">Canal Esteve SNC</span>
			</NuxtLink>
		</div>


		<button 
			class="navbar-toggler text-white h-8 w-8 grid place-content-center
			dark:text-purple md:hidden"
			@click="navbarToggler">
			<i v-if="!menu_status" class="ri-menu-3-line text-2xl leading-none"></i>
			<i v-if="menu_status" class="ri-arrow-up-line text-2xl leading-none"></i>
		</button>
	</div>
	<!-- Main header end -->



	<!-- Main navbar -->
	<div id="mainNavbar">
		<div class="container mx-auto pt-5">
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
			class="border-t space-y-2 pt-2 mx-6 select-none pb-6 
			md:hidden">
				<li>
					<NuxtLink 
						href="/"
						class="text-sm leading-none">Registro</NuxtLink>
				</li>

				<li class="">
					<NuxtLink 
						href="/"
						class="text-sm leading-none">Iniciar sesión</NuxtLink>
				</li>

				<li class="">
					<NuxtLink 
						href="/"
						class="text-sm leading-none">Contacto</NuxtLink>
				</li>

				<li class="">
					<NuxtLink 
						href="/"
						class="bg-purple text-white text-sm px-4 py-1.5 rounded-lg">
						Para ponentes
					</NuxtLink>
				</li>
			</ul>
		</div>
	</div>
	<!-- Main navbar -->




	<div class="w-16 left-0 top-[-1px] absolute md:w-[134px] md:h-[115px]">
		<img 
			src="/img/corner.svg" 
			alt="Esteve"
			class="w-full h-full object-cover">
	</div>

</header>
</template>