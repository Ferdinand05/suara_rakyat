<template>
    <DashboardLayout title="Users" subtitle="Users">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            >
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Telepon</th>
                        <th scope="col" class="px-6 py-3">Role</th>
                        <th scope="col" class="px-6 py-3">Bergabung</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(user, i) in users.data"
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ i + 1 }}
                        </th>
                        <td class="px-6 py-4">{{ user.name }}</td>
                        <td class="px-6 py-4">{{ user.email }}</td>
                        <td class="px-6 py-4">{{ user.no_telp }}</td>
                        <td class="px-6 py-4">{{ user.role }}</td>
                        <td class="px-6 py-4">{{ user.created_at }}</td>
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
                                    <template #header>Edit User</template>
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
import { FwbButton } from "flowbite-vue";
defineProps({
    users: Object,
});
</script>
