<script setup>
import Checkbox from "@/components/inputs/Checkbox.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import EditIcon from "../../icons/EditIcon.vue";
import DeleteIcon from "../../icons/DeleteIcon.vue";
import CopyIcon from "../../icons/CopyIcon.vue";

defineProps({
	columns: Array,
	items: Object,
	route: {
		type: String,
		required: true,
	},
	routeKey: {
		type: String,
		required: true,
	},
	copiable: {
		type: Boolean,
		default: false,
	},
});

const offset = ref(10);
const offsets = [10, 25, 50, 100];
</script>

<template>
	<div class="w-full">
		<table class="w-full bg-white">
			<thead>
				<th class="py-5 px-6 border-b border-stroke text-left">
					<Checkbox></Checkbox>
				</th>
				<th
					class="py-5 px-6 border-b border-stroke text-sm uppercase text-grey text-left"
					v-for="column in columns"
				>
					{{ column.title }}
				</th>
				<th
					class="py-5 px-6 border-b border-stroke text-sm uppercase text-grey"
				></th>
			</thead>
			<tbody>
				<tr v-for="item in items.data">
					<td class="py-4 px-6">
						<Checkbox></Checkbox>
					</td>
					<td class="py-4 px-6 text-left" v-for="column in columns">
						{{ item[column.key] }}
					</td>
					<td class="py-4 px-6">
						<div class="flex items-center justify-end gap-2">
							<Link class="p-2" :href="route + '/' + item[routeKey]">
								<EditIcon class="w-4 h-4" />
							</Link>
							<div class="p-2" v-if="copiable">
								<CopyIcon class="w-4 h-4" />
							</div>
							<div class="p-2">
								<DeleteIcon class="w-4 h-4" />
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>

		<div
			v-if="items.links.length > 3"
			class="flex items-center justify-between mt-8"
		>
			<div class="text-sm text-grey flex items-center">
				<div class="mr-2 relative group">
					<div class="bg-white px-2 py-1 rounded-md">{{ offset }}</div>
					<div
						class="absolute top-full left-0 pt-2 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto duration-300"
					>
						<div class="bg-white shadow-lg rounded-md">
							<div
								class="px-2 py-1 cursor-pointer"
								@click="offset = offsetItem"
								v-for="offsetItem in offsets"
							>
								{{ offsetItem }}
							</div>
						</div>
					</div>
				</div>
				Entries per page
			</div>
			<div class="flex">
				<template v-for="(link, key) in items.links">
					<div
						v-if="link.url === null"
						class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
						v-html="link.label"
					/>
					<Link
						v-else
						class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
						:class="{ 'bg-white': link.active }"
						:href="link.url"
						v-html="link.label"
					/>
				</template>
			</div>
		</div>
	</div>
</template>
