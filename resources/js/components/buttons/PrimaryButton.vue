<script setup>
import { Link } from "@inertiajs/vue3";
import ArrowUpRight from "../icons/ArrowUpRight.vue";

defineProps({
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
		<div
			class="inline-flex flex-1 items-center justify-center h-10 px-4 py-2 bg-primary border border-primary rounded-full text-base text-white group-hover:lg:bg-hover group-hover:lg:border-hover focus:outline-none transition ease-in-out duration-300"
		>
			<slot />
		</div>
		<div
			class="group-hover:lg:bg-hover group-hover:lg:border-hover duration-300 bg-primary w-10 h-10 flex items-center justify-center rounded-full"
		>
			<div class="arrow-up-right w-5 h-5">
				<ArrowUpRight
					class="arrow-up-right-first w-5 h-5 duration-300 flex-shrink-0"
				/>
				<ArrowUpRight
					class="arrow-up-right-second w-5 h-5 duration-300 flex-shrink-0"
				/>
			</div>
		</div>
	</button>
	<a
		v-else-if="href && blank"
		:href="href"
		target="_blank"
		class="inline-flex items-center justify-center px-4 py-2 bg-primary border border-primary rounded-full text-base text-white hover:lg:bg-hover hover:lg:border-hover focus:outline-none transition ease-in-out duration-300"
	>
		<slot />
	</a>
	<a
		v-else-if="atag"
		:href="href"
		class="inline-flex items-center justify-center px-4 py-2 bg-primary border border-primary rounded-full text-base text-white hover:lg:bg-hover hover:lg:border-hover focus:outline-none transition ease-in-out duration-300"
	>
		<slot />
	</a>
	<Link
		v-else-if="href"
		:href="href"
		class="inline-flex items-center justify-center px-4 py-2 bg-primary border border-primary rounded-full text-base text-white hover:lg:bg-hover hover:lg:border-hover focus:outline-none transition ease-in-out duration-300"
	>
		<slot />
	</Link>
</template>
