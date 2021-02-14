<template>
    <div class="sm:rounded-lg px-8 py-4 flex items-center justify-center">
        <search-link v-if="page &&page >= 2" :search="searchQuery" :page="1" class="bg-dark-blue-700 mr-2 w-12 h-12 flex items-center justify-center rounded-full">1</search-link>
        <p v-if="page >= 3" class="mr-2 w-12 h-12 flex items-center justify-center">...</p>

        <search-link v-if="page >= 1" :search="searchQuery" :page="page" class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full mr-2">{{ page }}</search-link>
        <p v-if="Math.ceil(total / perPage) > 1" class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full mr-2">{{ page + 1 }}</p>
        <search-link v-if="page <= Math.ceil(total / perPage) - 2" :search="searchQuery" :page="page + 2"class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full mr-2">{{ page + 2 }}</search-link>

        <p v-if="page <= Math.ceil(total / perPage) - 4" class="mr-2 w-12 h-12 flex items-center justify-center">...</p>
        <search-link v-if="page <= Math.ceil(total / perPage) - 3" :search="searchQuery" :page="Math.ceil(total / perPage)" class="bg-dark-blue-700 w-12 h-12 flex items-center justify-center rounded-full">{{ Math.ceil(total / perPage) }}</search-link>
    </div>
</template>
<script>
import SearchLink from '@/Components/Links/Search'
export default {
    components: {
        SearchLink
    },
    props: {
        page: Number,
        searchQuery: String,
        total: Number,
        perPage: Number
    }
}
</script>