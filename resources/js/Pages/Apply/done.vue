<template>
  <Head title="Login" />
  <div class="flex items-center justify-center p-6 min-h-screen bg-white">
    <div class="w-full max-w-md">
      <logo class="block mx-auto w-full max-w-xs fill-white" height="50" />
      <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="goToHome">
        <div class="px-10 py-12">
          <h1 class="text-center text-3xl font-bold">Application Submitted</h1>
          <div class="mt-6 mx-auto w-24 border-b-2" />
          
<p>

    Please note that you be contacted  you are successful
</p>

        </div>
        
      </form>
    </div>
  </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Logo from '@/Shared/Logo'
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
  components: {
    Head,
    LoadingButton,
    Logo,
    TextInput,
  },
  data() {
    return {
      form: this.$inertia.form({
       
      }),
    }
  },
  methods: {

     goToHome(){
   this.$router.push('/'); 
      }
  },
}
</script>
