import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

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
			text: "var(--text)",
			background: "var(--background)",
			primary: "var(--primary)",
			secondary: "var(--secondary)",
			accent: "var(--accent)",
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
			bold: "700",
		},
	},

	plugins: [forms],
};
