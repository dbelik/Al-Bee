<template>
    <jet-form-section @submitted="setRole">
        <template #title>
            Set role
        </template>

        <template #description>
            Promote user to any role (e.g admin).
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="set_role" value="Set role to" />
                <div class="relative inline-flex mt-1 w-full">
                    <select v-model="form.role" id="set_role" class="rounded-xl appearance-none w-full bg-transparent border-3 border-solid border-white text-white">
                        <option class="text-secondary">user</option>
                        <option class="text-secondary">admin</option>
                    </select>
                </div>
                <jet-input-error :message="form.errors.role || form.errors.error" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Promote
            </primary-button>

            <jet-action-message :on="form.recentlySuccessful" class="ml-3">
                Promoted.
            </jet-action-message>
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
    
    import PrimaryButton from '@/Components/Buttons/Primary'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            PrimaryButton,
        },

        data() {
            return {
                form: this.$inertia.form({
                    role: this.user.role,
                }),
            }
        },

        props: {
            user: Object
        },

        methods: {
            setRole() {
                this.form.put(route('user.update', this.user.id), {
                    errorBag: 'setRole',
                    preserveScroll: true,
                })
            }
        },
    }
</script>
