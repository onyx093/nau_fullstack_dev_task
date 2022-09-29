<script setup>
import Company from '@/Components/Company.vue';

defineProps({
    companies: Array,
});


</script>

<template>
    <div class="lg:flex-col lg:flex lg:items-center lg:justify-between py-2 space-y-4">
        <template v-for="company in companies" :key="company.id">
            <Company :company="company" />
        </template>
    </div>
</template>
