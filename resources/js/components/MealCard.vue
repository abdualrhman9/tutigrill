<template>
    <div class="meal">
        <img src="img/hero.jpg" width="200" height="200" alt="">
        <h1>{{ meal.name }}</h1>
        <small> $ {{ meal.price }} </small>
        <p>pariatur, saepe quis est nisi tempora ipsam. Doloribus nobis reprehenderit sed consectetur eum nihil dolor. </p>
        <order-button 
            :disabled="inCart" 
            :meal="meal" 
        ></order-button>
    </div>
</template>

<script>
import OrderButton from './OrderButton.vue'
export default {
  components: { OrderButton },
    name: 'meal-card',
    mounted(){
        
    },
    props: ['meal','inCart'],
   
}
</script>

<style>

</style>