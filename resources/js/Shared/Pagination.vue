<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap  list-style-none gap-2 justify-center my-10">
      <template v-for="(link, key) in links">
        <div v-if="link.url === null" :key="key" class="max-h-9 mb-1 mr-1 px-4 py-3 text-lg text-gray-600  text-md leading-3 border rounded" v-html="link.label.replace(/\b(?:Next|Previous)\b/g,'')" />
        <Link v-else :key="`link-${key}`"
         class="max-h-9 leading-6 page-link text-lg text-gray-600 relative block py-1.5 px-3 border-0 bg-gray-200 outline-none transition-all duration-300 rounded hover:text-white hover:bg-badge focus:shadow-none" :class="{ 'bg-badge text-white': link.active }" 
         :href="link.url" 
         v-html="link.label" />
      </template>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
  components: {
    Link,
  },
  props: {
    links: Array,
  },
}
</script>