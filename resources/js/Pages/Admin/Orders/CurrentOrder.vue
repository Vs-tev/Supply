<template>
    <app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
            <div class="flex justify-between items-center mb-6">
             
                <inertia-link class="button-secondary" :href="route('orders')">
                    <span>&#8592;</span>
                    Back to orders
                </inertia-link>
                <a :href="route('show.PDF', $page.props.order[0].id)" class="button-blue">view as &nbsp;<b>pdf</b></a>
               
            </div>
        
            <div class="lg:px-6 sm:px-6 py-4 bg-gray-50 shadow border-b border-gray-200 sm:rounded-lg">
                <div class="flex justify-between text-sm font-medium ">
                    <div class="flex items-baseline">
                        <div class="text-left text-xs font-medium text-gray-500 uppercase mr-3">Order Deteils: </div> 
                        <div class="text-gray-900">{{$page.props.order[0].user.name}}</div>
                    </div>
                    <div class="flex">
                        <div>Positions: <span  class="text-gray-500 mr-2">{{$page.props.order[0].products_count}} Products</span></div>
                        <div class="text-gray-900">/ Status: <span :class="$page.props.order[0].status == 0 ? 'text-red-500' : 'text-green-500' " v-html="$page.props.order[0].status == 0 ? 'Open' : 'Executed <span>&#10003;</span>' "></span></div>
                    </div>
                </div>
               
            </div> 
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">   
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Ttable -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                             Ordered Pieces
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="product in $page.props.order[0].products" :key="product.id">
                            <td class="px-6 py-1 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{product.name}} / {{product.size}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{product.description}}
                                </div>
                            </td>
                            <td class="px-6 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{product.pivot.quantity}}</div>
                            </td>
                            <td class="px-6 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{(product.price / 100).toFixed(2) }} Eur</div>
                            </td>
                           <td class="px-6 py-1 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{((product.total_price)/100).toFixed(2)}} Eur</div>
                            </td>
                        </tr>
                        <tr class=" bg-gray-50"> 
                            <td class="px-6 py-2 font-medium"></td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2 font-medium "></td>
                            <td class="px-6 py-2 font-medium text-sm text-gray-500">Total Amount: <span class="text-blue-600">{{($page.props.total_amount/ 100).toFixed(2) }} Eur </span> </td>
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
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetButtonBlue from "@/Jetstream/ButtonBlue";

export default {
  props: ["page"],
  components: {
    AppLayout,
    JetSecondaryButton,
    JetButtonBlue,
  },

  computed: {
    /*  totalAmount() {
      return $page.props.order[0].map((products) => {
        console.log(products.price);
        return products.price;
      });
    }, */
  },
};
</script>
