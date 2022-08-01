<template>
  <div>
    <Head title="Apply for Job" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/organizations">Job Application</Link>
      
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.first_name" :error="form.errors.first_name" class="pb-8 pr-6 w-full lg:w-1/2" label="First Name" />
           <text-input v-model="form.last_name" :error="form.errors.last_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Last Name" />
          <text-input v-model="form.other_name" :error="form.errors.other_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Other Name" />
         <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full lg:w-1/2" label="Email" />
          <text-input v-model="form.phone" :error="form.errors.phone" class="pb-8 pr-6 w-full lg:w-1/2" label="Phone" />
          <select-input v-model="form.gender" :error="form.errors.gender" class="pb-8 pr-6 w-full lg:w-1/2" label="Gender">
            <option :value="null" />
            <option value="CA">Male</option>
            <option value="US">Female</option>
          </select-input>
    <div class="mb-6 pb-8 pr-6 w-full lg:w-1/2">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date of Birth</label>
   <Datepicker name="birth__date" v-model="form.birth_date"  :minDate="new Date()" :error="form.errors.birth_date"  :textInputOptions="textInputOptions" /> 
  </div> 
        <select-input v-model="form.marital_status" :error="form.errors.marital_status" class="pb-8 pr-6 w-full lg:w-1/2" label="Marital Status">
            <option :value="null" />
            <option value="Married">Married</option>
            <option value="Single">Single</option>
          </select-input> 
          <text-input v-model="form.nation" :error="form.errors.nation" class="pb-8 pr-6 w-full lg:w-1/2" label="  Nationality" /> 
       <text-input v-model="form.origin" :error="form.errors.origin" class="pb-8 pr-6 w-full lg:w-1/2" label="State of Origin" /> 
        <textarea v-model="form.residence" :error="form.errors.residence" class="pb-8 pr-6 w-full lg:w-1/2" label="Address" />
          <text-input v-model="form.city" :error="form.errors.city" class="pb-8 pr-6 w-full lg:w-1/2" label="City" />
          <text-input v-model="form.state" :error="form.errors.state" class="pb-8 pr-6 w-full lg:w-1/2" label="Province/State" />
          <select-input v-model="form.country" :error="form.errors.country" class="pb-8 pr-6 w-full lg:w-1/2" label="Country">
            <option :value="null" />
            <option value="CA">Canada</option>
            <option value="US">United States</option>
          </select-input>

          <select-input v-model="form.qualification" :error="form.errors.qualification" class="pb-8 pr-6 w-full lg:w-1/2" label="Highest Qualification">
            <option :value="null" />
            <option value="CA">School Cert</option>
            <option value="US">Diploma</option>
            <option value="US">B.sc</option>
            <option value="US">Master</option>
            <option value="US">Phd</option>
          </select-input>
          <text-input v-model="form.institution" :error="form.errors.institution" class="pb-8 pr-6 w-full lg:w-1/2" label=" Institution Obtained From" />
            <div class="mb-6 pb-8 pr-6 w-full lg:w-1/2">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start Date</label>
   <Datepicker name="start_date" v-model="form.start_date"  :minDate="new Date()" :error="form.errors.start_date"  :textInputOptions="textInputOptions" /> 
  </div>
   <div class="mb-6 pb-8 pr-6 w-full lg:w-1/2">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">End Date</label>
   <Datepicker name="end_date" v-model="form.end_date"  :minDate="new Date()" :error="form.errors.end_date"  :textInputOptions="textInputOptions" /> 
  </div>
     <select-input v-model="form.mysc" :error="form.errors.nysc" class="pb-8 pr-6 w-full lg:w-1/2" label="NYSC ?">
            <option :value="null" />
            <option value="Yes">Yes</option>
            <option value="No"> No</option>
          </select-input>
       
           <text-input v-model="form.company_name" :error="form.errors.company_name" class="pb-8 pr-6 w-full lg:w-1/2" label=" Last Place of Employment" />
           <text-input v-model="form.company_address" :error="form.errors.company_address" class="pb-8 pr-6 w-full lg:w-1/2" label="  Employer Address" />
      <div class="mb-6 pb-8 pr-6 w-full lg:w-1/2">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start Date</label>
   <Datepicker name="empsdate" v-model="form.empsdate"  :minDate="new Date()" :error="form.errors.empsdate"  :textInputOptions="textInputOptions" /> 
  </div>
   <div class="mb-6 pb-8 pr-6 w-full lg:w-1/2">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">End Date</label>
   <Datepicker name="empedate" v-model="form.empedate"  :minDate="new Date()" :error="form.errors.empedate"  :textInputOptions="textInputOptions" /> 
  </div>
    <text-input v-model="form.position_held" :error="form.errors.position_held" class="pb-8 pr-6 w-full lg:w-1/2" label="Position Held" />
          <text-input v-model="form.department" :error="form.errors.department" class="pb-8 pr-6 w-full lg:w-1/2" label="Department" />
          <text-input v-model="form.salary" :error="form.errors.salary" class="pb-8 pr-6 w-full lg:w-1/2" label="Salary" />  
          <text-input v-model="form.still_with_them" :error="form.errors.still_with_them" class="pb-8 pr-6 w-full lg:w-1/2" label="Are you still with them?" /> 
     <text-input v-model="form.why_not" :error="form.errors.salary" class="pb-8 pr-6 w-full lg:w-1/2" label="in No, Why not" />  
     
     </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit"> Submit</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout2'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
  },
  layout: Layout,
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        first_name: null,
        last_name: null,
        other_name: null,
        email: null,
        phone: null,
        gender: null,
        birth_date: null,
        address: null,
        city: null,
        region: null,
        country: null,
        qualification: null,
        institution: null,
        start_date: null,
        end_date: null,
        nysc: null,
        company_name: null,
        company_address: null,
        empsdate: null,
        empedate: null,
        position_held: null,
        department: null,
         salary: null,
        still_with_them: null,

        why_not: null,

      }),
    }
  },
  methods: {
    store() {
      this.form.post('/organizations')
    },
  },
}
</script>
