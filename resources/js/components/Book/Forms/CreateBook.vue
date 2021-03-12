<template>
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
            Create
        </button>
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Create title Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="checkValidation1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <div class="row" v-if="('name' in errors)">
                                        <div class="col">
                                            <label class="text-danger">{{errors['name']}}</label>
                                        </div>
                                    </div>
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
                                    <label>Description <span class="text-danger">*</span></label>
                                    <div class="row" v-if="('description' in errors)">
                                        <div class="col">
                                            <label class="text-danger">{{errors['description']}}</label>
                                        </div>
                                    </div>
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
                errors:[],
            }
        },
        mounted() {
        },
        watch: {
            data() {}
        },
        created(){
        },
        methods: {
            checkValidation1()
            {
                this.errors = [];
                if((this.book.name !== '') && (this.book.description !== ''))
                {
                    this.createBook();
                }

                if(!this.book.name)
                {
                    this.errors['name'] = "Please enter the book name"
                }
                if(!this.book.description)
                {
                    this.errors['description'] = "Please enter the book description"
                }
            },
            createBook()
            {
                var url = 'api/v1/Book/Creates/create-book', method = 'post';

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
                    $("#exampleModal1").modal('hide');

                    VueEvent.$emit('fetchBook');
                })
            },
        }

    }

</script>
