<template>
    <inertia-link :href="href" class="text-white hover:text-primary focus:text-primary duration-100">
        <slot />
    </inertia-link>
</template>
<script>
import JetButton from '@/Jetstream/Button'

export default {
    props: {
        href: String
    },
    components: {
        JetButton
    }
}
</script>
