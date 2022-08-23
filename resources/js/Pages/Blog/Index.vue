<script>
import throttle from 'lodash/throttle'
import pickBy from 'lodash/pickBy'

export default {
  props: ['articles','tags','categories'],
  data() {
    return {
      // counter only uses this.initialCounter as the initial value;
      // it is disconnected from future prop updates.
      articles: this.articles,
      form:{
        search:''
      }
    }
  },
  methods:{
     updateArticles(payload){
       this.articles.data = JSON.parse(JSON.stringify(payload))
      // emit('update:articles',JSON.parse(JSON.stringify(payload)))
    },
    async filterByCateogry(category_slug){
      let response =  await fetch(route('category.articles',{id:category_slug}))
      // articles.value = (await response.json()).data
      // console.log((await response.json()).data)
      this.articles.data =(await response.json()).data 
    }
    }
    
  // watch: {
  //   form: {
  //     handler:  throttle(async function() {
  //       await this.$inertia.get(route('blog.search'),pickBy(this.form),{  
  //         preserveState: true ,
  //         onSuccess: function (data) { console.log(data.articles) },
  //         onError: errors => {},
  //         onFinish: visit => {},
  //     })
  //     }, 600),
  //     deep: true,
  //   },
  // },
}
</script>
<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { onMounted, ref } from 'vue';
import GlobalSearchHeader from '../../Shared/GlobalSearchHeader.vue';
import ArticlesList from './Partials/ArticlesList.vue';
import RecentArticles from './Partials/RecentArticles.vue';
import Pagination from '../../Shared/Pagination.vue';
const site_settings = usePage().props.value.site_settings
// const props = defineProps({
//      articles : Object,
//      tags : Array,
//      categories: Array
// })
//the articles disposition
const disposition = ref('grid');

// filter articles by category name
// async function filterByCateogry(categorySlug){
//   console.log(categorySlug)
//   await fetch(route('categorie'))
// }
onMounted(() =>{
  window.scrollTo({  top: 500,
  behavior: 'smooth'})
})


</script>
<template>
    <Head title="Blog" />
     <!--search-->
     <GlobalSearchHeader v-model="form.search" linkToSearch="blog" propertyToReload="articles"/>
     <!-- latest courses -->
    <section class="bg-body border-b py-24 px-12 md:px-24 text-gray-700">
      <!-- categories -->
      <h2 class="text-lg md:text-2xl font-bold">Filter By Categories</h2>
      <div class="categories w-full py-4 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 items-center gap-2 border-b-2 my-6 border-gray-600 ">
          <a href="" class="category-badge " 
          v-for="(category,i) in categories" :key="i"
          @click.prevent="filterByCateogry(category.slug)"
          >
          {{category.name_en}}
          </a>
      </div>
      <div class="md:flex justify-between gap-5">
        <!-- left side -->
        <div class="w-full md:w-5/6">
          <!-- disposition filters -->
          <div class="flex justify-between items-center text-gray-700">
            <h2 class="text-lg md:text-2xl font-bold">Featured Posts</h2>
            <div class="disposition-filter inline-flex text-gray-700 space-x-2">
              <!-- grid -->
              <a @click.prevent="disposition = 'grid'" class="md:py-2 px-1 md:px-3 bg-badge text-white hover:bg-badge hover:text-white rounded" href="">
                <svg class="h-5 w-5 mt-2 md:mt-0"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="7" height="7" />  <rect x="14" y="3" width="7" height="7" />  <rect x="14" y="14" width="7" height="7" />  <rect x="3" y="14" width="7" height="7" /></svg>
              </a>
              <!-- list -->
              <a @click.prevent="disposition = 'list'"  class="md:py-2 px-1 md:px-3 bg-white hover:bg-badge hover:text-white rounded" href="">
                <svg class="h-5 w-5 mt-2 md:mt-0"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="8" y1="6" x2="21" y2="6" />  <line x1="8" y1="12" x2="21" y2="12" />  <line x1="8" y1="18" x2="21" y2="18" />  <line x1="3" y1="6" x2="3.01" y2="6" />  <line x1="3" y1="12" x2="3.01" y2="12" />  <line x1="3" y1="18" x2="3.01" y2="18" /></svg>
              </a>
              <!-- order -->
              <select name="" id="" class="p-2 px-3 bg-badge text-white rounded outline-none">
                <option value="newest" class="bg-white text-gray-700 ">Newest</option>
                <option value="oldest" class="bg-white text-gray-700 ">Oldest</option>
              </select>
            </div>
  
          </div>
          <ArticlesList  :articles="articles.data" :disposition="disposition" />
           <Pagination class="mt-6" :links="articles.meta.links" />

        </div>
        <!-- right side -->
        <RecentArticles :tags="tags" @updateArticlesList="updateArticles"/>
      </div>
  
    </section>
    
</template>
