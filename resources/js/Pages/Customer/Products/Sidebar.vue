<template>
    <div class="">
     
      <div class="w-64  sm:relative bg-white shadow-xl sm:rounded-lg md:h-auto flex-col justify-between hidden md:flex pb-12">
          <div class="px-8 overflow-hidden w-full">
              <ul class="mt-6">
                  <li class="flex w-full justify-between text-indigo-700 items-center mb-4">
                      <div class="flex items-center">
                          <span @click="setCategory([]), allCategories = 'all', $emit('allCategories', this.allCategories)" class="text-normal font-bold text-gray-900 uppercase cursor-pointer">Categories</span>
                      </div>
                      <div class="py-1 text-gray-400 flex items-center justify-center text-xs">{{$page.props.categories.length}}</div>
                  </li>
              </ul>
              <div class="text-normal capitalize overflow-auto">
                <ul>
                    <li v-for="category in $page.props.categories" :key="category.id">
                      <div class="py-2" >

                          <div @click="setCategory(category.id), allCategories = '', $emit('allCategories', this.allCategories)" 
                            :class="allCategories == '' && category.id == $page.props.products.data[0].category.id ? 'ml-2 text-blue-600 hover:text-blue-600': '' " class="text-gray-700 hover:text-gray-900 hover:underline cursor-pointer">
                            {{category.name}} 
                            <span class="text-sm">({{category.product_count}})</span>
                          </div>
                      </div>
                  </li>
                </ul>
              </div>
          </div>
      </div>

      <!-- On small screen  -->
      <div class="w-64 top-16 absolute z-40 bg-white shadow md:h-full flex-col justify-between md:hidden pb-12 transition duration-150 ease-in-out" id="mobile-nav">
          <div id="openSideBar" class="h-10 w-10 bg-indigo-700 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer" @click="sidebarHandler(true)">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <circle cx="6" cy="10" r="2" />
                  <line x1="6" y1="4" x2="6" y2="8" />
                  <line x1="6" y1="12" x2="6" y2="20" />
                  <circle cx="12" cy="16" r="2" />
                  <line x1="12" y1="4" x2="12" y2="14" />
                  <line x1="12" y1="18" x2="12" y2="20" />
                  <circle cx="18" cy="7" r="2" />
                  <line x1="18" y1="4" x2="18" y2="5" />
                  <line x1="18" y1="9" x2="18" y2="20" />
              </svg>
          </div>
          <div id="closeSideBar" class="hidden h-10 w-10 bg-indigo-700 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white" @click="sidebarHandler(false)">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <line x1="18" y1="6" x2="6" y2="18" />
                  <line x1="6" y1="6" x2="18" y2="18" />
              </svg>
          </div>
          <div class="px-8">
              <ul class="mt-6">
                  <li class="flex w-full justify-between text-indigo-700 items-center mb-4">
                      <div class="flex items-center">
                          <span class="text-sm font-bold text-gray-800 uppercase">Categories</span>
                      </div>
                      <div class="py-1 text-gray-400 flex items-center justify-center text-xs">{{$page.props.categories.length}}</div>
                  </li>
              </ul>
              <ul>
                    <li v-for="category in $page.props.categories" :key="category.id">
                      <div class="py-2">
                          <a href="#" class="text-gray-700">{{category.name}} <span class="text-sm">({{category.product_count}})</span></a>
                      </div>
                  </li>
                </ul>
          </div>
      </div>

    </div>
</template>
<script>
import { Inertia } from "@inertiajs/inertia";
export default {
  name: "sidebar",
  data() {
    return {
      moved: true,
      category_id: "",
      allCategories: "all",
    };
  },

  methods: {
    sidebarHandler() {
      var sideBar = document.getElementById("mobile-nav");
      sideBar.style.transform = "translateX(-260px)";
      if (this.$data.moved) {
        sideBar.style.transform = "translateX(0px)";
        this.$data.moved = false;
      } else {
        sideBar.style.transform = "translateX(-260px)";
        this.$data.moved = true;
      }
    },

    setCategory(id) {
      this.category_id = id;
      Inertia.get(
        this.route("products"),
        {
          category: this.category_id,
        },
        { preserveState: true }
      );
    },
  },
};
</script>


