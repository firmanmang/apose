<template>
    <div class="max-w-screen min-h-screen">
        <div class="container mx-auto">
            <div
                class="
                    relative
                    h-80
                    w-full
                    rounded-b-[80px]
                    bg-blue-500
                    p-8
                    text-white
                    md:rounded-none
                "
            >
                <Link :href="route('home')">
                    <img src="/images/logo_putih.png" class="h-20 lg:mx-auto" />
                </Link>
                <h2 class="text-2xl capitalize lg:text-center">
                    aplikasi pangajharan online sumenep
                </h2>
            </div>
            <div class="relative mx-8 -mt-32">
                <div class="mx-auto flex w-full items-center md:w-1/2">
                    <div
                        class="
                            mb-12
                            w-full
                            rounded-3xl
                            border border-gray-300
                            bg-white
                            p-6
                            text-blue-800
                            shadow-xl
                        "
                    >
                        <h2 class="text-center text-4xl">Login</h2>
                        <div class="mt-16 grid grid-cols-1 gap-8">
                            <div v-if="hasError">
                                <div class="font-medium text-red-600">
                                    Whoops! Terjadi kesalahan.
                                </div>

                                <ul
                                    class="
                                        mt-3
                                        list-disc list-inside
                                        text-sm text-red-600
                                    "
                                >
                                    <li
                                        v-for="(error, key) in form.errors"
                                        :key="key"
                                    >
                                        {{ error }}
                                    </li>
                                </ul>
                            </div>
                            <div class="flex flex-row items-center gap-4">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"
                                    />
                                </svg>
                                <div
                                    class="
                                        form-control
                                        w-full
                                    "
                                >
                                    <input
                                        type="text"
                                        class="
                                            w-full
                                            border-b-2
                                            py-2
                                            border-0 border-gray-400
                                            focus:border-b-2
                                            focus:border-blue-500
                                            focus:outline-none
                                            focus:ring-0
                                        "
                                        placeholder="Email *"
                                        v-model="form.email"
                                    />
                                </div>
                            </div>
                            <div class="flex flex-row items-center gap-4">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    />
                                </svg>
                                <div
                                    class="
                                        form-control
                                        flex
                                        w-full
                                        flex-row
                                        items-end
                                        justify-items-end
                                        gap-2
                                    "
                                >
                                    <input
                                        :type="
                                            passwordVisible
                                                ? 'text'
                                                : 'password'
                                        "
                                        class="
                                            w-full
                                            border-b-2
                                            py-2
                                            border-0 border-gray-400
                                            focus:border-b-2
                                            focus:border-blue-500
                                            focus:outline-none
                                            focus:ring-0
                                        "
                                        placeholder="Password *"
                                        v-model="form.password"
                                    />
                                    <svg
                                        @click="passwordToggle"
                                        xmlns="http://www.w3.org/2000/svg"
                                        :class="
                                            passwordVisible
                                                ? 'hidden'
                                                : 'h-8 w-8'
                                        "
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"
                                        />
                                    </svg>
                                    <svg
                                        @click="passwordToggle"
                                        xmlns="http://www.w3.org/2000/svg"
                                        :class="
                                            !passwordVisible
                                                ? 'hidden'
                                                : 'h-8 w-8'
                                        "
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto mt-24 grid w-fit grid-cols-1 gap-6">
                            <button
                                @click="submit"
                                class="
                                    rounded-full
                                    bg-blue-500
                                    hover:bg-blue-400
                                    active:bg-blue-400
                                    py-3
                                    px-12
                                    text-white
                                "
                            >
                                Login
                            </button>
                            <!-- <div class="mb-12">
                                <h2 class="text-xs">
                                    Belum punya akun?
                                    <Link :href="route('register')" class="text-gray-500">Register</Link>
                                </h2>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    },
    data() {
        return {
            passwordVisible: false,
            form: useForm({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },
    methods: {
        passwordToggle() {
            this.passwordVisible = !this.passwordVisible;
        },
        submit() {
            this.form.post(route("login"), {
                onFinish: () => form.reset("password"),
            });
        },
    },
    computed: {
        hasError() {
            return Object.keys(this.form.errors).length > 0;
        },
    },
};
</script>