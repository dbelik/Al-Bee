<template>
    <app-layout>
        <div v-if="user.role == 'admin'">
            Hi admin
        </div>
        <div v-else>
            Hi user
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },

        metaInfo: {
            title: "Al&Bee - Dashboard"
        },

        props: {
            user: Object
        },

        mounted() {
            console.log(this.user)
        },
    }
</script>
