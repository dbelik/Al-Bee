<template>
    <content-container>
        <div class="w-full h-full flex justify-between items-center">
            <navbar :user="user" />
            <div class="w-full h-full px-6 lg:px-12 overflow-auto">
                <slot />
            </div>
        </div>
        
        <!-- Must be included to show model windows -->
        <portal-target name="modal" multiple>
        </portal-target>
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
        props: {
            user: Object
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },
    }
</script>
