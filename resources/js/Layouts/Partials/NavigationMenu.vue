<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
import Icon from '../../Shared/Icon.vue';


const {site_name,logo,logo_ar} = {...(usePage().props.value.site_settings)} 
computed(()=>{
        function selectable_locale() {
            if(this.$page.locale == 'ar') {
                return 'en';
            }
            return 'ar'
        }
})
</script>
<template>
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <Link :href="route('home')" class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" >
            <img :src="logo"  height="" width="" :alt="`${site_name} logo`"/>
          </Link>
        </div>
        <!-- mobile menu -->
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <!-- /mobile menu -->
        <!-- desktop menu -->
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-center flex-1 items-center">
            <li class="mr-3">
              <Link  class="inline-block py-2 px-4 text-white text-xl font-semibold no-underline" :href="route('home')">Home</Link>
            </li>
            <li class="mr-3">
              <Link class="inline-block text-white text-xl no-underline hover:text-main-hover-color  py-2 px-4 transition-colors duration-150 ease-in-out" :href="route('courses')">Courses</Link>
            </li>
            <li class="mr-3">
              <Link class="inline-block text-white text-xl no-underline hover:text-main-hover-color  py-2 px-4 transition-colors duration-150 ease-in-out" :href="route('tutorials')">Tutorials</Link>
            </li>
            <li class="mr-3">
              <Link class="inline-block text-white text-xl no-underline hover:text-main-hover-color  py-2 px-4 transition-colors duration-150 ease-in-out" :href="route('blog')">Blog</Link>
            </li>
            <li class="mr-3">
              <Link class="inline-block text-white text-xl no-underline hover:text-main-hover-color  py-2 px-4 transition-colors duration-150 ease-in-out" :href="route('contact')">Contact</Link>
            </li>
            <li class="mr-3">
              <Link class="inline-block text-white text-xl no-underline hover:text-main-hover-color  py-2 px-4 transition-colors duration-150 ease-in-out" 
              :href="route('language', ['ar'])">
              <Icon class="w-5 h-5" name="ar" />
              </Link>
            </li>
          </ul>
          <Link :href="route('login')"
            id="navAction"
            class="btn-style-two py-2"
          >
            Login
          </Link>
        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
</template>