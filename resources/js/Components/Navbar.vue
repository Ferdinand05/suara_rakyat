<template>
    <nav
        class="homeNavbar font-poppins bg-transparent transition-all fixed w-full top-0 left-0 z-50"
        ref="nav"
    >
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
        >
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img
                    src="https://flowbite.com/docs/images/logo.svg"
                    class="h-8"
                    alt="Flowbite Logo"
                />
                <span
                    class="self-center text-shadow text-3xl font-semibold whitespace-nowrap text-white"
                    >SuaraRakyat</span
                >
            </a>
            <button
                data-collapse-toggle="navbar-dropdown"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100/30 focus:outline-none focus:ring-2 focus:ring-gray-200/30 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-dropdown"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul
                    class="nav-list flex flex-col mr-5 font-medium p-4 md:p-0 mt-4 border border-gray-100/10 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0"
                >
                    <li>
                        <a
                            href="/"
                            :class="
                                $page.url == '/pengaduan'
                                    ? 'block py-2 px-3 text-gray-400 rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                                    : 'block py-2 px-3 text-white rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                            "
                            >Beranda</a
                        >
                    </li>

                    <li>
                        <a
                            href="#tentang"
                            :class="
                                $page.url == '/pengaduan'
                                    ? 'block py-2 px-3 text-gray-400 rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                                    : 'block py-2 px-3 text-white rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                            "
                            >Tentang</a
                        >
                    </li>

                    <li>
                        <a
                            href="#layanan"
                            :class="
                                $page.url == '/pengaduan'
                                    ? 'block py-2 px-3 text-gray-400 rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                                    : 'block py-2 px-3 text-white rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                            "
                            >Layanan</a
                        >
                    </li>
                    <li>
                        <Link
                            :href="route('home.pengaduan')"
                            :class="
                                $page.url == '/pengaduan'
                                    ? 'block py-2 px-3 text-gray-400 rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                                    : 'block py-2 px-3 text-white rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                            "
                            >Pengaduan</Link
                        >
                    </li>
                    <li v-if="!$page.props.auth.user.name">
                        <Link
                            :href="route('register')"
                            :class="
                                $page.url == '/pengaduan'
                                    ? 'block py-2 px-3 text-gray-400 rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                                    : 'block py-2 px-3 text-white rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                            "
                            >Register</Link
                        >
                    </li>
                    <li v-if="!$page.props.auth.user.name">
                        <Link
                            :href="route('login')"
                            :class="
                                $page.url == '/pengaduan'
                                    ? 'block py-2 px-3 text-gray-400 rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                                    : 'block py-2 px-3 text-white rounded md:bg-transparent hover:bg-gray-100/30 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent'
                            "
                            >Login</Link
                        >
                    </li>

                    <li v-show="$page.props.auth.user.name">
                        <button
                            id="dropdownNavbarLink"
                            data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full py-2 px-3 text-white rounded hover:bg-gray-100/30 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
                        >
                            {{ $page.props.auth.user.name }}
                            <svg
                                class="w-2.5 h-2.5 ms-2.5"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 10 6"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m1 1 4 4 4-4"
                                />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div
                            id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white/80 backdrop-blur divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600"
                        >
                            <ul
                                class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton"
                            >
                                <li>
                                    <a
                                        href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >Profile</a
                                    >
                                </li>
                                <li v-if="$page.props.auth.user.role_id == 1">
                                    <Link
                                        :href="route('dashboard')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >Dashboard</Link
                                    >
                                </li>
                            </ul>
                            <div class="py-1">
                                <Link
                                    as="button"
                                    method="post"
                                    :href="route('logout')"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    >Sign out</Link
                                >
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".homeNavbar");
    if (window.scrollY > 250) {
        navbar.classList.add("bg-gray-500/50", "text-gray-800", "shadow-lg");
        navbar.classList.remove("bg-transparent", "text-white");
    } else {
        navbar.classList.add("bg-transparent", "text-white");
        navbar.classList.remove("bg-white", "text-gray-800", "shadow-lg");
    }
});
</script>
