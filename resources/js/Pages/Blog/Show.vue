<script>
import VueSocialSharing from 'vue-social-sharing'

export default {
    components: {
        Head,
    },
};
</script>
<script setup>
import RecentArticles from './Partials/RecentArticles.vue';
import Icon from '../../Shared/Icon.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import { useLoadOverlay } from '../../LoadingDataIndicator';

const props = defineProps({
  article:Object
})
const loadingOverlay = useLoadOverlay();

const comments = ref([]);
const form = useForm({
  'content'          : '',
  'commentable_type' : '\\App\\Models\\Post',
  'commentable_id'   : 1,
  'parent_id'        :0,
  'user_type'        :'user'
})
async function loadComments(){
    // laoding overlay
    loadingOverlay.show()
    let response =  await fetch(route('article.comments',{slug:props.article.data.slug}))
    comments.value = await response.json()
    // hide overlay
    loadingOverlay.hide()
}
async function submitComment(parent_id){
    // assign comment parent id if it's a comment or a reply
    form.parent_id = parent_id;
    // laoding overlay
    loadingOverlay.show()
    // let response =  await form.post(route('article.comments.add',{slug:props.article.data.slug}),{
    //   preserveScroll:true,
    //   onSuccess : (result)=>{
    //     console.log('result',result.json())
    //     //  form.reset('content')
    //     // comments.value = result 
    //   }
    // })
    let response = fetch(route('article.comments.add',{slug:props.article.data.slug}),{
      method:'post',
      headers: {
      'Content-Type': 'application/json'
      },
      credentials: 'same-origin', 
       body: JSON.stringify(form)
    })
console.log(response)
    // comments.value = await response.json()
    // hide overlay
    loadingOverlay.hide()
}
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
        
        <div class="w-full md:w-5/6 ">
          <div class="bg-white p-12">
            <h2 class="text-xl md:text-3xl font-semibold mb-3">
              {{article.data.title_en}}
            </h2>
            <span class="text-lg font-semibold">{{article.data.comments_count}} comment</span>
            <img :src="article.data.cover_image" class="my-5 rounded" :alt="article.data.title_en">
            <div class="article-content my-6 clear-both" v-html="article.data.content_en"></div>

            <!-- share article -->
          
            <div class="article-share flex justify-start gap-2">
              <span class="text-lg font-semibold mr-6">Share This Article</span>
              <!-- facebook -->
              <ShareNetwork
                    network="facebook"
                    :url="route('blog.show',{slug:article.data.slug})"
                    :title="article.data.title_en"
                    :description="`in this Article we are going to talk about ${article.data.title_en} and explore every some informations around this topic`"
                    :quote="`Learning made easy  with us in ${$page.props.site_settings.site_name}`"
                    :hashtags="article.data.keywords"
                    :media="article.data.cover_image"
                  >
                    <svg class="social-icon"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
              </ShareNetwork>
              <!-- messenger -->
              <ShareNetwork
                    network="messenger"
                    :url="route('blog.show',{slug:article.data.slug})"
                    :title="article.data.title_en"
                    :description="`in this Article we are going to talk about ${article.data.title_en} and explore every some informations around this topic`"
                    :quote="`Learning made easy  with us in ${$page.props.site_settings.site_name}`"
                    :hashtags="article.data.keywords"
                    :media="article.data.cover_image"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"  class="social-icon opacity-75 hover:fill-main-hover-color"
                  width="24" height="24"
                  viewBox="0 0 24 24"
                  style=" ">    <path d="M 12 2 C 6.486 2 2 6.262 2 11.5 C 2 14.045 3.088 16.487484 5 18.271484 L 5 22.617188 L 9.0800781 20.578125 C 10.039078 20.857125 11.02 21 12 21 C 17.514 21 22 16.738 22 11.5 C 22 6.262 17.514 2 12 2 z M 12 4 C 16.411 4 20 7.365 20 11.5 C 20 15.635 16.411 19 12 19 C 11.211 19 10.415672 18.884203 9.6386719 18.658203 L 8.8867188 18.439453 L 8.1855469 18.789062 L 7 19.382812 L 7 18.271484 L 7 17.402344 L 6.3632812 16.810547 C 4.8612813 15.408547 4 13.472 4 11.5 C 4 7.365 7.589 4 12 4 z M 11 9 L 6 14 L 10.5 12 L 13 14 L 18 9 L 13.5 11 L 11 9 z"></path>
                </svg>
              </ShareNetwork>
              <!-- linkedin  -->
              <ShareNetwork
                    network="linkedin"
                    :url="route('blog.show',{slug:article.data.slug})"
                    :title="article.data.title_en"
                    :description="`in this Article we are going to talk about ${article.data.title_en} and explore every some informations around this topic`"
                    :quote="`Learning made easy  with us in ${$page.props.site_settings.site_name}`"
                    :hashtags="article.data.keywords"
                    :media="article.data.cover_image"
                  >
                    <svg class="social-icon"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />  <rect x="2" y="9" width="4" height="12" />  <circle cx="4" cy="4" r="2" /></svg>
              </ShareNetwork>
              <!-- twitter -->
              <ShareNetwork
                    network="twitter"
                    :url="route('blog.show',{slug:article.data.slug})"
                    :title="article.data.title_en"
                    :description="`in this Article we are going to talk about ${article.data.title_en} and explore every some informations around this topic`"
                    :quote="`Learning made easy  with us in ${$page.props.site_settings.site_name}`"
                    :hashtags="article.data.keywords"
                    :media="article.data.cover_image"
                  >
                    <svg class="social-icon"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M22 4.01c-1 .49-1.98.689-3 .99-1.121-1.265-2.783-1.335-4.38-.737S11.977 6.323 12 8v1c-3.245.083-6.135-1.395-8-4 0 0-4.182 7.433 4 11-1.872 1.247-3.739 2.088-6 2 3.308 1.803 6.913 2.423 10.034 1.517 3.58-1.04 6.522-3.723 7.651-7.742a13.84 13.84 0 0 0 .497 -3.753C20.18 7.773 21.692 5.25 22 4.009z" /></svg>             
              </ShareNetwork>
              <!-- telegram -->
              <ShareNetwork
                    network="telegram"
                    :url="route('blog.show',{slug:article.data.slug})"
                    :title="article.data.title_en"
                    :description="`in this Article we are going to talk about ${article.data.title_en} and explore every some informations around this topic`"
                    :quote="`Learning made easy  with us in ${$page.props.site_settings.site_name}`"
                    :hashtags="article.data.keywords"
                    :media="article.data.cover_image"
                  >
                    <svg class="social-icon"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg>
              </ShareNetwork>
            </div>
          </div>
          <div class=" bg-body py-6">
                <h2 class="text-xl md:text-2xl font-semibold mb-3">
                  Recent Comments
                  <a v-show="!comments.length" href="" @click.prevent="loadComments" class="flex items-center gap-2 float-right text-base text-main-hover-color">
                  <Icon class="w-4 h-4" name="refresh" />
                  Load Comments
                  </a>
                </h2>
                <div v-show="!comments.length" class="bg-blue-100 rounded-lg py-5 px-6 mb-3 text-base text-blue-700 inline-flex items-center w-full" role="alert">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                  </svg>
                  No comment yet ,Be the first who discuss.
                </div>
                <div v-show="comments.length" class="w-full bg-body">
                    <!-- comment -->
                    <div class="flex flex-col md:flex-row  items-center">
                      <img class="w-1/6 rounded-full flex-2" style="height:100px;width:100px" src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="" />
                      <div class="w-5/6 p-6 flex flex-col justify-start">
                        <h5 class="text-gray-900 text-xl mb-2 font-semibold">
                          Anna smith
                          <span class="float-right text-base flex gap-2 items-center font-medium">
                            <svg class="h-4 w-4 text-badge"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            June 28, 2019
                          </span>
                        </h5>
                        <p class="text-gray-700 text-lg mb-4 ">
                          This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                        </p>
                        <a href="" class="w-20 text-lg inline-block text-main-hover-color hover:font-semibold transition-colors duration-300 ease-in-out" type="submit">Reply</a>
                      </div>
                    </div>
                    <!-- sub comment -->
                    <div class="flex flex-col md:flex-row  items-center pl-16">
                      <img class="w-1/6 rounded-full flex-2" style="height:100px;width:100px" src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="" />
                      <div class="w-5/6 p-6 flex flex-col justify-start">
                        <h5 class="text-gray-900 text-xl mb-2 font-semibold">
                          Anna smith
                          <span class="float-right text-base flex gap-2 items-center font-medium">
                            <svg class="h-4 w-4 text-badge"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            June 28, 2019
                          </span>
                        </h5>
                        <p class="text-gray-700 text-lg mb-4 ">
                          This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                        </p>
                        <a href="" class="w-20 text-lg inline-block text-main-hover-color hover:font-semibold transition-colors duration-300 ease-in-out" type="submit">Reply</a>
                      </div>
                    </div>
                </div>
                <div>
                  <h2 class="text-xl md:text-2xl font-semibold mb-3 mt-3">
                    Leave Comment
                  </h2>
                  <div v-if="!$page.props.user" class="bg-blue-100 rounded-lg py-5 px-6 mb-3 text-base text-blue-700 inline-flex items-center w-full" role="alert">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path>
                    </svg>
                    Please Login to leave comment!
                  </div>
                  <form v-else @submit.prevent="submitComment(0)" action="">
                    <textarea v-model="form.content" rows="7"  class="w-full my-6 p-3 md:p-4 text-base md:text-lg text-gray-700 bg-white  focus:outline-none 
                    focus:text-gray-900" placeholder="Write your comment"></textarea>
                    <button type="submit" class="inline-block w-full  bg-btn-bg text-center text-white p-2 text-base md:text-lg rounded opacity-90 hover:opacity-100  ">
                      Submit Your Comment
                    </button>
                  </form>
                </div>
          </div>
        </div>
        <!-- related articles -->
        <RecentArticles :tags="tags" type="related" :article="article.data" @updateArticlesList="updateArticles" />
      </div>
  
    </section>
    
</template>
