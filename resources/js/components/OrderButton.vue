<template>
  <button 
    class="btn" 
    data-order-btn 
    id="order" 
    @click="addToCart(meal)"
    > {{ disabled ? 'added' : text }} </button>
</template>

<script>
export default {
    name: 'order-button',
    props:['meal','disabled'],
    mounted(){
        this.$bus.$on('newItemAdded',(item)=>{
            if(item == this.meal){
                this.text = 'added'
            }
        });
        this.$bus.$on('itemRemoved',(item)=>{
            if(item.id == this.meal.id){
                this.text = 'add to cart'
            }
        });
    },
    methods: {
        addToCart(item){
            this.$bus.$emit('addNewItem',item);
        }
    },
    data(){
        return {
            text: 'add to cart'
        }
    }
}
</script>

<style>

</style>