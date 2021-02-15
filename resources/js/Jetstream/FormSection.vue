<template>
    <div class="lg:grid lg:grid-cols-3 lg:gap-6">
        <jet-section-title>
            <template #title><slot name="title"></slot></template>
            <template #description><slot name="description"></slot></template>
        </jet-section-title>

        <div class="mt-5 lg:mt-0 lg:col-span-2">
            <form @submit.prevent="$emit('submitted')">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="py-5 lg:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <slot name="form"></slot>
                        </div>
                    </div>

                    <div class="flex items-center justify-start py-3 text-right" v-if="hasActions">
                        <slot name="actions"></slot>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import JetSectionTitle from './SectionTitle'

    export default {
        components: {
            JetSectionTitle,
        },

        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>
