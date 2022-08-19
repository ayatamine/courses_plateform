<script setup>

</script>
<template>
    <section class="bg-white border-b py-8">
      <div class="container mx-auto m-8 text-gray-800">
        <div class="flex flex-wrap flex-col md:flex-row items-center">
          <!--Left Col-->
          <div class="flex flex-col w-full px-8 md:w-3/5 justify-center items-start text-left">
            <h1 class="my-8 md:my-4 text-2xl md:text-5xl font-bold leading-tight">
              Why Choose Us?
            </h1>
            <h1 class="my-3 md:mt-3 md:mb-4 text-2xl md:text-5xl font-bold leading-tight">
              Practical screencasts for awesome developers.
            </h1>
            <h1 class="my-6 text-base md:text-xl font-semibold leading-tight">
              Practical projects to get you ahead..
            </h1>
            <p class="leading-normal text-base md:text-xl  mb-8 ">
              Rather than just teach theory, we focus on real code to inspire your next project. Learning shouldn't be boring, so let's have some fun.
            </p>
            <Link :href="route('login')" class="btn-style-two py-3">
              Learn More
            </Link>
          </div>
          <!--Right Col-->
          <div class="w-full md:w-2/5 px-8 md:px-0 py-6 text-center">
            <img class="w-full  z-50" src="/images/app_development.png" />
          </div>
        </div>
      </div>
    </section>
    <!-- why choose us -->
</template>