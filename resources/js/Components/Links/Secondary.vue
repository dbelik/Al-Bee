<template>
    <inertia-link :href="href" class="text-primary hover:text-primary-interact focus:text-primary-interact">
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
