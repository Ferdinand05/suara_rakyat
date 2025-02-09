<template>
    <div>
        <DefaultLayout title="Home">
            <!-- SECTION Home/Hero/Beranda -->

            <!-- Swiper -->
            <section id="beranda">
                <Swiper></Swiper>
            </section>

            <!-- SECTION - Tentang kami -->
            <section class="pt-28 pb-28 text-gray-800" id="tentang">
                <div class="flex justify-center flex-col md:flex-row px-12">
                    <div class="md:w-1/2">
                        <h3 class="text-3xl mb-4 font-bold">Tentang Kami</h3>
                        <h5 class="text-lg font-semibold">
                            Selamat datang di SuaraRakyat!
                        </h5>
                        <p class="text-justify">
                            Aplikasi SuaraRakyat lahir dari keinginan untuk
                            memberikan suara kepada masyarakat Indonesia,
                            sehingga setiap keluhan, kritik, dan saran dapat
                            didengar dan ditindaklanjuti secara transparan dan
                            efisien. Kami percaya bahwa setiap warga negara
                            berhak memiliki akses mudah untuk menyampaikan
                            aspirasinya, demi membangun Indonesia yang lebih
                            baik.
                        </p>

                        <div class="mt-2 text-justify">
                            <div class="font-semibold">Misi Kami</div>
                            Menciptakan platform yang aman, terpercaya, dan
                            responsif untuk mendukung penyampaian aspirasi
                            masyarakat secara efektif.
                        </div>

                        <div class="mt-2 text-justify">
                            <div class="font-semibold">Visi Kami</div>
                            Menjadi aplikasi pengaduan terbaik di Indonesia yang
                            membantu pemerintah dan masyarakat berkolaborasi
                            untuk menyelesaikan masalah dengan lebih cepat.
                        </div>
                    </div>
                    <div class="md:w-1/2 md:px-5 mt-5 md:mt-0">
                        <img
                            src="/public/img/tentang.jpg"
                            alt=""
                            class="md:rounded-tr-full md:rounded-br-full rounded-md"
                        />
                    </div>
                </div>
            </section>

            <!-- SECTION Layanan -->
            <section
                class="pb-28 text-gray-800 font-poppins px-12 bg-gray-100"
                id="layanan"
            >
                <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                    <div class="max-w-screen-md mb-8 lg:mb-16">
                        <h2
                            class="mb-4 text-3xl font-bold text-gray-800 dark:text-white"
                        >
                            Layanan Kami
                        </h2>
                        <p class="text-gray-800 dark:text-gray-400">
                            Kami hadir untuk memberikan solusi cepat dan
                            responsif untuk kebutuhan Anda. Berikut adalah
                            layanan utama yang kami tawarkan:
                        </p>
                    </div>
                    <div
                        class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0"
                    >
                        <div>
                            <div
                                class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900"
                            >
                                <svg
                                    class="w-5 h-5 text-gray-700 lg:w-6 lg:h-6 dark:text-gray-300"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </div>
                            <h3 class="mb-2 text-xl font-bold dark:text-white">
                                Pengaduan Cepat
                            </h3>
                            <p
                                class="text-gray-600 dark:text-gray-400 text-justify"
                            >
                                Kami mempermudah masyarakat untuk menyampaikan
                                keluhan, kritik, atau saran langsung melalui
                                platform kami
                            </p>
                        </div>
                        <div>
                            <div
                                class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900"
                            >
                                <svg
                                    class="w-5 h-5 text-gray-700 lg:w-6 lg:h-6 dark:text-gray-300"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"
                                    ></path>
                                </svg>
                            </div>
                            <h3 class="mb-2 text-xl font-bold dark:text-white">
                                Pemantauan Progres Pengaduan
                            </h3>
                            <p
                                class="text-gray-500 dark:text-gray-400 text-justify"
                            >
                                Pantau progres penyelesaian pengaduan Anda
                                secara langsung melalui profile
                            </p>
                        </div>
                        <div>
                            <div
                                class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900"
                            >
                                <svg
                                    class="w-5 h-5 text-gray-700 lg:w-6 lg:h-6 dark:text-gray-300"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                        clip-rule="evenodd"
                                    ></path>
                                    <path
                                        d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"
                                    ></path>
                                </svg>
                            </div>
                            <h3 class="mb-2 text-xl font-bold dark:text-white">
                                Pusat Konsultasi
                            </h3>
                            <p
                                class="text-gray-500 dark:text-gray-400 text-justify"
                            >
                                Kami menyediakan layanan konsultasi untuk
                                membantu masyarakat mendapatkan solusi terbaik
                                atas permasalahan yang dilaporkan
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- SECTION Social Proof / statistik -->
            <section class="pb-20 pt-20 text-gray-800" id="statistik">
                <div class="px-12">
                    <h3 class="text-3xl font-bold">
                        Angka yang Membuktikan Kepercayaan Anda pada Kami
                    </h3>
                    <p class="text-lg">
                        Kami terus berusaha memberikan layanan terbaik bagi
                        masyarakat
                    </p>
                </div>
                <div
                    class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6"
                >
                    <dl
                        class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white"
                    >
                        <div class="flex flex-col items-center justify-center">
                            <dt
                                class="mb-2 text-3xl md:text-4xl font-extrabold"
                            >
                                66+
                            </dt>
                            <dd
                                class="font-light text-gray-500 dark:text-gray-400"
                            >
                                Pengaduan Terlayani
                            </dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt
                                class="mb-2 text-3xl md:text-4xl font-extrabold"
                            >
                                99+
                            </dt>
                            <dd
                                class="font-light text-gray-500 dark:text-gray-400"
                            >
                                Pelapor
                            </dd>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <dt
                                class="mb-2 text-3xl md:text-4xl font-extrabold"
                            >
                                33+
                            </dt>
                            <dd
                                class="font-light text-gray-500 dark:text-gray-400"
                            >
                                Daerah terjangkau
                            </dd>
                        </div>
                    </dl>
                </div>
            </section>

            <!-- SECTION - Hubungi kami -->
            <section id="#kontak" class="pb-28 pt-20 px-12">
                <div>
                    <h3 class="text-2xl md:text-3xl font-bold">Hubungi Kami</h3>
                    <p class="md:text-lg">
                        Jangan ragu untuk menghubungi kami langsung ke kontak
                        resmi kami
                    </p>
                </div>
                <div class="mt-10">
                    <div class="flex justify-between">
                        <div class="flex flex-col gap-y-5 md:gap-y-10">
                            <div class="flex items-center gap-x-3">
                                <div>
                                    <svg
                                        class="w-12 h-12 text-gray-800 dark:text-white"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <div class="md:text-lg">
                                    Jl. Rakyat No 51, Petukangan, Jakarta
                                    Selatan
                                </div>
                            </div>
                            <div class="flex items-center gap-x-3">
                                <div>
                                    <svg
                                        class="w-12 h-12 text-gray-800 dark:text-white"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M2.038 5.61A2.01 2.01 0 0 0 2 6v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6c0-.12-.01-.238-.03-.352l-.866.65-7.89 6.032a2 2 0 0 1-2.429 0L2.884 6.288l-.846-.677Z"
                                        />
                                        <path
                                            d="M20.677 4.117A1.996 1.996 0 0 0 20 4H4c-.225 0-.44.037-.642.105l.758.607L12 10.742 19.9 4.7l.777-.583Z"
                                        />
                                    </svg>
                                </div>
                                <div class="md:text-lg">
                                    support@suararakyat.id
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/3 hidden md:block">
                            <img
                                src="\public\img\contact.png"
                                alt=""
                                class=""
                            />
                        </div>
                    </div>
                </div>
            </section>
        </DefaultLayout>
    </div>
</template>

<script setup>
import DefaultLayout from "../Layouts/DefaultLayout.vue";
import Swiper from "../../Components/Swiper.vue";
</script>
