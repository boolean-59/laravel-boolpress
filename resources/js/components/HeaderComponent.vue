<template>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary container  ">
            <router-link :to="{ name: menuItem[0].routeName }" class="navbar-brand">{{menuItem[0].label}}</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">
                    <div v-for="(item,index) in menuItem" :key="index">
                         <router-link :to="{ name: item.routeName }" class="nav-link">{{item.label}} </router-link>
                    </div>

                </div>
                 <span class="navbar-text">
                         <a class="nav-link" href="/admin">Area riservata</a>
                 </span>
            </div>
        </nav>

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
header{
    background-color: #3490dc;
    margin-bottom: 20px;
}
 .router-link-exact-active{
    color:#ffffff !important;
 }
</style>
