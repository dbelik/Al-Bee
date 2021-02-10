<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Search users
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form v-on:submit="searchUsers" class="shadow flex mt-12">
                <input v-model="search" class="w-full rounded p-2" type="text" placeholder="Search users by their names..." autofocus>
                <button v-on:click="searchUsers" class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
                    <i class="material-icons">Search</i>
                </button>
            </form>
        </div>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-4">
                    <ul v-if="users.length > 0">
                        <li v-for="user in users" class="flex items-center justify-between my-5">
                            <div class="flex items-center">
                                <div 
                                    class="w-16 h-16 rounded-full mr-5" 
                                    :style="'background: ' + (user.profile_photo_path ? 'url(storage/' + user.profile_photo_path + ') center no-repeat, ' : '') + 'grey; background-size: cover;'"></div>
                                <span>{{ user.first_name }} {{ user.second_name }}</span>
                            </div>
                            <a :href="'/users/' + user.id">View</a>
                        </li>
                    </ul>
                    <span v-else>Can't find anyone</span>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        props: {
            users: Array
        },
        data() {
            return {
                search: ''
            };
        },
        methods: {
            searchUsers(event) {
                event.preventDefault();
                const search = this.search.trim();
                window.location.href = "users?search=" + search;
            }
        }
    }
</script>
