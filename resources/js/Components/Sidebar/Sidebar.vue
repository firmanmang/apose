<template>
    <nav
        class="
            md:left-0
            md:block
            md:fixed
            md:top-0
            md:bottom-0
            md:overflow-y-auto
            md:flex-row
            md:flex-nowrap
            md:overflow-hidden
            shadow-xl
            bg-white
            flex flex-wrap
            items-center
            justify-between
            relative
            md:w-64
            z-50
            py-4
            px-6
        "
    >
        <div
            class="
                md:flex-col md:items-stretch md:min-h-full md:flex-nowrap
                px-0
                flex flex-wrap
                items-center
                justify-between
                w-full
                mx-auto
            "
        >
            <!-- Toggler -->
            <button
                class="
                    cursor-pointer
                    text-black
                    opacity-50
                    md:hidden
                    px-3
                    py-1
                    text-xl
                    leading-none
                    bg-transparent
                    rounded
                    border border-solid border-transparent
                "
                type="button"
                v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
            >
                <i class="fas fa-bars"></i>
            </button>
            <!-- Brand -->
            <div class="flex flex-col gap-2 p-1 md:pb-2 mr-0">
                <ApplicationLogo class="hidden lg:block" />
                <h2
                    class="
                        text-center text-gray-600 text-xs
                        uppercase
                        font-bold
                    "
                >
                    Aplikasi Pangajharan Online Sumenep
                </h2>
            </div>
            <!-- User -->
            <ul class="md:hidden items-center flex flex-wrap list-none">    
                <li class="inline-block relative">
                    <user-dropdown />
                </li>
            </ul>
            <!-- Collapse -->
            <div
                class="
                    md:flex
                    md:flex-col
                    md:items-stretch
                    md:opacity-100
                    md:relative
                    md:mt-4
                    md:shadow-none
                    shadow
                    absolute
                    top-0
                    left-0
                    right-0
                    z-40
                    overflow-y-auto overflow-x-hidden
                    h-auto
                    items-center
                    flex-1
                    rounded
                "
                v-bind:class="collapseShow"
            >
                <!-- Collapse header -->
                <div
                    class="
                        md:min-w-full md:hidden
                        block
                        pb-4
                        mb-4
                        border-b border-solid border-gray-200
                    "
                >
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <div
                                class="
                                    md:block
                                    text-left
                                    md:pb-2
                                    text-gray-600
                                    mr-0
                                    inline-block
                                    whitespace-nowrap
                                    text-sm
                                    uppercase
                                    font-bold
                                    p-4
                                    px-0
                                "
                                to="/"
                            >
                                APOSE
                            </div>
                        </div>
                        <div class="w-6/12 flex justify-end">
                            <button
                                type="button"
                                class="
                                    cursor-pointer
                                    text-black
                                    opacity-50
                                    md:hidden
                                    px-3
                                    py-1
                                    text-xl
                                    leading-none
                                    bg-transparent
                                    rounded
                                    border border-solid border-transparent
                                "
                                v-on:click="toggleCollapseShow('hidden')"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6
                    class="
                        md:min-w-full
                        text-gray-500 text-xs
                        uppercase
                        font-bold
                        block
                        pt-1
                        pb-4
                        no-underline
                    "
                >
                    Umum
                </h6>
                <!-- Navigation -->

                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <Link
                            :href="route('admin.dashboard')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="
                                navClass(route().current('admin.dashboard'))
                            "
                        >
                            <i
                                class="fas fa-tv mr-2 text-sm text-center w-6"
                            ></i>
                            Dashboard
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            v-if="
                                $page.props.auth.user.roles[0].name ==
                                'super-admin'
                            "
                            :href="route('schools.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="navClass(route().current('schools.index'))"
                        >
                            <i
                                class="
                                    fas
                                    fa-school
                                    mr-2
                                    text-sm text-center
                                    w-6
                                "
                            ></i>
                            Sekolah
                        </Link>
                    </li>
                    <li class="items-center">
                        <Link
                            :href="route('classrooms.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="
                                navClass(route().current('classrooms.index'))
                            "
                        >
                            <i
                                class="
                                    fas
                                    fa-chalkboard
                                    mr-2
                                    text-sm text-center
                                    w-6
                                "
                            ></i>
                            Ruang Kelas
                        </Link>
                    </li>
                    <li class="items-center">
                        <Link
                            :href="route('studies.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="navClass(route().current('studies.index'))"
                        >
                            <i
                                class="fas fa-book mr-2 text-sm text-center w-6"
                            ></i>
                            Pelajaran
                        </Link>
                    </li>
                    <li class="items-center">
                        <Link
                            :href="route('users.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="navClass(route().current('users.index'))"
                        >
                            <i
                                class="
                                    fas
                                    fa-users
                                    mr-2
                                    text-sm text-center
                                    w-6
                                "
                            ></i>
                            Users
                        </Link>
                    </li>
                    <li class="items-center">
                        <Link
                            :href="route('teachers.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="navClass(route().current('teachers.index'))"
                        >
                            <i
                                class="
                                    fas
                                    fa-chalkboard-teacher
                                    mr-2
                                    text-sm text-center
                                    w-6
                                "
                            ></i>
                            Guru
                        </Link>
                    </li>
                    <li class="items-center">
                        <Link
                            :href="route('students.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="navClass(route().current('students.index'))"
                        >
                            <i
                                class="
                                    fas
                                    fa-user-graduate
                                    mr-2
                                    text-sm text-center
                                    w-6
                                "
                            ></i>
                            Siswa
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>


<script>
import NotificationDropdown from "@/Components/Dropdowns/NotificationDropdown.vue";
import UserDropdown from "@/Components/Dropdowns/UserDropdown.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import ApplicationLogo from "../ApplicationLogo.vue";

export default {
    data() {
        return {
            collapseShow: "hidden",
        };
    },
    methods: {
        toggleCollapseShow: function (classes) {
            this.collapseShow = classes;
        },
        navClass(isActive) {
            return isActive
                ? "bg-gray-100 hover:bg-gray-200 px-2 rounded text-blue-500 hover:text-blue-600"
                : "px-2 rounded text-gray-700 hover:text-gray-500";
        },
    },
    components: {
        NotificationDropdown,
        UserDropdown,
        Link,
        ApplicationLogo,
    },
};
</script>
