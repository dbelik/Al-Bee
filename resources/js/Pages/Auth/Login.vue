<template>
    <content-container>
        <h2>Get started</h2>

        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="flex flex-col sm:block">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4 flex flex-col sm:block">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-center mt-4 flex-col sm:flex-row">
                <primary-button class="mb-4 sm:mb-0 sm:mr-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </primary-button>

                <secondary-link class="mx-8" :href="route('register')">
                    Sign up
                </secondary-link>
            </div>

            <div class="block mt-4">
                <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </inertia-link>
            </div>
        </form>
    </content-container>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    
    import ContentContainer from '@/Components/Containers/Content'
    import PrimaryButton from '@/Components/Buttons/Primary'
    import SecondaryLink from '@/Components/Links/Secondary'

    export default {
        metaInfo: {
            title: 'Al&Bee - Log in'
        },

        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,

            ContentContainer,
            PrimaryButton,
            SecondaryLink,
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
