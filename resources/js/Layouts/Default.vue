<script>
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Head,
    },
};
</script>
<script setup>
import NavigationMenu from './Partials/NavigationMenu.vue';
import Footer from './Partials/Footer.vue';
import LoadingOverlay from '../Shared/LoadingOverlay.vue';

</script>
<template>
  <Head>
    <title>{{$page.props.site_settings.site_name}}</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <meta  http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta head-key="description" name="description" content="laravel , laravel 5.5 , laravel5.5 , laravel5.4 , laravel 5.4 ,vue js,nuxt js, شرح vue js,مهندس برمجيات ,لارافيل  , larafalt , مقالات لارافيل , laravel ماهو , شرح laravel , دورة لارافيل , php ,
تعلم لارافيل , laravel شرح, php laravel شرح ,   laravel 8 , laravel 7,   full stack,  مسار تعلم back end ,   فرونت اند , front end  , reactjs , nextjs , vuejs
,   كورسات برمجة شبكة عليمية عربية نهتم بانتاج ونشر الفيديوهات التعليميه والدروس التطبيقية باللغه العربية في مجال تصميم المواقع  و البرمجة بشكل عام وبرمجة المواقع بشكل خاص و  التصميم الجرافيك'"/>
      <meta  name="keywords" content="yes,amine,eys" />
      <meta  head-key="og:description" property="og:description" content="laravel , laravel 5.5 , laravel5.5 , laravel5.4 , laravel 5.4 ,vue js,nuxt js, شرح vue js,مهندس برمجيات ,لارافيل  , larafalt , مقالات لارافيل , laravel ماهو , شرح laravel , دورة لارافيل , php ,
تعلم لارافيل , laravel شرح, php laravel شرح ,   laravel 8 , laravel 7,   full stack,  مسار تعلم back end ,   فرونت اند , front end  , reactjs , nextjs , vuejs
,   موسات برمجة شبكة عليمية عربية نهتم بانتاج ونشر الفيديوهات التعليميه والدروس التطبيقية باللغه العربية في مجال تصميم المواقع  و البرمجة بشكل عام وبرمجة المواقع بشكل خاص و  التصميم الجرافيك'">
      <meta head-key="og:facebook-domain-verification" property="facebook-domain-verification" content="">
      <meta  head-key="og:site_name" property="og:site_name" content="">
      <meta  head-key="og:twitter_title" property="twitter:image" content="">
  </Head>
  <div>
    <NavigationMenu/>
    <slot />
    <Footer />
    <LoadingOverlay />

  </div>
</template>