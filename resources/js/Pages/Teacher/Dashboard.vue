<template>
    <div class="max-w-screen min-h-screen bg-gray-100 lg:py-6">
        <div class="container mx-auto flex flex-row gap-x-5">
            <SideNav v-if="showSideNav" @close="toggleSideNav" />
            <div class="w-[300px] h-auto bg-white rounded-3xl hidden lg:block">
                <SideNav
                    :class="sideNavClass + ' rounded-3xl'"
                    
                />
            </div>
            <div class="w-full h-auto bg-white rounded-3xl">
                <!-- <div
                    class="
                        w-full
                        h-[21rem]
                        bg-blue-500
                        text-white
                        rounded-b-[80px]
                        px-4
                        py-0
                    "
                > -->
                <div
                    class="
                        w-full
                        h-52
                        bg-blue-500
                        text-white
                        rounded-b-[80px]
                        px-4
                        py-0
                        lg:rounded-t-3xl
                    "
                >
                    <div class="py-8">
                        <button @click="toggleSideNav" class="lg:hidden">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 6h16M4 12h8m-8 6h16"
                                />
                            </svg>
                        </button>
                    </div>
                    <div class="">
                        <div class="flex flex-row items-center">
                            <div class="h-14 w-14 rounded-full">
                                <img
                                    v-if="$page.props.auth.user.avatar_path"
                                    class="h-14 w-14 rounded-full"
                                    :src="$page.props.auth.user.avatar_path"
                                    alt=""
                                />
                                <img
                                    v-else
                                    class="h-14 w-14 rounded-full"
                                    src="/icons/avatar.png"
                                    alt=""
                                />
                            </div>
                            <div class="flex flex-col ml-3">
                                <h2
                                    class="text-md font-semibold capitalize"
                                    v-html="$page.props.auth.user.name"
                                />
                                <h3 class="text-xs" v-html="school" />
                                <h3
                                    class="text-xs"
                                    v-html="$page.props.auth.user.unique_key"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pelajaran Hari Ini -->
                <!-- <div class="relative">
                    <div class="-mt-32 mb-5">
                        <div
                            class="
                                mx-4
                                rounded-xl
                                bg-white
                                shadow-lg shadow-gray-400
                            "
                        >
                            <div class="flex flex-col gap-3 px-6 pt-6 pb-2">
                                <h3 class="text-md">Pelajaran Hari Ini</h3>
                                <hr class="border" />
                            </div>
                            <div
                                class="flex flex-col pb-4 px-12 justify-around"
                            >
                                <div
                                    class="
                                        grid grid-cols-2
                                        gap-x-12 gap-y-3
                                        mt-3
                                        place-items-center
                                    "
                                >
                                    <Link
                                        :href="route('detail-study')"
                                        class="
                                            grid grid-cols-1
                                            justify-items-center
                                            gap-3
                                        "
                                    >
                                        <div class="h-16 w-16">
                                            <img
                                                class="h-16 w-16"
                                                src="/icons/language.png"
                                                alt=""
                                            />
                                        </div>
                                        <h3 class="w-24 text-xs text-center">
                                            nama pelajaran yang cukup panjang
                                        </h3>
                                    </Link>
                                    <Link
                                        :href="route('detail-study')"
                                        class="
                                            grid grid-cols-1
                                            justify-items-center
                                            gap-3
                                        "
                                    >
                                        <div class="h-16 w-16">
                                            <img
                                                class="h-16 w-16"
                                                src="/icons/sport.png"
                                                alt=""
                                            />
                                        </div>
                                        <h3 class="w-24 text-xs text-center">
                                            nama pelajaran yang cukup panjang
                                        </h3>
                                    </Link>
                                    <Link
                                        :href="route('detail-study')"
                                        class="
                                            grid grid-cols-1
                                            justify-items-center
                                            gap-3
                                        "
                                    >
                                        <div class="h-16 w-16">
                                            <img
                                                class="h-16 w-16"
                                                src="/icons/language.png"
                                                alt=""
                                            />
                                        </div>
                                        <h3 class="w-24 text-xs text-center">
                                            nama pelajaran yang cukup panjang
                                        </h3>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="w-full my-8">
                    <div class="flex flex-col gap-2 mx-4">
                        <h3 class="text-md">Daftar Mata Pelajaran</h3>
                        <div
                            class="
                                grid grid-cols-2
                                md:grid-cols-4
                                xl:grid-cols-5
                                gap-6
                                py-6
                                place-items-center
                                justify-items-center
                                place-content-center
                            "
                        >
                            <Link
                                v-for="study in studies"
                                :key="study"
                                :href="
                                    route('teacher.classroom.show', [
                                        study.classroom.id,
                                        study.id,
                                    ])
                                "
                                class="
                                    flex flex-col
                                    justify-around
                                    h-24
                                    w-36
                                    border border-blue-50
                                    shadow-md hover:shadow-lg
                                    shadow-blue-200 hover:shadow-blue-200
                                    text-gray-800
                                    rounded-md
                                    px-1
                                "
                            >
                                <h2
                                    class="
                                        text-center text-md
                                        font-semibold
                                        uppercase
                                    "
                                    v-html="study.classroom.name"
                                />
                                <h2
                                    class="text-center text-sm capitalize"
                                    v-html="study.name"
                                />
                            </Link>

                            <Link
                                v-if="studies.length != 7"
                                class="flex flex-col gap-1 items-center"
                                :href="route('teacher.classroom.index')"
                            >
                                <div class="">
                                    <img
                                        class="h-12 w-12"
                                        src="/icons/plus.png"
                                        alt=""
                                    />
                                </div>
                                <h3 class="w-20 text-xs text-center">
                                    Tampilkan Lebih
                                </h3>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import SideNav from "@/Components/SideNav.vue";

export default {
    data() {
        return {
            showSideNav: false,
        };
    },
    props: ["school", "studies"],
    components: {
        Link,
        Head,
        SideNav,
    },
    methods: {
        toggleSideNav() {
            this.showSideNav = !this.showSideNav;
        },
    },
    computed: {
        sideNavClass() {
            return this.showSideNav ? "block" : "hidden lg:block w-full";
        },
    },
};
</script>