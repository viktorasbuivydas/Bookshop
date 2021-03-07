<template>
    <div class="container justify-content-center">
        <ul>
            <li v-for="book in books.data" :key="book.id"> {{ book.title }}</li>
        </ul>
        <pagination :data="books" @pagination-change-page="loadBooks"></pagination>
    </div>
</template>

<script>
import BookService from '../services/BookService.js'
import pagination from 'laravel-vue-pagination'
export default {
    components: {
      pagination
    },
    data() {
        return {
            books: {},
        }

    },
    mounted() {
        this.loadBooks()
    },
    methods: {
        loadBooks(page = 1) {
            BookService.index(page)
                .then((response) => {
                    this.books = response.data
                })
        }
    }
}
</script>
