<template>
    <nav :class="'bg-dark-blue-700 z-50 w-screen bottom-0 fixed lg:w-auto lg:relative lg:h-content flex flex-col items-between justify-between ' + (navOpen ? 'h-screen ' : 'h-16')">
        <inertia-link href="/user/profile" class="bg-dark-blue-600 pl-16 pr-16 py-16 hidden lg:block" title="Go to your profile">
            <div v-if="user.profile_photo_path" class="w-32 h-32 rounded-full" :style="'background: url(/storage/' + user.profile_photo_path + ') no-repeat center; background-size: cover;'"></div>
            <div v-else class="w-32 h-32 rounded-full" style="background-color: #ebf4ff"></div>
        </inertia-link>

        <button class="absolute right-8 top-4 border-none outline-none h-8 w-8 lg:hidden" v-on:click="navOpen = !navOpen">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path d="M492,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h472c11.046,0,20-8.954,20-20S503.046,236,492,236z" fill="#ffffff"/>
                <path d="M492,76H20C8.954,76,0,84.954,0,96s8.954,20,20,20h472c11.046,0,20-8.954,20-20S503.046,76,492,76z" fill="#ffffff"/>
                <path d="M492,396H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h472c11.046,0,20-8.954,20-20
                    C512,404.954,503.046,396,492,396z" fill="#ffffff" />
            </svg>
        </button>

        <ul class="h-full w-full flex flex-col items-center justify-center lg:block lg:pt-16">
            <li :class="`pl-12 pr-20 mb-2 ${navOpen ? 'block' : 'hidden'} lg:block`">
                <navbar-item href="/user/profile" class="flex">
                    <img src="/imgs/icons/user.svg" alt="Profile" class="h-6 mr-4" />
                    Profile
                </navbar-item>
            </li>
            <li :class="`pl-12 pr-20 mb-2 ${navOpen ? 'block' : 'hidden'} lg:block`">
                <navbar-item href="/dashboard" class="flex">
                    <img src="/imgs/icons/dashboard.svg" alt="Dashboard" class="h-6 mr-4" />
                    Dashboard
                </navbar-item>
            </li>
            <li v-if="user.role_id === 2" :class="`pl-12 pr-20 mb-2 ${navOpen ? 'block' : 'hidden'} lg:block`">
                <navbar-item href="/users" class="flex">
                    <img src="/imgs/icons/loupe.svg" alt="Search" class="h-6 mr-4" />
                    Search
                </navbar-item>
            </li>
            <li :class="`pl-12 pr-20 mb-2 ${navOpen ? 'block' : 'hidden'} lg:block`">
                <form @submit.prevent="logout" class="flex">
                    <img src="/imgs/icons/sign-out-option.svg" alt="Logout" class="h-6 mr-4" />
                    <button-link as="button">
                        Logout
                    </button-link>
                </form>
            </li>
        </ul>
    </nav>
</template>
<script>
import DefaultLink from '@/Components/Links/Default'
import ButtonLink from '@/Components/Buttons/Link'

import NavbarItem from '@/Components/Misc/NavbarItem'

export default {
    components: {
        DefaultLink,
        ButtonLink,
        NavbarItem
    },
    data() {
        return {
            navOpen: false
        }
    },
    props: {
        user: Object
    },
    methods: {
        switchToTeam(team) {
            this.$inertia.put(route('current-team.update'), {
                'team_id': team.id
            }, {
                preserveState: false
            })
        },

        logout() {
            this.$inertia.post(route('logout'));
        }
    }
}
</script>