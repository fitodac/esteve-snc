<script setup>
import '@/css/header/header.scss'


defineProps({
	navbarColor: String
})
</script>


<template>
<header 
	id="mainHeader"
	class="inset-x-0 top-0 absolute subpixel-antialiased z-20">
	<!-- 
	:class="{
		'header-treatments': 'Products/Treatments' === page.component.value,
		'header-xeristar': 'Products/Xeristar' === page.component.value,
		'header-inbrija': 'Products/Inbrija' === page.component.value,
	}"> 
	-->

	<div class="w-16 left-0 top-[-1px] absolute md:w-[134px] md:h-[115px]">
		<img 
			:src="`${base_url}/img/corner.svg`" 
			alt="Esteve"
			class="w-full h-full object-cover">
	</div>


	<!-- TOPBAR -->
	<div class="hidden px-6 pt-3 justify-end items-center sm:flex">
		<ul class="text-sm leading-none whitespace-nowrap flex items-center gap-x-2 select-none">
			<li>
				<NuxtLink 
					href="/"
					class="text-white">Registro</NuxtLink>
			</li>

			<li class="border-l border-white border-opacity-60 h-4 pl-2">
				<NuxtLink 
					href="/"
					class="text-white">Iniciar sesión</NuxtLink>
			</li>

			<li class="border-l border-white border-opacity-60 h-4 pl-2">
				<NuxtLink 
					href="/"
					class="text-white">Contacto</NuxtLink>
			</li>

			<li class="pl-2">
				<NuxtLink 
					href="/"
					class="bg-prod-purple text-white text-sm px-5 pt-1 
									pb-1.5 block rounded-lg transition-all
									hover:opacity-80">
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
		<NuxtLink 
			:href="route('home')"
			class="w-24 block sm:w-32">
			<img 
				:src="`${base_url}/img/brand-white.svg`" 
				alt="Canal Esteve SNC"
				class="w-full h-full">
		</NuxtLink>

		<button 
			class="navbar-toggler text-white h-8 w-8 grid place-content-center
						md:hidden"
			@click="toggleNavbar">
			<i class="ri-menu-3-line text-2xl leading-none"></i>
			<i class="ri-arrow-up-line text-2xl leading-none hidden"></i>
		</button>
	</div>
	<!-- Main header end -->


	<div 
		id="mainNavbar"
		class="bg-prod-purple h-0 inset-x-0 absolute overflow-hidden
						md:bg-transparent md:h-auto md:relative md:overflow-visible">

		<!-- Main menu -->
		<div class="">
			<div class="container global mt-5 mb-3">
				<nav 
					class="text-white leading-none max-w-4xl mx-auto 
									grid gap-y-3 select-none
									md:grid md:grid-cols-5">
					
					<div 
						class="text-center px-3 py-1 flex items-center 
										justify-center">
						<NuxtLink
							href="/"
							class="opacity-90 transition-all hover:opacity-100">
							Depresión y Ansiedad
						</NuxtLink>
					</div>

					<div 
						class="text-center px-3 md:border-l md:border-white md:border-opacity-50 
										py-1 flex items-center justify-center">
						<NuxtLink	
							href="/"
							class="opacity-90 transition-all hover:opacity-100">
							Enfermedad de Alzheimer y Demencia
						</NuxtLink>
					</div>

					<div 
						class="text-center px-3 md:border-l md:border-white md:border-opacity-50 
										py-1 flex items-center justify-center">
						<NuxtLink
							href="/"
							class="opacity-90 transition-all hover:opacity-100">
							Enfermedad de Parkinson
						</NuxtLink>
					</div>

					<div 
						class="active text-center px-3 md:border-l md:border-white md:border-opacity-50 
										py-1 flex items-center justify-center">
						<NuxtLink
							:href="route('products.treatments')"
							class="opacity-90 transition-all hover:opacity-100">
							Tratamientos
						</NuxtLink>
					</div>

					<div 
						class="text-center px-3 md:border-l md:border-white md:border-opacity-50 
										py-1 flex items-center justify-center">
						<NuxtLink
							href="/"
							class="opacity-90 transition-all hover:opacity-100">
							Para tus pacientes
						</NuxtLink>
					</div>
				</nav>
			</div>
		</div>
		<!-- Main menu end -->


		<!-- Products sub-menu -->
		<div 
			v-if="showSubmenu"
			class="bg-black bg-opacity-20 py-7 
								md:bg-prod-purple md:bg-opacity-100 md:py-3">
			<div class="container global">
				<nav 
					class="text-white text-sm leading-none max-w-4xl 
									mx-auto grid justify-center gap-7 
									select-none
									md:flex">
					
					<div class="text-center">
						<NuxtLink
							:href="route('products.inbrija.summary')"
							class="transition-all"
							:class="{'submenu-active': 'Products/Inbrija' === page.component.value}">
							INBRIJA (<em>Parkinson</em>)
						</NuxtLink>
					</div>

					<div class="text-center">
						<NuxtLink
							href="/"
							class="transition-all">
							ALZERTA (<em>Alzheimer</em>)
						</NuxtLink>
					</div>

					<div class="text-center">
						<NuxtLink
							href="/"
							class="transition-all">
							ALZERTA DOS POR SEMANA (<em>Alzheimer</em>)
						</NuxtLink>
					</div>

					<div 
						class="text-center"
						:class="{'submenu-active': 'Products/Xeristar' === page.component.value}">
						<NuxtLink
							:href="route('products.xeristar')"
							class="transition-all">
							XERISTAR (<em>Depresión y Ansiedad</em>)
						</NuxtLink>
					</div>

				</nav>
			</div>
		</div>
		<!-- Products sub-menu end -->

		<!-- Products secondary sub-menu -->
		<div 
			v-if="Object.keys(productsNavbar).length"
			class="bg-white py-2 hidden md:block">
			<div class="container global">
				<nav class="flex justify-center gap-x-10">
					<NuxtLink 
						v-for="(item, key) in productsNavbar"
						:key="item.idx"
						:href="submenuHashed ? `#${key}` : route(key)"
						class="text-sm font-medium relative transition-all select-none hover:text-gray-500"
						:class="{'subnav-active': menu_active === key }">
						{{ item.text }}
					</NuxtLink>
				</nav>
			</div>
		</div>
		<!-- Products secondary sub-menu end -->

	</div>
