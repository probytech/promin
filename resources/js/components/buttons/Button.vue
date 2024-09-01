<script setup>
import { Link } from "@inertiajs/vue3";
import PrimaryButton from "./PrimaryButton.vue";

defineProps({
	variant: {
		type: String,
	},
	type: {
		type: String,
	},
	href: {
		type: String,
	},
	blank: {
		type: Boolean,
		default: false,
	},
	atag: {
		type: Boolean,
		default: false,
	},
});
</script>

<template>
	<button
		v-if="type == 'button' || type == 'submit'"
		class="flex items-stretch group"
	>
		<PrimaryButton v-if="variant == 'primary'">
			<slot />
		</PrimaryButton>
	</button>
	<a
		v-else-if="href && blank"
		:href="href"
		target="_blank"
		class="flex items-stretch group cursor-pointer"
	>
		<PrimaryButton v-if="variant == 'primary'">
			<slot />
		</PrimaryButton>
	</a>
	<a
		v-else-if="atag"
		:href="href"
		class="flex items-stretch group cursor-pointer"
	>
		<PrimaryButton v-if="variant == 'primary'">
			<slot />
		</PrimaryButton>
	</a>
	<Link
		v-else-if="href"
		:href="href"
		class="flex items-stretch group cursor-pointer"
	>
		<PrimaryButton v-if="variant == 'primary'">
			<slot />
		</PrimaryButton>
	</Link>
	<div v-else class="flex items-stretch group cursor-pointer">
		<PrimaryButton v-if="variant == 'primary'">
			<slot />
		</PrimaryButton>
	</div>
</template>
