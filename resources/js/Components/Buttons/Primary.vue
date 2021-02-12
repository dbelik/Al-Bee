<template>
    <jet-button class="bg-primary hover:bg-primary-interact focus:bg-primary-interact normal-case tracking-normal text-secondary px-16 rounded-2xl">
        <slot />
    </jet-button>
</template>
<script>
import JetButton from '@/Jetstream/Button'

export default {
    components: {
        JetButton
    }
}
</script>
