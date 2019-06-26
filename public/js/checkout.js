var stripe = Stripe('pk_test_7qWsQKkx4vYoNu6jgeyYrtl0');

stripe.createToken(card).then(function(result) {

});