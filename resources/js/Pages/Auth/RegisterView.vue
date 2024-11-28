<template>
    <section
        class="bg-gray-50 dark:bg-gray-900 pt-5"
        style="background-image: url('/img/full-bloom.webp')"
    >
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"
        >
            <Link
                href="/"
                class="flex items-center mb-4 text-2xl font-semibold text-gray-900 dark:text-white"
            >
                <img
                    class="w-8 h-8 mr-2"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                    alt="logo"
                />
                SuaraRakyat
            </Link>
            <div
                class="w-full mb-5 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"
            >
                <div class="p-5 space-y-4 md:space-y-6 sm:p-6">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
                    >
                        Pendaftaran
                    </h1>
                    <form
                        class="space-y-3 md:space-y-3"
                        action="#"
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
                                v-model="formRegister.email"
                                name="email"
                                id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com"
                            />
                            <small class="text-red-500">{{
                                formRegister.errors.email
                            }}</small>
                        </div>
                        <div>
                            <label
                                for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Nama</label
                            >
                            <input
                                type="text"
                                name="name"
                                v-model="formRegister.name"
                                id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John Doe"
                            />
                            <small class="text-red-500">{{
                                formRegister.errors.name
                            }}</small>
                        </div>
                        <div>
                            <label
                                for="no_telp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >No Telepon</label
                            >
                            <input
                                type="tel"
                                name="telepon"
                                v-model="formRegister.no_telp"
                                id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="+62"
                            />
                            <small class="text-red-500">{{
                                formRegister.errors.no_telp
                            }}</small>
                        </div>
                        <div class="flex gap-x-2">
                            <div>
                                <label
                                    for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    name="password"
                                    v-model="formRegister.password"
                                    id="password"
                                    placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                />
                                <small class="text-red-500">{{
                                    formRegister.errors.password
                                }}</small>
                            </div>
                            <div>
                                <label
                                    for="confirm-password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Konfirmasi password</label
                                >
                                <input
                                    type="password"
                                    name="confirm-password"
                                    v-model="formRegister.password_confirmation"
                                    id="confirm-password"
                                    placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                />
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            @click.prevent="register()"
                        >
                            Daftar
                        </button>
                        <p
                            class="text-sm font-light text-gray-500 dark:text-gray-400"
                        >
                            Sudah punya akun?
                            <Link
                                href="/login"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                >Masuk</Link
                            >
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { inject } from "vue";
import Swal from "sweetalert2";
const route = inject("route");
const formRegister = useForm({
    email: null,
    name: null,
    no_telp: null,
    password: null,
    password_confirmation: null,
});

function register() {
    formRegister.post(route("register.store"), {
        onSuccess: () => {
            Swal.fire({
                title: "Kerja Bagus!",
                text: "Akun Berhasil Didaftarkan!",
                icon: "success",
            });
            formRegister.reset();
        },
    });
}
</script>
