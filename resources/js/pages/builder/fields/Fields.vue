<script setup>
import { ref } from "vue";
import FieldIcon from "../../../components/icons/fields/FieldIcon.vue";
import draggable from "vuedraggable";
import EditIcon from "../../../components/icons/EditIcon.vue";
import DeleteIcon from "../../../components/icons/DeleteIcon.vue";
import Button from "@/components/buttons/Button.vue";
import FieldModal from "../../../components/modals/FieldModal.vue";

const props = defineProps({
	fields: Array,
});

const fieldsItems = ref(props.fields);

const emit = defineEmits(["change"]);

const onDraged = function () {
	emit("change", { fields: fieldsItems });
};

const isShowFieldModal = ref(false);
const fieldModal = ref(null);
const openFieldModal = (field) => {
	isShowFieldModal.value = true;
	fieldModal.value = field;
};
</script>

<template>
	<div class="w-full">
		<div class="flex justify-between mb-10">
			<div class="text-3xl uppercase font-black">Fields</div>
			<Button variant="primary" @click="openFieldModal(null)"
				>Add new field</Button
			>
		</div>

		<table class="w-full">
			<thead>
				<th
					class="py-5 px-6 border-b border-stroke bg-light-primary text-sm uppercase text-primary text-left rounded-tl-xl"
				>
					Type
				</th>
				<th
					class="py-5 px-6 border-b border-stroke bg-light-primary text-sm uppercase text-primary text-left"
				>
					Title
				</th>
				<th
					class="py-5 px-6 border-b border-stroke bg-light-primary text-sm uppercase text-primary text-left"
				>
					DB title
				</th>
				<th
					class="py-5 px-6 border-b border-stroke bg-light-primary text-sm uppercase text-primary rounded-tr-xl"
				></th>
			</thead>
			<draggable
				v-model="fieldsItems"
				item-key="id"
				tag="tbody"
				@end="onDraged"
			>
				<template #item="{ element }">
					<tr class="cursor-grab">
						<td class="py-4 px-6 text-left bg-white border-b border-stroke">
							{{ element.title }}
						</td>
						<td class="py-4 px-6 text-left bg-white border-b border-stroke">
							<div class="flex items-center">
								<FieldIcon class="w-8 mr-2" :name="element.type" />
								{{ element.type }}
							</div>
						</td>
						<td class="py-4 px-6 text-left bg-white border-b border-stroke">
							{{ element.db_title }}
						</td>
						<td class="py-4 px-6 bg-white border-b border-stroke">
							<div class="flex justify-end gap-2">
								<div
									class="p-2 cursor-pointer"
									@click="openFieldModal(element)"
								>
									<EditIcon class="w-4 h-4" />
								</div>
								<div class="p-2 cursor-pointer">
									<DeleteIcon class="w-4 h-4" />
								</div>
							</div>
						</td>
					</tr>
				</template>
			</draggable>
		</table>

		<FieldModal
			:show="isShowFieldModal"
			@close="isShowFieldModal = false"
			:field="fieldModal"
		/>
	</div>
</template>
