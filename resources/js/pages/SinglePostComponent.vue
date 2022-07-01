<template>
    <section>
        <div v-if="post">
            <h1 >{{post.title}}</h1>
            <img :src="`/storage/${post.image}`" alt="">
            <p v-html="post.content"></p>
            <ul v-if="post.tags">
                <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
            </ul>
            <div>
                <h3>Lascia un commento</h3>
                <form @submit.prevent="addComment()">
                    <div>
                        <input type="text" id="username" placeholder="Inserisci il nome" v-model="formData.username">
                    </div>
                    <div>
                        <textarea id="content" cols="30" rows="10" placeholder="Inserisci il testo del commento *" v-model="formData.content"></textarea>
                        <div v-if="formErrors.content" style="background: red; color: white">
                            <ul>
                                <li v-for="(error, index) in formErrors.content" :key="index">
                                    {{error}}
                                </li>
                            </ul>
                        </div>
                    </div>
                        <div>
                            <button type="submit">Aggiungi Commento</button>
                        </div>
                </form>
                <!-- <div v-show="commentSent" style="background: green; color: #fff; text-align: center">
                    Commento in fase di approvazione! Grazie
                </div> -->
            </div>
            <div v-if="post.comments.length > 0">
                <h3>Commenti</h3>
                <ul>
                    <li v-for="comment in post.comments" :key="comment.id">
                        <small>{{comment.created_at}}</small>
                        <p>{{comment.content}}</p>
                        <h4>{{comment.username}}</h4>
                    </li>
                </ul>
      </div>
        </div>

    </section>
</template>
<script>
export default {
    name: 'SinglePostComponent',
    data(){
        return{
            post: null,
            formData: {
                username: '',
                content: '',
                post_id: ''
            },
            commentSent: false,
            formErrors: {}
        }
    },
    methods: {
        addComment() {
            // /api/comments
            axios.post(`/api/comments`, this.formData).then( (response) => {
                // pulisco i campi
                console.log(response.data);
                this.formData.username = "";
                this.formData.content = "";
                this.post.comments.push(response.data);
                // mostro l'avviso che il commento è stato inserito
                //this.commentSent = true;
            }).catch( (error) => {
                // handle error
                this.formErrors = error.response.data.errors;
            })
        }
    },
    mounted(){
        const slug = this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((response) => {
            this.post = response.data;
            this.formData.post_id = this.post.id;
        }).catch((error) => {
            // handle error
            console.log(error);
            this.$router.push({name: 'page-404'});
        })
    }
}
</script>
<style lang="scss" scoped>
img{
    width: 200px;
}

</style>
