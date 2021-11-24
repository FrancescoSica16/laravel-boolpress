<template>
  <section id="post-list" class="">
      <h2>I miei post</h2>
        <PostCard v-for="post in posts" :key="post.id" :post="post"/>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-if="current_page > 1" class="page-item">
                    <a class="page-link" href="#">Previous</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
               
                <li v-if="current_page < last_page" class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
  </section>
</template>




<script>
import PostCard from "./PostCard.vue";

export default {
    name: 'PostList',
    components: {
        PostCard
    },
    data(){
        return{
            posts : [],
            baseUri: 'http://127.0.0.1:8000',
            current_page: null,
            last_page: null,
        }
    },
    methods:{
        getPostList(page){
            axios.get(`${this.baseUri}/api/posts/?page=${page}`)

            .then((res) => {
                //esegue solo quando la chiamata axios ha successo e res sarà la risposta
               this.posts = res.data.post.data;
               console.log(this.posts);       

                // const {current_page, last_page} = res.data;
                this.current_page = res.data.post.current_page;
                this.last_page = res.data.post.last_page;
            })
            .catch((err) => {
                //esegue quando la chiamata non ha risultato
                console.error(err);
            })
            .then(()=> {
                // eseguo sempre indipendentemente da risultato chiamata
            });
        }
    },
    created() {
        this.getPostList(1);
    }
}
</script>

<style>

</style>