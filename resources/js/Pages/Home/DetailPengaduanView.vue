<template>
    <DefaultLayout title="Detail Pengaduan">
        <div
            class="w-full h-40 bg-no-repeat bg-cover"
            style="background-image: url('/img/detail-pengaduan/waves.svg')"
        ></div>
        <main class="py-10 px-8 md:py-12 md:px-16 border-t-teal-400">
            <div class="space-x-2">
                <Link
                    href="/"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                >
                    Home
                </Link>
                <Link
                    :href="route('profile')"
                    class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-sky-600 dark:hover:bg-sky-700 focus:outline-none dark:focus:ring-sky-800"
                >
                    My Profile
                </Link>
                <Link
                    v-if="$page.props.auth.user.role_id == 1"
                    :href="route('pengaduan.index')"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                >
                    Dasbor Pengaduan
                </Link>
            </div>

            <FwbButton
                class="mt-10"
                color="dark"
                size="sm"
                @click="downloadDokumen()"
            >
                Download Dokumen 📃
            </FwbButton>

            <div class="space-y-5 p-4" ref="dokumenRef" id="dokumenPengaduan">
                <!-- navigasi -->
                <div>
                    <ul
                        class="flex gap-x-2 font-medium md:gap-x-4 text-blue-600"
                    >
                        <li>
                            <a
                                href="#informasipengaduan"
                                class="hover:underline hover:text-blue-700"
                                >Informasi Pengaduan</a
                            >
                        </li>
                        <li>
                            <a
                                href="#deskripsi"
                                class="hover:underline hover:text-blue-700"
                                >Deskripsi</a
                            >
                        </li>
                        <li>
                            <a
                                href="#buktipengaduan"
                                class="hover:underline hover:text-blue-700"
                                >Bukti Pengaduan</a
                            >
                        </li>
                        <li>
                            <a
                                href="#lokasi"
                                class="hover:underline hover:text-blue-700"
                                >Lokasi</a
                            >
                        </li>
                        <li>
                            <a
                                href="#tanggapan"
                                class="hover:underline hover:text-blue-700"
                                >Tanggapan</a
                            >
                        </li>
                    </ul>
                </div>
                <!-- informasi pengaduan -->
                <div class="space-y-3">
                    <h3
                        class="font-semibold text-lg md:text-xl"
                        id="informasipengaduan"
                    >
                        # Informasi Pengaduan
                    </h3>
                    <div>
                        <dl
                            class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700"
                        >
                            <div class="flex flex-col pb-2">
                                <dt class="text-gray-500 dark:text-gray-400">
                                    Status
                                </dt>
                                <dd class="text-lg font-semibold">
                                    <span
                                        v-if="pengaduan.status == 'pending'"
                                        class="bg-blue-600 uppercase text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"
                                        >{{ pengaduan.status }}</span
                                    >
                                    <span
                                        v-else-if="
                                            pengaduan.status == 'diproses'
                                        "
                                        class="bg-gray-600 uppercase text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300"
                                        >{{ pengaduan.status }}</span
                                    >
                                    <span
                                        v-else-if="
                                            pengaduan.status == 'ditolak'
                                        "
                                        class="bg-red-600 uppercase text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300"
                                        >{{ pengaduan.status }}</span
                                    >
                                    <span
                                        v-else
                                        class="bg-green-600 uppercase text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"
                                        >{{ pengaduan.status }}</span
                                    >
                                </dd>
                            </div>
                            <div class="flex flex-col pt-2">
                                <dt class="text-gray-500 dark:text-gray-400">
                                    Informasi Pengaduan
                                </dt>
                                <dd class="text-lg font-semibold">
                                    <div>
                                        {{ pengaduan.kategori.nama_kategori }}
                                    </div>
                                    <small class="text-gray-600"
                                        >Diadukan pada tanggal
                                        {{
                                            moment(pengaduan.created_at).format(
                                                "DD MMMM YYYY, HH:mm:ss"
                                            )
                                        }}
                                    </small>
                                </dd>
                            </div>
                            <div class="flex flex-col py-2">
                                <dt class="text-gray-500 dark:text-gray-400">
                                    Informasi User
                                </dt>
                                <dd class="text-lg font-semibold">
                                    <div>
                                        {{ pengaduan.user.name }}
                                    </div>
                                    <div class="text-sm">
                                        {{ pengaduan.user.email }}
                                    </div>
                                    <div class="text-sm">
                                        {{ pengaduan.user.no_telp }}
                                    </div>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <!-- Deskripsi -->
                <div class="space-y-3 border-b border-b-gray-500 py-3">
                    <h3 class="font-semibold text-lg md:text-xl" id="deskripsi">
                        # Deskripsi
                    </h3>
                    <div
                        v-html="pengaduan.deskripsi"
                        class="deskripsi max-w-2xl"
                    ></div>
                </div>
                <!-- Bukti Pengaduan -->
                <div class="space-y-3">
                    <h3
                        class="font-semibold text-lg md:text-xl"
                        id="buktipengaduan"
                    >
                        # Bukti Pengaduan
                    </h3>
                    <div class="flex gap-3 flex-wrap">
                        <p
                            v-if="
                                pengaduan.bukti_pengaduan == null ||
                                pengaduan.bukti_pengaduan == 0
                            "
                            class="text-gray-500 italic"
                        >
                            Bukti tidak tersedia
                        </p>
                        <img
                            v-else
                            v-for="bukti in buktiPengaduan"
                            v-bind:src="bukti.file"
                            :key="bukti.file"
                            class="h-auto max-w-lg rounded-lg shadow-xl dark:shadow-gray-800"
                            alt="Bukti Pengaduan"
                        />
                    </div>
                </div>
                <!-- Lokasi yang diadukan -->
                <div id="page2el">
                    <h3
                        class="space-y-3 font-semibold text-lg md:text-xl"
                        id="lokasi"
                    >
                        # Lokasi yang diadukan
                    </h3>
                    <div class="max-w-xl">
                        <Map
                            :longitude="pengaduan.longitude"
                            :latitude="pengaduan.latitude"
                            zoom="17"
                        ></Map>
                    </div>
                </div>
                <!-- Tanggapan -->
                <hr class="border border-gray-400" />
                <div class="space-y-3">
                    <h3 class="font-semibold text-lg md:text-xl" id="tanggapan">
                        # Tanggapan
                        <div class="text-sm font-normal text-gray-700">
                            Tanggapan akan segera ditanggapi oleh Admin.
                        </div>
                    </h3>
                    <!-- Form Tanggapan -->
                    <div v-show="$page.props.auth.user.role_id == 1">
                        <form
                            action=""
                            class="space-y-2 max-w-xl py-2"
                            method="post"
                            @submit.prevent="createTanggapan(pengaduan.id)"
                        >
                            <textarea
                                id="message"
                                rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Beri tanggapan..."
                                v-model="formTanggapan.tanggapan"
                            ></textarea>
                            <div>
                                <small class="text-red-600">{{
                                    formTanggapan.errors.tanggapan
                                }}</small>
                            </div>
                            <FwbButton type="submit">Kirim</FwbButton>
                        </form>
                        <hr class="border-b border-b-gray-500" />
                    </div>
                    <!-- Tanggapan -->

                    <p
                        class="text-gray-500 italic"
                        v-if="tanggapan.data == null || tanggapan.data == 0"
                    >
                        Belum ada tanggapan
                    </p>

                    <div v-else v-for="t in tanggapan.data">
                        <div class="flex items-start gap-2.5">
                            <div
                                class="flex flex-col w-full max-w-xl leading-1.5 p-4 border-gray-200 bg-gray-200 rounded-e-xl rounded-es-xl dark:bg-gray-700"
                            >
                                <div
                                    class="flex items-center space-x-2 rtl:space-x-reverse"
                                >
                                    <span
                                        class="text-sm font-semibold text-gray-900 dark:text-white"
                                        >{{ t.user.name }}</span
                                    >
                                    <span
                                        class="text-sm font-normal text-gray-500 dark:text-gray-400"
                                        >Admin</span
                                    >
                                </div>
                                <p
                                    class="text-sm font-normal py-2.5 text-gray-900 dark:text-white"
                                >
                                    {{ t.text }}
                                </p>
                                <span
                                    class="text-sm font-normal text-gray-500 dark:text-gray-400"
                                    >{{ t.created_at }}</span
                                >
                            </div>
                            <FwbButton
                                @click="deleteTanggapan(t.id)"
                                v-if="$page.props.auth.user.role_id == 1"
                                class="inline-flex self-center items-center"
                                color="red"
                                size="xs"
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
                                    /></svg
                            ></FwbButton>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </DefaultLayout>
