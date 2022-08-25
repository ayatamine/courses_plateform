<template>
    <div class="relative z-10  transition-opacity duration-150 ease-linear" :class="loading?'':'hidden'" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-700 bg-opacity-90 transition-opacity"></div>

        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">

            <div class="relative rounded-lg text-left overflow-hidden transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                <div class="flex justify-center items-center space-x-2">
        <div class="spinner-grow inline-block w-8 h-8 bg-current rounded-full opacity-0 text-blue-600" role="status">
            <span class="visually-hidden hidden">Loading...</span>
        </div>
        <div class="
            spinner-grow inline-block w-8 h-8 bg-current rounded-full opacity-0
                text-purple-500
            " role="status">
            <span class="visually-hidden hidden">Loading...</span>
        </div>
        <div class="
            spinner-grow inline-block w-8 h-8 bg-current rounded-full opacity-0
                text-green-500
            " role="status">
            <span class="visually-hidden hidden">Loading...</span>
        </div>
        <div class="spinner-grow inline-block w-8 h-8 bg-current rounded-full opacity-0 text-red-500" role="status">
            <span class="visually-hidden hidden">Loading...</span>
        </div>
        <div class="
            spinner-grow inline-block w-8 h-8 bg-current rounded-full opacity-0
                text-yellow-500
            " role="status">
            <span class="visually-hidden hidden">Loading...</span>
        </div>
        <div class="spinner-grow inline-block w-8 h-8 bg-current rounded-full opacity-0 text-blue-300" role="status">
            <span class="visually-hidden hidden">Loading...</span>
        </div>
        <div class="spinner-grow inline-block w-8 h-8 bg-current rounded-full opacity-0 text-gray-300" role="status">
            <span class="visually-hidden hidden">Loading...</span>
        </div>
        </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
import { usePage } from '@inertiajs/inertia-vue3';
export default{
  
    computed:{
        loading(){
            return usePage().props.value.loading
        }
    }
}
</script>

<style lang="scss" scoped>

</style>