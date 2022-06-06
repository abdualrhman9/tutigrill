<template>
    <div class="cart">  

        <i class="fa fa-shopping-cart" @click="expand = !expand"></i> 
        <span>{{ products.length }}</span>
        <div class="cart-content" v-if="expand">
            
            <div class="products">
                <product-component 
                    v-on:remove-meal="productRemovedHandler"
                    v-for="(meal,index) in products" 
                    :key="meal.id" 
                    :meal="meal"
                    > <hr v-if="index != products.length-1"> </product-component>
                
                <p v-if="products.length == 0"> No Items Selected </p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    
                    <button 
                        class="btn btn-primary"
                        v-if="products.length != 0" 
                        @click.prevent="navigateTo"
                    > Purchse </button>
                </div>

                <div class="col-md-6" >
                    <p> Total:  <span class="total"> &nbsp; ${{ total }}</span> </p>
                </div>
                

            </div> 
            
            <div class="over-lay" @click="expand = false"></div>

        </div>
        
    </div>
</template>

<script>
import routes from '../routes';
import ModuleComponent from './ModuleComponent.vue';
import { StripeCheckout } from '@vue-stripe/vue-stripe';
import ProductComponent from './ProductComponent.vue';
export default {
    
    mounted: function(){
        
        this.products = JSON.parse(sessionStorage.getItem('cart') ?? '[]');
        this.$bus.$on('modalDismissed',(data)=>{
            this.alert = false;
        });
        
        this.$bus.$on('remove-meal',this.productRemovedHandler);
        this.$bus.$on('update-meal-qauntity',this.quantityUpdatedHandler);


        this.$bus.$on('addNewItem',this.addNewItem);
    },
    
    name: 'CartComponent',
    components: { 
        ModuleComponent, 
        StripeCheckout, 
        ProductComponent 
    },
    data: function() {
        return {
            products: [],
            total: 0,
            alert: false,
            expand: false,
        }
    },
    methods: {
        navigateTo: function(){
            if(this.$router.currentRoute.name != 'purchse'){
                this.$bus.$emit('collapse-menu');
                this.$router.push({name: 'purchse', replace: true});
            }else {
                //
            }
        },
        quantityUpdatedHandler: function(meal){
            this.products.forEach((product)=>{
                if(product.id === meal.id ){
                    product.quantity = meal.quantity;
                    this.$bus.$emit('quantity-updated',meal);
                }else {
                    return
                }
            });
            this.storeProducts();
            this.updateTotal();
        },
        productRemovedHandler: function(meal){
            let i = this.products.findIndex((product)=>product.id == meal.id);
            this.products.splice(i,1);
            this.$bus.$emit('itemRemoved',meal);
        },
        addNewItem: function(data) {
            
            let isExist = false;
            let index = this.products.findIndex((item)=>{
                return item.id == data.id
            });
            isExist = index != -1;
            if(!isExist) {
                this.products.push(data);
            }
            else
                this.alert = true;

            this.$bus.$emit('newItemAdded',data);
        },
        updateTotal: function(){
            this.total = 0;
            this.products.forEach((product)=>{
                this.total += product.price * product.quantity
            });
            this.total = Math.abs(this.total).toFixed(2);
        },
    
        storeProducts: function(){
            sessionStorage.setItem('cart',JSON.stringify(this.products));
        }
        
    },
    watch: {
        products: function(n,o) {
            sessionStorage.setItem('cart',JSON.stringify(n));
            this.updateTotal();
        }
    }
}
</script>

<style>

</style>