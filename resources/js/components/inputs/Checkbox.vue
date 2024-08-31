<script setup>
const props = defineProps({
    border: {
        type: Boolean,
    },
    small: {
        type: Boolean,
        default: false,
    }
});

const model = defineModel()
const emit = defineEmits(['update:modelValue'])

const selectOption = (event) => {
    emit('update:modelValue', event.target.checked);
};

</script>

<template>
    <input
        type="checkbox"
        @click="(event) => selectOption(event)"
        :checked="model"
        class="rounded focus:ring-0 focus:ring-offset-0 text-primary border border-stroke w-5 h-5 duration-300"
    />
</template>
