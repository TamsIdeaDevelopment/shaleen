<template>
    <div>
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="updateBlog">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Name <span class="text-danger">*</span></label>
<!--                                <div class="row" v-if="('name' in errors)">-->
<!--                                    <div class="col">-->
<!--                                        <label class="text-danger">{{errors['name']}}</label>-->
<!--                                    </div>-->
<!--                                </div>-->
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
<!--                                <div class="row" v-if="('description' in errors)">-->
<!--                                    <div class="col">-->
<!--                                        <label class="text-danger">{{errors['description']}}</label>-->
<!--                                    </div>-->
<!--                                </div>-->
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
            updateBlog()
            {
                var url = 'api/v1/Blog/Updates/'+this.blog.id+'/update-blog', method = 'post';

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
                    // To hide the modal
                    $("#updateModal").modal('hide');

                    // To refresh the data
                    VueEvent.$emit('fetchBlog');
                })
            },
        }

    }

</script>
