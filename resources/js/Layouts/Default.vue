<script setup>
import { defineProps } from 'vue';
import NavigationMenu from './Partials/NavigationMenu.vue';
import Footer from './Partials/Footer.vue';

defineProps({
    title:String
})
</script>
<template>
  <div>
    <NavigationMenu/>
    <slot />
    <Footer />
  </div>
</template>