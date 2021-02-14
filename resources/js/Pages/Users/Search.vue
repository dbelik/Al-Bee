<template>
    <app-layout :user="$page.props.user">
        <h2>Search users</h2>

        <form v-on:submit="searchUsers" class="flex mt-6">
            <input v-model="search" class="w-full p-2" type="text" placeholder="Search users by their names..." autofocus value="hi">
            <button v-on:click="searchUsers" class="p-2 outline-none border-none">
                <img class="h-7" src="/imgs/icons/loupe.svg"/>
            </button>
        </form>
        
        <div class="py-6">
            <div class="overflow-hidden">
                <ul v-if="users.length > 0">
                    <li v-for="user in users" class="bg-dark-blue-700 flex items-center justify-between my-5 px-8 py-4 rounded-3xl">
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
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <page-list :total="total" :page="page" :perPage="perPage" :searchQuery="searchQuery" />
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import PageList from '@/Components/Search/PageList'

    export default {
        components: {
            AppLayout,
            PageList
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
