<template>
    <intro-layout>
        <div class="flex items-center justify-center flex-col">
            <h2>Get started</h2>

            <jet-validation-errors class="mb-4" />

            <form @submit.prevent="submit">
                <div>
                    <jet-label for="first_name" value="First name" />
                    <jet-input id="first_name" type="text" class="mt-1 block" v-model="form.first_name" required autofocus autocomplete="first_name" />
                </div>

                <div class="mt-4">
                    <jet-label for="second_name" value="Second name" />
                    <jet-input id="second_name" type="text" class="mt-1 block" v-model="form.second_name" required autocomplete="second_name" />
                </div>

                <div class="mt-4">
                    <jet-label for="third_name" value="Third name (optional)" />
                    <jet-input id="third_name" type="text" class="mt-1 block" v-model="form.third_name" autocomplete="third_name" />
                </div>

                <div class="mt-4">
                    <jet-label for="email" value="Email" />
                    <jet-input id="email" type="email" class="mt-1 block" v-model="form.email" required />
                </div>

                <div class="mt-4">
                    <jet-label for="password" value="Password" />
                    <jet-input id="password" type="password" class="mt-1 block" v-model="form.password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <jet-label for="password_confirmation" value="Confirm Password" />
                    <jet-input id="password_confirmation" type="password" class="mt-1 block" v-model="form.password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                    <jet-label for="terms">
                        <div class="flex items-center">
                            <jet-checkbox name="terms" id="terms" v-model="form.terms" />

                            <div class="ml-2">
                                I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                            </div>
                        </div>
                    </jet-label>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <primary-button class="mr-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </primary-button>

                    <secondary-link class="mx-8" :href="route('login')">
                        Log in
                    </secondary-link>
                </div>
                
                <div class="block mt-4">
                    <inertia-link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                        Already registered?
                    </inertia-link>
                </div>
            </form>
        </div>
    </intro-layout>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from "@/Jetstream/Checkbox";
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    
    import IntroLayout from '@/Layouts/IntroLayout'
    import PrimaryButton from '@/Components/Buttons/Primary'
    import SecondaryLink from '@/Components/Links/Secondary'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,

            IntroLayout,
            PrimaryButton,
            SecondaryLink,
        },

        data() {
            return {
                form: this.$inertia.form({
                    first_name: '',
                    second_name: '',
                    third_name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        },

        metaInfo: {
            title: "Al&Bee - Register"
        }
    }
</script>
