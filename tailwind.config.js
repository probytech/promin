import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
	content: [
		"./resources/**/*.blade.php",
		"./resources/**/*.js",
		"./resources/**/*.vue",
	],
	theme: {
		colors: {
			black: "#0D0D0D",
			white: "#FFFFFF",
			primary: "#1467E5",
			"light-primary": "#1467e522",
			hover: "#10408A",
			background: "#141414",
			stroke: "#D2D2D2",
			"light-grey": "#D2D2D2",
			"light-bg": "#F1F0F0",
			grey: "#989898",
			transparent: "transparent",
			red: "#FF4242",
			green: "#6ef559",
		},
		extend: {
			fontFamily: {
				sans: ["Nunito Sans", "sans-serif"],
				inter: ["Inter", "sans-serif"],
			},
			container: {
				center: true,
				padding: {
					DEFAULT: "1rem",
					md: "3.75rem",
					"2xl": "7.5rem",
				},
			},
		},
	},
	plugins: [forms],
};
