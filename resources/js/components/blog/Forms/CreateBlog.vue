<template>
    <div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Create
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="checkValidation">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <div class="row" v-if="('name' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['name']}}</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control" v-model="blog.name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Category</label>
                                <select type="text" class="form-control" v-model="blog.blog_category_id">
                                    <option value="1">Education</option>
                                    <option value="2">Technology</option>
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
                                <input type="text" class="form-control" v-model="blog.description">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Status</label>
                                <select type="text" class="form-control" v-model="blog.status">
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
                blog:{
                    name:'',
                    blog_category_id:'',
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
            checkValidation()
            {
                this.errors = [];
                if((this.blog.name !== '') && (this.blog.description !== ''))
                {
                    // If name and description have input
                    this.createBlog();
                }

                // If name is empty
                if(!this.blog.name)
                {
                    this.errors['name'] = "Please enter the blog name"
                }

                // If description is empty
                if(!this.blog.description)
                {
                    this.errors['description'] = "Please enter the blog description"
                }
            },
            createBlog()
            {
                var url = 'api/v1/Blog/Creates/create-blog', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        name: this.blog.name,
                        blog_category_id: this.blog.blog_category_id,
                        description:this.blog.description,
                        status: this.blog.status,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    $("#exampleModal").modal('hide');

                    VueEvent.$emit('fetchBlog');
                })
            },
        }

    }

</script>
