<script setup>
import { ref, watch } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/layouts/AppLayout.vue";
import Button from "@/components/buttons/Button.vue";
import InputLabel from "@/components/inputs/InputLabel.vue";
import TextInput from "@/components/inputs/TextInput.vue";
import InputError from "@/components/inputs/InputError.vue";
import Select from "@/components/inputs/Select.vue";
import Checkbox from "../../components/inputs/Checkbox.vue";
import Fields from "./fields/Fields.vue";
import Pluralize from "@/mixins/Pluralize";

const props = defineProps({
	collection: Object,
});

const form = useForm(props.collection);

watch(
	() => form.title,
	(title) => {
		form.table_name = Pluralize.slugify(Pluralize.plural(title));
		form.model = Pluralize.singular(
			Pluralize.slugify(title, { lowercase: false, delimiter: "" })
		);
	}
);

const changeFields = (event) => {
	event.fields.value.forEach((element, key) => {
		element.id = key;
	});

	form.fields = event.fields;
};
</script>

<template>
	<AppLayout>
		<Head title="Edit Collection" />

		<Link
			:href="route('promin.builder.collections')"
			class="text-primary flex items-center mb-4"
		>
			<svg
				class="w-3 h-3 mr-2"
				width="11"
				height="11"
				viewBox="0 0 11 11"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					d="M10.5 5.925C10.5 6.03546 10.4105 6.125 10.3 6.125H2.89167L6.24191 9.47525C6.32002 9.55335 6.32002 9.67998 6.24191 9.75809L5.64142 10.3586C5.56332 10.4367 5.43668 10.4367 5.35858 10.3586L0.641421 5.64142C0.563316 5.56332 0.563317 5.43668 0.641421 5.35858L5.35858 0.641421C5.43668 0.563316 5.56332 0.563316 5.64142 0.641421L6.24191 1.24191C6.32002 1.32002 6.32002 1.44665 6.24191 1.52476L2.89167 4.875H10.3C10.4105 4.875 10.5 4.96454 10.5 5.075V5.925Z"
					fill="#4945FF"
				/>
			</svg>
			Go back
		</Link>

		<div class="flex justify-between mb-10">
			<div class="text-3xl text-black uppercase font-black">
				Edit <span class="text-primary">{{ collection.title }}</span> Collection
			</div>
			<Button variant="primary">Save</Button>
		</div>

		<div
			class="bg-white w-full p-8 rounded-xl grid grid-cols-2 gap-y-4 gap-x-8 mb-10"
		>
			<div class="col-span-1">
				<InputLabel class="mb-1">Title</InputLabel>

				<TextInput
					id="title"
					class="block w-full !border border-stroke"
					v-model="form.title"
					required
					placeholder="Menu title (used for menu item)"
				/>

				<InputError class="mt-2" :message="form.errors.title" />
			</div>

			<div class="col-span-1">
				<InputLabel class="mb-1">Table name</InputLabel>

				<TextInput
					id="table_name"
					class="block w-full !border border-stroke"
					v-model="form.table_name"
					required
					placeholder="ex. books or products (used to generate DB table)"
					readonly
				/>

				<InputError class="mt-2" :message="form.errors.table_name" />
			</div>

			<div class="col-span-1">
				<InputLabel class="mb-1">Model name</InputLabel>

				<TextInput
					id="model"
					class="block w-full !border border-stroke"
					v-model="form.model"
					required
					placeholder="ex. Book or Product (used to generate Eloquent model)"
					readonly
				/>

				<InputError class="mt-2" :message="form.errors.model" />
			</div>

			<div class="col-span-1"></div>

			<div class="col-span-1">
				<InputLabel class="mb-1">Dropdown</InputLabel>

				<Select
					:options="[
						{
							value: 0,
							label: 'None',
						},
						{
							value: 1,
							label: 'Pages',
						},
					]"
					v-model="form.dropdown_id"
					placeholder="Dropdown"
				/>

				<InputError class="mt-2" :message="form.errors.dropdown_id" />
			</div>

			<div class="col-span-1">
				<InputLabel class="mb-1">Sort</InputLabel>

				<TextInput
					id="sort"
					type="number"
					class="block w-full !border border-stroke"
					v-model="form.sort"
					required
					placeholder="Sort in menu"
				/>

				<InputError class="mt-2" :message="form.errors.sort" />
			</div>

			<div class="col-span-2">
				<InputLabel class="mb-1">Is dev</InputLabel>

				<Checkbox v-model="form.is_dev"></Checkbox>
			</div>
		</div>

		<Fields :fields="form.fields" @change="changeFields" />
	</AppLayout>
</template>
