<script setup>
const button_class = 'text-white text-center font-medium px-8 py-4 flex-1 rounded-lg transition-all hover:opacity-80'
</script>


<template>
<section 
	class="px-6 bg-no-repeat bg-left bg-cover 
	md:bg-[url('/img/hero-lg.gif')] 
	xl:bg-[#100023] 
	2xl:px-0 2xl:bg-contain 2xl:bg-right">

	<div class="max-w-6xl mx-auto">
		<div class="md:w-1/2 md:py-20 lg:w-6/12 lg:py-28 xl:w-7/12 xl:py-36">

			<img 
				src="/img/hero-sm.webp" 
				alt="2 Cabezas piensan más que una"
				class="mt-6 md:hidden">

			<img 
				src="/img/brand-white.svg" 
				alt="Esteve SNC"
				class="w-40 hidden md:block lg:w-48">
			
			<h2 class="text-3xl font-bold leading-none mt-4 select-none md:mt-5 xl:text-6xl">
				<span class="text-aqua block">Porque dos cabezas</span>
				<span class="text-purple block">piensan más que una,</span>
			</h2>

			<h3 class="text-2xl mt-3 md:text-white">
				<strong>ESTEVE</strong> está siempre contigo
			</h3>

			<div class="mt-6 flex gap-x-5 max-w-md lg:mt-14">
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
					Iniciar sesión
				</NuxtLink>
			</div>

		</div>
	</div>

</section>

<section class="px-6 mt-12 md:-mt-10 lg:-mt-16 2xl:px-0">
	<div class="max-w-6xl mx-auto">
		<div 
			class="bg-purple text-white text-xl text-center max-w-md px-14 py-10 mx-auto rounded-2xl 
			md:max-w-full md:text-xl md:py-8 md:px-32">
			<p>
				Descubre aquí nuevos <strong>conocimientos</strong>, <strong>recursos</strong> útiles para tu práctica diaria e <strong>información de tratamientos</strong> para que nunca dejes de avanzar en el cuidado de las personas.
			</p>
		</div>
	</div>
</section>
</template>