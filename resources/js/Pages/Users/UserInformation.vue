<template lang="">
    <jet-form-section @submitted="unbanUser">
        <template #title>
            User Information
        </template>

        <template #description>
            Display information about user.
        </template>
    
        <template #form>
            <div class="col-span-6">
                <jet-label for="photo" value="Photo" />

                <div class="mt-2">
                    <img v-if="user.profile_photo_path" :src="'/storage/' + user.profile_photo_path" :alt="user.first_name" class="rounded-full h-20 w-20 object-cover">
                    <div v-else class="rounded-full h-20 w-20" style="background-color: #ebf4ff" />
                </div>
            </div>

            <div class="col-span-6">
                <jet-label value="Role" />
                <jet-input :value="user.role" type="text" class="mt-1 block w-full" disabled />
            </div>

            <div v-if="user.ban" class="col-span-6">
                <jet-label value="Banned until" />
                <div class="relative">
                    <jet-input :value="user.ban" type="text" class="mt-1 block w-full" disabled />
                    <button v-on:click="unbanUser" class="absolute h-4 w-4 right-4 top-1/2 transform -translate-y-1/2 opacity-70 hover:opacity-100 focus:opacity-100 outline-none duration-100" title="Unban user">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                                <path d="M294.111,256.001L504.109,46.003c10.523-10.524,10.523-27.586,0-38.109c-10.524-10.524-27.587-10.524-38.11,0L256,217.892
                                    L46.002,7.894c-10.524-10.524-27.586-10.524-38.109,0s-10.524,27.586,0,38.109l209.998,209.998L7.893,465.999
                                    c-10.524,10.524-10.524,27.586,0,38.109c10.524,10.524,27.586,10.523,38.109,0L256,294.11l209.997,209.998
                                    c10.524,10.524,27.587,10.523,38.11,0c10.523-10.524,10.523-27.586,0-38.109L294.111,256.001z" fill="white"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="col-span-6">
                <jet-label value="First name" />
                <jet-input :value="user.first_name" type="text" class="mt-1 block w-full" disabled />
            </div>

            <div class="col-span-6">
                <jet-label value="Second name" />
                <jet-input :value="user.second_name" type="text" class="mt-1 block w-full" disabled />
            </div>

            <div class="col-span-6">
                <jet-label value="Third name" />
                <jet-input :value="user.third_name" type="text" class="mt-1 block w-full" disabled />
            </div>

            <div class="col-span-6">
                <jet-label value="Email" />
                <jet-input :value="user.email" type="text" class="mt-1 block w-full" disabled />
            </div>

            <div class="col-span-6">
                <jet-label value="Phone number" />
                <jet-input :value="user.phone_number" type="tel" class="mt-1 block w-full" disabled />
            </div>
        </template>
    </jet-form-section>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetLabel from '@/Jetstream/Label'
    import JetInput from '@/Jetstream/Input'
    
    export default {
        components: {
            AppLayout,
            JetFormSection,
            JetLabel,
            JetInput,
        },
        props: {
            user: Object
        },
        data() {
            return {
                form: this.$inertia.form({
                    ban_duration: '0 days',
                }),
            }
        },
        methods: {
            unbanUser() {
                this.form.put(route('user.update', this.user.id), {
                    errorBag: 'banUser',
                    preserveScroll: true,
                })
            }
        }
    }
</script>
