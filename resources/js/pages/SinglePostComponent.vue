<template>
    <section>
        <div v-if="post">
            <h1 >{{post.title}}</h1>
            <p>{{post.content}}</p>
            <ul v-if="post.tags">
                <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
            </ul>
            <img :src="`/storage/${post.image}`" alt="">
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
        })
    }
}
</script>
<style lang="scss">

</style>
