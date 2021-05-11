<template>
    <app-layout>
        <div class="pb-12 pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <div class="mb-6">
                    <inertia-link class="button-secondary" :href="route('customers')">
                        <span>&#8592;</span>
                        Back to customers
                    </inertia-link>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="grid grid-cols-9 gap-4 h-screen-minus-100">
                                <div class="col-span-2 border-r flex items-center">
                                        <div class="px-6 text-center">
                                            <img class="h-28 w-28 rounded-full mx-auto" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">

                                            <div class="text-xl text-gray-700 font-bold mt-4">{{customer[0].name}}</div>
                                            <div class="text-normal text-gray-700 font-bold mt-2">{{customer[0].email}}</div>
                                            <div class="text-normal text-gray-700 mt-6">Member since: {{customer[0].created_at}}</div>
                                        </div>
                                </div>
                                
                                <div class="col-span-7 overflow-y-scroll">
                                   
                                    <div class="ml-6 mr-8 my-8 text-center overflow-hidden border border-b border-gray-200 sm:rounded-lg">
                                         <table class="min-w-full divide-y divide-gray-200 ">
                                            <thead class="bg-gray-50 ">
                                                <tr>
                                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Order date
                                                    </th>
                                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                
                                                <tr v-for="order in customer[0].orders" :key="order.id">
                                                    <td class="px-2 py-1 whitespace-nowrap">
                                                        <div class="text-sm text-left text-gray-900">{{order.updated_at}} - {{order.time_hour}}</div>
                                                    </td>
                                                    <td class="px-2 py-1 whitespace-nowrap">
                                                        <div class="text-left">
                                                             <a class="text-indigo-600 text-sm hover:text-indigo-900 cursor-pointer" :href="route('show.PDF', order.id)">
                                                                Open PDF
                                                            </a>
                                                        </div>
                                                       
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  props: ["customer"],
  components: {
    AppLayout,
  },

  data() {
    return {};
  },

  methods: {},
};
</script>
