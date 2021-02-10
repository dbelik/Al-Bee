<template lang="">
    <jet-form-section>
        <template #title>
            User Information
        </template>

        <template #description>
            Display information about user.
        </template>
    
        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="photo" value="Photo" />

                <div class="mt-2">
                    <img :src="'/storage/' + user.profile_photo_path" :alt="user.first_name" class="rounded-full h-20 w-20 object-cover">
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label value="First name" />
                <jet-input :value="user.first_name" type="text" class="mt-1 block w-full" disabled />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label value="Second name" />
                <jet-input :value="user.second_name" type="text" class="mt-1 block w-full" disabled />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label value="Third name" />
                <jet-input :value="user.third_name" type="text" class="mt-1 block w-full" disabled />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label value="Email" />
                <jet-input :value="user.email" type="text" class="mt-1 block w-full" disabled />
            </div>

            <div class="col-span-6 sm:col-span-4">
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
        }
    }
</script>
