<template>
    <div style="margin-top: 100px">
        <h1>Pay Now</h1>
        
        <stripe-checkout
            ref="checkoutRef"
            mode="payment"
            :pk="'pk_test_m6F3plFNeLquMEYTZkpvBlBP00pHDCPGOj'"
            :lineItems="lineItems"
            :success-url="''"
            :cancel-url="''"
            @loading="v => loading = v"
            />
            <button @click="submit">Pay now!</button>
    </div>
</template>
<script>
import { StripeCheckout } from '@vue-stripe/vue-stripe'
export default {
    name: 'purchse-component',
    components: {
        StripeCheckout
    },
    data: function(){
        return {
            loading: false,
            lineItems: [
                {name: 'p1',price: 20, quantity: 1},
                {name: 'p2',price: 210, quantity: 1},
                {name: 'p3',price: 6, quantity: 1}
            ]
        }
    },
    methods: {
        submit () {
            this.$refs.checkoutRef.redirectToCheckout();
        },
    }
}
</script>
