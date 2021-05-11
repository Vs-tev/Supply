<template>
    <app-layout>
    
 
        <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div v-if="$page.props.flash.checkout_message && show" class="bg-blue-400 mb-6 -mt-6 px-6 text-gray-50 h-14 w-full rounded flex items-center justify-between">
                <div>
                  {{ $page.props.flash.checkout_message }}
                  </div>
                 <button type="button" @click="show = false">
                    <span class="">&#x2715;</span> 
                  </button>
              </div> 
              <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Date
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Status
                    </th>
                  
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Deteils</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="order in $page.props.orders" :key="order.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        
                        <div class="">
                          <div class="text-sm font-medium text-gray-900">
                          {{order.updated_at}} - {{order.time_hour}}
                          </div>
                          
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900" :class="order.status == 0 ? 'text-red-500' : 'text-green-500'" v-html="order.status == 1 ? 'Delivered or on the road ': 'In progress' "></div>
                    </td>
                
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a class="text-indigo-600 text-sm hover:text-indigo-900 cursor-pointer" :href="route('show.PDF', order.id)">
                          Open PDF
                      </a>
                    </td>
                  </tr>

                  <!-- More people... -->
                </tbody>
              </table>
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
  data() {
    return {
      show: true,
    };
  },
};
</script>
