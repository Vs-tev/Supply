<template>
     <jet-dropdown width="96">
        <template #trigger>
            <!-- Bag -->
            <div class="ml-3 cursor-pointer hover:bg-gray-100 rounded p-3">
                <span class="rounded-full h-3 w-3 bg-yellow-600	text-xs right-2 top-2 absolute" v-if="basket[0]"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="" width="32" height="32" viewBox="0 0 24 24" stroke-width="1" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <polyline points="7 10 12 4 17 10" />
                    <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z" />
                    <circle cx="12" cy="15" r="2" />
                </svg>
            </div>
        </template>
        <template #content :class="'w-60'" v-if="basket[0]">
            <!-- Account Management -->
            <div class="block uppercase px-4 py-4 font-semibold text-center text-lg text-gray-700">
               Your Bag
            </div>
         
            <!-- Products in Bag -->
            <div class="" >
              <div class="overflow-auto px-6 w-full border-b border-gray-200" v-for="product in basket[0].products" :key="product.id">
                  <div class="flex items-start -mx-6 px-6 py-3">
                      <div class="flex w-full"> 
                          <div class="">
                              <img class="h-20 w-20 mx-auto rounded object-cover" :src="product.product_photo_path !== null ? '/storage/'+ product.product_photo_path : '/storage/product-photos/no_img.png'" alt="">
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
              <div class="px-6 py-5 text-right">
                  <div class="text-gray-900 flex justify-between text-gray-900 font-semibold">
                      <div>Total:</div>
                      <div>{{(total_amount/ 100).toFixed(2) }} Eur</div>
                  </div>
                  <div class="flex justify-between items-center mt-7">
                  <button @click="removeAllProducts" class="button-blue p-0 bg-transparent hover:bg-transparent text-blue-500 hover:text-blue-800">
                    Remove all
                  </button>
                  <a :href="route('checkoutOrder')" class="button-blue">
                    Checkout order
                  </a>
                  </div>
                  
              </div>
                
            </div>

            
        </template>
        <template #content :class="'w-60'" v-else>
           <div class="block uppercase px-4 py-4 font-semibold text-center text-lg text-gray-700">
               Your Bag is Empty
            </div>
        </template>
    </jet-dropdown>
</template>
<script>
import JetDropdown from "@/Jetstream/Dropdown";
import JetButtonBlue from "@/Jetstream/ButtonBlue";

export default {
  components: {
    JetButtonBlue,
    JetDropdown,
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
    removeProduct(product_id) {
      this.form.id = product_id;
      this.form.delete(this.route("removeFromBasket"), {
        onSuccess: () => {
          this.form.reset();
        },
      });
    },

    removeAllProducts() {
      this.form.delete(this.route("empty.basket"));
    },
  },
};
</script>