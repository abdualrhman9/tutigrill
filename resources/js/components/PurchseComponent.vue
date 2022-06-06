<template>
    <div style="margin-top: 200px" class="container">
      
      <StripeCheckout 
        ref="checkoutRef"
        :pk="'pk_test_m6F3plFNeLquMEYTZkpvBlBP00pHDCPGOj'" 
        :mode="'payment'"
        :sessionId="sessionId"
      />
      <div class="cart">
        <product-component 
          v-for="(meal,index) in data" 
          :key="meal.id"
          @quantity-updated="quantityUpdated"
          :meal="meal"
        > <hr v-if="index != data.length-1"> </product-component>
      </div>
      <small class="purchse-total">Total: {{ getTotal }}</small>
      <button @click.prevent="submit" class="btn btn-primary"> Checkout </button>
    </div>
</template>

<script>
import { StripeCheckout } from '@vue-stripe/vue-stripe'
import ProductComponent from './ProductComponent.vue';
export default {
  beforeMount() {
    window.addEventListener("beforeunload", this.preventNav)
  },
  beforeDestroy() {
    window.removeEventListener("beforeunload", this.preventNav);
  },
  beforeRouteLeave: function(to, from, next){
    if (this.isEditing) {
      if (!window.confirm("Leave without saving?")) {
        return;
      }
    }
    next();
  },
  mounted(){
    this.getData();
    this.$bus.$on('remove-meal',this.productRemoved);
    this.$bus.$on('quantity-updated',this.quantityUpdated);
    this.getSessionId();
  },
  name: 'purchse-component',
  components: {
    StripeCheckout,
    ProductComponent
  },
  computed: {
    getTotal: function(){
      let total = 0;
      this.data.forEach((meal)=>{
        total += meal.price * meal.quantity
      });
      return Math.abs(total).toFixed(2);
      // return total;
    }
  },
  data: function(){
    return {
      sessionId: null,
      sessionUrl: null,
      data: [],
      isEditing: false,
    }
  },

  methods: {
     preventNav: function(event){ 
        if (!this.isEditing) return
        event.preventDefault()
        // Chrome requires returnValue to be set.
        event.returnValue = ""
    },
    productRemoved: function(meal){
      this.isEditing = true;
      let i = this.data.findIndex((product)=>product.id == meal.id);
      if(i !== -1)
        this.data.splice(i,1)
    },
    quantityUpdated: function(meal){
      this.isEditing = true;
      let i = this.data.findIndex((product)=>product.id == meal.id);
      if(i !== -1){
        this.data[i].quantity = meal.quantity;
      }
      // console.log(meal);
    },
    getSessionId: function(){
      
      if(this.data.length === 0){
        this.$router.push('/#menu');        
      }else {
      
        axios.post('getSessionId',{

          line_items: this.data.map((element) => { 

            return {
              price_data: {
                currency: 'usd',
                unit_amount: parseFloat(element.price * 100),
                product_data: {
                  name: element.name
                }
              },
              quantity: element.quantity,
            }

          }) 
        })
        .then(resp=>{
          this.sessionId = resp.data.id
          this.sessionUrl = resp.data.url
        })
        .catch(err=>console.log(err));
      }
    },
    getData: function(){
      this.data = JSON.parse(sessionStorage.getItem('cart')?? '[]');
    },
    submit () {
      // You will be redirected to Stripe's secure checkout page
      this.$refs.checkoutRef.redirectToCheckout();
    },
  }

}
</script>

<style>
  .wraper {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
  }
  .purchse-total{
    margin-top: 10px;
    display: block;
    font-size: 20px;
    font-weight: bold;
  }
</style>
