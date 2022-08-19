<script setup>
import { onMounted, ref } from 'vue';

const achievements = ref([])
onMounted(async function(){
     //get list of achievements
    let response = await fetch(route('home.achievements'))
    achievements.value = (await response.json())
})
</script>
<template>
 <!-- our achivements -->
    <section class="p-12 md:p-24 mx-auto bg-darken-bg ">
        <div class="mb-8 text-center">
          <h1 class="section-header py-4">Our Achievements</h1>
          <p class="section-sub-header my-4">
            In recognition of our commitment to business excellence<br>and because of your effective support.
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 justify-center items-center gap-4 text-center py-6">
          <!-- achivement block -->
          <div class="flex flex-col justify-between gap-4 space-y-2 items-center py-5">
            <div class="achivement-icon rounded-full p-6" style="background-color:#fbdddd">
              <svg class="h-16 w-16 text-darken-bg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />  <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" /></svg>
            </div>
            <p class="text-2xl md:text-3xl font-bold">Total Courses</p>
            <p class="text-5xl md:text-6xl font-bold">+{{achievements.total_courses}}</p>
          </div>
          <!-- achivement block -->
          <div class="flex flex-col justify-between gap-4 space-y-2 items-center py-5">
            <div class="achivement-icon rounded-full p-6" style="background-color:#b4e9f9">
              <svg class="h-16 w-16 text-darken-bg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
            </div>
            <p class="text-2xl md:text-3xl font-bold">Total Students</p>
            <p class="text-5xl md:text-6xl font-bold">+{{achievements.total_students}}</p>
          </div>
          <!-- achivement block -->
          <div class="flex flex-col justify-between gap-4 space-y-2 items-center py-5">
            <div class="achivement-icon rounded-full p-6" style="background-color:#facf8b">
              <svg class="h-16 w-16 text-darken-bg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />  <polyline points="14 2 14 8 20 8" />  <line x1="16" y1="13" x2="8" y2="13" />  <line x1="16" y1="17" x2="8" y2="17" />  <polyline points="10 9 9 9 8 9" /></svg>
            </div>
            <p class="text-2xl md:text-3xl font-bold">Total Articles</p>
            <p class="text-5xl md:text-6xl font-bold">+{{achievements.total_posts}}</p>
          </div>
        </div>

    </section>
</template>