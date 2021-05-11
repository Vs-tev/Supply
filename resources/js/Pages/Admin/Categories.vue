<template>
    <app-layout>
      <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <!-- Dashboard -->
               <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mb-5">
                   <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8 mb-5">
                     <div class="flex justify-between items-end">
                          <button class="text-indigo-600 text-sm hover:text-indigo-900 pr-3" @click="sortCategory">Sort <span>&#8645;</span> </button>
                        <jet-button-blue class="" type="button" @click="createCategory">
                          My Categories
                        </jet-button-blue>
                     </div>
                    
                   <jet-dialog-modal :show="AddCategoryModal" @close="closeAddCategoryModal">
                      <template #title>
                          Add Category
                      </template>

                      <template #content>
                        <form @submit.prevent="create, updateCategory">
                        <div class="w-1/2 my-6">
                            <jet-label for="name" value="Category name" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                            <jet-input-error :message="form.errors.name" class="mt-2" />
                        </div>
                          </form>
                        </template>
                        <template #footer>
                            <jet-secondary-button class="mr-3" @click="closeAddCategoryModal">
                                Cancel
                            </jet-secondary-button>
                            <jet-button-blue v-if="form.mode == 'create' "  @click="create" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Create Category
                            </jet-button-blue>
                            <jet-button-blue v-if="form.mode == 'edit' "  @click="updateCategory" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                               save
                            </jet-button-blue>
                          </template>
                    </jet-dialog-modal>
                   </div>
                
                    <div class="py-2 grid grid-cols-2 gap-5 grid-flow-row auto-rows-max align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <!-- Catogories -->
                      <div v-for="(category, index) in $page.props.categories" :key="category.id" :class="open == index ? 'h-full duration-500' : 'h-12 duration-500' " class="shadow select-none overflow-hidden border-b border-gray-200 sm:rounded-lg " >
                        <div  class="flex items-stretch justify-between items-center bg-gray-50 px-6 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          <div @click="openTab(index)" class="pt-2 flex-grow cursor-pointer hover:text-gray-700">{{category.name}}</div>  
                          <div>
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 pr-3 capitalize" @click="editCategory(category)">Edit</a>
                            <span class="cursor-pointer font-bold text-lg p-0" v-html="open == index ? '-' : '+' "></span>
                          </div>
                        </div>
                        <div class="border-t bg-white px-6 py-4">
                          <ul>
                            <li v-for="product in category.product " :key="product.id" class=" border-b w-full py-2 text-sm text-gray-900">
                              <div class="flex justify-between w-1/2">
                                  <div>{{product.name}}</div>
                                  <div>{{(product.price / 100).toFixed(2)}} Eur</div>
                              </div>
                             
                              </li>
                          </ul>
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
import JetDialogModal from "@/Jetstream/DialogModal";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetButtonBlue from "@/Jetstream/ButtonBlue";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetInputError from "@/Jetstream/InputError";
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    AppLayout,
    JetDialogModal,
    JetSecondaryButton,
    JetButtonBlue,
    JetInput,
    JetLabel,
    JetInputError,
  },

  data() {
    return {
      AddCategoryModal: false,
      open: -1,
      form: this.$inertia.form({
        id: "",
        name: null,
        mode: "",
        errors: "",
      }),
      categoryName: "ASC",
    };
  },

  methods: {
    create() {
      this.form.post(this.route("categories.store"), {
        onSuccess: () => {
          this.form.reset("name"), this.closeAddCategoryModal();
        },
      });
    },

    sortCategory() {
      if (this.categoryName === "DESC") {
        this.categoryName = "ASC";
      } else {
        this.categoryName = "DESC";
      }

      Inertia.get(
        this.route("categories"),
        {
          search: this.categoryName,
        },
        { preserveState: true }
      );
    },

    openTab: function (index) {
      if (index !== this.open) {
        this.open = index;
      } else {
        this.open = -2;
      }
    },

    OpenCategoryModal: function () {
      this.AddCategoryModal = true;
      this.form.errors = "";
    },

    createCategory() {
      this.form.mode = "create";
      this.form.name = "";
      this.OpenCategoryModal();
    },

    editCategory(category) {
      this.form.name = category.name;
      this.form.id = category.id;
      this.form.mode = "edit";
      this.OpenCategoryModal();
    },

    updateCategory() {
      this.form.post(this.route("category.update"), {
        onSuccess: () => {
          this.closeAddCategoryModal();
          this.form.reset();
        },
      });
    },

    closeAddCategoryModal: function () {
      this.AddCategoryModal = false;
    },
  },
};
</script>
