<template>
    <div class="font-poppins scroll-smooth">
        <Head :title="title"></Head>
        <Sidebar></Sidebar>
        <main class="p-4 sm:ml-64 mt-12">
            <h2 class="text-2xl sm:text-4xl font-bold mb-2">{{ subtitle }}</h2>
            <slot></slot>
        </main>
    </div>
</template>
<script setup>
defineProps({
    title: String,
    subtitle: String,
});
import { Head } from "@inertiajs/vue3";
import Sidebar from "../../Components/Sidebar.vue";
</script>
