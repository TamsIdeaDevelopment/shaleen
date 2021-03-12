<template>
    <div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Delete title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="deleteBlog">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="blog.name" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Description <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="blog.description" disabled>
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
            }
        },
        mounted() {
        },
        watch: {
            'data':function(){
                this.blog = this.data;
            }
        },
        created(){
        },
        methods: {
            deleteBlog()
            {
                var url = 'api/v1/Blog/Deletes/'+this.blog.id+'/delete-blog', method = 'post';

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
                    $("#deleteModal").modal('hide');

                    VueEvent.$emit('fetchBlog');
                })
            },
        }

    }

</script>
