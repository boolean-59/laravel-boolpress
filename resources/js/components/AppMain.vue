<template>
    <div>
        <h1>{{titolo}}</h1>
        <h2>{{sottotitolo}}</h2>
        <section>
      <h2>Lista Posts</h2>
      <ul>
          <li v-for="post in posts" :key="post.id">
              <h3>{{post.title}}</h3>
              <p v-if="post.category"><strong>Categoria:</strong> {{post.category.name}}</p>
              <div v-if="post.tags && post.tags.length > 0">
                  <strong>Tags</strong>
                  <ul>
                      <li v-for="tag in post.tags" :key="tag.id">
                          {{tag.name}}
                      </li>
                  </ul>
              </div>
              <p v-html="post.content"></p>

          </li>
      </ul>
  </section>
    </div>

</template>
<script>
export default {
    name: 'AppMain',
    data(){
        return {
           'titolo': 'Work In Progress',
           'sottotitolo': 'Sito in Costruzione',
            posts: []
        }
    },
    created() {
        axios.get("/api/posts")
            .then( (response) => {
                this.posts = response.data;
            });
    }

}
</script>
<style lang="scss">

</style>
