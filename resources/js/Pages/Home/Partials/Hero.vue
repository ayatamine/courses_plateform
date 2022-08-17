<script setup>

</script>
<template>
 <!--Hero-->
    <div class="pt-24">
        <div class="carousel relative   container mx-auto py-20">
            <div class="carousel-inner relative overflow-hidden w-full">
              <!--Slide 1-->
                <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                <!-- <div class="carousel-item absolute opacity-0" style="height:50vh;">
                    <div class="block h-full w-full bg-indigo-500 text-white text-5xl text-center">Slide 1</div>
                </div> -->
                <div class="carousel-item absolute opacity-0 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                  <!--Left Col-->
                  <div class="flex flex-col w-full px-8 md:w-2/4 justify-center items-start text-left">
                    <h1 class="my-8 md:my-4 text-2xl md:text-5xl font-bold leading-tight" style="    line-height: 1.2;">
                      Are you ready to take you development Skills To The next Level?
                    </h1>
                    <p class="leading-normal text-lg md:text-xl mb-8">
                      Practical projects to get you ahead. we focus on real code to inspire your next project. Learning shouldn't be boring
                    </p>
                    <div class="flex justify-between items-center gap-4">
                      <a href="" class="btn-style-four">
                        Get Started
                      </a>
                      <a href="" class="btn-style-three">
                        All Articles
                      </a>
                    </div>
                  </div>
                  <!--Right Col-->
                  <div class="w-full md:w-2/4 py-6 text-center">
                    <img class="w-full md:w-4/5 z-50" src="/images/slider/developer.df5907e.svg" />
                  </div>
                </div>
                <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
                
                <!--Slide 2-->
                <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item absolute opacity-0 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                  <!--Left Col-->
                  <div class="flex flex-col w-full px-8 md:w-2/4 justify-center items-start text-left">
                    <h1 class="my-8 md:my-4 text-2xl md:text-5xl font-bold leading-tight" style="    line-height: 1.2;">
                     Great tutorials & Practical screencasts for awesome developers.
                    </h1>
                    <p class="leading-normal text-lg md:text-xl mb-8">
                         Enrich you knowledge by the regular tutorials, playlist and live coach. 
                    </p>
                    <div class="flex justify-between items-center gap-4">
                      <a href="" class="btn-style-two py-3">
                        Get Started
                      </a>
                      <a href="" class="btn-style-three">
                        All Articles
                      </a>
                    </div>
                  </div>
                  <!--Right Col-->
                  <div class="w-full md:w-2/4 py-6 text-center">
                    <img class="w-full min-h-max z-50" src="/images/slider/youtube_video.5791892.svg" />
                  </div>
                </div>
                <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label> 
                
                <!--Slide 3-->
                <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item absolute opacity-0 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                  <!--Left Col-->
                  <div class="flex flex-col w-full px-8 md:w-2/4 justify-center items-start text-left">
                    <h1 class="my-8 md:my-4 text-2xl md:text-5xl font-bold leading-tight" style="    line-height: 1.2;">
                     Because Knowledge is a seed that grows when you read
                    </h1>
                    <p class="leading-normal text-lg md:text-xl mb-8">
                      You can read daily articles on different programming languages and some tricks and topics about the world of software engineering 
                    </p>
                    <div class="flex justify-between items-center gap-4">
                      <a href="" class="btn-style-two py-3">
                        Get Started
                      </a>
                      <a href="" class="btn-style-three">
                        All Articles
                      </a>
                    </div>
                  </div>
                  <!--Right Col-->
                  <div class="w-full md:w-2/4 py-6 text-center">
                    <img class="w-full min-h-max z-50" src="/images/slider/read_post.490a8c5.svg" />
                  </div>
                </div>
                <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
        
                <!-- Add additional indicators for each slide-->
                <!-- <ol class="carousel-indicators">
                    <li class="inline-block mr-3">
                        <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                </ol> -->
                
            </div>
        </div>
      
    </div>
</template>



<style scoped>
     
     .carousel-open{
        display:none
     }
      .carousel-open:checked + .carousel-item {
				position: static;
				opacity: 100;
			}
			.carousel-item {
				-webkit-transition: opacity 0.6s ease-out;
				transition: opacity 0.6s ease-out;
			}
			#carousel-1:checked ~ .control-1,
			#carousel-2:checked ~ .control-2,
			#carousel-3:checked ~ .control-3 {
				display: block;
			}
			.carousel-indicators {
				list-style: none;
				margin: 0;
				padding: 0;
				position: absolute;
				bottom: 2%;
				left: 0;
				right: 0;
				text-align: center;
				z-index: 10;
			}
			#carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
			#carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
			#carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
				color: #2b6cb0;  /*Set to match the Tailwind colour you want the active one to be */
			}
    </style>