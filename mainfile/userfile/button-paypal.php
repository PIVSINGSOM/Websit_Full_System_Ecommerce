

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<div id="paypal-button-container<?php echo $count;?>"></div>

<script>

    // Render the PayPal button

    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

        // Specify the style of the button

        style: {
            label: 'checkout',
            size:  'small',    // small | medium | large | responsive
            shape: 'pill',     // pill | rect
            color: 'gold'      // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AcqtYGB2aZgYHfLWYJHi9smukOo13vxO7gjH3ZnikZ8s33vBR_V2WDWUI_GZ5naReT6oQwBB-kKXRL1u',
            production: '<insert production client id>'
        },

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                    {
                         amount: { total: '<?php echo $total ;?>', currency: 'THB' }
                    }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
               window.alert('ชำระเงินเสร็จเรียบร้อย');
               setTimeout(function(){window.location = 'index.php?pagemenu=dashboard&menu=checkout&id=<?php echo $roworder['OrderID'];?>&total=<?php echo $total; ?>&user=<?php echo $roworder['UserID'];?>';},1);
           });
        }

    }, '#paypal-button-container<?php echo $count;?>');

</script>
