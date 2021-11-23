<template>
  <section id="post-list" class="">
      <h2>I miei post</h2>

  </section>
</template>

<script>

export default {
    name: 'postList',
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
               this.posts = res.data;
            })
            .catch((err) => {
                //esegue quando la chiamata non ha risultato
                console.error(err);
            })
            .then(()=> {
                // eseguo sempre indipendentemente da risultato chiamata
            });
        }
    }
}
</script>

<style>

</style>