<template>
    <!-- Start Header -->
    <div class="header">
        <div class="container">
            <nav class="nav collapse">
                <div class="nav-toggler" @click="expand = !expand">
                    <span></span><span></span><span></span>
                </div>
                <img :src="logo" width="80" height="80" alt="Tuti grill logo">
                
                <ul class="nav-menu" v-bind:class="{'expand': expand}">

                    <div class="nav-left">
                        <nav-item :refrence="'#home'" :title="'Home'"></nav-item>
                        <nav-item :refrence="'#menu'" :title="'Menu'"></nav-item>
                        <nav-item :refrence="'#about'" :title="'About'"></nav-item>
                       
                        

                        <drop-item :title="'Blog'">
                            <nav-item :refrence="'#Blog'" :title="'Blog Test'"></nav-item>
                            <nav-item :refrence="'#Blog2'" :title="'Blog Test 2'"></nav-item>
                        </drop-item>


                        <nav-item :refrence="'#contact'" :title="'contact'"></nav-item>
                        
                    </div>

                    <div class="nav-right">
                        <nav-item :refrence="'reservation'" :title="'Book A Table'"></nav-item>
                        
                        <nav-item :refrence="''" :title="''">
                            <cart-component></cart-component>
                        </nav-item>
                        
                    </div>
                </ul> 
            </nav>
        </div>
    </div>
        <!-- End Header -->
</template>

<script>
import NavItem from "./NavItem.vue";
import DropItem from './DropItem.vue';
import CartComponent from './CartComponent.vue'
export default {
    data: function(){
        return {
            expand: false
        }
    },
    name: 'nav-component',
    props: ['logo'],
    components: {NavItem, DropItem, CartComponent},
    methods: {
        expandMenu: function(){
            
            console.log(this);
        }
    }
}
</script>

<style>

</style>