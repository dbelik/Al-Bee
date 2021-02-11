<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <user-information :user="user" />
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <ban :user="user" />
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import UserInformation from './UserInformation'
    import Ban from './Ban'

    export default {
        components: {
            UserInformation,
            Ban,
            AppLayout
        },
        props: {
            user: Object
        },
        created() {
            if (!this.user) window.location.href = "/users";
        }
    }
</script>