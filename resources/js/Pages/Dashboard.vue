<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { ArrowUpLeftIcon, InboxIcon, MapPinIcon } from '@heroicons/vue/20/solid';
import NavLink from '@/Components/NavLink.vue';
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between border-b-2 border-slate-300 sm:py-3">
                            <div class="flex flex-col">
                                <h2 class="text-3xl font-extrabold">Welcome, {{ $page.props.auth.user.name
                                }}</h2>
                                <div class="flex flex-row space-x-8 text-gray-500">
                                    <div class="flex">
                                        <MapPinIcon class="-ml-1 mr-2 h-5 w-5" aria-hidden="true" />
                                        <p>{{ $page.props.auth.user.country}}</p>
                                    </div>
                                    <div class="flex">
                                        <InboxIcon class="-ml-1 mr-2 h-5 w-5" aria-hidden="true" />
                                        <p>{{ $page.props.auth.user.phone}}</p>
                                    </div>
                                    <div class="flex">
                                        <InboxIcon class="-ml-1 mr-2 h-5 w-5" aria-hidden="true" />
                                        <p>{{ $page.props.auth.user.email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                                <span class="sm:ml-3">
                                    <NavLink :href="route('companies.index')">
                                        <button type="button"
                                            class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                            <ArrowUpLeftIcon class="-ml-1 mr-2 h-5 w-5" aria-hidden="true" />
                                            Go to companies page
                                        </button>
                                    </NavLink>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
