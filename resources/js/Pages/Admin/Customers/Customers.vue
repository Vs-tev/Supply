<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Total Orders
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Open Orders
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                              </th>
                              <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                              </th>
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="customer in customers" :key="customer.id">
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                  <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                  </div>
                                  <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                      {{customer.name}}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                      {{customer.email}}
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{customer.orders_count}} orders</div>
                                <div class="text-sm text-gray-500">Last order: {{customer.last_order}}</div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm" :class="customer.open_orders == 0 ? 'text-green-500' : 'text-red-500' " v-html="customer.open_orders == 0 ? '0 <span>&#10003;</span>': customer.open_orders"></div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" >
                                  {{customer.roles[0].title}}
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <inertia-link class="text-indigo-600 hover:text-indigo-900" :href="route('CustomerDeteils', customer.id)">
                                   Deteils
                                 </inertia-link>
                              </td>
                            </tr>

                            <!-- More people... -->
                          </tbody>
                        </table>
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
  props: ["customers"],
  components: {
    AppLayout,
  },

  data() {
    return {};
  },

  methods: {},
};
</script>
