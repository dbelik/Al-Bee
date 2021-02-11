<template>
    <jet-form-section @submitted="banUser">
        <template #title>
            Ban user
        </template>

        <template #description>
            Prevent suspicious user from using website.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="ban_duration" value="Ban this user for" />
                <jet-input id="ban_duration" type="text" class="mt-1 block w-full" v-model="form.ban_duration" placeholder="1 Day..." />
                <jet-input-error :message="form.errors.ban_duration" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Banned.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Ban
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },

        data() {
            return {
                form: this.$inertia.form({
                    ban_duration: '',
                }),
            }
        },

        props: {
            user: Object
        },

        methods: {
            banUser() {
                this.form.put(route('user.update', this.user.id), {
                    errorBag: 'banUser',
                    preserveScroll: true,
                })
            }
        },
    }
</script>
