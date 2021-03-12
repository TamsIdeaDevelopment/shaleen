<template>
    <div>
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    Book Table
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <create-form-book></create-form-book>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table-bordered p-3">
                <tr>
                    <td>No</td>
                    <td>Category</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Date</td>
                    <td>Actions</td>
                </tr>
                <tr v-for="(book, index) in data">
                    <td>{{index+1}}</td>
                    <td>{{book.book_category_id.name}}</td>
                    <td>{{book.name}}</td>
                    <td>{{book.description}}</td>
                    <td>{{book.created_at}}</td>
                    <td>
                        <button class="btn btn-secondary" @click="openEditRecord(book)">Edit</button>
                        <button class="btn btn-danger" @click="openDeleteRecord(book)">Delete</button>
                    </td>
                </tr>
            </table>
        </div>
        <update-form-book :data="this.book_details"></update-form-book>
        <delete-form-book :data="this.book_details"></delete-form-book>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return{
                book_details:[],
            }
        },
        mounted(){
        },
        watch: {
            data() {}
        },
        created(){
        },
        methods:  {
            openEditRecord(data){
                $("#updateModal1").modal('show');
                this.book_details = data;
            },
            openDeleteRecord(data){
                $("#deleteModal1").modal('show');
                this.book_details = data;
            },
        }
    }
</script>
