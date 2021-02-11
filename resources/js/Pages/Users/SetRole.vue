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
                <div class="relative inline-flex mt-1">
                    <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                    <select v-model="form.role" id="set_role" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <option>user</option>
                        <option>admin</option>
                    </select>
                </div>
                <jet-input-error :message="form.errors.role || form.errors.error" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Promoted.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Promote
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
