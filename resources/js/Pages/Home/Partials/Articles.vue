<script setup>
import { onMounted, ref } from 'vue';

const articles = ref([])
onMounted(async function(){
     //get list of articles
    let response = await fetch(route('home.articles',{limit:3}))
    articles.value = (await response.json())
})
</script>
<template>
 <!-- blog -->
    <section class="p-12 md:p-24 mx-auto bg-body text-gray-700">
        <div class="mb-4 text-center">
          <h1 class="section-header">Latest Articles</h1>
          <p class="section-sub-header my-4">
            Follow every single tip or every piece of information to
            <br>improve your software engineer career for better experience.
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 justify-center items-center gap-x-6 gap-y-8 text-center py-6">

          <!-- article block -->
          <div class="p-10 bg-white rounded-md border border-blue-300" 
          v-for="(article,i) in articles.data" :key="i">
            <div class="article-details flex justify-between items-center ">
              <div class="text-xl md:text-3xl">
                <span class=" rounded-full p-2" style="background-color:#b4e9f9">{{article.posted_at.slice(0,2)}}</span>
                <span>{{article.posted_at.slice(2)}}</span>
              </div>
              <div class="article-tags text-lg md:text-xl"
                 v-if="article.tags.length">
                <span class="mx-1 hover:text-main-hover-color" 
                 v-for="(t,i) in article.tags" :key="i">
                  <Link :href="route('blog')">{{t.title_en}}</Link>
                  </span>|<span class="mx-1 hover:text-main-hover-color">
                </span>
                
              </div>
              <div v-else>
                <span class="mx-1 hover:text-main-hover-color" >
                  <Link :href="route('blog')">{{article.category.name_en}}</Link>
                </span>
              </div>
            </div>
            <div class="article-content mt-14 mb-8 text-left">
              <a :href="route('blog.show',{slug:article.slug})" class="article-title text-xl  font-bold  hover:text-main-hover-color">{{article.title_en.substring(0,52)+'...'}}</a>
              <div class="text-xl mt-6" v-html="article.content_en.substring(0,70)"></div>
            </div>
          </div>
          <!-- article block -->
          <div class="p-10 bg-white rounded-md border border-blue-300">
            <div class="article-details flex justify-between items-center ">
              <div class="text-xl md:text-3xl">
                <span class=" rounded-full px-3 py-2" style="background-color:#fbdddd">31</span>
                <span>Janvier.22</span>
              </div>
              <div class="article-tags text-lg md:text-xl">
                <span class="mx-1 hover:text-main-hover-color"><a href="">Laravel</a></span>|<span class="mx-1 hover:text-main-hover-color"><a href="" >PHP</a></span>
              </div>
            </div>
            <div class="article-content mt-14 mb-8 text-left">
              <a href="" class="article-title text-xl font-bold hover:text-main-hover-color">interface segregation principle</a>
              <p class="text-lg mt-6">We should never force a client to implement an interface or</p>
            </div>
          </div>
          <!-- article block -->
          <div class="p-10 bg-white rounded-md border border-blue-300">
            <div class="article-details flex justify-between items-center ">
              <div class="text-xl md:text-3xl">
                <span class=" rounded-full px-3 py-2" style="background-color:#facf8b">31</span>
                <span>Janvier.22</span>
              </div>
              <div class="article-tags text-lg md:text-xl">
                <span class="mx-1 hover:text-main-hover-color"><a href="">Laravel</a></span>|<span class="mx-1 hover:text-main-hover-color"><a href="" >PHP</a></span>
              </div>
            </div>
            <div class="article-content mt-14 mb-8 text-left">
              <a href="" class="article-title text-xl md:text-2xl font-bold hover:text-main-hover-color">interface segregation principle</a>
              <p class="text-xl mt-6">We should never force a client to implement an interface or</p>
            </div>
          </div>
          <!-- all articles -->
          <div class="p-10 bg-white rounded-md border border-blue-300 flex justify-center items-center h-full">
            <Link :href="route('blog')" class="btn-style-four">
              Browse All
            </Link>
          </div>
        </div>

    </section>
</template>