<template>
    <DashboardLayout title="Kategori Pengaduan" subtitle="Kategori Pengaduan">
        <Modal btn="+ Tambah" ref="modalCreate">
            <template #header> Tambah Kategori </template>
            <template #body>
                <form method="post">
                    <div>
                        <FwbInput
                            label="Nama Kategori"
                            v-model="formKategori.nama_kategori"
                        ></FwbInput>
                        <small class="text-red-500">{{
                            formKategori.errors.nama_kategori
                        }}</small>
                    </div>
                </form>
            </template>
            <template #footer>
                <FwbButton @click.prevent="createKategori()">Submit</FwbButton>
            </template>
        </Modal>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Nama Kategori</th>
                        <th scope="col" class="px-6 py-3">Jumlah Pengaduan</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(kp, i) in kategoriPengaduan.data"
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ i + 1 }}
                        </th>
                        <td class="px-6 py-4">{{ kp.nama_kategori }}</td>
                        <td class="px-6 py-4">{{ kp.pengaduans }}</td>
                        <td class="px-6 py-4">{{ kp.created_at }}</td>
                        <td class="px-6 py-4">
                            <div class="flex gap-x-2">
                                <FwbButton size="xs" color="red"
                                    ><svg
                                        class="w-5 h-5 text-gray-100 dark:text-white"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"
                                        />
                                    </svg>
                                </FwbButton>
                                <Modal btn="Edit" size="sm">
                                    <template #header>Edit Role</template>
                                </Modal>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>

<script setup>
defineProps({
    kategoriPengaduan: Object,
});
import DashboardLayout from "../Layouts/DashboardLayout.vue";
import Modal from "../../Components/Modal.vue";
import { FwbButton, FwbInput } from "flowbite-vue";
import { useForm } from "@inertiajs/vue3";
import { inject } from "vue";
import Swal from "sweetalert2";
import { ref } from "vue";

const route = inject("route");
const formKategori = useForm({
    nama_kategori: null,
});
const modalCreate = ref(null);
function createKategori() {
    formKategori.post(route("kategori-pengaduan.store"), {
        onSuccess: () => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Kategori Pengaduan berhasil dibuat",
                showConfirmButton: false,
                timer: 1500,
            });

            modalCreate.value.closeModal();
        },
    });
}
</script>
