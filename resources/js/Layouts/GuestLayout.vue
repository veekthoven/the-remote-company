<template>
  <div class="bg-sky-500">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center px-2 lg:px-0">
          <div class="flex">
            <Link href="/admin" class="rounded-md py-2 px-3 text-sm font-medium text-white hover:bg-sky-400">Admin Dashboard</Link>
          </div>
        </div>
      </div>
    </div>
  </div>

  <main class="max-w-5xl mx-auto pt-10 pb-12 px-4 lg:pb-16">
    <div>
      <slot />
    </div>
  </main>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';

</script>