<script setup>
import Header from "@/Components/Inc/Header.vue";
import Footer from "@/Components/Inc/Footer.vue";
</script>

<template>
	<div class="flex flex-col min-h-[100vh]">
		<Header class="mb-12 lg:mb-16" />

		<div class="w-full flex-1">
			<slot />
		</div>

		<Footer />
	</div>
</template>
