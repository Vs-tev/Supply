<template>
    <jet-authentication-card>
      
        <div class="text-gray-600 text-center ">
            <div class="mb-10">
                The is demo project and registering new user is switched off,
            </div> 
            <inertia-link  :href="route('login')" class="text-sm pt-6 text-gray-700 underline">
                Log in here
            </inertia-link>
        </div>
             
    </jet-authentication-card>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";

export default {
  components: {
    JetAuthenticationCard,
  },
};
</script>
