<template>
    <div>
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    Blog Table
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <create-form-blog></create-form-blog>
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
                <tr v-for="(blog, index) in data">
                    <td>{{index+1}}</td>
                    <td>{{blog.blog_category_id.name}}</td>
                    <td>{{blog.name}}</td>
                    <td>{{blog.description}}</td>
                    <td>{{blog.created_at}}</td>
                    <td>
                        <button class="btn btn-secondary" @click="openEditRecord(blog)">Edit</button>
                        <button class="btn btn-danger" @click="openDeleteRecord(blog)">Delete</button>
                    </td>
                </tr>
            </table>

        </div>
        <update-form-blog :data="this.blog_details"></update-form-blog>
        <delete-form-blog :data="this.blog_details"></delete-form-blog>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                blog_details :  [],
            }
        },
        mounted() {
        },
        watch: {
            data() {}
        },
        created() {
        },
        methods: {
            openEditRecord(data) {
                $("#updateModal").modal('show');
                this.blog_details = data;
            },
            openDeleteRecord(data) {
                $("#deleteModal").modal('show');
                this.blog_details = data;
            },
        }
    }
</script>
