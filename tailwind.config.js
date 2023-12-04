import forms from "@tailwindcss/forms";
const colors = require("tailwindcss/colors");
/** @type {import('tailwindcss').Config} */
export default {
	content: [
		"./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
		"./storage/framework/views/*.php",
		"./resources/views/**/*.blade.php",
		"./resources/**/*.blade.php",
		"./resources/**/*.js",
		"./resources/**/*.vue",
	],

	theme: {
		colors: {
			transparent: "transparent",
			current: "currentColor",
			black: colors.black,
			blue: colors.blue,
			cyan: colors.cyan,
			emerald: colors.emerald,
			fuchsia: colors.fuchsia,
			slate: colors.slate,
			gray: colors.gray,
			neutral: colors.neutral,
			stone: colors.stone,
			green: colors.green,
			indigo: colors.indigo,
			lime: colors.lime,
			orange: colors.orange,
			pink: colors.pink,
			purple: colors.purple,
			red: colors.red,
			rose: colors.rose,
			sky: colors.sky,
			teal: colors.teal,
			violet: colors.violet,
			yellow: colors.amber,
			white: colors.white,
			text: "var(--text)",
			background: "var(--background)",
			primary: "var(--primary)",
			secondary: "var(--secondary)",
			accent: "var(--accent)",
			'light-grey': "rgba(0, 0, 0, 0.03)",
		},
		fontSize: {
			sm: "0.750rem",
			base: "1rem",
			xl: "1.333rem",
			"2xl": "1.777rem",
			"3xl": "2.369rem",
			"4xl": "3.158rem",
			"5xl": "4.210rem",
		},
		fontFamily: {
			heading: "Tienne",
			body: "Poppins",
		},
		fontWeight: {
			normal: "400",
			medium: "500",
			semibold: "600",
			bold: "700",
		},
	},

	plugins: [forms, require("@tailwindcss/aspect-ratio"), require("@tailwindcss/typography")],
};
