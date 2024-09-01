<script setup>
import { computed, onMounted, onUnmounted, watch } from "vue";

const props = defineProps({
	show: {
		type: Boolean,
		default: false,
	},
	maxWidth: {
		type: String,
		default: "2xl",
	},
	closeable: {
		type: Boolean,
		default: true,
	},
});

const emit = defineEmits(["close"]);

watch(
	() => props.show,
	() => {
		if (props.show) {
			document.body.style.overflow = "hidden";
		} else {
			document.body.style.overflow = null;
		}
	}
);

const close = () => {
	if (props.closeable) {
		emit("close");
	}
};

const closeOnEscape = (e) => {
	if (e.key === "Escape" && props.show) {
		close();
	}
};

onMounted(() => document.addEventListener("keydown", closeOnEscape));

onUnmounted(() => {
	document.removeEventListener("keydown", closeOnEscape);
	document.body.style.overflow = null;
});

const maxWidthClass = computed(() => {
	return {
		sm: "sm:max-w-sm",
		md: "sm:max-w-md",
		lg: "sm:max-w-lg",
		xl: "sm:max-w-xl",
		"2xl": "sm:max-w-2xl",
	}[props.maxWidth];
});
</script>

<template>
	<Teleport to="body">
		<Transition leave-active-class="duration-200">
			<div
				v-show="show"
				class="fixed inset-0 overflow-y-auto px-4 flex items-center justify-center sm:px-0 z-50"
				scroll-region
			>
				<Transition
					enter-active-class="ease-out duration-300"
					enter-from-class="opacity-0"
					enter-to-class="opacity-100"
					leave-active-class="ease-in duration-200"
					leave-from-class="opacity-100"
					leave-to-class="opacity-0"
					class="backdrop-blur-[5px]"
				>
					<div
						v-show="show"
						class="fixed inset-0 transform transition-all"
						@click="close"
					>
						<div class="absolute inset-0 [background:rgba(18,18,18,0.50)]" />
					</div>
				</Transition>

				<Transition
					enter-active-class="ease-out duration-300"
					enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
					enter-to-class="opacity-100 translate-y-0 sm:scale-100"
					leave-active-class="ease-in duration-200"
					leave-from-class="opacity-100 translate-y-0 sm:scale-100"
					leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
				>
					<div
						v-show="show"
						class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto p-6 lg:p-12"
						:class="maxWidthClass"
					>
						<svg
							class="w-6 h-6 absolute top-4 right-4 cursor-pointer"
							width="25"
							height="25"
							viewBox="0 0 25 25"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
							@click="close"
						>
							<path
								d="M19.0626 18.61L18.6099 19.0626C18.36 19.3125 17.9547 19.3125 17.7047 19.0626L12.5 13.8578L7.2952 19.0625C7.04529 19.3125 6.64002 19.3125 6.39006 19.0625L5.93747 18.6099C5.68751 18.36 5.68751 17.9547 5.93747 17.7047L11.1423 12.5L5.93747 7.2952C5.68751 7.04529 5.68751 6.64002 5.93747 6.39006L6.39005 5.93748C6.64001 5.68752 7.04529 5.68752 7.2952 5.93748L12.5 11.1423L17.7047 5.93747C17.9547 5.68751 18.36 5.68751 18.6099 5.93747L19.0626 6.39005C19.3125 6.64001 19.3125 7.04529 19.0626 7.2952L13.8578 12.5L19.0626 17.7047C19.3125 17.9547 19.3125 18.36 19.0626 18.61Z"
								fill="#4A4A4A"
							/>
						</svg>

						<slot />
					</div>
				</Transition>
			</div>
		</Transition>
	</Teleport>
</template>
