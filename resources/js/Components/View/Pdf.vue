<template>
    <div>
      <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <PaperClipIcon class="flex-shrink-0 h-5 w-5 text-gray-400" aria-hidden="true" />
              <span class="ml-2 flex-1 w-0 truncate"> {{ resource.title }} </span>
            </div>
            <div class="ml-4 flex-shrink-0">
              <a :href="resource.body.file" class="font-medium text-indigo-600 hover:text-indigo-500"> Download </a>
            </div>
          </li>
        </ul>
      </dd>
    </div>
</template>

<script setup>
  import { PaperClipIcon } from '@heroicons/vue/solid'
  import { Link } from '@inertiajs/inertia-vue3';

  const props = defineProps({
      resource: Object,
  })

</script>
