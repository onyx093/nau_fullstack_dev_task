<script setup>
import { computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/inertia-vue3';
import {
    PlusIcon
} from '@heroicons/vue/20/solid';
import NavLink from '@/Components/NavLink.vue';
import CompanyList from '@/Components/CompanyList.vue';

defineProps({
    userCompanies: Array,
});

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
                        <div class="flex justify-between border-b-2 border-slate-300 sm:py-3">
                            <h2 class="text-2xl font-semibold">Companies list</h2>
                            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                                <span class="sm:ml-3">
                                    <NavLink :href="route('companies.create')">
                                        <button type="button"
                                            class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                            <PlusIcon class="-ml-1 mr-2 h-5 w-5" aria-hidden="true" />
                                            Add new company
                                        </button>
                                    </NavLink>
                                </span>
                            </div>
                        </div>
                        <CompanyList :companies="userCompanies" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
