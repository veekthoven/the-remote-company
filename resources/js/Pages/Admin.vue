<script setup>
    import { ref } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import { RadioGroup, RadioGroupDescription, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
    import { CheckCircleIcon, PlusIcon } from '@heroicons/vue/solid'
    import PdfForm from '@/Components/Forms/Pdf.vue';
    import LinkForm from '@/Components/Forms/Link.vue';
    import CodeForm from '@/Components/Forms/Code.vue';
    import AdminLayout from '@/Layouts/AdminLayout.vue';
    import Pagination from '@/Components/Pagination.vue';

    const props = defineProps({
        allResources: Object,
    })

    const resources = [
      { id: 1, title: 'PDF', description: 'Upload a downloadable PDF file.', type: 'pdf'},
      { id: 2, title: 'Link', description: 'Add a link the can be clicked and visited.', type: 'link'},
      { id: 3, title: 'HTML snippet', description: 'Add a HTML code snippet that can be copied.', type: 'code'},
    ]

    let page = ref(1)

    const selectedResource = ref(resources[0])
</script>


<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center" v-if="page == 1 && allResources.data.length">
              <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Resources</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the Resources</p>
              </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button @click="page = 2" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add Resources</button>
                </div>
            </div>

            <div class="sm:flex sm:items-center mb-3" v-if="page == 2">
              <div class="sm:flex-auto">
                <svg @click="page = 1" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
              </div>
            </div>

            <div class="sm:flex sm:items-center mb-3" v-if="page == 3">
              <div class="sm:flex-auto">
                <svg @click="page = 2" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
              </div>
            </div>

            <div class="mt-8 flex flex-col" v-if="page == 1 && allResources.data.length">
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
                        <tr v-for="(resource, index) in allResources.data" :key="index">
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
                            
                            <span class="mx-3">|</span>


                            <Link :href="`/resources/${resource.id}`" class="text-indigo-600 hover:text-indigo-900"
                            >Edit</Link>

                            <span class="mx-3">|</span>

                            <Link :href="`/resources/${resource.id}`" class="text-red-600 hover:text-indigo-900"
                            >Delete</Link>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <Pagination :links="allResources.links"/>
                </div>
              </div>
            </div>

            <div class="text-center" v-if="page == 1 && !allResources.data.length">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No resources</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new resource.</p>
                <div class="mt-6">
                    <button @click="page = 2" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <PlusIcon class="-ml-1 mr-2 h-5 w-5" aria-hidden="true" />
                        New Resource
                    </button>
                </div>
            </div>

            <div v-if="page == 2">
                <RadioGroup v-model="selectedResource">
                    <RadioGroupLabel class="text-2xl font-bold font-medium text-gray-900">What type of resource would you like to create?</RadioGroupLabel>
                    <p class="mt-2 text-sm text-gray-700">Select a resource type and click continue</p>

                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-4">
                    <RadioGroupOption as="template" v-for="resource in resources" :key="resource.id" :value="resource" v-slot="{ checked, active }">
                        <div :class="[checked ? 'border-transparent' : 'border-gray-300', active ? 'border-indigo-500 ring-2 ring-indigo-500' : '', 'relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none']">
                        <span class="flex-1 flex">
                            <span class="flex flex-col">
                            <RadioGroupLabel as="span" class="block text-sm font-medium text-gray-900">
                                {{ resource.title }}
                            </RadioGroupLabel>
                            <RadioGroupDescription as="span" class="mt-1 flex items-center text-sm text-gray-500">
                                {{ resource.description }}
                            </RadioGroupDescription>    
                            </span>
                        </span>
                        <CheckCircleIcon :class="[!checked ? 'invisible' : '', 'h-5 w-5 text-indigo-600']" aria-hidden="true" />
                        <span :class="[active ? 'border' : 'border-2', checked ? 'border-indigo-500' : 'border-transparent', 'absolute -inset-px rounded-lg pointer-events-none']" aria-hidden="true" />
                        </div>
                    </RadioGroupOption>
                    </div>
                </RadioGroup>
                <div class="mt-4 sm:flex-none">
                    <button @click="page = 3" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Continue</button>
                </div>
            </div>

            <div v-if="page == 3">
                <pdf-form v-if="selectedResource.type === 'pdf'" />
                <link-form v-if="selectedResource.type === 'link'" />
                <code-form v-if="selectedResource.type === 'code'" />
            </div>
        </div>
    </AdminLayout>
</template>

