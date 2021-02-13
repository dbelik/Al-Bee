<template>
    <content-container>
        <h2>Forgot your password?</h2>
        <h3>We will email you a password reset link!</h3>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Email" />
                <default-input id="email" type="email" class="mt-1" v-model="form.email" required autofocus />
            </div>

            <div class="flex items-center justify-center mt-4">
                <primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reset password
                </primary-button>
            </div>
        </form>
    </content-container>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    import ContentContainer from '@/Components/Containers/Content'
    import DefaultInput from '@/Components/Inputs/Default'
    import PrimaryButton from '@/Components/Buttons/Primary'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
            
            ContentContainer,
            DefaultInput,
            PrimaryButton
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
            }
        }
    }
</script>
