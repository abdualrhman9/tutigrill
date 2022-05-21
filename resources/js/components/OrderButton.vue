<template>
  <button 
    class="btn" 
    data-order-btn 
    id="order" 
    @click="addToCart(meal)"
    > </button>
</template>

<script>
export default {
    name: 'order-button',
    props:['meal','disabled'],
    mounted(){
        this.$bus.$on('newItemAdded',(item)=>{
            if(item == this.meal){
                // this.$el.innerHTML = 'Added';
                // this.$el.setAttribute('disabled',true);
            }
        });
    },
    methods: {
        addToCart(item){
            this.$bus.$emit('addNewItem',item);
        }
    }
}
</script>

<style>

</style>