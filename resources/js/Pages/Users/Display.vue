<template>
    <app-layout :user="user">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <user-information :user="searchedUser" />
        </div>
        <div v-if="searchedUser.role != 'admin'" class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <ban :user="searchedUser" />
        </div>
        <div v-if="searchedUser.role != 'admin'" class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <set-role :user="searchedUser" />
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import UserInformation from './UserInformation'
    import Ban from './Ban'
    import SetRole from './SetRole'

    export default {
        components: {
            UserInformation,
            Ban,
            SetRole,
            AppLayout
        },
        props: {
            searchedUser: Object,
            user: Object
        },
        created() {
            if (!this.user) window.location.href = "/users";
        },
        metaInfo: {
            title: `Al&Bee - User display`
        }
    }
</script>