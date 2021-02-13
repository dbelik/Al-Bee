<template>
    <content-container>
        <div class="w-full h-full flex justify-between items-center">
            <navbar />
        </div>
    </content-container>
</template>

<script>
    import ContentContainer from '@/Components/Containers/Content'
    import Navbar from '@/Components/Misc/Navbar'

    export default {
        components: {
            ContentContainer,
            Navbar
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },
    }
</script>
