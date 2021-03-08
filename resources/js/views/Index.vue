<template>
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 my-2" v-for="book in books.data" :key="book.id">
                <div class="card">
                    <a href="">
                        <img v-bind:src="book.cover_image_url" class="card-img-top" alt="...">
                    </a>

                    <span class="btn btn-primary new" v-if="book.is_new"> * NEW *</span>

                    <div class="discount" v-if="book.discount > 0">
                        <p><i class="fa fa-tag fa-lg"></i></p>
                        <p>{{ book.discount }} %</p>
                    </div>

                    <div class="card-body p-3">

                        <h5 class="card-title">Title: {{ book.title }}</h5>
                        <p class="card-text">Author: {{ book.authors }}</p>
                        <p v-if="book.discount>0" class="card-text text-danger h4">
                            <del>{{ book.price }} $</del>
                        </p>
                        <p class="card-text">Price: {{ book.price_after_discount }} $</p>
                    </div>
                </div>
            </div>
        </div>


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
