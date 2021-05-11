<template>
    <div>
        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
            <input type="checkbox" name="toggle" :id="'toggle' + id" class="toggle-checkbox focus:ring-0 ring-0 absolute block w-5 h-5 rounded-2xl bg-gray-50 border-0 appearance-none cursor-pointer" :checked="available === 1 ? 'checked' : false "/>
            <label :for="'toggle' + id" class="toggle-label block overflow-hidden h-5 rounded-full ring-0 bg-gray-300 cursor-pointer"></label>
        </div>
        <label :for="'toggle' + id" class="text-xs text-gray-700" v-html="available === 1 ? 'Available' : 'Unavailable' "></label>
    </div>
</template>
<script>
export default {
  props: ["available", "id"],
};
</script>
<style scoped>
.toggle-checkbox:checked {
  right: 0;
}
.toggle-checkbox:checked + .toggle-label {
  background-color: #68d391;
}
</style>
