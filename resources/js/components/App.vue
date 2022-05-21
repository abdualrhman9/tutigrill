<template>
    <div>
        <nav-component :logo="'img/logo.jpg'"></nav-component>
        
        <router-view name="hero"> </router-view>
        <router-view name="features"> </router-view>
        <router-view name="menu"> </router-view>
        <router-view> </router-view>
        
    </div>
</template>

<script>
import NavComponent from './NavComponent.vue'
export default {
    name: 'app',
    created(){
    },
    components: { NavComponent },
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