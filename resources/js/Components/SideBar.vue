<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>



<template>
    <aside class="h-screen fixed top-0 left-0 z-40 w-72 bg-black border-r border-gray-400">
        <div class="p-10">
            <div class="">
                <!-- Logo -->
                <div>
                    <Link :href="route('tweets')">
                        <ApplicationLogo
                            class="block h-16 w-auto fill-current text-white mx-auto md:h-12"
                        />
                    </Link>
                </div>

                <!-- Navigation Links -->
                <div>
                    <NavLink
                        :href="route('tweets')"
                        :active="route().current('tweets')"
                    >
                        Tweets
                    </NavLink>
                    <NavLink
                        :href="route('profilePage.index')"
                        :active="route().current('profilePage.index')"
                    >
                        Profile
                    </NavLink>
                    <NavLink
                        :href="route('explore.index')"
                        :active="route().current('explore.index')"
                    >
                        Explore
                    </NavLink>
                </div>
            </div>

            <div class="">
                <!-- Settings Dropdown -->
                <div class="relative ms-3">
                    <Dropdown align="bottom" width="48">
                        <template #trigger>
                            <span class="rounded-md">
                                <button
                                    type="button"
                                    class="inline-flex items-center rounded-md border border-transparent bg-black px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out hover:text-gray-100 focus:outline-none"
                                >
                                    {{ $page.props.auth.user.name }}

                                    <svg
                                        class="-me-0.5 ms-2 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <DropdownLink
                                :href="route('profilePage.index')"
                            >
                                Profile
                            </DropdownLink>
                            <DropdownLink
                                :href="route('profile.edit')"
                            >
                                Edit profile
                            </DropdownLink>
                            <DropdownLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Log Out
                            </DropdownLink>
                        </template>
                    </Dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    @click="
                        showingNavigationDropdown =
                            !showingNavigationDropdown
                    "
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                >
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            :class="{
                                hidden: showingNavigationDropdown,
                                'inline-flex':
                                    !showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            :class="{
                                hidden: !showingNavigationDropdown,
                                'inline-flex':
                                    showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </aside>
</template>
