<template>
    <div>
        <div>
            <div class="sm:col-span-3 mb-3">
                <label for="first-name" class="block text-sm font-medium text-gray-900">Title</label>
                <div class="mt-1">
                    <input v-model="form.title" type="text" name="title" id="title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                    <div class="text-red-500 text-sm mt-1" v-if="form.errors.title">{{ form.errors.title }}</div>
                </div>
            </div>

            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
              <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                  <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Upload a PDF file</span>
                    <input @input="form.file = $event.target.files[0]" id="file-upload" name="file-upload" type="file" class="sr-only" />
                  </label>
                  <p class="pl-1">or drag and drop</p>
                </div>
              </div>
            </div>
            <div class="text-red-500 text-sm mt-1" v-if="form.errors.file">{{ form.errors.file }}</div>

            <div class="mt-4 sm:flex-none">
                <button @click="submit" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Submit</button>
            </div>
          </div>
    </div>
</template>

<script setup>
  import { useForm } from '@inertiajs/inertia-vue3'

  const emit = defineEmits(['success'])

   const props = defineProps({
      resource: Object,
  })

  const { resource } = props;

  const form = useForm({
    title: resource.title,
    file: null,
    type: 'pdf'
  })

  function submit() {
    form.post(`/resources/${resource.id}`, {
      onSuccess: () => {
        emit('success')
      }
    })
  }

</script>
