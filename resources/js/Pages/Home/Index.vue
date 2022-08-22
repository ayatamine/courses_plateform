<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import Hero from './Partials/Hero.vue';
import WhyChooseUs from './Partials/WhyChooseUs.vue';
import Courses from './Partials/Courses.vue';
import Achivements from './Partials/Achivements.vue';
import Articles from './Partials/Articles.vue';

const site_settings = usePage().props.value.site_settings
defineProps({
     courses : Object
})
</script>
<template>
      <Head title="Home" />
     <Hero />
     <WhyChooseUs />
     <Courses :courses="courses" />
     <!-- parallex to watch intro video -->
    <section class=" h-fit  py-24 md:py-44  bg-fixed bg-center bg-cover parallax-img text-center text-2xl text-white font-semibold">
      <button class="rounded-full p-5 bg-white  animate-pulse outline-none ">
        <svg class="h-8 w-8 text-main-hover-color"  viewBox="0 0 24 24"  fill="currentColor"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polygon points="5 3 19 12 5 21 5 3" /></svg>
      </button>
      <p>
        Watch The Intro video
      </p>
    </section>
    <!-- achivements -->
    <Achivements />
    <Articles />
</template>
