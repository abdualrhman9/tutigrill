<template>
    <div>
        
        <nav-component :logo="'img/logo.jpg'"></nav-component>
        
        <router-view name="hero"> </router-view>
        <router-view name="features"> </router-view>
        <router-view name="menu"> </router-view>
        <router-view name="reservation"></router-view>
        <router-view name="contact"> </router-view>
        <router-view /> 

        <footer-component></footer-component>

        

    </div>
</template>

<script>
import NavComponent from './NavComponent.vue'
import FooterComponent from './FooterComponent.vue'
import Loader from './Loader.vue'
export default {
    name: 'app',
    metaInfo: {
        title: 'TutiGrill',
        titleTemplate: '%s | Home',
    },
    created(){
    },
    mounted(){
        setTimeout(()=>{ this.loading = false },2000);
        // this.loading = false;
    },
    components: { 
        NavComponent,FooterComponent,Loader
    },

    data: function(){
        return {
            
        }
    },
    computed: {
        
    }
}
</script>

<style>

</style>