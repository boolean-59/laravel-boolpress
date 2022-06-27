<template>
    <main>
         <h1>Sono il Main!</h1>
         <ul>
            <li v-for="(post,index) in posts" :key="index">
                {{post.title}}
                <a href="#" @click="getoDetail(post.slug, index)">Vedi dettaglio</a>
                <!-- <span v-if="post.detail">
                     {{post.detail.slug}}
                </span> -->
            </li>
         </ul>
    </main>


</template>
<script>
export default {
    name: 'MainComponent',
    data(){
        return {
            posts: [],
        }
    },
    methods:{
        getoDetail(slug,index){
            axios.get('/api/posts/'+ slug).then((response)=>{
            console.log(response.data);
            this.posts[index].detail = response.data;
            console.log(this.posts[index]);
        })
        }
    },
    created(){
        axios.get('/api/posts').then((response)=>{
            console.log(response.data);
            this.posts = response.data;
        })
    }

}
</script>
<style lang="scss">

</style>
