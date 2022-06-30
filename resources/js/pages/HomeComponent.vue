<template>
    <section class="container">
        <h1> Home</h1>
        <div class="row">
            <div class="col col-md-12 carousel" v-if="posts.length > 0">
                <agile>
                    <div class="slide" v-for="(post,index) in posts" :key="index" :class="`slide--${index}`">

                        <img :src="`/storage/${post.image}`" :alt="post.title" class="img-fluid">
                         <h3>{{post.title}}</h3>
                    </div>
                    <template slot="prevButton"><i class="fas fa-chevron-left"></i></template>
                    <template slot="nextButton"><i class="fas fa-chevron-right"></i></template>
                </agile>
            </div>
        </div>
    </section>
</template>
<script>
import { VueAgile } from 'vue-agile';
export default {
    name: 'HomeComponent',
    components: {
        agile: VueAgile
    },
    data(){
        return {
            posts: []
        }
    },
    created(){
        axios.get('/api/posts').then((response)=>{
            this.posts = response.data.slice(0,3);
        }).catch((error)=>{
            console.log(error);
        })
    }
}
</script>
<style lang="scss">
h3{
    position:absolute;
    top: 250px;
}
.carousel {
  display: flex;
  font-family: "Lato", sans-serif;
  font-weight: 300;
  margin: 0 auto;
  max-width: 900px;
  padding: 30px;
}

.agile {
  width: 100%;
}
.agile__actions {
  margin-top: 20px;
}
.agile__nav-button {
  background: transparent;
  border: none;
  color: #ccc;
  cursor: pointer;
  font-size: 24px;
  transition-duration: 0.3s;
}
.agile__nav-button:hover {
  color: #888;
}
.agile__dot {
  margin: 0 10px;
}
.agile__dot button {
  background-color: #eee;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  display: block;
  height: 10px;
  font-size: 0;
  line-height: 0;
  margin: 0;
  padding: 0;
  transition-duration: 0.3s;
  width: 10px;
}
.agile__dot--current button, .agile__dot:hover button {
  background-color: #888;
}

.slide {
    position:relative;
  align-items: center;
  color: #fff;
  display: flex;
  height: 350px;
  justify-content: center;
}
.slide h3 {
  font-size: 32px;
  font-weight: 300;
}

.slide--1 {
  background-color: #f1c40f;
}

.slide--2 {
  background-color: #e67e22;
}

.slide--3 {
  background-color: #e74c3c;
}

.slide--4 {
  background-color: #9b59b6;
}

.slide--5 {
  background-color: #3498db;
}

.slide--6 {
  background-color: #2ecc71;
}
</style>
