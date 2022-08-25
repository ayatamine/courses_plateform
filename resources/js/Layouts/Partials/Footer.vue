<script setup>
import { usePage } from '@inertiajs/inertia-vue3';

const {site_name,logo,logo_ar,description} = {...(usePage().props.value.site_settings)} 

</script>
<template>
<!--Footer-->
      <footer class="pt-12 md:pt-24 px-8 md:px-24 pb-10  bg-darken-bg relative" id="footer">
        <div class="container mx-auto md:px-8">
          <!-- footer header -->
        <div class="mb-4 text-center">
          <h1 class="section-header">Subscribe to know our<br>every single updates   </h1>
          <div class="w-full md:w-2/4 mx-auto my-4 md:my-8 flex">
            <input type="search" name="q" class="w-4/6 p-3 md:p-4 text-base md:text-lg text-gray-700 bg-white  pr-10 focus:outline-none 
            focus:text-gray-900" placeholder="What do you want to learn?" autocomplete="off">
            <button type="submit" class="w-2/6 bg-btn-bg text-center text-white flex items-center justify-center px-1 md:px-5 text-base md:text-xl  ">
              Subscribe Now
            </button>
        
          </div>
        </div>
          <div class="w-full md:flex flex-col md:flex-row gap-3 py-6 mt-16">
            <div class=" mb-6 px-3 md:w-2/6">
              <a class="text-pink-600 no-underline hover:no-underline font-bold text-lg lg:text-4xl" href="#">
                <img :src="logo"  height="" width="" :alt="`${site_name} logo`" style="max-width:70%" />
              </a>
              <div class="text-white text-lg my-5">
                {{description}}
              </div>
              <!-- social icons -->
              <div class="flex justify-start gap-2">
                <a href="">
                  <svg class="social-icon"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                </a>
                <a href="">
                  <svg class="social-icon"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />  <rect x="2" y="9" width="4" height="12" />  <circle cx="4" cy="4" r="2" /></svg>
                </a>
                <a href="">
                  <svg class="social-icon"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M22 4.01c-1 .49-1.98.689-3 .99-1.121-1.265-2.783-1.335-4.38-.737S11.977 6.323 12 8v1c-3.245.083-6.135-1.395-8-4 0 0-4.182 7.433 4 11-1.872 1.247-3.739 2.088-6 2 3.308 1.803 6.913 2.423 10.034 1.517 3.58-1.04 6.522-3.723 7.651-7.742a13.84 13.84 0 0 0 .497 -3.753C20.18 7.773 21.692 5.25 22 4.009z" /></svg>              </a>
                <a href="">
                  <svg class="social-icon"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg>
                </a>
              </div>
            </div>
            <div class="flex-1 mt-12 md:mt-0">
              <p class="uppercase text-white text-lg  font-semibold md:mb-6">Essential Links</p>
              <ul class="list-reset mb-6 p-3">
                <li class="mt-2  mr-2 md:block md:mr-0">
                  <a href="#" class="no-underline hover:underline text-white text-lg ">About Us</a>
                </li>
                <li class="mt-2  mr-2 md:block md:mr-0">
                  <a href="#" class="no-underline hover:underline text-white text-lg ">Blog</a>
                </li>
                <li class="mt-2  mr-2 md:block md:mr-0">
                  <a href="#" class="no-underline hover:underline text-white text-lg ">Faqs</a>
                </li>
              </ul>
            </div>
            <div class="flex-1 mt-12 md:mt-0">
              <p class="uppercase text-white text-lg font-semibold md:mb-6">Resources</p>
              <ul class="list-reset mb-6 p-3">
                <li class="mt-2 mr-2 md:block md:mr-0">
                  <a href="#" class="no-underline hover:underline text-white text-lg ">Privacy</a>
                </li>
                <li class="mt-2 mr-2 md:block md:mr-0">
                  <a href="#" class="no-underline hover:underline text-white text-lg ">Support Area</a>
                </li>
                <li class="mt-2 mr-2 md:block md:mr-0">
                  <a href="#" class="no-underline hover:underline text-white text-lg ">Conditions</a>
                </li>
              </ul>
            </div>
            <div class="flex-1 mt-12 md:mt-0">
              <p class="uppercase text-white text-lg font-semibold md:mb-6">Quick Links</p>
              <ul class="list-reset mb-6 p-3">
                <li class="mt-2 mr-2 md:block md:mr-0">
                  <a href="#" class="no-underline hover:underline text-white text-lg">Home</a>
                </li>
                <li class="mt-2 mr-2 md:block md:mr-0">
                  <a href="#" class="no-underline hover:underline text-white text-lg">About</a>
                </li>
                <li class="mt-2 mr-2 md:block md:mr-0">
                  <a href="contact.html" class="no-underline hover:underline text-white text-lg">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr class="divider px-12 md:px-24 opacity-50">
        <div class="copyrights px-12 md:px-24 mt-12 text-center mx-auto text-white text-lg">
          copyright © 2022 4arabdevelopers
        </div>
        <!-- <div class="absolute top-0 left-0 right-0 bottom-0 bg-cover bg-no-repeat" style="background-image: url('img/pattern-2.a97bc88.png');"></div> -->
  
      </footer>
</template>