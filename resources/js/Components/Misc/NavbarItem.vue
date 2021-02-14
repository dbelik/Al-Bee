<template>
    <p v-if="pathname === href" class="flex line-through text-white">
        <slot />
    </p>
    
    <default-link v-else :href="href" class="flex">
        <slot />
    </default-link>
</template>
<script>
import DefaultLink from '@/Components/Links/Default'

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
        DefaultLink,
    },
    created() {
        this.pathname = window.location.pathname
    }
}
</script>