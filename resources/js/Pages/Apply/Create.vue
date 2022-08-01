<template>
  <Head title="Apply for Job" />
    
  <div class="flex items-center justify-center p-6 min-h-screen bg-indigo-200">
    <div class="w-full max-w-4xl">
      <logo class="block mx-auto w-full max-w-xs fill-white" height="50" />
      <h2>Job Application</h2>
        <form @submit.prevent="apply">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8 border-radius: 0.75rem;">
          <text-input v-model="form.first_name" :error="form.errors.first_name" class="pb-8 pr-6 w-full lg:w-1/2" label="First Name" />
           <text-input v-model="form.last_name" :error="form.errors.last_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Last Name" />
          <text-input v-model="form.other_name" :error="form.errors.other_name" class="pb-8 pr-6 w-full lg:w-1/2" label="Other Name" />
         <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full lg:w-1/2" label="Email" />
          <text-input v-model="form.phone" :error="form.errors.phone" class="pb-8 pr-6 w-full lg:w-1/2" label="Phone" />
          <select-input v-model="form.gender" :error="form.errors.gender" class="pb-8 pr-6 w-full lg:w-1/2" label="Gender">
            <option disabled selected>--Select Gender--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select-input>
    <div class="mb-6 pb-8 pr-6 w-full lg:w-1/2">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date of Birth</label>
   <Datepicker name="birth__date" v-model="form.birth_date" :error="form.errors.birth_date"  :textInputOptions="textInputOptions" /> 
  </div> 
        <select-input v-model="form.marital_status" :error="form.errors.marital_status" class="pb-8 pr-6 w-full lg:w-1/2" label="Marital Status">
            <option disabled selected>--Select Status--</option>
            <option value="Married">Married</option>
            <option value="Single">Single</option>
          </select-input> 
          <text-input v-model="form.nation" :error="form.errors.nation" class="pb-8 pr-6 w-full lg:w-1/2" label="  Nationality" /> 
           <select-input v-model="form.origin" :error="form.errors.origin" class="pb-8 pr-6 w-full lg:w-1/2" label="State of Origin">
                  
											 <option disabled selected>--Select State--</option>
    <option value="Abia">Abia</option>
    <option value="Adamawa">Adamawa</option>
    <option value="Akwa Ibom">Akwa Ibom</option>
    <option value="Anambra">Anambra</option>
    <option value="Bauchi">Bauchi</option>
    <option value="Bayelsa">Bayelsa</option>
    <option value="Benue">Benue</option>
    <option value="Borno">Borno</option>
    <option value="Cross Rive">Cross River</option>
    <option value="Delta">Delta</option>
    <option value="Ebonyi">Ebonyi</option>
    <option value="Edo">Edo</option>
    <option value="Ekiti">Ekiti</option>
    <option value="Enugu">Enugu</option>
    <option value="FCT">Federal Capital Territory</option>
    <option value="Gombe">Gombe</option>
    <option value="Imo">Imo</option>
    <option value="Jigawa">Jigawa</option>
    <option value="Kaduna">Kaduna</option>
    <option value="Kano">Kano</option>
    <option value="Katsina">Katsina</option>
    <option value="Kebbi">Kebbi</option>
    <option value="Kogi">Kogi</option>
    <option value="Kwara">Kwara</option>
    <option value="Lagos">Lagos</option>
    <option value="Nasarawa">Nasarawa</option>
    <option value="Niger">Niger</option>
    <option value="Ogun">Ogun</option>
    <option value="Ondo">Ondo</option>
    <option value="Osun">Osun</option>
    <option value="Oyo">Oyo</option>
    <option value="Plateau">Plateau</option>
    <option value="Rivers">Rivers</option>
    <option value="Sokoto">Sokoto</option>
    <option value="Taraba">Taraba</option>
    <option value="Yobe">Yobe</option>
    <option value="Zamfara">Zamfara</option>
          </select-input>
        
        <textarea-input v-model="form.residence" :error="form.errors.residence" class="pb-8 pr-6 w-full lg:w-1/2" label="Address" />
        
          <text-input v-model="form.city" :error="form.errors.city" class="pb-8 pr-6 w-full lg:w-1/2" label="City" />
          <text-input v-model="form.state" :error="form.errors.state" class="pb-8 pr-6 w-full lg:w-1/2" label="State" />
         
