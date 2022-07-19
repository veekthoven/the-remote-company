<template>
    <div>
        {{ resource.body.code }}
    </div>
</template>

<script setup>
  import { useForm } from '@inertiajs/inertia-vue3'
  import { component as VueCodeHighlight } from 'vue-code-highlight';

  const props = defineProps({
      resource: Object,
  })

  const form = useForm({
    title: null,
    description: null,
    code: null,
    type: 'code'
  })

  function submit() {
    form.post('/resources')
  }

</script>