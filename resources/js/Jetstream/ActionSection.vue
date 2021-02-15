<template>
    <div class="lg:grid lg:grid-cols-3 lg:gap-6">
        <jet-section-title>
            <template #title><slot name="title"></slot></template>
            <template #description><slot name="description"></slot></template>
        </jet-section-title>

        <div class="mt-5 lg:mt-0 lg:col-span-2">
            <div class="lg:px-6">
                <slot name="content"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    import JetSectionTitle from './SectionTitle'

    export default {
        components: {
            JetSectionTitle,
        }
    }
</script>
