<template>
    <app-layout>
      <div class="py-12">
        
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-9 gap-6">
              <!-- Panel -->
              <div class="col-span-9 mx-4 md:mx-0 md:col-span-3  bg-white overflow-hidden shadow-xl rounded-lg h-28">
                <div class="flex justify-start items-center px-6 py-5 border-b border-gray-200 bg-gray-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2563eb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                    <path d="M18 14v4h4" />
                    <circle cx="18" cy="18" r="4" />
                    <path d="M15 3v4" />
                    <path d="M7 3v4" />
                    <path d="M3 11h16" />
                  </svg>
                  <div class="text-lg text-blue-600 font-bold ">Today </div>
                 </div>
                <div class="px-6">
                  <table class="w-full divide-y divide-gray-200">
                    <tbody class="divide-y divide-gray-200">
                      <tr class="text-gray-600">
                        <th class="text-left py-2">Sales</th>
                        <td class="text-right py-2">{{$page.props.sales_today}} Eur </td>
                      </tr>
                    </tbody>
                    
                  </table>
                </div>
              </div>

              <!-- Panel -->
              <div class="col-span-9 mx-4 md:mx-0 md:col-span-3 bg-white overflow-hidden shadow-xl rounded-lg h-40">
                 <div class="flex justify-start items-center px-6 py-5 border-b border-gray-200 bg-gray-50">
                   <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1e3a8a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                    <path d="M18 14v4h4" />
                    <circle cx="18" cy="18" r="4" />
                    <path d="M15 3v4" />
                    <path d="M7 3v4" />
                    <path d="M3 11h16" />
                  </svg>
                  <div class="text-lg text-blue-900 font-bold ">Last Week</div>
                 </div>
                <div class="px-6 pb-6">
                  <table class="w-full divide-y divide-gray-200">
                    <tbody class="divide-y divide-gray-200">
                      <tr class="text-gray-600">
                        <th class="text-left py-2">Sales </th>
                        <td class="text-right py-2 whitespace-nowrap">{{$page.props.sales_week}} Eur </td>
                      </tr>
                      <tr class="text-gray-600">
                        <th class="text-left py-2 whitespace-nowrap">New Customers </th>
                        <td class="text-right py-2">{{$page.props.new_customers_week}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Panel -->
              <div class="col-span-9 mx-4 md:mx-0 md:col-span-3 bg-white overflow-hidden shadow-xl rounded-lg h-40">
                 <div class="flex justify-start items-center px-6 py-5 border-b border-gray-200 bg-gray-50">
                   <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1e3a8a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                    <path d="M18 14v4h4" />
                    <circle cx="18" cy="18" r="4" />
                    <path d="M15 3v4" />
                    <path d="M7 3v4" />
                    <path d="M3 11h16" />
                  </svg>
                  <div class="text-lg text-blue-900 font-bold ">Last Month</div>
                 </div>
                <div class="px-6 pb-6">
                  <table class="w-full divide-y divide-gray-200">
                    <tbody class="divide-y divide-gray-200">
                      <tr class="text-gray-600">
                        <th class="text-left py-2">Sales </th>
                        <td class="text-right py-2 whitespace-nowrap">{{$page.props.sales_month}} Eur </td>
                      </tr>
                      <tr class="text-gray-600">
                        <th class="text-left py-2">New Customers </th>
                        <td class="text-right py-2">{{$page.props.new_customers_month}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- Panel -->
              <div class="col-span-9 mx-4 md:mx-0 md:col-span-5 bg-white overflow-hidden shadow-xl rounded-lg h-40">
                <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                  <div class="text-lg text-blue-900 font-bold ">Products / Categories</div>
                 </div>
                <div class="px-6 pb-6">
                <table class="w-full divide-y divide-gray-200">
                  <tbody class="divide-y divide-gray-200">
                    <tr class="text-gray-600">
                      <th class="text-left py-2">Products</th>
                      <td class="text-right py-2">Available {{$page.props.products_available}} / Unavailable {{$page.props.products_unavailable}}</td>
                    </tr>
                    <tr class="text-gray-600">
                      <th class="text-left py-2">Categories </th>
                      <td class="text-right py-2">Used {{$page.props.categories_used}} / Empty {{$page.props.categories_empty}} </td>
                    </tr>
                  </tbody>
                  
                </table>
              </div>
              </div>

              <!-- Panel -->
              <div class="col-span-9 mx-4 md:mx-0 md:col-span-4  bg-white overflow-hidden shadow-xl rounded-lg h-52">
               <div class="flex justify-start items-center px-6 py-5 border-b border-gray-200 bg-gray-50">
                   <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1e3a8a" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <circle cx="6" cy="19" r="2" />
                      <circle cx="17" cy="19" r="2" />
                      <path d="M17 17h-11v-14h-2" />
                      <path d="M20 6l-1 7h-13" />
                      <path d="M10 10l6 -6" />
                      <circle cx="10.5" cy="4.5" r=".5" />
                      <circle cx="15.5" cy="9.5" r=".5" />
                    </svg>
                  <div class="text-lg text-blue-900 font-bold ">Orders</div>
                 </div>
                <div class="px-6 pb-6">
                <table class="w-full divide-y divide-gray-200">
                  <tbody class="divide-y divide-gray-200">
                    <tr class="text-gray-600">
                      <th class="text-left py-2">Today</th>
                      <td class="text-right py-2">{{$page.props.orders_today}}</td>
                    </tr>
                    <tr class="text-gray-600">
                      <th class="text-left py-2">Week </th>
                      <td class="text-right py-2">{{$page.props.orders_week}}</td>
                    </tr>
                    <tr class="text-gray-600">
                      <th class="text-left py-2">Month</th>
                      <td class="text-right py-2">{{$page.props.orders_month}}</td>
                    </tr>
                    
                  </tbody>
                  
                </table>
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
  components: {
    AppLayout,
  },
};
</script>
