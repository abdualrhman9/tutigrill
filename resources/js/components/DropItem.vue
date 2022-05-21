<template>

    <li class="dropdown-item" @click.prevent="toggleMenu">
        <router-link 
            class="nav-link" 
            :to="{name: 'home', hash: '#blog'}"
            
        > Blog </router-link>
        <ul class="drop-menu" v-bind:class="{'expand-menu': expand}" >
            <nav-item class="menu-item" :refrence="'Blog'" :title="'Blog1'"></nav-item>
            <nav-item class="menu-item" :refrence="'Blog2'" :title="'Blog2'"></nav-item>
        </ul>
    </li>

</template>

<script>
import NavItem from "./NavItem.vue"
export default {
    name: 'drop-item',
    components: {NavItem},
    data: function(){
        return {
            expand: false
        }
    },
    methods: {
        toggleMenu: function(){
           this.expand = !this.expand;
        }
    }
}
</script>

<style>
    
</style>