<template>
    <jet-button class="bg-warning hover:bg-warning-interact focus:bg-warning-interact normal-case tracking-normal text-white px-16 rounded-2xl">
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
