<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "../layouts/AppLayout.vue";
import DataTable from "../components/app/table/DataTable.vue";
import Button from "../components/buttons/Button.vue";

defineProps({
	collection: Object,
	items: Object,
	columns: Array,
});
</script>

<template>
	<AppLayout>
		<Head :title="collection.title" />

		<div class="flex justify-between mb-10">
			<div class="text-3xl text-black uppercase font-black">
				{{ collection.title }}
			</div>
			<Button variant="primary">Add new</Button>
		</div>

		<DataTable
			:columns="columns"
			:items="items"
			copiable
			:route="
				route('promin.collections.index', collection.table_name) + '/edit'
			"
			route-key="id"
		/>
	</AppLayout>
</template>
