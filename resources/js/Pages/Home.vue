<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Pagination from '@/Components/Pagination.vue';

  const props = defineProps({
      resources: Object,
  })

</script>

<template>
    <Head title="Welcome" />

    <GuestLayout>
        <div class="px-4 sm:px-6 lg:px-8">
          <div v-if="resources.data.length">
            <div class="sm:flex sm:items-center">
              <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Resources</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the Resources</p>
              </div>
            </div>

            <div class="mt-8 flex flex-col">
              <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                  <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                          <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">View</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-200 bg-white">
                        <tr v-for="(resource, index) in resources.data" :key="index">
                          <td class="whitespace-nowrap py-4 pl-4 pr-3 text-gray-900 sm:pl-6">
                            <p class="font-bold text-xl">{{ resource.title }}</p>
                            <span class="text-gray-500">{{ resource.type }}</span>
                          </td>
                          <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a 
                              :href="resource.body.link" class="text-indigo-600 hover:text-indigo-900 inline-flex item-center"
                              v-if="resource.type === 'url'"
                              :target="resource.body.new_tab ? '_blank' : '_self'"
                            >
                              View
                              <svg class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                              </svg>
                            </a>

                            <Link v-else :href="`/resources/${resource.id}`" class="text-indigo-600 hover:text-indigo-900"
                            >View</Link>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <Pagination :links="resources.links"/>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center" v-else>
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No resources.</h3>
          </div>
        </div>
    </GuestLayout>
</template>