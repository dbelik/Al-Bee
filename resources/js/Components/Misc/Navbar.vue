<template>
    <nav class="bg-dark-blue-700 h-screen xl:h-content flex flex-col items-between justify-between">
        <inertia-link href="#" class="bg-dark-blue-600 pl-16 pr-16 py-16">
            <svg viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="50" fill="white">
                </circle>
            </svg>
        </inertia-link>

        <ul class="h-full pt-16">
            <li class="pl-12 pr-20 mb-2">
                <default-link href="/user/profile" class="flex">
                    <img src="/imgs/icons/user.svg" class="h-6 mr-4" />
                    Profile
                </default-link>
            </li>
            <li class="pl-12 pr-20 mb-2">
                <default-link href="/dashboard" class="flex">
                    <img src="/imgs/icons/dashboard.svg" class="h-6 mr-4" />
                    Dashboard
                </default-link>
            </li>
            <li class="pl-12 pr-20 mb-2">
                <default-link href="/users" class="flex">
                    <img src="/imgs/icons/loupe.svg" class="h-6 mr-4" />
                    Search
                </default-link>
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

export default {
    components: {
        DefaultLink,
        ButtonLink
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
        },
    }
}
</script>