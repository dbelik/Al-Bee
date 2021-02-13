<template>
    <app-layout>
        <h2>Hi, {{ user.first_name }} {{ user.second_name }}!</h2>
        <h3 v-if="user.role === 'admin'">Do you wan't to <primary-link href="/users">search for users</primary-link>?</h3>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import PrimaryLink from '@/Components/Links/Primary'

    export default {
        components: {
            AppLayout,
            PrimaryLink
        },

        metaInfo: {
            title: "Al&Bee - Dashboard"
        },

        props: {
            user: Object
        },
    }
</script>
