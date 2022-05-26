<template>
    <div style="margin-top: 200px">
      <h1>Purchse Here</h1>
      <StripeCheckout 
        ref="checkoutRef"
        :pk="'pk_test_m6F3plFNeLquMEYTZkpvBlBP00pHDCPGOj'",
        :sessionId="getSessionId()" 
      />
      <button @click.prevent="submit"> Order </button>
    </div>
</template>

<script>
import { StripeCheckout } from '@vue-stripe/vue-stripe'
export default {
  name: 'purchse-component',
  components: {StripeCheckout},

  data: function(){
    return {

    }
  },

  methods: {
    getSessionId: function(){
       axios.get('getSessionId')
      .then(data=>console.log(data))
      .catch(err=>console.log(err));
    },
    submit () {
      // You will be redirected to Stripe's secure checkout page
      this.$refs.checkoutRef.redirectToCheckout();
    },
  }

}
</script>
