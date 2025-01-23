<template>
    <DefaultLayout title="Profile">
        <div
            class="w-full h-56 bg-no-repeat bg-cover"
            style="background-image: url('img/profile/waves.svg')"
        ></div>

        <div class="px-8 md:px-16">
            <div class="font-bold tracking-wider text-xl md:text-2xl mb-3">
                Profile
            </div>
            <div>
                <div class="space-y-1">
                    <h1
                        class="font-semibold text-3xl md:text-4xl tracking-wider"
                    >
                        Ferdinand
                    </h1>
                    <h2 class="italic">fkoryanto@gmail.com</h2>
                    <h2 class="italic">089312312</h2>
                    <small class="text-sm text-gray-600"
                        >Akun dibuat pada {{ user.data.created_at }}</small
                    >
                </div>
                <hr class="border-b border-b-blue-500 mt-4 md:mt-6" />
                <div class="mb-10 mt-2">
                    <h1
                        class="font-bold tracking-wider mb-3 text-xl md:text-2xl"
                    >
                        Pengaduan Saya
                        <span
                            class="bg-blue-600 uppercase text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"
                            >{{ user.data.pengaduan.length }}</span
                        >
                    </h1>
                    <!-- kumpulan pengaduan -->
                    <div class="flex flex-wrap gap-3 md:gap-4">
                        <a
                            v-for="p in user.data.pengaduan"
                            :href="route('detail.pengaduan', p.id)"
                            class="block max-w-sm p-3 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                        >
                            <h5
                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                            >
                                Pengaduan
                                <span class="text-blue-600">{{
                                    p.kategori
                                }}</span>
                            </h5>
                            <div
                                class="font-normal text-gray-700 dark:text-gray-400"
                            >
                                <dd class="text-lg font-semibold">
                                    <span
                                        v-if="p.status == 'pending'"
                                        class="bg-blue-200 uppercase text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"
                                        >{{ p.status }}</span
                                    >
                                    <span
                                        v-else-if="p.status == 'diproses'"
                                        class="bg-gray-300 uppercase text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300"
                                        >{{ p.status }}</span
                                    >
                                    <span
                                        v-else-if="p.status == 'ditolak'"
                                        class="bg-red-200 uppercase text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"
                                        >{{ p.status }}</span
                                    >
                                    <span
                                        v-else
                                        class="bg-green-200 uppercase text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"
                                        >{{ p.status }}</span
                                    >
                                </dd>
                                <div class="mt-2 md:mt-3">
                                    <div
                                        class="italic"
                                        v-if="p.tanggapan.length == 0"
                                    >
                                        Belum ada tanggapan
                                    </div>
                                    <div v-else class="font-semibold">
                                        {{ p.tanggapan.length }} Tanggapan
                                    </div>
                                    <small>Dibuat {{ p.created_at }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script setup>
import DefaultLayout from "../Layouts/DefaultLayout.vue";
defineProps({
    user: Object,
});
</script>
