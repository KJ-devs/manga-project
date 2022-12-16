
// paypal button
paypal.Buttons({
    createOrder: function (data, actions) {
        return actions.order.create({
            intent: 'CAPTURE',
            purchase_units: [{
                description: 'Votre commande',
                amount: {
                    value: totalPrice,
                    currency_code: 'EUR'
                },
                breakdown: {
                    item_total: {
                        value: totalPrice,
                        currency_code: 'EUR'
                    },
                   
                },
                shipping: {
                    options: [
                        {
                            id: "SHIP_123",
                            label: "Livraison gratuite",
                            type: "SHIPPING",
                            selected: true,
                            amount: {
                                value: 0,
                                currency_code: "EUR"
                            }
                        },
                        {
                            id: "SHIP_456",
                            label: "Livraison express",
                            type: "SHIPPING",
                            selected: false,
                            amount: {
                                value: 3,
                                currency_code: "EUR"
                            }
                        },
                        {
                            id: "PICKUP_123",
                            label: "retrait en magasin",
                            type: "PICKUP",
                            selected: false,
                            amount: {
                                value: 3,
                                currency_code: "EUR"
                            }
                        }
                    ]
                },
            }]
        });
    },

    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            alert('Merci de votre Achat ' + details.payer.name.given_name + details.payer.name.surname + '!');
        });
    }
}).render('#paypal-button-container');
