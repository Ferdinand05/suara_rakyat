<template>
    <section
        class="bg-gray-50 dark:bg-gray-900"
        style="background-image: url('/img/seigaiha.png')"
    >
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"
        >
            <Link
                href="/"
                class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white"
            >
                <img
                    class="w-8 h-8 mr-2"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                    alt="logo"
                />
                SuaraRakyat
            </Link>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"
            >
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
                    >
                        Masuk untuk melanjutkan
                    </h1>
                    <form
                        class="space-y-4 md:space-y-6"
                        @submit.prevent="login()"
                        method="post"
                    >
                        <div>
                            <label
                                for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Email</label
                            >
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com"
                                v-model="formLogin.email"
                            />
                            <small class="text-red-500">{{
                                formLogin.errors.email
                            }}</small>
                        </div>
                        <div>
                            <label
                                for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Password</label
                            >
                            <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                v-model="formLogin.password"
                            />
                            <small class="text-red-500">{{
                                formLogin.errors.password
                            }}</small>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input
                                        id="remember"
                                        aria-describedby="remember"
                                        type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                        v-model="formLogin.remember_me"
                                    />
                                </div>
                                <div class="ml-3 text-sm">
                                    <label
                                        for="remember"
                                        class="text-gray-500 dark:text-gray-300"
                                        >Ingat saya</label
                                    >
                                </div>
                            </div>
                            <a
                                href="#"
                                class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
                                >Lupa password?</a
                            >
                        </div>
                        <button
                            type="submit"
                            :disabled="formLogin.processing"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Masuk
                        </button>
                        <p
                            class="text-sm font-light text-gray-500 dark:text-gray-400"
                        >
                            Belum punya akun?
                            <Link
                                href="/register"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                >Daftar</Link
                            >
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { router, useForm } from "@inertiajs/vue3";
import { inject } from "vue";
import Swal from "sweetalert2";
const route = inject("route");

const formLogin = useForm({
    email: null,
    password: null,
    remember_me: false,
});

function login() {
    formLogin.post(route("login.store"), {
        onSuccess: () => {},
    });
}
</script>
