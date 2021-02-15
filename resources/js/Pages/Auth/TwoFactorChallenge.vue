<template>
    <intro-layout>
        <div class="flex items-center justify-center flex-col h-full w-full">
            <div class="mb-4 text-sm text-gray-600 text-center">
                <template v-if="! recovery">
                    <h2>Authentication code</h2>
                    <p>Please confirm access to your account by entering the authentication code provided by your authenticator application.</p>
                </template>

                <template v-else>
                    <h2>Recovery code</h2>
                    Please confirm access to your account by entering one of your emergency recovery codes.
                </template>
            </div>

            <jet-validation-errors class="mb-4" />

            <form @submit.prevent="submit" class="flex items-center justify-center flex-col">
                <div v-if="! recovery">
                    <jet-label for="code" value="Code" />
                    <jet-input ref="code" id="code" type="text" inputmode="numeric" class="mt-1 block" v-model="form.code" autofocus autocomplete="one-time-code" />
                </div>

                <div v-else>
                    <jet-label for="recovery_code" value="Recovery Code" />
                    <jet-input ref="recovery_code" id="recovery_code" type="text" class="mt-1 block" v-model="form.recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4">
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer" @click.prevent="toggleRecovery">
                        <template v-if="! recovery">
                            Use a recovery code
                        </template>

                        <template v-else>
                            Use an authentication code
                        </template>
                    </button>

                    <primary-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Login
                    </primary-button>
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
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    
    import IntroLayout from '@/Layouts/IntroLayout'
    import PrimaryButton from '@/Components/Buttons/Primary'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,

            IntroLayout,
            PrimaryButton
        },

        data() {
            return {
                recovery: false,
                form: this.$inertia.form({
                    code: '',
                    recovery_code: '',
                })
            }
        },

        methods: {
            toggleRecovery() {
                this.recovery ^= true

                this.$nextTick(() => {
                    if (this.recovery) {
                        this.$refs.recovery_code.focus()
                        this.form.code = '';
                    } else {
                        this.$refs.code.focus()
                        this.form.recovery_code = ''
                    }
                })
            },

            submit() {
                this.form.post(this.route('two-factor.login'))
            }
        }
    }
</script>
