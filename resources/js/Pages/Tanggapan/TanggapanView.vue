<template>
    <DashboardLayout title="Dasbor Tanggapan" subtitle="Tanggapan Pengaduan">
        <main class="space-y-4 mt-3">
            <div class="max-w-lg">
                <FwbInput
                    placeholder="Cari sesuatu..."
                    @input="search()"
                    @keyup.enter="search()"
                    v-model="formSearch.keyword"
                ></FwbInput>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table
                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                >
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                    >
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Text</th>
                            <th scope="col" class="px-6 py-3">User</th>
                            <th scope="col" class="px-6 py-3">Category</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(t, i) in tanggapan.data"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                        >
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{
                                    (tanggapan.meta.current_page - 1) *
                                        tanggapan.meta.per_page +
                                    i +
                                    1
                                }}
                            </th>
                            <td class="px-6 py-4">
                                {{ t.text }}
                            </td>
                            <td class="px-6 py-4">{{ t.user.name }}</td>
                            <td class="px-6 py-4">
                                {{ t.pengaduan.kategori }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-x-1">
                                    <FwbButton
                                        @click="deleteTanggapan(t.id)"
                                        type="button"
                                        size="sm"
                                        color="red"
                                    >
                                        <svg
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
                                            /></svg
                                    ></FwbButton>
                                    <Modal btn="Edit" ref="modalRef">
                                        <template #header
                                            >Form Edit Tanggapan</template
                                        >
                                        <template #body>
                                            <form
                                                action=""
                                                @submit.prevent="
                                                    updateTanggapan(t, i)
                                                "
                                                method="post"
                                            >
                                                <FwbTextarea
                                                    label="Tanggapan"
                                                    v-model="t.text"
                                                >
                                                </FwbTextarea>

                                                <FwbButton
                                                    type="submit"
                                                    size="sm"
                                                    class="mt-2"
                                                    >Update</FwbButton
                                                >
                                            </form>
                                        </template>
                                    </Modal>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <div class="mt-3 md:mt-5">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px text-base h-10">
                    <li v-for="(links, i) in tanggapan.meta.links">
                        <Link
                            v-html="links.label"
                            :href="links.url"
                            :class="
                                links.active == true
                                    ? 'flex items-center justify-center px-4 h-10 leading-tight text-gray-800 font-medium bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'
                                    : 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'
                            "
                        ></Link>
                    </li>
                </ul>
            </nav>
        </div>
    </DashboardLayout>
</template>

<script setup>
import { FwbButton, FwbInput, FwbTextarea } from "flowbite-vue";
import DashboardLayout from "../Layouts/DashboardLayout.vue";
import Modal from "../../Components/Modal.vue";
import Swal from "sweetalert2";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
defineProps({
    tanggapan: Object,
});

const formDeleteTanggapan = useForm({
    id: null,
});
function deleteTanggapan(id) {
    formDeleteTanggapan.id = id;
    Swal.fire({
        title: "Are you sure?",
        text: "Anda akan menghapus tanggapan ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            formDeleteTanggapan.delete(route("tanggapan.destroy", id), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Tanggapan telah dihapus.",
                        icon: "success",
                    });
                },
            });
        }
    });
}

const modalRef = ref(null);
const formUpdateTanggapan = useForm({
    text: null,
    id: null,
});

function updateTanggapan(tanggapan, index) {
    formUpdateTanggapan.text = tanggapan.text;
    formUpdateTanggapan.id = tanggapan.id;

    formUpdateTanggapan.put(route("tanggapan.update", tanggapan.id), {
        preserveScroll: true,
        onSuccess: () => {
            Swal.fire({
                title: "Good job!",
                text: "Data berhasil diubah!",
                icon: "success",
            });

            modalRef.value[index].closeModal();
        },
    });
}

const formSearch = useForm({
    keyword: "",
});

function search() {
    formSearch.get(route("tanggapan.index"), {
        preserveScroll: true,
        preserveState: true,
    });
}
</script>
