<template>
    <div>
        <div class="modal fade" id="updateModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Title Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateBook">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="book.name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Category</label>
                                    <select type="text" class="form-control" v-model="book.book_category_id">
                                        <option value="1">Software</option>
                                        <option value="2">Developer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="book.description">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Status</label>
                                    <select type="text" class="form-control" v-model="book.status">
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
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
                this.book= this.data;
            }
        },
        created(){
        },
        methods: {
            updateBook()
            {
                var url = 'api/v1/Book/Updates/'+this.book.id+'/update-book', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        name: this.book.name,
                        book_category_id: this.book.book_category_id,
                        description:this.book.description,
                        status: this.book.status,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    $("#updateModal1").modal('hide');

                    VueEvent.$emit('fetchBook');
                })
            },
        }

    }

</script>
