<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    companyName: '',
    companyEmail: '',
    location: '',
});

const submit = () => {
    form.post(route('companies.store'), {
        onFinish: () => form.reset('companyName', 'companyEmail', 'location'),
    });
};

</script>

<template>

    <Head title="My companies page" />

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
                            <h2 class="text-2xl font-semibold">Add New Company</h2>
                        </div>
                        <form class="space-y-6" @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Company name" />
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.companyName"
                                    required autofocus autocomplete="username" placeholder="Allianz Insurance Plc" />
                                <InputError class="mt-2" :message="form.errors.companyName" />
                            </div>

                            <div>
                                <InputLabel for="email" value="Company email" />
                                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.companyEmail"
                                    required autocomplete="username" placeholder="myname@allianz.co" />
                                <InputError class="mt-2" :message="form.errors.companyEmail" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="location" value="Company location" />
                                <TextInput id="location" type="text" class="mt-1 block w-full" v-model="form.location"
                                    required autocomplete="location" placeholder="Lagos, Nigeria" />
                                <InputError class="mt-2" :message="form.errors.location" />
                            </div>

                            <div class="flex items-center justify-between mt-4">

                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Add company
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
