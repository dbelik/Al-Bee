<template>
    <app-layout :user="$page.props.user">
        <h2>Search users</h2>

        <form v-on:submit="searchUsers" class="flex mt-6">
            <input v-model="search" class="w-full p-2" type="text" placeholder="Search users by their names..." autofocus>
            <button v-on:click="searchUsers" class="p-2">
                <img class="h-7" src="/imgs/icons/loupe.svg"/>
            </button>
        </form>

        <div class="py-6">
            <div class="overflow-hidden">
                <ul v-if="users.length > 0">
                    <li v-for="user in users" class="bg-dark-blue-700 flex items-center justify-between my-5 px-8 py-4 rounded-full">
                        <div class="flex items-center">
                            <div 
                                class="w-16 h-16 rounded-full" 
                                :style="'background: ' + (user.profile_photo_path ? 'url(/storage/' + user.profile_photo_path + ') center no-repeat, ' : '') + '#ebf4ff; background-size: cover;'"></div>
                            <span class="px-5 flex-1">{{ user.first_name }} {{ user.second_name }}</span>
                        </div>
                        <a :href="'/users/' + user.id">View</a>
                    </li>
                </ul>
                <span v-else>Can't find anyone</span>
            </div>
        </div>
        
        <div class="pb-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="sm:rounded-lg px-8 py-4 flex items-center justify-between">
                    <a v-if="this.total / this.perPage >= 2" href="#" class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full">first</a>
                    <div class="flex items-center">
                        <a v-if="page >= 1" href="#" class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full mr-2">{{ page }}</a>
                        <a href="#" class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full mr-2">{{ page + 1 }}</a>
                        <a href="#" class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full mr-2">{{ page + 2 }}</a>
                    </div>
                    <a v-if="this.total / this.perPage >= 2" href="#" class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full">last</a>
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
            users: Array,
            total: Number,
            page: Number,
            perPage: Number
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
                window.location.href = "/users?search=" + search;
            }
        }
    }
</script>
