<template>
    <app-layout>
      
        <div class="py-12">
            <div class="max-w-7xl grid grid-cols-9 gap-10 mx-auto sm:px-6 lg:px-8">
                <div class=" col-span-6">
                    <div class="grid-cols-1">
                        <!-- Chekout container -->
                        <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="py-6 px-10 font-light text-sm border-b border-gray-200 uppercase text-gray-500">
                               Products in Basket
                            </div>
                            <div class="pb-6 px-10">
                                <div class="overflow-auto  w-full border-b border-gray-200" v-for="product in basket[0].products" :key="product.id">
                                    <div class="flex items-start py-3">
                                        <div class="flex w-full"> 
                                            <div class="">
                                                <img class="h-20 w-20 mx-auto rounded" :src="product.product_photo_path !== null ? '/storage/'+ product.product_photo_path : '/storage/product-photos/no_img.png'" alt="">
                                            </div>
                                        <div class="ml-4 text-gray-700">
                                            <div class="text-gray-900 font-semibold">{{product.name}}</div>
                                            <div class="text-gray-500 text-sm">Size: {{product.size}}</div>
                                            <div class="text-gray-500 text-sm">Quantity: {{product.pivot.quantity}}</div>
                                        </div>
                                        </div>
                                        
                                        <div class="font-semibold text-gray-700 text-right whitespace-nowrap">
                                            <div class="font-normal text-sm text-gray-500">Price {{(product.price / 100).toFixed(2)}} Eur</div>
                                            <div class="text-gray-900">{{((product.total_price)/100).toFixed(2)}} Eur</div>
                                            <button  class="button-blue bg-transparent hover:bg-transparent hover:text-blue-800 text-blue-500 p-1 text-xs" :disabled="form.processing" @click="removeProduct(product.id)">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-10 pb-5 text-right ">
                                    <div class="text-gray-900 text-lg flex justify-end text-gray-900 font-semibold">
                                        <div class="mr-14">Total:</div>
                                        <div>{{(total_amount/ 100).toFixed(2) }} Eur</div>
                                    </div>
                                
                                </div>
                            </div>
                        
                        </div>
                        <!-- Delivery info -->
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-10">
                            <div class="py-10 px-10 flex justify-start imtes-start">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="34" height="34" viewBox="0 0 24 24" stroke-width="1" stroke="#111827" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="7" cy="17" r="2" />
                                        <circle cx="17" cy="17" r="2" />
                                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                                        <line x1="3" y1="9" x2="7" y2="9" />
                                    </svg>
                                </div>
                                <div class="ml-14 text-gray-800">
                                    <div class="uppercase font-bold">
                                        Free* Standart Delivery
                                    </div>
                                    <p class="text-gray-700 mt-4 text-sm">
                                        Here you can find the delivery conditions from the supplier.
                                    </p>
                                    <p class="underline cursor-pointer hover:text-gray-800 mt-2 text-sm">More info</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-span-3 bg-white overflow-hidden shadow-xl h-72 sm:rounded-lg">
                    <div class="py-6 px-6 font-light text-sm border-b border-gray-200 uppercase text-gray-500">
                        Checkout
                    </div>
                    <div class="py-6 px-6 ">
                        <div class="flex justify-between">
                            <div class="text-gray-700 font-bold">Total:</div>
                            <div class="text-gray-500">{{(total_amount/ 100).toFixed(2) }} Eur</div>
                        </div>
                        <div class="flex justify-between mt-4 border-b gorder-gray-400 pb-4">
                            <div class="text-gray-700 font-bold">Delivery:</div>
                            <div class="text-gray-500">Free</div>
                        </div>
                    </div>
                    <div class="px-6">
                        <button class="button-blue bg-green-500 hover:bg-green-600 w-full font-bold mt-2" @click="ckeckout">
                            Checkout order
                        </button>
                    </div>
                   
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    AppLayout,
  },
  data() {
    return {
      form: this.$inertia.form({
        id: "",
      }),
    };
  },
  computed: {
    basket() {
      return this.$page.props.basket;
    },
    total_amount() {
      return this.$page.props.total_amount;
    },
  },

  methods: {
    ckeckout() {
      Inertia.post(this.route("checkout.order"));
    },

    removeProduct(product_id) {
      this.form.id = product_id;
      this.form.delete(this.route("removeFromBasket"), {
        onSuccess: () => {
          this.form.reset();
        },
      });
    },
  },
};
</script>
