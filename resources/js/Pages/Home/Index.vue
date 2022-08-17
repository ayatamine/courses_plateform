<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import Hero from './Partials/Hero.vue';

const site_settings = usePage().props.value.site_settings
</script>
<template>
     <Hero />
</template>
