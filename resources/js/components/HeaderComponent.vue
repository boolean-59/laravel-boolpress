<template>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <router-link :to="{ name: menuItem[0].routeName }" class="navbar-brand">{{menuItem[0].label}}</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <div v-for="(item,index) in menuItem" :key="index">
                         <router-link :to="{ name: item.routeName }" class="nav-link">{{item.label}} </router-link>
                    </div>
                </div>
            </div>
        </nav>

        <ul>
            <li> <a href="/">Home</a></li>
            <li> <a href="/admin">Area riservata</a></li>
        </ul>
    </header>
</template>
<script>
export default {
    name: 'HeaderComponent',
    data(){
        return {
             menuItem: [
        		{
					label: 'Home',
					routeName: 'home'
				},
				{
					label: 'Posts',
					routeName: 'posts'
				},
				{
					label: 'Chi Siamo',
					routeName: 'about'
				},
				{
					label: 'Contatti',
					routeName: 'contact'
				}
    ]
        }
    }


}
</script>
<style lang="scss">
 .router-link-active{
    color:red;
 }
</style>
