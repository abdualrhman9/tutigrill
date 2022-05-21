<template>
    <li class="nav-item">
        <router-link 
            class="nav-link" 
            :to="{name: 'home', hash: refrence}"
        > {{title}} </router-link>
        <slot></slot>
    </li>
</template>

<script>
export default {
    name: 'nav-item',
    props: ['refrence','title'],
}
</script>

<style>

</style>