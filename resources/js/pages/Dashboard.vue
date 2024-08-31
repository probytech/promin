<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div>Dashboard</div>

    <div class="px-4 py-2">
        <Link class="flex items-center text-button-mob lg:text-button hover:text-orange-100 duration-300" :href="route('promin.logout.store')" method="post" as="button">
            <svg class="w-5 h-5 mr-2" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="stroke-current" d="M8.125 3.625H3.75C3.58424 3.625 3.42527 3.69085 3.30806 3.80806C3.19085 3.92527 3.125 4.08424 3.125 4.25V16.75C3.125 16.9158 3.19085 17.0747 3.30806 17.1919C3.42527 17.3092 3.58424 17.375 3.75 17.375H8.125" stroke="#4A4A4A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path class="stroke-current" d="M8.125 10.5H16.875" stroke="#4A4A4A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path class="stroke-current" d="M13.75 7.375L16.875 10.5L13.75 13.625" stroke="#4A4A4A" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <clipPath>
                <rect width="20" height="20" fill="white" transform="translate(0 0.5)"/>
                </clipPath>
            </svg>
            Logout
        </Link>
    </div>
</template>