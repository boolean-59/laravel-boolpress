<template>
    <section>
        <div v-if="post">
            <h1 >{{post.title}}</h1>
            <img :src="`/storage/${post.image}`" alt="">
            <p v-html="post.content"></p>
            <ul v-if="post.tags">
                <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
            </ul>

        </div>

    </section>
</template>
<script>
export default {
    name: 'SinglePostComponent',
    data(){
        return{
            post: null
        }
    },
    mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((response) => {
            this.post = response.data;
        }).catch((error) => {
            // handle error
            this.$router.push({name: 'page-404'});
        })
    }
}
</script>
<style lang="scss">
 img {
    width:200px;
 }

</style>
