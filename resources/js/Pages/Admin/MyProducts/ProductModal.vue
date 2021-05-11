<template>
<jet-dialog-modal :show="AddProductModal" @close="closeAddProductModal" :max-width="maxWidth">
    <template #content>
        <jet-form-section @submit.prevent="modal_mode == 'add_product' ? addProduct : updateProduct">
            <template #title>
                Product Deteils
            </template>
            <template #description>
                Set your product photo, pice and category.
            </template>

            <template #form>
           
            <!-- Product Photo -->
                <div class="col-span-6 sm:col-span-4 w-full">
                
                    <!-- Product Photo File Input -->
                    <input type="file" class="hidden"
                                ref="photo"
                                @change="updatePhotoPreview">

                    <jet-label for="photo" value="Product Photo" />
                    
                    <!-- Current Product Photo -->
                    <div class="mt-2" v-show="! photoPreview">
                        <img :src="(form.photo && !form.processing) ? ('/storage/' + form.photo) : '/storage/product-photos/no_img.png' " :alt="$page.props.user.name" class="rounded-lg h-20 w-20 object-cover">
                    </div>

                    <!-- New Product Photo Preview -->
                    <div class="mt-2" v-show="photoPreview">
                        <span class="block rounded-lg w-20 h-20"
                                :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <jet-secondary-button class="mt-2 mr-2 whitespace-nowrap" type="button" @click.prevent="selectNewPhoto">
                            Select A New Photo
                        </jet-secondary-button>

                        <jet-secondary-button type="button" class="mt-2 whitespace-nowrap" @click.prevent="deletePhoto" v-if="form.photo">
                            Remove Photo
                        </jet-secondary-button>
                    </div>
                    
                    <jet-input-error :message="form.errors.photo" class="mt-2" />
                </div>
                <!-- Product Name -->
                <div class="col-span-6 gap-4 sm:col-span-6 flex justify-between w-full">
                    <div class="w-1/2">
                        <jet-label for="name" value="Name" />
                        <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                        <jet-input-error :message="form.errors.name" class="mt-2" />
                    </div>
                    <div class="w-1/2">
                        <jet-label for="name" value="Category" />
                        <select class="mt-1 select" v-model="form.category_id">
                        <option :value="category.id" v-for="category in categories" :key="category.id">{{category.name}}</option>
                        <jet-input-error :message="form.errors.category_id" class="mt-2" />
                    </select> 
                    </div>
                </div>
                <!-- Product Price -->
                <div class="col-span-6 gap-4 sm:col-span-6 flex justify-between w-full items-center">   
                    <div class="w-1/2">
                        <jet-label for="name" value="Price in Euro" />
                        <jet-input id="name" v-model="form.price" type="text" class="mt-1 block w-full" />
                        <jet-input-error :message="form.errors.price" class="mt-2" />
                    </div>
    
                    <div class="w-1/2">
                        <jet-label for="name" value="Size" />
                        <jet-input id="name" v-model="form.size" type="text" class="mt-1 block w-full" placeholder="e.g. 1 piece, 1 pack, 1 kg etc"/>
                        <jet-input-error :message="form.errors.size" class="mt-2" />
                    </div>            
                </div>

                             <!-- Product Description -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="name" value="Product description" />
                <jet-input id="name" v-model="form.description" type="text" class="mt-1 block w-full" autocomplete="name" />
                <jet-input-error :message="form.errors.description" class="mt-2" />
            </div>
        
            <!-- Product In Stock -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="In Stock" />
                <jet-input id="name" v-model="form.in_stock" type="text" class="mt-1 block w-3/4" />
                <jet-input-error :message="form.errors.in_stock" class="mt-2" />
            </div>
          
            </template>   
        </jet-form-section>
    </template>

    <template #footer>
        <jet-secondary-button @click="closeAddProductModal">
            Close
        </jet-secondary-button>

        <jet-button-blue class="ml-2" @click="addProduct" v-if="modal_mode == 'add_product' " :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Add Product
        </jet-button-blue>
        <jet-button-blue class="ml-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="updateProduct" v-else >
           Save
        </jet-button-blue>

    </template>
</jet-dialog-modal>
</template>
<script>
import JetButtonBlue from "@/Jetstream/ButtonBlue";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetFormSection from "@/Jetstream/FormSection";

export default {
  name: "ProductModal",
  props: ["categories"],
  components: {
    JetButtonBlue,
    JetDialogModal,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    JetFormSection,
  },
  data() {
    return {
      AddProductModal: false,
      maxWidth: "2xl",
      form: this.$inertia.form({
        id: "",
        name: "",
        description: "",
        photo: null,
        category_id: "",
        price: "",
        size: "",
        description: "",
        in_stock: "",
        errors: "",
      }),
      modal_mode: "",
      photoPreview: null,
    };
  },
  methods: {
    updatePhotoPreview() {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(this.$refs.photo.files[0]);
    },

    selectNewPhoto() {
      this.$refs.photo.click();
    },

    deletePhoto() {
      this.form.delete(route("current-product-photo.destroy"), {
        onSuccess: () => {
          this.photoPreview = null;
          this.form.photo = null;
        },
      });
    },

    addProduct() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0];
      }
      this.form.post(this.route("product.store"), {
        onSuccess: () => {
          this.closeAddProductModal();
          this.form.reset();
        },
      });
    },

    edit: function (product) {
      this.modal_mode = "update_product";
      this.form.id = product.id;
      this.form.name = product.name;
      this.form.description = product.description;
      this.form.photo = product.product_photo_path;
      this.form.category_id = product.category.id;
      this.form.price = product.price;
      this.form.size = product.size;
      this.form.in_stock = product.in_stock;
      this.form.errors = "";
      this.photoPreview = null;
      this.AddProductModal = true;
    },

    updateProduct() {
      if (this.$refs.photo.files.length !== 0) {
        this.form.photo = this.$refs.photo.files[0];
      }
      this.form.post(this.route("product.update"), {
        onSuccess: () => {
          this.closeAddProductModal();
          this.form.reset();
        },
      });
    },

    closeAddProductModal() {
      this.AddProductModal = false;
    },

    open: function () {
      this.modal_mode = "add_product";
      this.AddProductModal = true;
      this.photoPreview = "";
      this.form.reset();
    },
  },
};
</script>