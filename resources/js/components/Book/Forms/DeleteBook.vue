<template>
    <div>
        <div class="modal fade" id="deleteModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel1">Delete Title Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="deleteBook">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="book.name" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="book.description" disabled>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                book:{
                    name:'',
                    book_category_id:'',
                    description:'',
                    status:'',
                },
            }
        },
        mounted() {
        },
        watch: {
            'data': function() {
                this.book = this.data;
            }
        },
        created(){
        },
        methods: {
            deleteBook()
            {
                var url = 'api/v1/Book/Deletes/'+this.book.id+'/delete-book', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    $("#deleteModal1").modal('hide');

                    VueEvent.$emit('fetchBook');
                })
            },
        }

    }

</script>
