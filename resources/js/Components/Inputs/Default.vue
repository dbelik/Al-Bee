<template>
    <jet-input class="rounded-2xl border-3 border-white border-solid outline-none text-white bg-transparent" :placeholder="placeholder" />
</template>
<script>
import JetInput from '@/Jetstream/Input'

export default {
    components: {
        JetInput
    },
    props: {
        placeholder: String
    }
}
</script>