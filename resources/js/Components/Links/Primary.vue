<template>
    <inertia-link :href="href" class="text-primary hover:text-primary-interact focus:text-primary-interact duration-100">
        <slot />
    </inertia-link>
</template>
<script>
export default {
    props: {
        href: String
    },
}
</script>
