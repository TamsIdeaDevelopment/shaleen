<template>
    <div class="card mt-3">
        <elements-book :data="this.book"></elements-book>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return{
                book:[],
            }
        },
        mounted() {
            VueEvent.$on('fetchBook', () => {
                this.fetchBook();
            });
        },
        watch: {
            data() {}
        },
        created() {
            this.fetchBook();
        },
        methods: {
            fetchBook(){
                fetch('api/v1/Book/Lists/list-book').then(response => response.json())
                    .then(response => {
                        this.book = response.data;
                        console.log(this.book)
                    })
                    .catch(error=>console.log(error))
            },
        }
    }
</script>
