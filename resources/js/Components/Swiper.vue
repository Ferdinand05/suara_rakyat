<template>
    <swiper-container
        :slides-per-view="1"
        :space-between="spaceBetween"
        :centered-slides="true"
        :pagination="{
            hideOnClick: true,
        }"
        :breakpoints="{
            768: {
                slidesPerView: 1,
            },
        }"
        :autoplay="{
            delay: 3000, // Waktu tunggu sebelum slide bergeser (ms)
            disableOnInteraction: false, // Tetap autoplay meskipun user berinteraksi
        }"
        @swiperprogress="onProgress"
        @swiperslidechange="onSlideChange"
    >
        <swiper-slide>
            <section
                id="beranda"
                class="font-poppins bg-no-repeat bg-cover bg-fixed"
                style="background-image: url('img/hero.jpg')"
            >
                <div
                    class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56"
                >
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl"
                    >
                        Suara Anda,
                        <span class="text-blue-600">Masa Depan</span> Kita
                    </h1>
                    <p
                        class="mb-8 text-lg font-normal text-shadow text-white lg:text-xl sm:px-16 lg:px-48"
                    >
                        Laporkan masalah, sampaikan aspirasi, dan jadilah bagian
                        dari perubahan!
                    </p>
                    <div
                        class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0"
                    >
                        <Link
                            href="/pengaduan"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900"
                        >
                            Lapor Sekarang
                            <svg
                                class="w-3.5 h-3.5 ms-2 rtl:rotate-180"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 14 10"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9"
                                />
                            </svg>
                        </Link>
                        <Link
                            href="#tentang"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400"
                        >
                            Pelajari Lebih Lanjut
                        </Link>
                    </div>
                </div>
            </section>
        </swiper-slide>
        <swiper-slide>
            <section
                id="beranda"
                class="font-poppins bg-no-repeat bg-cover bg-fixed"
                style="background-image: url('img/hero2.jpg')"
            >
                <div
                    class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56"
                >
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl"
                    >
                        Suara Anda,
                        <span class="text-amber-600">Masa Depan</span> Kita
                    </h1>
                    <p
                        class="mb-8 text-lg font-normal text-shadow text-white lg:text-xl sm:px-16 lg:px-48"
                    >
                        Laporkan masalah, sampaikan aspirasi, dan jadilah bagian
                        dari perubahan!
                    </p>
                    <div
                        class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0"
                    >
                        <Link
                            href="/pengaduan"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 dark:focus:ring-blue-900"
                        >
                            Lapor Sekarang
                            <svg
                                class="w-3.5 h-3.5 ms-2 rtl:rotate-180"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 14 10"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9"
                                />
                            </svg>
                        </Link>
                        <Link
                            href="#tentang"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400"
                        >
                            Pelajari Lebih Lanjut
                        </Link>
                    </div>
                </div>
            </section>
        </swiper-slide>
        <swiper-slide>
            <section
                id="beranda"
                class="font-poppins bg-no-repeat bg-cover bg-fixed"
                style="background-image: url('img/hero3.jpg')"
            >
                <div
                    class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56"
                >
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl"
                    >
                        Suara Anda,
                        <span class="text-sky-600">Masa Depan</span> Kita
                    </h1>
                    <p
                        class="mb-8 text-lg font-normal text-shadow text-white lg:text-xl sm:px-16 lg:px-48"
                    >
                        Laporkan masalah, sampaikan aspirasi, dan jadilah bagian
                        dari perubahan!
                    </p>
                    <div
                        class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0"
                    >
                        <Link
                            href="/pengaduan"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 dark:focus:ring-sky-900"
                        >
                            Lapor Sekarang
                            <svg
                                class="w-3.5 h-3.5 ms-2 rtl:rotate-180"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 14 10"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9"
                                />
                            </svg>
                        </Link>
                        <Link
                            href="#tentang"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400"
                        >
                            Pelajari Lebih Lanjut
                        </Link>
                    </div>
                </div>
            </section>
        </swiper-slide>
        <swiper-slide>
            <section
                id="beranda"
                class="font-poppins bg-no-repeat bg-cover bg-fixed"
                style="background-image: url('img/hero4.jpg')"
            >
                <div
                    class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56"
                >
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl"
                    >
                        Suara Anda,
                        <span class="text-green-600">Masa Depan</span> Kita
                    </h1>
                    <p
                        class="mb-8 text-lg font-normal text-shadow text-white lg:text-xl sm:px-16 lg:px-48"
                    >
                        Laporkan masalah, sampaikan aspirasi, dan jadilah bagian
                        dari perubahan!
                    </p>
                    <div
                        class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0"
                    >
                        <Link
                            href="/pengaduan"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900"
                        >
                            Lapor Sekarang
                            <svg
                                class="w-3.5 h-3.5 ms-2 rtl:rotate-180"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 14 10"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9"
                                />
                            </svg>
                        </Link>
                        <Link
                            href="#tentang"
                            class="inline-flex bg-green-300 justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400"
                        >
                            Pelajari Lebih Lanjut
                        </Link>
                    </div>
                </div>
            </section>
        </swiper-slide>
        <swiper-slide>
            <section
                id="beranda"
                class="font-poppins bg-no-repeat bg-cover bg-fixed"
                style="background-image: url('img/hero5.jpg')"
            >
                <div
                    class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56"
                >
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl"
                    >
                        Suara Anda,
                        <span class="text-gray-600">Masa Depan</span> Kita
                    </h1>
                    <p
                        class="mb-8 text-lg font-normal text-shadow text-white lg:text-xl sm:px-16 lg:px-48"
                    >
                        Laporkan masalah, sampaikan aspirasi, dan jadilah bagian
                        dari perubahan!
                    </p>
                    <div
                        class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0"
                    >
                        <Link
                            href="/pengaduan"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-900"
                        >
                            Lapor Sekarang
                            <svg
                                class="w-3.5 h-3.5 ms-2 rtl:rotate-180"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 14 10"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9"
                                />
                            </svg>
                        </Link>
                        <Link
                            href="#tentang"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400"
                        >
                            Pelajari Lebih Lanjut
                        </Link>
                    </div>
                </div>
            </section>
        </swiper-slide>
    </swiper-container>
</template>

<script setup>
import { register } from "swiper/element/bundle";

register();

const spaceBetween = 10;
const onProgress = (e) => {
    const [swiper, progress] = e.detail;
    console.log(progress);
};

const onSlideChange = (e) => {
    console.log("slide changed");
};
</script>
