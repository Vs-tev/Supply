<template>
    <app-layout>
      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-6 mx-auto justify-center gap-16">
                <!-- Panel -->
                <a :href="route('products')" class=" col-span-9 mx-4 md:mx-0 md:col-span-2 hover:shadow-lg cursor-pointer  bg-white overflow-hidden shadow-xl rounded-lg">
                    <div class="py-10 text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="70" height="70" viewBox="0 0 24 24" stroke-width="1" stroke="#93c5fd" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <circle cx="6" cy="19" r="2" />
                      <circle cx="17" cy="19" r="2" />
                      <path d="M17 17h-11v-14h-2" />
                      <path d="M20 6l-1 7h-13" />
                      <path d="M10 10l6 -6" />
                      <circle cx="10.5" cy="4.5" r=".5" />
                      <circle cx="15.5" cy="9.5" r=".5" />
                    </svg>
                  <div class="text-blue-300 font-semibold mt-4">
                    Make Order
                  </div>
                    </div>

                 </a>

                <!-- Panel -->
                 <div class=" col-span-9 mx-4 md:mx-0 md:col-span-2  bg-blue-300 overflow-hidden shadow-xl rounded-lg">
                    <div class="pt-10 text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="70" height="70" viewBox="0 0 24 24" stroke-width="1" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                    <path d="M18 14v4h4" />
                    <circle cx="18" cy="18" r="4" />
                    <path d="M15 3v4" />
                    <path d="M7 3v4" />
                    <path d="M3 11h16" />
                    </svg>
                  <div class="text-white font-semibold mt-4">
                    Orders Today: {{$page.props.orders_today}}
                  </div>
                    </div>

                 </div>
                 <!-- panel -->
                   <div class=" col-span-9 mx-4 md:mx-0 md:col-span-2  bg-blue-300 overflow-hidden shadow-xl rounded-lg">
                    <div class="pt-10 text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="70" height="70" viewBox="0 0 24 24" stroke-width="1" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                    <path d="M18 14v4h4" />
                    <circle cx="18" cy="18" r="4" />
                    <path d="M15 3v4" />
                    <path d="M7 3v4" />
                    <path d="M3 11h16" />
                    </svg>
                  <div class="text-white font-semibold mt-4">
                   Last 30 Days: {{orders_month}} orders 
                  </div>
                    </div>
                 </div>

                  <!-- Panel -->
                  <a :href="route('profile.show')" class="col-span-9 mx-4 md:mx-0 md:col-span-2 hover:shadow-lg cursor-pointer bg-blue-300 overflow-hidden shadow-xl rounded-lg">
                    <div class="py-10 text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="70" height="70" viewBox="0 0 24 24" stroke-width="1" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                      </svg>
                      <div class="text-white font-semibold mt-4">
                        My Profile
                      </div>
                    </div>
                 </a>

            </div>
          </div>
      </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  props: ["orders_month"],
};
</script>
