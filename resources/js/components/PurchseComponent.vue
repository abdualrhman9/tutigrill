
<template>
  <div>
    <stripe-checkout
      ref="checkoutRef"
      :pk="'pk_test_m6F3plFNeLquMEYTZkpvBlBP00pHDCPGOj'"
      :session-id="getSessionId()"
    />
    <button @click="submit">Pay now!</button>
  </div>
</template>

<script>
import { StripeCheckout } from '@vue-stripe/vue-stripe';
import axios from 'axios';
export default {
  components: {
    StripeCheckout,
  },
  data () {
    this.publishableKey = process.env.STRIPE_PUBLISHABLE_KEY;
    return {
      loading: false,
      lineItems: [
        {
            name: 'Test Name',
            price: 20, // The id of the one-time price you created in your Stripe dashboard
            quantity: 1,
        },
      ],
      successURL: '',
      cancelURL: '',
    };
  },
  methods: {
    getSessionId () {
        axios.get('/getSessionId')
            .then((data)=>console.log(data))
            .catch((err)=>console.log(err));
        
    },
    submit () {
      // You will be redirected to Stripe's secure checkout page
      this.$refs.checkoutRef.redirectToCheckout();
    },
  },
};
</script>
