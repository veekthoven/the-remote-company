<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Pdf from '@/Components/View/Pdf.vue';
import Code from '@/Components/View/Code.vue';

const props = defineProps({
    resource: Object,
})

</script>

<template>
    <Head title="Welcome" />

    <GuestLayout>
        <div>
            <Pdf :resource="resource" v-if="resource.type === 'pdf'" />
            <Code :resource="resource" v-if="resource.type === 'code'" />
        </div>
    </GuestLayout>
</template>