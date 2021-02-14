<template>
    <inertia-link :href="href" class="text-white hover:text-primary focus:text-primary duration-100">
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
