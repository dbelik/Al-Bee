<template>
    <inertia-link :href="'/users?' + (search ? 'search=' + search + '&&' : '') + (page ? 'page=' + page : '')" class="w-12 h-12 flex items-center justify-center rounded-full bg-dark-blue-700">
        <slot />
    </inertia-link>
</template>
<script>
export default {
    props: {
        search: String,
        page: Number
    }
}
</script>