</header>
</template>



<style lang="scss" scoped>
.header-treatments{
	.active::after{ 
		border-bottom-color: white;
		border-left-color: transparent;
		border-right-color: transparent;
		border-top-color: transparent;
	}
}

.header-xeristar,
.header-inbrija{
	.active::after{ 
		@apply border-prod-purple;
		border-left-color: transparent;
		border-right-color: transparent;
		border-top-color: transparent;
	}
}


.header-inbrija .subnav-active::after{
	@apply border-prod-inbrija;
	border-left-color: transparent;
	border-right-color: transparent;
	border-top-color: transparent;
}


@media (min-width: 768px){
	.active,
	.subnav-active{
		@apply relative;
	}

	.active::after{
		content: '';
		border-style: solid;
		border-width: 12px 15px;
		width: 0;
		height: 0;
		bottom: -.75rem;
		position: absolute;
	}

	.subnav-active::after{
		content: '';
		border-style: solid;
		border-width: 12px 15px;
		width: 0;
		height: 0;
		margin-left: -12px;
		left: 50%;
		bottom: -.5rem;
		position: absolute;
	}


	.submenu-active{
		@apply relative;
	}

	.submenu-active::after{
		content: '';
		border-style: solid;
		border-width: 10px 12px;
		width: 0;
		height: 0;
		margin-left: -5px;
		border-left-color: transparent;
		border-right-color: transparent;
		border-top-color: transparent;
		border-bottom-color: white;
		left: 50%;
		bottom: -.75rem;
		position: absolute;
	}
}

</style>
