<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
	type: String,
	required: true,
});

const input = ref(null);

defineProps({
	type: { type: String },
	id: {
		type: String,
		default: "text",
	},
	required: { type: Boolean },
	autofocus: { type: Boolean },
	autocomplete: { type: String },
	placeholder: { type: String },
	border: {
		type: Boolean,
		default: false,
	},
	readonly: {
		type: Boolean,
		default: false,
	},
});
const showPassword = ref(false);

onMounted(() => {
	if (input.value.hasAttribute("autofocus")) {
		input.value.focus();
	}
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
	<div class="relative border-0 !border-b border-stroke">
		<input
			class="focus:ring-0 px-3 py-2.5 text-button w-full border-none outline-none"
			v-model="model"
			:type="showPassword ? 'text' : type"
			ref="input"
			:placeholder="placeholder"
			:id="id"
			:required="required"
			:autofocus="autofocus"
			:autocomplete="autocomplete"
			:readonly="readonly"
			:class="{ 'bg-light-bg': readonly }"
		/>
		<svg
			v-if="type == 'password' && !showPassword"
			@click="showPassword = !showPassword"
			class="w-5 h-5 absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer"
			width="20"
			height="20"
			viewBox="0 0 20 20"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
		>
			<path
				d="M10 4.375C3.75 4.375 1.25 10 1.25 10C1.25 10 3.75 15.625 10 15.625C16.25 15.625 18.75 10 18.75 10C18.75 10 16.25 4.375 10 4.375Z"
				stroke="#4A4A4A"
				stroke-width="1.25"
				stroke-linecap="round"
				stroke-linejoin="round"
			/>
			<path
				d="M10 13.125C11.7259 13.125 13.125 11.7259 13.125 10C13.125 8.27411 11.7259 6.875 10 6.875C8.27411 6.875 6.875 8.27411 6.875 10C6.875 11.7259 8.27411 13.125 10 13.125Z"
				stroke="#4A4A4A"
				stroke-width="1.25"
				stroke-linecap="round"
				stroke-linejoin="round"
			/>
			<clipPath>
				<rect width="20" height="20" fill="white" />
			</clipPath>
		</svg>
		<svg
			v-if="showPassword"
			@click="showPassword = !showPassword"
			class="w-5 h-5 absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer"
			width="20"
			height="20"
			viewBox="0 0 20 20"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
		>
			<path
				d="M3.75 3.125L16.25 16.875"
				stroke="#4A4A4A"
				stroke-width="1.5"
				stroke-linecap="round"
				stroke-linejoin="round"
			/>
			<path
				d="M12.1026 12.3123C11.4893 12.8698 10.6796 13.1609 9.8517 13.1215C9.02376 13.0821 8.24538 12.7154 7.6878 12.1021C7.13023 11.4888 6.83913 10.6791 6.87854 9.85115C6.91795 9.02321 7.28465 8.24483 7.89796 7.68726"
				stroke="#4A4A4A"
				stroke-width="1.5"
				stroke-linecap="round"
				stroke-linejoin="round"
			/>
			<path
				d="M10.5879 6.93042C11.2523 7.05765 11.8574 7.39702 12.3124 7.89755C12.7675 8.39808 13.0478 9.03274 13.1113 9.7062"
				stroke="#4A4A4A"
				stroke-width="1.5"
				stroke-linecap="round"
				stroke-linejoin="round"
			/>
			<path
				d="M16.298 13.2109C18.0012 11.6859 18.7504 10 18.7504 10C18.7504 10 16.2504 4.37501 10.0004 4.37501C9.45916 4.37427 8.91878 4.41817 8.38477 4.50626"
				stroke="#4A4A4A"
				stroke-width="1.5"
				stroke-linecap="round"
				stroke-linejoin="round"
			/>
			<path
				d="M5.78125 5.35938C2.59609 6.97188 1.25 10 1.25 10C1.25 10 3.75 15.625 10 15.625C11.4645 15.6365 12.9106 15.2991 14.2188 14.6406"
				stroke="#4A4A4A"
				stroke-width="1.5"
				stroke-linecap="round"
				stroke-linejoin="round"
			/>
			<clipPath>
				<rect width="20" height="20" fill="white" />
			</clipPath>
		</svg>
	</div>
</template>
