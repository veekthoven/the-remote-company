<template>
    <div>
        <div>
            <div class="sm:col-span-3 mb-5">
                <label for="first-name" class="block text-sm font-medium text-gray-900">Title</label>
                <div class="mt-1">
                    <input v-model="form.title" type="text" name="title" id="title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                    <div class="text-red-500 text-sm mt-1" v-if="form.errors.title">{{ form.errors.title }}</div>
                </div>
            </div>

            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <div class="mt-1 mb-5">
              <textarea v-model="form.description" id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" />
              <div class="text-red-500 text-sm mt-1" v-if="form.errors.description">{{ form.errors.description }}</div>
            </div>

            <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
            <div class="mt-1">
              <textarea v-model="form.code" id="code" name="code" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" />
              <div class="text-red-500 text-sm mt-1" v-if="form.errors.code">{{ form.errors.code }}</div>
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
    description: null,
    code: null,
    type: 'code'
  })

  function submit() {
    form.post('/resources', {
      onSuccess: () => {
        emit('success')
      }
    })
  }

</script>