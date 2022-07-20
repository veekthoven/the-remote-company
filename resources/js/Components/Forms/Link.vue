<template>
    <div>
        <div>
            <div class="sm:col-span-3 mb-5">
                <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                <div class="mt-1">
                    <input v-model="form.title" type="text" name="title" id="title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                    <div class="text-red-500 text-sm mt-1" v-if="form.errors.title">{{ form.errors.title }}</div>
                </div>
            </div>

            <div class="sm:col-span-3 mb-5">
                <label for="link" class="block text-sm font-medium text-gray-900">Link</label>
                <div class="mt-1">
                    <input v-model="form.link" type="text" name="link" id="link" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                    <div class="text-red-500 text-sm mt-1" v-if="form.errors.link">{{ form.errors.link }}</div>
                </div>
            </div>

            <div class="relative flex items-start">
              <div class="flex items-center h-5">
                <input v-model="form.new_tab" id="open" name="open" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                <div class="text-red-500 text-sm mt-1" v-if="form.errors.new_tab">{{ form.errors.new_tab }}</div>
              </div>
              <div class="ml-3 text-sm">
                <label for="open" class="font-bold text-gray-900">Open on a new tab</label>
              </div>
            </div>

            <div class="mt-4 sm:flex-none">
                <button @click="submit" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Submit</button>
            </div>
          </div>
    </div>
</template>

<script setup>
  import { useForm } from '@inertiajs/inertia-vue3'

  const emit = defineEmits(['success'])

  const form = useForm({
    title: null,
    link: null,
    new_tab: false,
    type: 'url'
  })

  function submit() {
    form.post('/resources', {
      onSuccess: () => {
        emit('success')
      }
    })
  }

</script>