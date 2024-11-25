<template>
    <div class="scroll-smooth">
        <Head :title="title"></Head>
        <Navbar></Navbar>
        <main>
            <slot></slot>
        </main>

        <Footer></Footer>
    </div>
</template>

<script setup>
defineProps({
    title: String,
});
import { Head } from "@inertiajs/vue3";
import Navbar from "../../Components/Navbar.vue";
import Footer from "../../Components/Footer.vue";
</script>
