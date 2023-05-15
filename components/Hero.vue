<script setup>
const button_class = 'text-white text-center font-medium px-8 py-2.5 flex-1 rounded-lg transition-all hover:opacity-80'
</script>


<template>
<section class="px-6 bg-no-repeat bg-left bg-cover md:bg-[url('/img/hero-lg.webp')] 2xl:px-0">
	<div class="container mx-auto">
		<div class="md:w-1/2 md:py-20 lg:w-6/12 lg:py-28 xl:w-5/12">

			<img 
				src="/img/hero-sm.webp" 
				alt="2 Cabezas piensan más que una"
				class="mt-6 md:hidden">

			<img 
				src="/img/brand-white.svg" 
				alt="Esteve SNC"
				class="w-40 hidden md:block">
			
			<h2 class="text-5xl font-bold leading-none mt-4 select-none md:mt-5">
				<span class="text-aqua block">Porque dos cabezas</span>
				<span class="text-purple block">piensan más que una,</span>
			</h2>

			<h3 class="text-2xl mt-3 md:text-white">
				<strong>ESTEVE</strong> está siempre contigo
			</h3>

			<div class="mt-7 flex gap-x-5">
				<NuxtLink 
					href="/registro"
					class="bg-aqua"
					:class="button_class">
					Registro
				</NuxtLink>

				<NuxtLink 
					href="/login"
					class="bg-purple"
					:class="button_class">
					Iniciar sessión
				</NuxtLink>
			</div>

		</div>
	</div>
</section>
</template>