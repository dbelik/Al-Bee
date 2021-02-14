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
                <div class="sm:rounded-lg px-8 py-4 flex items-center justify-center">
                    <search-link v-if="page &&page >= 2" :search="searchQuery" :page="1" class="bg-dark-blue-700 mr-2 w-12 h-12 flex items-center justify-center rounded-full">1</search-link>
                    <p v-if="page >= 3" class="mr-2 w-12 h-12 flex items-center justify-center">...</p>

                    <search-link v-if="page >= 1" :search="searchQuery" :page="page" class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full mr-2">{{ page }}</search-link>
                    <p class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full mr-2">{{ page + 1 }}</p>
                    <search-link v-if="page <= Math.ceil(total / perPage) - 2" :search="searchQuery" :page="page + 2"class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full mr-2">{{ page + 2 }}</search-link>

                    <p v-if="page <= Math.ceil(total / perPage) - 4" class="mr-2 w-12 h-12 flex items-center justify-center">...</p>
                    <search-link v-if="page <= Math.ceil(total / perPage) - 3" :search="searchQuery" :page="Math.ceil(total / perPage)" class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full">{{ Math.ceil(total / perPage) }}</search-link>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import SearchLink from '@/Components/Links/Search'

    export default {
        components: {
            AppLayout,
            SearchLink
        },
        props: {
            users: Array,
            total: Number,
            page: Number,
            perPage: Number,
            searchQuery: String
        },
        data() {
            return {
                search: '',
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
