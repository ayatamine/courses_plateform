<script setup>
import { onMounted,ref } from 'vue';

const articles = ref([]);
onMounted(async function(){
    // articles
    let response1 = await fetch(route('home.articles',{limit:3}))
    articles.value = (await response1.json()).data
})
defineProps({
    tags:Array
})
const emit = defineEmits(['updateArticlesList'])

async function filterByTag(tagId){
  let response =  await fetch(route('tag.articles',{id:tagId}))
  articles.value = (await response.json()).data
  emit('updateArticlesList',articles.value)
}
</script>
<template>
<div class="w-full md:w-2/6 bg-white rounded p-5 text-gray-600">
          <!-- block -->
          <div class="recent-posts">
            <h2 class="text-xl font-semibold px-">Recent Articles</h2>
            <hr class="my-6">
            <div class="my-3 p-4 text-left shadow-sm shadow-slate-800 rounded"
            v-for="(article,i) in articles" :key="i">
              <a href="" class="font-semibold md:text-base mb-2 text-gray-600 hover:text-main-hover-color  capitalize">
                {{article.title_en}}
              </a>
              <div class="mt-1 flex flex-col justify-between items-start ">
                <div class="inline-flex items-center text-base  text-gray-600 font-semibold">
                  <svg class="h-2 w-2 mr-2 text-main-hover-color"  viewBox="0 0 24 24"  fill="currentColor"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" /></svg>                 
                  {{article.category.name_en}}
                </div>
                <div class="inline-flex items-center text-base text-gray-500 font-normal">
                  <svg class="h-3 w-3 mr-2 text-gray-400"  viewBox="0 0 24 24"  fill="currentColor"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" /></svg>                   
                  {{article.author}}, {{article.posted_at}}
                </div>
              </div>
            </div>
          </div>
          <!-- block -->
          <div class="recent-posts pt-12">
            <h2 class="text-xl font-semibold ">Tags</h2>
            <hr class="my-6">
            <div class="categories  w-full p-4 grid grid-cols-3 justify-start items-center gap-2">
              <a href="" class="category-badge  overflow-clip text-sm" 
              v-for="(tag,i) in tags" :key="i"
              @click.prevent="filterByTag(tag.id,$event)"
              >#{{tag.title_en}}</a>
            </div>
          </div>
        </div>
</template>