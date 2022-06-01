<template >
    <div class="product" :data-id="meal.id">
        <img src="/img/logo.jpg" alt="meal">                    
        <div class="product-info">
            <p> {{meal.title}} </p>
            <small>$ {{ Math.abs(meal.price ).toFixed(2)  }}</small>
        </div>
        <input v-model="quantity" type="number"  class="count"  min="1">
        <button class="btn btn-danger" @click="removeProduct(meal)"> <i class="fa fa-trash"></i> </button>
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
        removeProduct: function(meal){
            this.$emit('product-removed',meal);
        }
    },
    watch: {
        quantity: function(newval,old){
            this.meal.quantity = newval;
            this.$emit('quantity-updated',this.meal);
        }
    }
}
</script>