<text-input v-model="form.country" :error="form.errors.country" class="pb-8 pr-6 w-full lg:w-1/2" label="Country" />
          <select-input v-model="form.qualification" :error="form.errors.qualification" class="pb-8 pr-6 w-full lg:w-1/2" label="Highest Qualification">
          <option disabled selected>--Select--</option>
            <option value="School Cert">School Cert</option>
            <option value="Diploma">Diploma</option>
            <option value="B.sc">B.sc</option>
            <option value="Master">Master</option>
            <option value="Phd">Phd</option>
          </select-input>
          <text-input v-model="form.institution" :error="form.errors.institution" class="pb-8 pr-6 w-full lg:w-1/2" label=" Institution Obtained From" />
            <div class="mb-6 pb-8 pr-6 w-full lg:w-1/2">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start Date</label>
   <Datepicker name="start_date" v-model="form.start_date"   :error="form.errors.start_date"  :textInputOptions="textInputOptions" /> 
  </div>
   <div class="mb-6 pb-8 pr-6 w-full lg:w-1/2">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">End Date</label>
   <Datepicker name="end_date" v-model="form.end_date"   :error="form.errors.end_date"  :textInputOptions="textInputOptions" /> 
  </div>
     <select-input v-model="form.nysc" :error="form.errors.nysc" class="pb-8 pr-6 w-full lg:w-1/2" label="NYSC ?">
            <option :value="null" />
            <option value="Yes">Yes</option>
            <option value="No"> No</option>
          </select-input>

          <text-input v-model="form.position" :error="form.errors.position" class="pb-8 pr-6 w-full lg:w-1/2" label="Position Applying for" />
        <textarea-input v-model="form.skills" :error="form.errors.skills" class="pb-8 pr-6 w-full lg:w-1/2" label="Relevant Skills" />
           <text-input v-model="form.company_name" :error="form.errors.company_name" class="pb-8 pr-6 w-full lg:w-1/2" label=" Last Place of Employment" />
           <text-input v-model="form.company_address" :error="form.errors.company_address" class="pb-8 pr-6 w-full lg:w-1/2" label="  Employer Address" />
      <div class="mb-6 pb-8 pr-6 w-full lg:w-1/2">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start Date</label>
   <Datepicker name="empsdate" v-model="form.empsdate"   :error="form.errors.empsdate"  :textInputOptions="textInputOptions" /> 
  </div>
   <div class="mb-6 pb-8 pr-6 w-full lg:w-1/2">
    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">End Date</label>
   <Datepicker name="empedate" v-model="form.empedate"   :error="form.errors.empedate"  :textInputOptions="textInputOptions" /> 
  </div>
    <text-input v-model="form.position_held" :error="form.errors.position_held" class="pb-8 pr-6 w-full lg:w-1/2" label="Position Held" />
          <text-input v-model="form.department" :error="form.errors.department" class="pb-8 pr-6 w-full lg:w-1/2" label="Department" />
          <text-input v-model="form.salary" :error="form.errors.salary" class="pb-8 pr-6 w-full lg:w-1/2" label="Salary" />  
          <text-input v-model="form.still_with_them" :error="form.errors.still_with_them" class="pb-8 pr-6 w-full lg:w-1/2" label="Are you still with them?" /> 
     <text-input v-model="form.why_not" :error="form.errors.salary" class="pb-8 pr-6 w-full lg:w-1/2" label="if No, give reasons" />  
     
     </div>
        <div class="flex items-center justify-end px-8 py-4  border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit"> Submit</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import Logo from '@/Shared/Logo'
import TextInput from '@/Shared/TextInput'
import TextareaInput from '@/Shared/TextareaInput'
import Datepicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'
import LoadingButton from '@/Shared/LoadingButton'
import SelectInput from '@/Shared/SelectInput'
import moment from 'moment'

import { ref, onMounted } from 'vue';



export default {
setup() {
        

       const date = ref(new Date());
        const textInputOptions = ref({
          format: 'MM.dd.yyyy'
        })
        
        return {
            date,
             textInputOptions,
        }
    },
  
  components: {
    Head,
    LoadingButton,
    Logo,
    TextInput,
    SelectInput,
    TextareaInput,
    Datepicker ,
  },
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
        marital_status: null,
        address: null,
        nation: null,
        city: null,
        origin: null,
        region: null,
        country: null,
        qualification: null,
        institution: null,
        start_date: null,
        end_date: null,
        nysc: null,
        skills: null,
        residence: null,
        company_name: null,
        company_address: null,
        empsdate: null,
        empedate: null,
        position_held: null,
        position: null,
        department: null,
         salary: null,
        still_with_them: null,

        why_not: null,
      }),
    }
  },
  methods: {
   
   

    apply(){

this.form.birth_date = moment(this.form.birth_date).format('YYYY-MM-DD');
this.form.end_date = moment(this.form.end_date).format('YYYY-MM-DD');
this.form.start_date = moment(this.form.start_date).format('YYYY-MM-DD');
this.form.empsdate= moment(this.form.empsdate).format('YYYY-MM-DD');
this.form.empedate = moment(this.form.empedate).format('YYYY-MM-DD');


      this.form.post('application')
    }
  },
}
</script>
