<template>
    <div style="margin-top: 200px">
      <h1>Purchse</h1>
      <StripeCheckout 
        ref="checkoutRef"
        :pk="'pk_test_m6F3plFNeLquMEYTZkpvBlBP00pHDCPGOj'",
        :sessionId="sessionId" 
      />
      <button @click.prevent="submit"> Order </button>
    </div>
</template>

<script>
import { StripeCheckout } from '@vue-stripe/vue-stripe'
export default {
  mounted(){
    this.getSessionId();
  },
  name: 'purchse-component',
  components: {StripeCheckout},

  data: function(){
    return {
      sessionId: null,
    }
  },

  methods: {
    getSessionId: async function(){
      let sessionId = await axios.get('getSessionId')
      .then(resp=>{
        this.sessionId = resp.data.id
      })
      .catch(err=>console.log(err));

      return sessionId;
    },
    submit () {
      // You will be redirected to Stripe's secure checkout page
      this.$refs.checkoutRef.redirectToCheckout();
    },
  }

}
</script>
