<script setup>
import Sidebar from "../components/app/Sidebar.vue";
</script>

<template>
	<main class="flex flex-1 min-h-screen">
		<Sidebar />

		<div class="flex-1 h-auto px-16 py-8">
			<slot />
		</div>
	</main>
</template>
