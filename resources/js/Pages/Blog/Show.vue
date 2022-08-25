<script>
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Head,
    },
};
</script>
<script setup>
import RecentArticles from './Partials/RecentArticles.vue';
defineProps({
  article:Object
})
</script>
<template>
     <Head >
      <title>{{article.data.title_en}}</title>
      <meta head-key="description" name="description" :content="`this article is talking about ${article.data.title_en}`"/>
      <meta  name="keywords" :content="article.data.keywords" />
      <meta inertia head-key="og:description" property="og:description" :content="`this article is talking about ${article.data.title_en}`">
      <meta inertia head-key="og:twitter_title" property="twitter:image" :content="article.data.title_en">
    </Head>
    <!--article intro-->
    <div class="pt-24 px-8 md:px-24">
      <div class="mt-8 mx-auto px-2 md:px-6 py-5 md:py-8  rounded md:flex gap-5" style="background-color: #12345696; background-image: url('/images/post-details-bg.svg');">
        <div class="md:w-5/6 rounded">
          <h1 class="details-article-title text-xl md:text-2xl font-semibold text-white p-5 bg-black bg-opacity-50">
            {{article.data.title_en}}
          </h1>
          <ul class="blog-post-info mt-6 list-inline post-detail-info flex justify-start gap-10">
            <li class="inline-flex gap-1 items-center">
              <svg class="h-4 w-4 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              {{article.data.posted_at}}
            </li>
            <li class="inline-flex gap-1 items-center">
              <svg class="h-4 w-4 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />  <circle cx="12" cy="7" r="4" /></svg>
              {{article.data.author}}
            </li>
            <li class="inline-flex gap-1 items-center">
              <svg class="h-4 w-4 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />  <circle cx="12" cy="12" r="3" /></svg> 
              25
            </li>
          </ul>

        </div>
        <div class=" md:w-2/6 mt-4 md:mt-0 bg-white p-4 rounded text-gray-600">
          <h2 class=" text-lg">How To Manage ShServer</h2>
          <p class="text-base leading-6 my-3">Read your favorites articles whenever and wherever, online and offline.</p>
          <a href="javascript:void()" class="uppercase">Read Now</a>
        </div>
      </div>
      
    </div>
    <!--  article details-->
    <section class="bg-body border-b py-24 px-12 md:px-24">
      <div class="md:flex justify-between gap-5 text-gray-700">
        <!-- left side -->
        <div class="w-full md:w-5/6 bg-white p-12">
          <h2 class="text-xl md:text-3xl font-semibold mb-3">
            {{article.data.title_en}}
          </h2>
          <span class="text-lg font-semibold">0 comment</span>
          <img :src="article.data.cover_image" class="my-5 rounded" :alt="article.data.title_en">
          <div class="article-content my-6 clear-both" v-html="article.data.content_en"></div>

          <!-- share article -->
         
          <div class="article-share flex justify-start gap-2">
            <span class="text-lg font-semibold mr-6">Share This Article</span>
            <a href="">
              <svg class="social-icon"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
            </a>
            <a href="">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"  class="social-icon opacity-75"
                width="24" height="24"
                viewBox="0 0 24 24"
                style=" ">    <path d="M 12 2 C 6.486 2 2 6.262 2 11.5 C 2 14.045 3.088 16.487484 5 18.271484 L 5 22.617188 L 9.0800781 20.578125 C 10.039078 20.857125 11.02 21 12 21 C 17.514 21 22 16.738 22 11.5 C 22 6.262 17.514 2 12 2 z M 12 4 C 16.411 4 20 7.365 20 11.5 C 20 15.635 16.411 19 12 19 C 11.211 19 10.415672 18.884203 9.6386719 18.658203 L 8.8867188 18.439453 L 8.1855469 18.789062 L 7 19.382812 L 7 18.271484 L 7 17.402344 L 6.3632812 16.810547 C 4.8612813 15.408547 4 13.472 4 11.5 C 4 7.365 7.589 4 12 4 z M 11 9 L 6 14 L 10.5 12 L 13 14 L 18 9 L 13.5 11 L 11 9 z"></path>
              </svg>
            </a>
            <a href="">
              <svg class="social-icon"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />  <rect x="2" y="9" width="4" height="12" />  <circle cx="4" cy="4" r="2" /></svg>
            </a>
            <a href="">
              <svg class="social-icon"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M22 4.01c-1 .49-1.98.689-3 .99-1.121-1.265-2.783-1.335-4.38-.737S11.977 6.323 12 8v1c-3.245.083-6.135-1.395-8-4 0 0-4.182 7.433 4 11-1.872 1.247-3.739 2.088-6 2 3.308 1.803 6.913 2.423 10.034 1.517 3.58-1.04 6.522-3.723 7.651-7.742a13.84 13.84 0 0 0 .497 -3.753C20.18 7.773 21.692 5.25 22 4.009z" /></svg>             
            </a>
            <a href="">
              <svg class="social-icon"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg>
            </a>
          </div>
        </div>
        <!-- related articles -->
        <RecentArticles :tags="tags" type="related" :article="article.data" @updateArticlesList="updateArticles" />
      </div>
  
    </section>
    
</template>
