<template>
    <nav class="bg-dark-blue-700 h-screen xl:h-content flex flex-col items-between justify-between">
        <inertia-link href="/user/profile" class="bg-dark-blue-600 pl-16 pr-16 py-16">
            <div v-if="user.profile_photo_path" class="w-32 h-32 rounded-full" :style="'background: url(/storage/' + user.profile_photo_path + ') no-repeat center; background-size: cover;'"></div>
            <div v-else class="w-32 h-32 rounded-full" style="background-color: #ebf4ff"></div>
        </inertia-link>

        <ul class="h-full pt-16">
            <li class="pl-12 pr-20 mb-2">
                <navbar-item href="/user/profile" class="flex">
                    <img src="/imgs/icons/user.svg" class="h-6 mr-4" />
                    Profile
                </navbar-item>
            </li>
            <li class="pl-12 pr-20 mb-2">
                <navbar-item href="/dashboard" class="flex">
                    <img src="/imgs/icons/dashboard.svg" class="h-6 mr-4" />
                    Dashboard
                </navbar-item>
            </li>
            <li class="pl-12 pr-20 mb-2">
                <navbar-item href="/users" class="flex">
                    <img src="/imgs/icons/loupe.svg" class="h-6 mr-4" />
                    Search
                </navbar-item>
            </li>
            <li class="pl-12 pr-24">
                <form @submit.prevent="logout" class="flex">
                    <img src="/imgs/icons/sign-out-option.svg" class="h-6 mr-4" />
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