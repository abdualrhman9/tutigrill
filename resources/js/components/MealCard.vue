<template>
    <div class="meal">
        <img src="img/hero.jpg" width="200" height="200" alt="">
        <p>{{ meal.name }}</p>
        <small> $ {{ meal.price }} </small>
        <order-button 
            :disabled="inCart" 
            :meal="meal" 
            v-text="inCart ? 'Added' :'Add To Cart'"
        ></order-button>
    </div>
</template>

<script>
import OrderButton from './OrderButton.vue'
export default {
  components: { OrderButton },
    name: 'meal-card',
    props: ['meal','inCart']
}
</script>

<style>

</style>