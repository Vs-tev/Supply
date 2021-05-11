<template>
    <app-layout>
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                  <jet-label for="name" value="Category:" />
                    <select class="ml-2 select" @change="showCategory" v-model="selectedCategory">
                        <option value="" selected>All</option>
                        <option v-for="category in categories" :key="category.id">{{category.name}}</option>
                    </select> 
                </div>
                <div class="">
                  <jet-button-blue type="button" @click="AddProductModal">
                      Add Product
                  </jet-button-blue>
                 
                </div>
              </div>
              <!-- Modals -->
              <product-modal ref="ProductModal" :categories="$props.categories"></product-modal>

              <jet-confirmation-modal :show="confirmingProductDeletion" @close="closeDeletionModal" :max-width="maxWidth">
                <template #title>
                    Delete Product
                </template>
                <template #content>
                    <div class="text-gray-400 py-4">
                       {{form.name}} / {{form.size}}
                    </div>
                    Are you sure you want to delete this product? 
                </template>
                <template #footer>
                    <jet-secondary-button @click="closeDeletionModal">
                        Cancel
                    </jet-secondary-button>

                    <jet-button-blue class="ml-2" @click="ProductDeletion" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Delete Product
                    </jet-button-blue>
                </template>
              </jet-confirmation-modal>

              <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Table My Products -->
                <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Product Name
                              </th>
                            
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Size
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                In Stock
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Available
                              </th>
                              <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                              </th>
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200" v-if="products.length">
                            
                         <!--  <product :products="products"  v-if="products.length"></product> -->
                          <tr v-for="product in products" :key="product.id" >
                            <td class="pl-6 pr-4 py-4 whitespace-nowrap" >
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-16 w-16">
                                        <img class="h-16 w-16 rounded-lg object-cover" :src="product.product_photo_path !== null ? '/storage/'+ product.product_photo_path : '/storage/product-photos/no_img.png' "  alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                        {{product.name}}
                                        </div>
                                        <div class="text-sm text-gray-500 whitespace-normal">
                                        {{product.description}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="pl-6 pr-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900" v-if="product.category">
                                {{product.category.name}}
                            
                                </div>
                            </td>
                            <td class="pl-6 pr-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{(product.price / 100).toFixed(2)}} Eur
                                </div>
                            </td>
                            <td class="pl-6 pr-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{product.size}}
                            </td>
                            <td class="pl-6 pr-4 py-4 whitespace-nowrap text-sm text-gray-500">
                              {{product.in_stock}}
                            </td>
                            <td class="pl-6 pr-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                <jet-toggle-switch  @change="toggleProductAvailability(product)" :available="product.available" :id="product.id" ref="rolesSelected"></jet-toggle-switch>
                            </td>
                            <td class="pl-6 pr-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 pr-3" @click="ProductEdit(product)">Edit</a>
                                <a href="#" class="text-red-600 hover:text-indigo-900" @click="openDeletionModal(product)">Delete</a>
                            </td>
                          </tr>
                          </tbody>
                          <tbody v-else>
                             <tr>
                            <td colspan="7" class="text-center uppercase py-6 text-gray-500 ">No Products Found</td>
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
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButtonBlue from "@/Jetstream/ButtonBlue";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetConfirmationModal from "@/Jetstream/ConfirmationModal";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetToggleSwitch from "@/Jetstream/ToggleSwitch";
import ProductModal from "./ProductModal";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: ["categories", "products"],
  components: {
    AppLayout,
    JetButtonBlue,
    JetSecondaryButton,
    JetDialogModal,
    JetConfirmationModal,
    JetInput,
    JetInputError,
    JetLabel,
    JetToggleSwitch,
    "product-modal": ProductModal,
  },
  data() {
    return {
      selectedCategory: "",
      confirmingProductDeletion: false,
      maxWidth: "lg",
      form: this.$inertia.form({
        product_id: "",
        name: "",
        size: "",
      }),
    };
  },
  methods: {
    showCategory() {
      Inertia.get(
        this.route("my_products"),
        {
          category: this.selectedCategory,
        },
        { preserveState: true }
      );
    },

    ProductEdit(product) {
      this.$refs.ProductModal.edit(product);
    },

    AddProductModal() {
      //Open Modal
      this.$refs.ProductModal.open();
    },

    ProductDeletion() {
      this.form.delete(route("product.destroy"), {
        preserveScroll: true,
        onSuccess: () => this.closeDeletionModal(),
      });
    },
    openDeletionModal(product) {
      this.form.product_id = product.id;
      this.form.name = product.name;
      this.form.size = product.size;
      this.confirmingProductDeletion = true;
    },

    closeDeletionModal() {
      this.confirmingProductDeletion = false;
    },

    toggleProductAvailability(product) {
      Inertia.put(this.route("product_availability"), {
        product: product,
      });
    },
  },
};
</script>
