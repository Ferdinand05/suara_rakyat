<template>
    <DashboardLayout title="Dashboard Pengaduan" subtitle="List Pengaduan">
        <main>
            <div
                class="my-3 grid gap-y-3 sm:gap-y-0 md:grid-cols-2 md:gap-x-10"
            >
                <FwbSelect
                    placeholder="Filter Kategori"
                    :options="optionsPengaduan"
                    @change="filterKategori()"
                    v-model="formFilterKategori.slug"
                ></FwbSelect>
                <FwbInput
                    placeholder="Cari sesuatu berdasarkan status..."
                    @input="search()"
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
                            <th scope="col" class="px-6 py-3">Nama Pengadu</th>
                            <th scope="col" class="px-6 py-3">Kategori</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(p, i) in pengaduan.data"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                        >
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{
                                    (pengaduan.meta.current_page - 1) *
                                        pengaduan.meta.per_page +
                                    i +
                                    1
                                }}
                            </th>
                            <td class="px-6 py-4">
                                <div>
                                    <div>
                                        {{ p.user.name }}
                                    </div>
                                    <small>{{ p.user.email }}</small>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-medium">
                                    {{ p.kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <select
                                    id="small"
                                    @change="updateStatus($event, p.id)"
                                    :disabled="
                                        formUpdateStatus.processing ||
                                        p.status == 'selesai'
                                    "
                                    class="block w-full text-sm text-gray-900 border border-gray-200 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                                    <option selected disabled>
                                        {{ p.status }}
                                    </option>
                                    <option value="pending">pending</option>
                                    <option value="diproses">diproses</option>
                                    <option value="ditolak">ditolak</option>
                                    <option value="selesai">selesai</option>
                                </select>
                            </td>
                            <td class="px-6 py-4">
                                {{ p.created_at }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-x-2">
                                    <FwbButton
                                        size="xs"
                                        color="red"
                                        @click="deletePengaduan(p.id)"
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
                                    <Link
                                        :href="route('detail.pengaduan', p.id)"
                                        as="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    >
                                        Detail Pengaduan
                                    </Link>
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
                    <li v-for="(links, i) in pengaduan.meta.links">
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
            <small
                >Tampil
                <span class="font-semibold">{{ pengaduan.data.length }}</span>
                dari {{ pengaduan.meta.total }} Data Pengaduan</small
            >
        </div>
    </DashboardLayout>
</template>

<script setup>
import { FwbDropdown, FwbInput, FwbSelect, FwbButton } from "flowbite-vue";
import DashboardLayout from "../Layouts/DashboardLayout.vue";
import Modal from "../../Components/Modal.vue";
import { defineProps, ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const props = defineProps({
    pengaduan: Object,
    kategoriPengaduan: Object,
});

// SECTION filter kategori
const optionsPengaduan = [
    {
        value: "semua",
        name: "Semua",
    },
];
props.kategoriPengaduan.forEach((element) => {
    optionsPengaduan.push({
        value: element.slug,
        name: element.nama_kategori,
    });
});
const formFilterKategori = useForm({
    slug: "",
});
function filterKategori() {
    formFilterKategori.get(route("pengaduan.index"), {
        preserveScroll: true,
        preserveState: true,
    });
}

// SECTION handle search
const formSearch = useForm({
    keyword: "",
});
function search() {
    formSearch.get(route("pengaduan.index"), {
        preserveScroll: true,
        preserveState: true,
    });
}

const formUpdateStatus = useForm({
    id: null,
    status: null,
});

function updateStatus(e, id) {
    formUpdateStatus.id = id;
    formUpdateStatus.status = e.target.value;

    formUpdateStatus.put(route("update.status.pengaduan"), {
        onSuccess: () => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Status berhasil diubah",
                showConfirmButton: false,
                timer: 1000,
            });
        },
    });
}
const formDeletePengaduan = useForm({
    id: null,
});
function deletePengaduan(id) {
    formDeletePengaduan.id = id;
    Swal.fire({
        title: "Are you sure?",
        text: "Anda akan menghapus pengaduan ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            formDeletePengaduan.delete(route("pengaduan.destroy", id), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Pengaduan telah dihapus.",
                        icon: "success",
                    });
                },
            });
        }
    });
}
</script>
