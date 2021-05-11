<template>
    <app-layout>
      <!-- Modal change status -->
        <jet-confirmation-modal :show="changeOrderStatusModal" @close="closechangeStatusModal" :max-width="maxWidth">
                <template #title>
                    Change Order Status
                </template>
                <template #content>
                    <div class="text-gray-900 py-4">
                       Order from: <span class="text-gray-400">{{form.order_user}}</span>
                    </div>
                </template>
                <template #footer>
                    <jet-secondary-button @click="closechangeStatusModal">
                        Cancel
                    </jet-secondary-button>

                    <jet-button-blue class="ml-2" @click="orderStatusChange" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" v-html="form.order_status == '1' ? ' Mark as open' : ' Mark as executed' ">
                        
                    </jet-button-blue>
                </template>
              </jet-confirmation-modal>
          <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <!-- Dashboard -->
               <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mb-5">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                       <div class="bg-gray-50 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Dashboard
                       </div>
                       <div class="bg-white border-t border-gray-200 px-6 py-3">
                         <div class="flex w-full">
                           <div class="left w-1/2">
                             <ul>
                               <li class="flex justify-start py-2">
                                 <div class="text-sm font-medium text-gray-900">Orders Today:</div>
                                 <div class="text-sm font-medium text-gray-500 ml-2">{{$page.props.orders_today}}</div>
                               </li>
                               <li class="flex justify-start py-2">
                                 <div class="text-sm font-medium text-gray-900">Status:</div>
                                 <div class="text-sm font-medium text-green-500 ml-2">{{$page.props.status_executed}} Executed / <span class="text-red-500">{{$page.props.status_open}} Open</span></div>
                               </li>
                             </ul>
                           </div>
                           <div class="right w-1/2">
                              <ul>
                               <li class="flex justify-start py-2">
                                 <div class="text-sm font-medium text-gray-900">Orders All Time:</div>
                                 <div class="text-sm font-medium text-gray-500 ml-2">{{$page.props.count_orders}}</div>
                               </li>
                             </ul>
                           </div>
                         </div>
                       </div>
                      </div>
                    </div>
               </div>
               
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
                                Customer
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Ordered (Date/Time) 
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order Status
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
                                  <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                  </div>
                                  <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                      {{order.user.name}}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                       {{order.user.email}}
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"> {{order.updated_at}}</div>
                                <div class="text-sm text-gray-500 ">{{order.time_hour}}</div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap ">
                                <div @click="openChangeOrderSatusModal(order)" class="text-sm cursor-pointer " :class="order.status == 0 ? 'text-red-500 hover:text-red-700' : 'text-green-500 hover:text-green-700' " v-html="order.status == 0 ? 'Open' : 'Executed <span>&#10003;</span>' "> </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                 <inertia-link class="text-indigo-600 hover:text-indigo-900" :href="route('order', order.id)">
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
import JetButtonBlue from "@/Jetstream/ButtonBlue";
import JetConfirmationModal from "@/Jetstream/ConfirmationModal";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
  components: {
    AppLayout,
    JetButtonBlue,
    JetSecondaryButton,
    JetConfirmationModal,
  },
  data() {
    return {
      changeOrderStatusModal: false,
      maxWidth: "lg",
      form: this.$inertia.form({
        id: "",
        order_user: "",
        order_status: "",
      }),
    };
  },
  methods: {
    closechangeStatusModal() {
      this.changeOrderStatusModal = false;
    },

    openChangeOrderSatusModal(order) {
      this.changeOrderStatusModal = true;
      this.form.id = order.id;
      this.form.order_user = order.user.name;
      this.form.order_status = order.status;
    },

    orderStatusChange() {
      this.form.put(this.route("order_status.change"), {
        id: this.form.id,
        onSuccess: () => this.closechangeStatusModal(),
        onFinish: () => this.form.reset(),
      });
    },
  },
};
</script>
