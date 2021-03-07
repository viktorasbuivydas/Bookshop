<template>
    <div class="container justify-content-center">
        {{ books }}
    </div>
</template>

<script>
import BookService from '../services/BookService.js'
export default {
    data() {
        return {
            books: {},
        }

    },
    mounted() {
        this.loadBooks()
    },
    methods: {
        loadBooks(){
            BookService.get()
            .then((response) => {
                this.books = response.data
            })
        }
    }
}
</script>
