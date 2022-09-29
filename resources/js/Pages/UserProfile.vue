<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

import { ArrowUpLeftIcon } from '@heroicons/vue/20/solid';
import NavLink from '@/Components/NavLink.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    fullname: props.user.name,
    email: props.user.email,
    phone: props.user.phone,
    country: props.user.country,
});

const submit = () => {
    form.put(route('user.profile'), {
        onFinish: () => form.reset('fullname', 'email', 'phone', 'country'),
    });
};

</script>

<template>

    <Head title="User profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Companies
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between sm:py-3">
                            <h2 class="text-2xl font-semibold">Edit User Profile</h2>
                        </div>
                        <form class="space-y-6" @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Full name" />
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.fullname"
                                    required autofocus autocomplete="username" />
                                <InputError class="mt-2" :message="form.errors.fullname" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="phone" value="Phone number" />
                                <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.phone"
                                    required autocomplete="phone" />
                                <InputError class="mt-2" :message="form.errors.phone" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="country" value="Country" />
                                <TextInput id="country" type="text" class="mt-1 block w-full" v-model="form.country"
                                    required autocomplete="country" />
                                <InputError class="mt-2" :message="form.errors.country" />
                            </div>

                            <div class="flex items-center justify-between mt-4">

                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Update user info
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
