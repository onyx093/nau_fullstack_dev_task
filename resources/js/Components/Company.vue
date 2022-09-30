<script setup>
import {
    BriefcaseIcon,
    CalendarIcon,
    TrashIcon,
    MapPinIcon,
    PencilIcon,
} from '@heroicons/vue/20/solid';
import NavLink from '@/Components/NavLink.vue';

defineProps({
    company: Object,
});

</script>

<template>
    <div class="w-full flex items-center">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                {{ company.name }}
            </h2>
            <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <BriefcaseIcon class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
                    {{ company.email }}
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <MapPinIcon class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
                    {{ company.location }}
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <CalendarIcon class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
                    Added on: {{ company.created_at }}
                </div>
            </div>
        </div>
        <div class="mt-5 flex lg:mt-0 lg:ml-4">
            <span class="hidden sm:block">
                <NavLink :href="route('companies.edit', company.id)">
                    <button type="button"
                        class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <PencilIcon class="-ml-1 mr-2 h-5 w-5 text-gray-500" aria-hidden="true" />
                        Edit
                    </button>
                </NavLink>
            </span>

            <span class="ml-3 hidden sm:block">
                <NavLink :href="route('companies.destroy', company.id)" method="delete">
                    <button type="button"
                        class="inline-flex items-center rounded-md border border-gray-300 bg-red-400 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <TrashIcon class="-ml-1 mr-2 h-5 w-5 text-white" aria-hidden="true" />
                        Delete
                    </button>
                </NavLink>
            </span>

        </div>
    </div>
</template>
