<script setup>
import { defineProps } from 'vue';
</script>
<template>
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <img src="img/logo-1633967597 (1).svg"  height="" width="" alt="logo"/>
          </a>
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
              <a class="inline-block py-2 px-4 text-white text-xl font-semibold no-underline" href="#">Home</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white text-xl no-underline hover:text-main-hover-color  py-2 px-4 transition-colors duration-150 ease-in-out" href="#">Courses</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white text-xl no-underline hover:text-main-hover-color  py-2 px-4 transition-colors duration-150 ease-in-out" href="#">Tutorials</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white text-xl no-underline hover:text-main-hover-color  py-2 px-4 transition-colors duration-150 ease-in-out" href="blog.html">Blog</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white text-xl no-underline hover:text-main-hover-color  py-2 px-4 transition-colors duration-150 ease-in-out" href="contact.html">Contact</a>
            </li>
          </ul>
          <button
            id="navAction"
            class="btn-style-two py-2"
          >
            Login
          </button>
        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
</template>