<template>
    <jet-button class="bg-secondary hover:bg-secondary-interact focus:bg-secondary-interact normal-case tracking-normal text-secondary px-16 rounded-2xl">
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
