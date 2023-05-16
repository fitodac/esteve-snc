// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
	runtimeConfig: {
    public: {
      API_URL: 'https://canalestevesnc.com/api/wp-json/wp/v2',
    }
  },

	css: [
		'remixicon/fonts/remixicon.css',
		'@/css/header.scss',
		'@/css/main.scss',
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