<template>
    <div style="margin-top: 200px" class="container">
      <h2>Purchse</h2>
      <StripeCheckout 
        ref="checkoutRef"
        :pk="'pk_test_m6F3plFNeLquMEYTZkpvBlBP00pHDCPGOj'" 
        :mode="'payment'"
        :sessionId="sessionId"
      />

      <small>total: {{ getTotal }}</small>
      <button @click.prevent="submit" class="btn btn-primary"> Order </button>
    </div>
</template>

<script>
import { StripeCheckout } from '@vue-stripe/vue-stripe'
export default {
  mounted(){
    this.getSessionId();
    this.getData();
  },
  name: 'purchse-component',
  components: {StripeCheckout},
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
      let products = JSON.parse(sessionStorage.getItem('cart')?? '[]');
      if(products.length === 0){
        alert('please select items to purchse');
        this.$router.push('/#menu');        
      }
      
      axios.post('getSessionId',{

        line_items: products.map((element) => { 

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
    },
    getData: function(){
      this.data = JSON.parse(sessionStorage.getItem('cart')??'[]');
    },
    submit () {
      // You will be redirected to Stripe's secure checkout page
      this.$refs.checkoutRef.redirectToCheckout();
    },
  }

}
</script>
