<template >
    <div>
        <div class="product" :data-id="meal.id">
            <img src="/img/logo.jpg" alt="meal">                    
            <div class="product-info">
                <p> {{meal.name}} </p>
                <small>$ {{ Math.abs(meal.price ).toFixed(2)  }}</small>
            </div>
            <input v-model="quantity" type="number"  class="count"  min="1">
            <button class="btn btn-danger rounded" @click="removeMeal(meal)"> <i class="fa fa-trash"></i> </button>
        </div>
        <slot />
    </div>
</template>

<script>
export default {
    name: 'product-component',
    props: ['meal'],
    data: function(){
        return {
            quantity: this.meal.quantity ?? 1,
        }
    },
    
    methods: {
       
        removeMeal: function(meal){
            this.$bus.$emit('remove-meal',meal);
        }
    },
    watch: {
        quantity: function(newval,old){
            this.meal.quantity = newval;
            this.$bus.$emit('update-meal-qauntity',this.meal);
        }
    }
}
</script>
<style>
    .rounded {
        margin-top: 0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
</style>