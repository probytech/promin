<template>
	<div class="relative inline-block w-full" ref="customSelect">
		<div
			@click="toggleDropdown"
			class="capitalize cursor-pointer flex items-center justify-between w-full text-button bg-white border border-stroke px-3 py-2.5"
			:class="{ 'text-black': selectedOption, 'text-grey': !selectedOption }"
		>
			{{ label != "" ? label : placeholder }}
			<svg
				class="h-5 w-5 transition duration-300 ml-1"
				width="20"
				height="20"
				viewBox="0 0 20 20"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
				:class="{ 'rotate-180': isOpen }"
			>
				<path
					d="M16.2502 7.49976L10.0002 13.7498L3.75024 7.49976"
					stroke="#4A4A4A"
					stroke-width="1.5"
					stroke-linecap="round"
					stroke-linejoin="round"
				/>
				<clipPath>
					<rect width="20" height="20" fill="white" />
				</clipPath>
			</svg>
		</div>
		<div
			class="absolute z-10 mt-2 p-1 w-full bg-white border border-stroke shadow-lg opacity-0 pointer-events-none transition duration-300"
			:class="{ 'opacity-100 pointer-events-auto': isOpen }"
		>
			<div
				v-for="option in options"
				:key="option.value"
				@click="selectOption(option)"
				class="cursor-pointer text-button px-3 py-1.5 hover:text-primary duration-300"
			>
				{{ option.label }}
			</div>
		</div>
	</div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from "vue";

const props = defineProps({
	options: {
		type: Array,
		required: true,
	},
	placeholder: {
		type: String,
		default: "",
	},
});

const selectedOption = defineModel();
const emit = defineEmits(["update:modelValue"]);
const customSelect = ref(null);

const isOpen = ref(false);

const toggleDropdown = () => {
	isOpen.value = !isOpen.value;
};

const selectOption = (option) => {
	selectedOption.value = option.value;
	isOpen.value = false;
	emit("update:modelValue", option.value);
};

const label = computed(() => {
	const selectedFilteredOption = props.options.filter((element) => {
		return element.value == selectedOption.value;
	});

	if (selectedFilteredOption.length) {
		return selectedFilteredOption[0].label;
	}

	return "";
});

const handleOutsideClick = (event) => {
	if (customSelect.value && !customSelect.value.contains(event.target)) {
		isOpen.value = false;
	}
};

onMounted(() => {
	window.addEventListener("click", handleOutsideClick);
});

onUnmounted(() => {
	window.removeEventListener("click", handleOutsideClick);
});
</script>
