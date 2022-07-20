<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Pdf from '@/Components/Edit/Pdf.vue';
import Code from '@/Components/Edit/Code.vue';
import Url from '@/Components/Edit/Link.vue';

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
            <Url :resource="resource" v-if="resource.type === 'url'" />
        </div>
    </GuestLayout>
</template>