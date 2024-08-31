<script setup>
import Checkbox from '@/components/inputs/Checkbox.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';
import InputError from '@/components/inputs/InputError.vue';
import InputLabel from '@/components/inputs/InputLabel.vue';
import PrimaryButton from '@/components/buttons/PrimaryButton.vue';
import TextInput from '@/components/inputs/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('promin.login.store'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <AuthLayout>

        <Head title="Login" />

        <form @submit.prevent="submit" class="bg-white py-12 px-8 md:px-24 flex flex-col items-center rounded-2xl">

            <svg class="w-16 h-16 mb-8" width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="150" height="150" rx="20" fill="#1467E5"/>
                <path d="M117.297 72.1458L104.529 68.489C98.779 66.8644 93.5412 63.7882 89.3168 59.5547C85.0925 55.3212 82.0229 50.0721 80.4018 44.3096L76.753 31.5135C76.5695 31.0658 76.2573 30.6829 75.8562 30.4134C75.455 30.1439 74.9829 30 74.5 30C74.017 30 73.545 30.1439 73.1438 30.4134C72.7427 30.6829 72.4305 31.0658 72.247 31.5135L68.5982 44.3096C66.9771 50.0721 63.9075 55.3212 59.6832 59.5547C55.4588 63.7882 50.221 66.8644 44.471 68.489L31.7025 72.1458C31.2122 72.2852 30.7807 72.5811 30.4735 72.9886C30.1662 73.3961 30 73.8929 30 74.4036C30 74.9144 30.1662 75.4112 30.4735 75.8187C30.7807 76.2261 31.2122 76.522 31.7025 76.6615L44.471 80.3182C50.221 81.9428 55.4588 85.019 59.6832 89.2526C63.9075 93.4861 66.9771 98.7352 68.5982 104.498L72.247 117.294C72.3862 117.785 72.6814 118.218 73.088 118.525C73.4946 118.833 73.9904 119 74.5 119C75.0096 119 75.5054 118.833 75.912 118.525C76.3186 118.218 76.6138 117.785 76.753 117.294L80.4018 104.498C82.0229 98.7352 85.0925 93.4861 89.3168 89.2526C93.5412 85.019 98.779 81.9428 104.529 80.3182L117.297 76.6615C117.788 76.522 118.219 76.2261 118.527 75.8187C118.834 75.4112 119 74.9144 119 74.4036C119 73.8929 118.834 73.3961 118.527 72.9886C118.219 72.5811 117.788 72.2852 117.297 72.1458Z" fill="white"/>
            </svg>

            <h1 class="text-4xl font-inter font-black uppercase mb-4 text-center"><span class="text-primary">Welcome</span> back</h1>
            <div class="text-lg mb-2 text-center">Log in to your Promin account</div>

            <div class="mt-4 w-full">
                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    placeholder="Email"
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4 w-full">
                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    placeholder="Password"
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-between mt-4 w-full">
                <label class="flex items-center cursor-pointer select-none">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-extra">Remember me</span>
                </label>
            </div>

            <PrimaryButton type="submit" class="w-full mt-6" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Log in
            </PrimaryButton>
        </form>
    </AuthLayout>
</template>