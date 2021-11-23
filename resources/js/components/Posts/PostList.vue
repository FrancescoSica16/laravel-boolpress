<template>
  <section id="post-list" class="">
      <h2>I miei post</h2>
        <PostCard v-for="post in posts" :key="post.id" :post="post"/>
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

        }
    },
    methods:{
        getPostList(){
            axios.get(`${this.baseUri}/api/posts/`)

            .then((res) => {
                //esegue solo quando la chiamata axios ha successo e res sarà la risposta
               this.posts = res.data.post;
               console.log(this.posts);       
                 
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
    mounted() {
        this.getPostList();
    }
}
</script>

<style>

</style>