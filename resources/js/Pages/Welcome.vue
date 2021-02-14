<template>
    <intro-layout>
        <h2>Al&Bee</h2>
        <p>Al&Bee is a user management tool.</p>
        <p>To start working with us, go to <default-link href="/register">register page</default-link> or to <default-link href="/login">login page</default-link>.</p>
    </intro-layout>
</template>

<script>
import IntroLayout from '@/Layouts/IntroLayout'
import DefaultLink from '@/Components/Links/Default'

export default {
    components: {
        IntroLayout,
        DefaultLink
    }
}
</script>
