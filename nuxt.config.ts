// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
	css: [
		'remixicon/fonts/remixicon.css',
		'@/css/header.scss',
		'@/css/main.css',
	],

	modules: [
		'@nuxtjs/tailwindcss',
    '@nuxtjs/google-fonts'
	],

	googleFonts: {
		families: {
			Barlow: [300, 400, 500, 600, 700, 800, 900]
		}
	}
})