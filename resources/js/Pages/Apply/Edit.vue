<template>
  <div>
    <Head :title="`${form.first_name} ${form.last_name}`" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/applications">Application for:</Link>
      <span class="text-indigo-400 font-medium">/</span>
      {{ form.first_name }} {{ form.last_name }}
    </h1>
    <trashed-message v-if="application.deleted_at" class="mb-6" @restore="restore"> This Application has been deleted. </trashed-message>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.first_name" :error="form.errors.first_name" class="pb-8 pr-6 w-full lg:w-1/2" label="First name" disabled/>
          <text-input v-model="form.last_name" :error="form.errors.last_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Last name" disabled/>
          
          <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full lg:w-1/2" label="Email" disabled/>
          <text-input v-model="form.phone" :error="form.errors.phone" class="pb-8 pr-6 w-full lg:w-1/2" label="Phone" disabled/>
          <text-input v-model="form.gender" :error="form.errors.gender" class="pb-8 pr-6 w-full lg:w-1/2" label="Gender" disabled/>
          <text-input v-model="form.birth_date" :error="form.errors.birth_date" class="pb-8 pr-6 w-full lg:w-1/2" label="Date of Birth" disabled/>
          <text-input v-model="form.origin" :error="form.errors.origin" class="pb-8 pr-6 w-full lg:w-1/2" label="State of Origin" disabled/>
          <text-input v-model="form.residence" :error="form.errors.residence" class="pb-8 pr-6 w-full lg:w-1/2" label="Address" disabled/>
          <text-input v-model="form.city" :error="form.errors.city" class="pb-8 pr-6 w-full lg:w-1/2" label="City" disabled/>
          <text-input v-model="form.qualification" :error="form.errors.qualification" class="pb-8 pr-6 w-full lg:w-1/2" label="Qualification" disabled/>
         <text-input v-model="form.position" :error="form.errors.position" class="pb-8 pr-6 w-full lg:w-1/2" label="Position Applying for" disabled/>
        <text-input v-model="form.skills" :error="form.errors.skills" class="pb-8 pr-6 w-full lg:w-1/2" label="Skills" disabled/>


<text-input v-model="form.institution" :error="form.errors.institution" class="pb-8 pr-6 w-full lg:w-1/2" label="Institution Attended" disabled/>
          <text-input v-model="form.nysc" :error="form.errors.nysc" class="pb-8 pr-6 w-full lg:w-1/2" label="Attended NYSC ?" disabled/>
         <text-input v-model="form.company_name" :error="form.errors.company_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Last Employer" disabled/>
        <text-input v-model="form.position_held" :error="form.errors.position_held" class="pb-8 pr-6 w-full lg:w-1/2" label="Position Held" disabled/>

        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button v-if="!application.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="reject">Reject Application</button>
          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="button" @click="accept">Accept Application</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import TrashedMessage from '@/Shared/TrashedMessage'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  layout: Layout,
  props: {
    application: Object,
    
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        first_name: this.application.first_name,
        last_name: this.application.last_name,
        other_name: this.application.other_name,
        email: this.application.email,
        phone: this.application.phone,
        address: this.application.address,
        city: this.application.city,
        residence: this.application.residence,
        country: this.application.country,
        position: this.application.position,
        qualification: this.application.qualification,
         gender: this.application.gender,
        birth_date: this.application.birth_date,
         skills: this.application.skills,
        origin: this.application.origin,
        

        institution: this.application.institution,
        nysc: this.application.nysc,
         company_name: this.application.company_name,
        position_held: this.application.position_held,

      }),
    }
  },
  methods: {
    accept() {
      this.form.get(`/applicationj/${this.application.id}`)
    },
    reject() {
      if (confirm('Are you sure you want to reject?')) {
        this.$inertia.get(`/applicationr/${this.application.id}`)
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this contact?')) {
        this.$inertia.put(`/applications/${this.application.id}/restore`)
      }
    },
  },
}
</script>
