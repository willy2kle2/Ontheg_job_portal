<template>
  <div>
    <Head title="Applications" />
    <h1 class="mb-8 text-3xl font-bold">Applications</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
        <label class="block text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="form-select mt-1 w-full">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
     
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-4">S/N</th>
          <th class="pb-4 pt-6 px-4">First Name</th>
          <th class="pb-4 pt-6 px-4">Last Name</th>
          <th class="pb-4 pt-6 px-4">email</th>
          <th class="pb-4 pt-6 px-4" >Phone</th>
          <th class="pb-4 pt-6 px-4">Position</th>
          <th class="pb-4 pt-6 px-4">Qualification</th>
          <th class="pb-4 pt-6 px-4">Location</th>
          

        </tr>
        <tr v-for="(application, index) in applications.data" :key="application.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                    
                 <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/applications/${application.id}/edit`">
              {{index+1}}
              <icon v-if="application.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>    
                    </td>
          <td class="border-t">
            <Link class="flex items-center px-4 py-4 focus:text-indigo-500" :href="`/applications/${application.id}/edit`">
              {{ application.first_name }}
              <icon v-if="application.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>
          </td>
          
          <td class="border-t">
            <Link class="flex items-center px-4 py-4" :href="`/applications/${application.id}/edit`" tabindex="-1">
              {{ application.last_name }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-4 py-4" :href="`/applications/${application.id}/edit`" tabindex="-1">
              {{ application.email }}
            </Link>
          </td>

          <td class="border-t">
            <Link class="flex items-center px-4 py-4" :href="`/applications/${application.id}/edit`" tabindex="-1">
              {{ application.phone }}
            </Link>
          </td>

          <td class="border-t">
            <Link class="flex items-center px-4 py-4" :href="`/appications/${application.id}/edit`" tabindex="-1">
              {{ application.position }}
            </Link>
          </td>

          <td class="border-t">
            <Link class="flex items-center px-4 py-4" :href="`/applications/${application.id}/edit`" tabindex="-1">
              {{ application.qualification}}
            </Link>
          </td>

          <td class="border-t">
            <Link class="flex items-center px-4 py-4" :href="`/applications/${application.id}/edit`" tabindex="-1">
              {{ application.location}}
            </Link>
          </td>
          <td class="w-px border-t">
            <Link class="flex items-center px-4" :href="`/applications/${application.id}/edit`" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="applications.data.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">No Application found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="applications.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    applications: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/applications', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
