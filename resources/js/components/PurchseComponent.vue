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
          v-for="meal in data" 
          :key="meal.id"
          @product-removed="(meal)=>console.log" 
          @quantity-updated="(meal)=>console.log"
          :meal="meal"
        > </product-component>
      </div>
      <small>total: {{ getTotal }}</small>
      <button @click.prevent="submit" class="btn btn-primary"> Confirm Order </button>
    </div>
</template>

<script>
import { StripeCheckout } from '@vue-stripe/vue-stripe'
import ProductComponent from './ProductComponent.vue';
export default {
  mounted(){
    this.getData();
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
      return total;
    }
  },
  data: function(){
    return {
      sessionId: null,
      sessionUrl: null,
      data: []
    }
  },

  methods: {
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
  .meal{
    /* background-color: #ffff;
    padding: 20px;
    box-shadow: 1px 2px 5px 0px;
    margin: 10px; */
  }
</style>
