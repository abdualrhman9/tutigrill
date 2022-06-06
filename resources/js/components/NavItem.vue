<template>
    <li class="nav-item" >
        <a 
            href=""
            class="nav-link" 
            @click.prevent="navigateTo({name: 'home', hash: refrence, replace: true})"
        > {{title}} </a>
        <slot></slot>
    </li>
</template>

<script>
export default {
    name: 'nav-item',
    props: ['refrence','title'],
    methods: {
        navigateTo: function(router){
            this.$bus.$emit('collapse-menu');
            this.$router.push(router);
        }
    },
    
}
</script>

<style>

</style>