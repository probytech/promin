<script setup>
import InputLabel from "@/components/inputs/InputLabel.vue";
import TextInput from "@/components/inputs/TextInput.vue";
import Modal from "./Modal.vue";
import { ref } from "vue";

defineProps({
	show: Boolean,
	field: Object,
});

const emptyField = ref({
	title: "",
	db_title: "",
	is_translatable: 0,
	is_required: 0,
	is_visible: 1,
	is_show_in_list: 0,
	type: "text",
});

const emit = defineEmits(["close"]);
</script>

<template>
	<Modal :show="show" :closeable="true" @close="emit('close')">
		<div class="text-2xl uppercase font-bold mb-6">
			<span v-if="field">
				Edit field <span class="text-primary">{{ field.title }}</span>
			</span>
			<span v-else>Add <span class="text-primary">new</span> field</span>
		</div>

		<div class="flex flex-col gap-4">
			<div>
				<InputLabel class="mb-1">Title</InputLabel>
				<TextInput
					id="title"
					class="block w-full !border border-stroke"
					v-model="emptyField.title"
					required
					placeholder="Field title"
				/>
			</div>
			<div>
				<InputLabel class="mb-1">Column name</InputLabel>
				<TextInput
					id="db_title"
					class="block w-full !border border-stroke"
					v-model="emptyField.db_title"
					required
					placeholder="Field database column name"
				/>
			</div>
		</div>
	</Modal>
</template>
