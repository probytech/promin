import vue from "@vitejs/plugin-vue";
import path from "path";

export default {
	plugins: [
		vue({
			template: {
				transformAssetUrls: {
					base: null,
					includeAbsolute: false,
				},
			},
		}),
	],
	build: {
		assetsDir: "",
		rollupOptions: {
			input: ["resources/js/app.js", "resources/css/app.css"],
			output: {
				entryFileNames: "[name].js",
				chunkFileNames: "[name].js",
				assetFileNames: "[name].[ext]",
			},
		},
	},
	resolve: {
		alias: {
			"@": "/resources/js",
			"ziggy-js": path.resolve("vendor/tightenco/ziggy"),
		},
	},
};
