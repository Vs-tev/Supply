<template>
    <app-layout>
      <div>
      </div>
      <div class="sm:py-6 pt-0 pb-10">
        <div class="flex justify-between sm:px-6 lg:px-8 pb-6">
          <div class="font-semibold text-xl">Category 
            <span class="capitalize text-gray-600" v-if="allCategories !== 'all' && $page.props.products.data[0]">{{$page.props.products.data[0].category.name}}</span>
            <span v-else class="capitalize text-gray-600">{{allCategories}}</span>
          </div>
        </div>

        <div class="flex flex-no-wrap mx-auto sm:px-6 lg:px-8 ">
          <sidebar v-on:allCategories="all_categories($event)"></sidebar>
          <div class="w-full mx-8">
              <!-- Products card -->
              <div class="">
                <product-card></product-card>
              </div>
          </div>
        </div>

      </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Sidebar from "./Sidebar.vue";
import ProductCard from "./ProductCard.vue";

export default {
  components: {
    AppLayout,
    Sidebar,
    ProductCard,
  },
  data() {
    return {
      moved: true,
      allCategories: "",
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
    all_categories(value) {
      this.allCategories = value;
    },
  },
};
</script>
