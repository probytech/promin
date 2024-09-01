<script setup>
import ArrowUpRightIcon from "../icons/ArrowUpRightIcon.vue";
</script>

<template>
	<div
		class="inline-flex flex-1 items-center justify-center h-10 px-4 py-2 bg-primary border border-primary rounded-full text-base text-white group-hover:lg:bg-hover group-hover:lg:border-hover focus:outline-none transition ease-in-out duration-300"
	>
		<slot />
	</div>
	<div
		class="group-hover:lg:bg-hover group-hover:lg:border-hover duration-300 bg-primary w-10 h-10 flex items-center justify-center rounded-full"
	>
		<div class="arrow-up-right w-5 h-5">
			<ArrowUpRightIcon
				class="arrow-up-right-first w-5 h-5 duration-300 flex-shrink-0"
			/>
			<ArrowUpRightIcon
				class="arrow-up-right-second w-5 h-5 duration-300 flex-shrink-0"
			/>
		</div>
	</div>
</template>
