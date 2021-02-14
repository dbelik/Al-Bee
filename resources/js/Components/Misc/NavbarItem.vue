<template>
    <p v-if="pathname === href" class="flex line-through text-white">
        <slot />
    </p>
    
    <navbar-link v-else :href="href" class="flex">
        <slot />
    </navbar-link>
</template>
<script>
import NavbarLink from '@/Components/Links/Navbar'

export default {
    props: {
        href: String
    },
    data() {
        return {
            pathname: ''
        }
    },
    components: {
        NavbarLink,
    },
    created() {
        this.pathname = window.location.pathname
    }
}
</script>