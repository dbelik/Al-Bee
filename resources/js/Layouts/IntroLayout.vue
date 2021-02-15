<template>
    <content-container>
        <div class="w-full h-full flex justify-between items-center">
            <div class="w-full h-full px-6 lg:px-12 overflow-auto">
                <slot />
            </div>
        </div>
    </content-container>
</template>

<script>
    import ContentContainer from '@/Components/Containers/Content'

    export default {
        components: {
            ContentContainer,
        },
    }
</script>
