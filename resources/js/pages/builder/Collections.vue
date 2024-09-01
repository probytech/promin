<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "@/layouts/AppLayout.vue";
import DataTable from "@/components/app/table/DataTable.vue";
import Button from "@/components/buttons/Button.vue";
import { ref } from "vue";

// const menuItem = ref({
// 	title: '',
// 	table_name: '',
// 	is_dev: false,
// 	sort: 10,
// 	dropdown_id: 0,
// 	icon: '',
// 	fields: [],
// })

defineProps({
	collections: Object,
});
</script>

<template>
	<AppLayout>
		<Head title="Collections Builder" />

		<div class="flex justify-between mb-10">
			<div class="text-3xl text-black uppercase font-black">
				Collections <span class="text-primary">Builder</span>
			</div>
			<Button
				variant="primary"
				:href="route('promin.builder.collections.create')"
				>Add new</Button
			>
		</div>

		<DataTable
			:columns="[
				{ title: 'Title', key: 'title' },
				{ title: 'Table name', key: 'table_name' },
			]"
			:items="collections"
			:route="route('promin.builder.collections')"
			route-key="table_name"
		/>
	</AppLayout>
</template>
