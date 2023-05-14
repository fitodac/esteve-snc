/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [],
	darkMode: 'class',
  theme: {
    extend: {
			backgroundSize:{
				'70vw': '70vw auto'
			},
			backgroundPosition: {
				
			},
			colors: {
				pink: '#ED6F82',
				purple: {
					DEFAULT: '#9A0079',
					dark: '#280245'
				},
				violet: '#310057',
				aqua: '#00829B',
				soft: '#F3F0F5',
				darker: '#252B3C',
				cream: '#C2C2C2',
				navy: '#1D4289',
				prod: {
					purple: {
						500: '#937EAB',
						DEFAULT: '#9A0079'
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

