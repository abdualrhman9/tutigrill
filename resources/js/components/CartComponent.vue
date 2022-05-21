<template>
    <div class="cart">  
        
        <i class="fa fa-shopping-cart" @click="expand = !expand"></i> 
        <span>{{ products.length }}</span>
        <div class="cart-content" v-if="expand">
            
            <div class="products">
                <div v-for="(meal) in products" :key="meal.id" class="product" :data-id="meal.id">
                    <img src="/asset/img/logo.jpg" alt="meal">                    
                    <div class="product-info">
                        <p> {{meal.title}} </p>
                        <small>$ {{ Math.abs(meal.price ).toFixed(2)  }}</small>
                    </div>
                    <input type="number" value="1" class="count" @change="updateQuantity(meal.id,$event)" min="1">
                    <button class="btn btn-danger" @click="removeProduct(meal.id)"> <i class="fa fa-trash"></i> </button>
                </div>
                <p v-if="products.length == 0"> No Items Selected </p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <button 
                        class="btn btn-primary" 
                            
                    >Purchse</button>
                    <router-link 
                        class="btn btn-primary"
                        v-if="products.length != 0" 
                        :to="'/purchse'"
                    ></router-link>
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
export default {
    
    mounted: function(){
        this.products = JSON.parse(sessionStorage.getItem('cart') ?? '[]');
        this.$bus.$on('modalDismissed',(data)=>{
            this.alert = false;
        });
        this.$bus.$on('addNewItem',(data) => {
            let isExist = false;
            let index = this.products.findIndex((item)=>{
                return item.id == data.id
            });
            isExist = index != -1;
            if(!isExist) {
                this.products.push(data);
                this.$bus.$emit('newItemAdded',data);
            }
            else
                this.alert = true;
        });
    },
    
    name: 'CartComponent',
    components: { ModuleComponent },
    data: function() {
        return {
            products: [],
            total: 0,
            alert: false,
            expand: false,
        }
    },
    methods: {
        updateQuantity: function(id,event) {
            let targetValue = parseInt(event.target.value);
            
            if(targetValue <= 0) {
                targetValue = 1;
                event.target.value = 1;
            }

            this.products.forEach((product)=>{
                if(product.id === id && targetValue > 0){
                    product.quantity = targetValue;
                }else {
                    return
                }
            });
            this.updateTotal();
        },
        updateTotal: function(){
            this.total = 0;
            this.products.forEach((product)=>{
                this.total += product.price * product.quantity
            });
            this.total = Math.abs(this.total).toFixed(2);
        },
        removeProduct: function(id){
            let i = this.products.findIndex((product)=>product.id == id);
            this.products.splice(i,1)
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