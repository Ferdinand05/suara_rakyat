<template>
    <DefaultLayout>
        <section class="font-poppins">
            <div style="background-image: url('img/seigaiha.png')" class="p-20">
                <h2 class="sm:text-4xl text-2xl font-bold text-center">
                    Formulir Pengaduan
                </h2>
            </div>
            <div class="mx-8 py-8 sm:py-10 sm:w-1/2 sm:mx-16">
                <div v-if="!$page.props.auth.user.name" class="mb-5">
                    <p class="italic text-gray-500">
                        *Anda Harus Masuk/Daftar untuk melakukan pengaduan.
                    </p>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="kategori" class="font-semibold sm:text-xl"
                            >Kategori Pengaduan</label
                        >
                        <FwbSelect
                            :options="kategoriPengaduan"
                            placeholder="Pilih Kategori"
                            v-model="selectedKategori"
                        ></FwbSelect>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="font-semibold sm:text-xl"
                            >Deskripsi Pengaduan</label
                        >
                        <ckeditor
                            id="deskripsi"
                            :editor="editor"
                            v-model="deskripsi"
                            :config="editorConfig"
                        ></ckeditor>
                    </div>
                    <div class="mb-3">
                        <label for="bukti" class="font-semibold sm:text-xl">
                            Bukti Pendukung Pengaduan</label
                        >
                        <p
                            class="flex items-center text-sm text-gray-500 dark:text-gray-400"
                        >
                            Tips
                            <button
                                data-popover-target="popover-description"
                                data-popover-placement="bottom-end"
                                type="button"
                            >
                                <svg
                                    class="w-4 h-4 ms-2 text-gray-400 hover:text-gray-500"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"
                                    ></path></svg
                                ><span class="sr-only">Show information</span>
                            </button>
                        </p>
                        <div
                            data-popover
                            id="popover-description"
                            role="tooltip"
                            class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400"
                        >
                            <div class="p-3 space-y-2">
                                <h3
                                    class="font-semibold text-gray-900 dark:text-white"
                                >
                                    Hanya Menerima Bukti Gambar/Foto
                                </h3>
                                <p>Menerima Format JPG,JPEG,PNG</p>
                                <h3
                                    class="font-semibold text-gray-900 dark:text-white"
                                >
                                    Bisa Langsung Mengupload lebih dari 1
                                    File/Gambar
                                </h3>
                                <p>
                                    Ketika pemilihan file, blok Gambar/File yang
                                    ingin diupload, pastikan format gambar
                                    sesuai
                                </p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                        <FwbFileInput
                            multiple="true"
                            v-model="files"
                        ></FwbFileInput>
                    </div>
                    <div>
                        <label for="lokasi" class="font-semibold sm:text-xl"
                            >Lokasi Pengaduan</label
                        >
                        <Map></Map>
                    </div>
                </form>
            </div>
        </section>
    </DefaultLayout>
</template>

<script setup>
defineProps({
    kategoriPengaduan: Object,
});
import Map from "../../Components/Map.vue";
import { usePage } from "@inertiajs/vue3";
import DefaultLayout from "../Layouts/DefaultLayout.vue";
import { ref } from "vue";
import Swal from "sweetalert2";
import { Ckeditor } from "@ckeditor/ckeditor5-vue";
import { SimpleUploadAdapter } from "ckeditor5";
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

import {
    ClassicEditor,
    Bold,
    Essentials,
    Heading,
    Indent,
    IndentBlock,
    Italic,
    Link,
    List,
    MediaEmbed,
    Paragraph,
    Table,
    Undo,
    retry,
    Image,
    ImageCaption,
    ImageResize,
    ImageToolbar,
    ImageStyle,
    LinkImage,
    ImageUpload,
} from "ckeditor5";
import "ckeditor5/ckeditor5.css";
import { FwbFileInput, FwbSelect } from "flowbite-vue";
const editor = ClassicEditor;
const editorConfig = {
    height: 500,
    toolbar: [
        "undo",
        "redo",
        "|",
        "heading",
        "|",
        "bold",
        "italic",
        "|",
        "link",
        "insertTable",
        "|",
        "bulletedList",
        "numberedList",
        "indent",
        "outdent",
        "image",
        "imageUpload",
    ],
    plugins: [
        Bold,
        Essentials,
        Heading,
        Indent,
        IndentBlock,
        Italic,
        Link,
        List,
        Paragraph,
        Table,
        Undo,
        SimpleUploadAdapter,
        Image,
        ImageToolbar,
        ImageCaption,
        ImageStyle,
        ImageResize,
        LinkImage,
        ImageUpload,
    ],
    simpleUpload: {
        // URL backend untuk upload gambar
        uploadUrl: "/upload",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    },
};
const page = usePage();
const kategoriPengaduan = [];
page.props.kategoriPengaduan.data.forEach((element) => {
    kategoriPengaduan.push({
        value: element.id,
        name: element.nama_kategori,
    });
});

const deskripsi = ref();
const files = ref();
const selectedKategori = ref();
</script>
