<script setup>
import Number from './Number.vue';
import Password from './Password.vue';
import Relationship from './Relationship.vue';
import Text from './Text.vue';
import Longtext from './LongText.vue';
import RichText from './RichText.vue';
import Boolean from './Boolean.vue';
import Color from './Color.vue';
import Date from './Date.vue';
import DateTime from './DateTime.vue';
import File from './File.vue';
import Image from './Image.vue';
import Gallery from './Gallery.vue';
import Money from './Money.vue';
import Enum from './Enum.vue';

defineProps({
    name: String,
})

const icons = {
    "boolean": Boolean,
    "color": Color,
    "date": Date,
    "datetime": DateTime,
    "enum": Enum,
    "file": File,
    "gallery": Gallery,
    "image": Image,
    "longtext": Longtext,
    "money": Money,
    "number": Number,
    "password": Password,
    "relationship": Relationship,
    "richtext": RichText,
    "text": Text,
}

</script>

<template>
    <component :is="icons[name]"></component>
</template>