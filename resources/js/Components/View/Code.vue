<template>
    <div>
      <h3 class="text-3xl font-extrabold">{{ resource.title }}</h3>
      <hr>
      <p class="my-3">{{ resource.body.description }}</p>
      <pre v-highlightjs>
        <code class="html rounded-xl">
          {{ resource.body.code }}
        </code>
      </pre>
      <button @click="copyCode" type="button" class="-mt- inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Copy Code
      </button>
    </div>
</template>

<script setup>
  import { useForm } from '@inertiajs/inertia-vue3'
  import { copyText } from 'vue3-clipboard'

  const props = defineProps({
      resource: Object,
  })

  const { resource } = props;

  const form = useForm({
    title: null,
    description: null,
    code: null,
    type: 'code'
  })

  function submit() {
    form.post('/resources')
  }

  function copyCode() {
    copyText(resource.body.code, undefined, (error, event) => {
      if (error) {
        alert('Can not copy')
      } else {
        alert('Copied')
      }
    })
  }

</script>