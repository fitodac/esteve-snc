/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [],
  theme: {
    extend: {
			colors: {
				prod: {
					purple: {
						500: '#937EAB',
						DEFAULT: '#9A0079'
					},
					treatments: {
						DEFAULT: '#280245',
						'blue-light': '#7DA1C4'
					},
					xeristar: '#ED6F82',
					inbrija: {
						500: '#7C6991',
						DEFAULT: '#3E1647',
						yellow: '#F9C606'
					}
				}
			}
		},
  },
  plugins: [],
}

