<script setup>
defineProps({
  articles : Array
})
</script>
<template>
<!-- articles list -->
          <div v-if="articles.length"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 my-8 gap-5 md:gap-4 items-center">
            <div class="rounded bg-white overflow-hidden shadow-lg min-h-full"
            v-for="(article,i) in articles" :key="i">
              <Link :href="route('blog.show',{slug:article.slug})"><img class="w-full max-h-70 hover:scale-105 hover:skew-y-3 transition-all duration-150 ease-in-out" :src="article.thumbnail" :alt="article.title_en"></Link>
              <div class="p-4 pb-4 text-left">
                <Link :href="route('blog.show',{slug:article.slug})" class="font-semibold text-lg md:text-xl mb-2 text-gray-700 hover:text-main-hover-color  capitalize">
                  {{article.title_en}}
                </Link>
                <div class="mt-5 flex flex-col justify-between items-start ">
                  <div class="inline-flex items-center text-base text-gray-600 font-semibold">
                    <svg class="h-3 w-3 mr-2 text-main-hover-color"  viewBox="0 0 24 24"  fill="currentColor"  stroke="currentColor"  stroke-width="0"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" /></svg>      
                    {{article.category.name_en}}
                  </div>
                  <div class="inline-flex items-center text-sm lg:text-base text-gray-500 font-normal">
                    <svg class="h-3 w-3 mr-2 text-gray-400"  viewBox="0 0 24 24"  fill="currentColor"  stroke="currentColor"  stroke-width="0"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" /></svg>                   
                    {{article.author}}, {{article.posted_at}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div v-else class="p-3 bg-red-400 text-white font-semibold my-6 rounded">We are Sorry, No Result found.</div>
</template>