</template>

<script setup>
import { Head, useForm, usePage } from "@inertiajs/vue3";
import DefaultLayout from "../Layouts/DefaultLayout.vue";
import Map from "../../Components/Map.vue";
import moment from "moment";
import Swal from "sweetalert2";
import { FwbButton } from "flowbite-vue";
import { ref } from "vue";
import jsPDF from "jspdf";
import html2pdf from "html2pdf.js";

defineProps({
    pengaduan: Object,
    tanggapan: Object,
    buktiPengaduan: Object,
});
const page = usePage();
const formTanggapan = useForm({
    tanggapan: null,
    pengaduan_id: null,
    user_id: page.props.auth.user.id,
});

function createTanggapan(id) {
    formTanggapan.pengaduan_id = id;

    formTanggapan.post(route("create.tanggapan"), {
        preserveScroll: true,
        onSuccess: () => {
            formTanggapan.reset("tanggapan");
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Tanggapan berhasil dikirim",
                showConfirmButton: false,
                timer: 1000,
            });
        },
    });
}

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

//SECTION cetak dokumen

const dokumenRef = ref(null);
function downloadDokumen() {
    var opt = {
        margin: 1,
        filename: "dokumen-pengaduan.pdf",
        image: { type: "jpeg", quality: 0.95 },
        html2canvas: { scale: 2, useCORS: true },
        jsPDF: { unit: "mm", format: "a4", orientation: "p" },
        pagebreak: { mode: "avoid-all", before: "#page2el" },
    };

    html2pdf().set(opt).from(dokumenRef.value).save();
}
</script>
