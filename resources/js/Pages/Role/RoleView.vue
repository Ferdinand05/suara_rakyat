<template>
    <DashboardLayout title="User Roles" subtitle="User Roles">
        <!-- modal -->
        <Modal btn="+ Tambah" ref="modalCreate">
            <template #header> Tambah Role </template>
            <template #body>
                <form method="post">
                    <div>
                        <FwbInput
                            label="Nama role"
                            v-model="formRole.nama_role"
                        ></FwbInput>
                        <small class="text-red-500">{{
                            formRole.errors.nama_role
                        }}</small>
                    </div>
                </form>
            </template>
            <template #footer>
                <FwbButton @click.prevent="createRole()">Submit</FwbButton>
            </template>
        </Modal>
        <!-- modal -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Nama Role</th>
                        <th scope="col" class="px-6 py-3">Jumlah User</th>
                        <th scope="col" class="px-6 py-3">Tanggal Dibuat</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(role, i) in roles.data"
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ i + 1 }}
                        </th>
                        <td class="px-6 py-4">{{ role.nama_role }}</td>
                        <td class="px-6 py-4">{{ role.users.length }}</td>
                        <td class="px-6 py-4">{{ role.created_at }}</td>
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
import DashboardLayout from "../Layouts/DashboardLayout.vue";
import Modal from "../../Components/Modal.vue";
import { FwbButton, FwbInput } from "flowbite-vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { inject } from "vue";
import Swal from "sweetalert2";
const route = inject("route");
const formRole = useForm({
    nama_role: null,
});
defineProps({
    roles: Object,
});
const modalCreate = ref(null);
function createRole() {
    formRole.post(route("role.store"), {
        onSuccess: () => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Role berhasil dibuat",
                showConfirmButton: false,
                timer: 1500,
            });

            modalCreate.value.closeModal();
        },
    });
}
</script>
