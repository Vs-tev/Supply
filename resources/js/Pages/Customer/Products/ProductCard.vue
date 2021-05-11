<template>
    <div class="container mx-auto ">
     
      <div class="h-6 mt-7 flex items-center justify-center absolute w-1/4 left-1/3 top-16  bg-blue-400 text-gray-50 font-medium capitalize text-sm rounded" :class="form.recentlySuccessful ? 'block' : 'hidden' "> Basket was updated</div>

       <div class="h-12 flex items-center mx-6 lg:items-stretch justify-end lg:justify-between focus-within:border-blue-400 border-b-2 border-gray-200 relative z-0">
          <div class="w-1/2">
            <div class="w-2/3 md:w-1/2 h-full lg:flex items-center ">
                <div class="relative w-full">
                  <div class="text-gray-500 absolute ml-0 inset-0 m-auto w-4 h-4">
                      <svg v-if="searchInput.search == '' " xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <circle cx="10" cy="10" r="7" />
                          <line x1="21" y1="21" x2="15" y2="15" />
                      </svg>
                       <button v-else type="button" @click="searchInput.search = '' ">
                          <span class="relative pb-1">&#x2715;</span> 
                        </button>
                  </div>
                  <input v-model="searchInput.search" class="focus:ring-0 border-0 focus:outline-none focus:border-0 w-full text-gray-900 bg-transparent pl-6 py-2" type="text" placeholder="Search" />
                </div>
            </div>
          </div>
      </div>

      <div class="w-full  py-4">
        <table class="w-full mx-6">
          <thead>
            <tr class="tracking-wider">
              <th class="text-gray-600  text-sm uppercase text-left pb-4 font-medium w-1/5">Product Details</th>
              <th class="text-gray-600 text-sm uppercase text-center pb-4 font-medium">Size</th>
              <th class="text-gray-600 text-sm uppercase text-center pb-4 font-medium">Quantity</th>
              <th class="text-gray-600 text-sm uppercase text-center pb-4 font-medium">Price</th>
              <th class="text-gray-600 text-sm uppercase text-center pb-4 font-medium">Total</th>
            </tr>
          </thead>
          <tbody v-if="$page.props.products.data.length">
            <tr class="hover:bg-gray-200" v-for="product in $page.props.products.data" :key="product.id">
              <td class="py-2">
                <div class="flex "> 
                  <div class="w-16">
                    <img class="h-16 mx-auto rounded object-cover" :src="product.product_photo_path !== null ? '/storage/'+ product.product_photo_path : '/storage/product-photos/no_img.png' " alt="">
                  </div>
                  <div class="flex flex-col justify-around ml-4 flex-grow">
                    <span class="text-gray-700">{{product.name}}</span>
                    <span class="text-gray-500 text-sm">{{product.description}}</span>
                  </div>
                </div>
              </td>
              <td class="text-gray-700 text-center py-2">
                {{product.size}}
              </td>
              <td class="py-2">
                
                <div class="flex justify-center">
                  <input v-if="product.orders[0]" :disabled="product.orders[0]" v-model="product.orders[0].pivot.quantity" :class="product.orders[0].pivot.quantity !== '' ? 'text-blue-600': '' " min="0" step="1" class="w-16 text-center bg-transparent focus:ring-0 border-transparent focus:outline-none focus:border-1 focus:border-blue-200	 text-gray-500" type="text" placeholder="0" >
                   <input v-else  v-model="product.quantity" :class="(isNaN(product.quantity) == false && product.quantity !== '') ? 'text-blue-600': '' " min="0" step="1" class="w-16 text-center bg-transparent focus:ring-0 border-transparent focus:outline-none focus:border-1 focus:border-blue-200	 text-gray-500" type="text" placeholder="0">
                </div>
              </td>
              <td class="py-2">
                <div class="text-center font-semibold text-gray-700">{{(product.price / 100).toFixed(2)}} Eur</div>
              </td>
              <td class="py-2 text-center">
                <div class="flex justify-center items-center ">
                  <div v-if="product.orders[0]" class="w-40 text-center font-semibold text-blue-600" v-html="((parseFloat(product.orders[0].pivot.quantity).toFixed(0) * product.price)/100).toFixed(2) + ' Eur' "></div>

                  <div v-else  class="w-40 font-semibold text-gray-700" :class="(isNaN(product.quantity) == false && product.quantity !== '') ? 'text-blue-600': '' " v-html="(isNaN(product.quantity) == false && product.quantity !== '') ? (((parseFloat(product.quantity).toFixed(0) * product.price)/100).toFixed(2)) + 'Eur' : '0.0 Eur' "></div>
                  <button v-if="product.orders[0]" class="button-blue bg-gray-800 p-1 text-2xs" :disabled="form.processing" @click.prevent="removeProducFromBasket(product.id)">Remove</button>
                  <button v-else @click.prevent="addProductToBasket(product.quantity, product.id)" :disabled="form.processing" class="button-blue p-1 text-2xs">Add </button>
                 
                </div>
              </td>
             
            </tr>
          </tbody>
          <tbody v-else>
            <tr>
              <td colspan="5" class=" text-gray-900 capialize pr-8 text-center py-6">No product found</td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</template>
<script>
import JetButtonBlue from "@/Jetstream/ButtonBlue";
import pickBy from "lodash/pickBy";
import throttle from "lodash/throttle";

export default {
  name: "productCard",
  components: {
    JetButtonBlue,
  },

  data() {
    return {
      form: this.$inertia.form({
        id: "",
        quantity: "",
      }),
      searchInput: {
        search: "",
      },
    };
  },

  mounted() {
    this.addQuantityInput;
  },
  watch: {
    searchInput: {
      handler: throttle(function () {
        let query = pickBy(this.searchInput);
        this.$inertia.get(
          this.route("products"),
          Object.keys(query).length ? query : { remember: "forget" },
          { preserveState: true }
        );
      }, 250),
      deep: true,
    },
  },

  methods: {
    searchProduct() {
      this.form.get(this.route("products"), {
        only: ["products"],

        search: this.form.search,
      });
    },

    addQuantityInput: function () {
      this.$page.props.products.push({ quantity: 0 });
      console.log("asdasd");
    },

    addProductToBasket(quantity, product_id) {
      if (isNaN(quantity) == false && quantity !== "") {
        this.form.id = product_id;
        this.form.quantity = quantity;
        this.form.post(this.route("addProductToBasket"));
      } else {
        console.log("input prazen batka");
      }
    },

    removeProducFromBasket(product_id) {
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