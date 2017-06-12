---
title: "Zend_Payment - Using MoneyBookers as the Gateway"
date: 2009-04-28 13:22:42
categories: 
- "frameworks"
- "PHP"
- "Zend Framework"
tags: 
- "Component"
- "framework"
- "zend"
- "zend framework"
- "Zend_Payment"
- "Zend_Payment_Gateway_MoneyBookers"
---

<p style="text-align: left;">Zend_Payment

<div style="direction: ltr;text-align: left;">

Zend_Payment Is a component that will offer a unified API for various payment providers.
The payment component will allow you to easily process transactions without having to worry about all the backend details of connecting and setting up various options.

Zend_Payment - Using MoneyBookers as the Gateway

Below is a brief Description, Information and Usage examples for using the Zend_Payment with MoneyBookers as the Gateway processor.

In order to use the Zend_Payment component you can either use it's static factory method and specifying which gateway to load as it's first argument, Or initiate it directly by calling the appropriate Gateway class.

```
# Using factory method to load the MoneyBookers gateway
# You can also specify an array with key => value pairs that will be added to the _options array if the gateway
# Requires certain options to be set such such as api_user/pass, email address etc..

$gateway = Zend_Payment::factory('moneybookers', $options);

# calling the class directly
$gateway = new Zend_Payment_Gateway_MoneyBookers($options);

# Setting options for the MoneyBookers gateway since it requires the merchant email address and password (more options are also required such as currency and language)
$gateway = Zend_Payment::factory('moneybookers', array( 'email' => 'test@gmail.com', 'password' => 'md5 hash' ));

# You can also use an instance of a zend_config as the second argument and the component will do the rest IE:
$config = new Zend_Config(array( 'email' => 'test@gmail.com', 'password' => 'md5 hash' ));
$gateway = Zend_Payment::factory('moneybookers', $config);
```

Most gateways requires certain options set before being able to use the gateway, So reading documentation is encourged.

Charging using manual charge ( Redirects to the moneybookers website ):

Before you could actually charge something you will need to set the fields to pass to the gateway
Fields like credit card number, credit card name holder, amount, email addresses and other things that are on a gateway basis.
In order to do that there are several ways to do that quickly and easily:

```
# Using the setField method:
$gateway->setField('ccnum', '1234567890');

# You can chaing them as well
$gateway->setField('ccnum', '1234567890')->setField('ccnum2', '2222')->setField('ccnum3', '333333');
```

```
# Using the setFields method to set multiple fields:
$gateway->setFields(
array(
'ccnum' => '1234567890', // credit card number
'email' => 'test@gmail.com', // email
'amount' => '12.92', // amount
)
);
```

```
# Directly setting using the magic method __set
$gateway->ccnumber = '123456789';
$gateway->amount = '12.92';
```

```
# All we have to do now is to build the url and redirect (optionally you can specify to return the formatted url to store into an HTML tag and produce a button or a form action)
$returned = $gateway->doTransferManual('test@gmail.com', 12.88, 'some title', 'some description');

print $returned;
/*
https://www.moneybookers.com/app/payment.pl?pay_to_email=vadimg88@gmail.com&amount=1&detail1_description=test&detail1_text=123&language=EN&currency=USD&ssss=asdasd&currency=USD&language=EN
*/
```

If you pass in a boolean True value as the last parameter it will auto redirect to that URL

```
# Auto redirect to the URL returned
$returned = $gateway->doTransferManual('test@gmail.com', 12.88, 'some title', 'some description', true);

echo "will not be executed";
```

* NOTE: any additional parameters can be set. You will need to refer to the documentation for available parameters to set for this action
The PDF link is included in the method description and will be also included in the docs.

```
# Auto redirect to the URL returned and display the moneybookers payment page in German
$gateway->language = 'DE';

# Change currency to EUR
$gateway->currency = 'EUR';

# More values can go before calling the method....
$returned = $gateway->doTransferManual('test@gmail.com', 12.88, 'some title', 'some description', true);

echo "will not be executed";
```

For better and quicker usage there is the automated payments interface.
Charging using auto charge ( Instant charge/response ):

```
# The first and second parameters are required and they specify the action to perform and the URL to work on
# the third and forth parameters are not required if the email & password were set during initialize
# Otherwise you will need to specify them here.

# In this case we will 'prepare' a transaction and if it went trough it will return an sid element or an error element respectively.

$response = $payment->doTransferAuto('prepare', Zend_Payment_Gateway_MoneyBookers::LIVE_URI, null, null, 1);
```

```
# Optionally you can set the 6 parameter to Boolean true to auto charge the transaction if it was successful and the 7th parameter with the relevant action
# in our case we can omit the 7th parameter since it's default value is set to 'transfer' and in our case we will need to use that so no need to set the 7th parameter now.

$response = $payment->doTransferAuto('prepare', Zend_Payment_Gateway_MoneyBookers::LIVE_URI, null, null, 1 );

var_dump($response);
/*
array(1) {
["transaction"]=>
array(5) {
["amount"]=>
string(4) "1.20"
["currency"]=>
string(3) "EUR"
["id"]=>
string(6) "497029"
["status"]=>
string(1) "2"
["status_msg"]=>
string(9) "processed"
}
}
*/

```

```
# if the response went trough there will be an sid element in the response object
if($payment->isSuccess($response))
{
echo $response['sid'];
}
else
{
# You can use either one to print the error message
echo $payment->getError();
//echo $response['error']['error_msg'];
}

print_r($response);
```

You can make sure the payment went trough by using the 'isSuccess' &amp; 'isFailed' methods respectively.

```
# Or $gateway->isFailed()
if( $gateway->isSuccess() )
{
echo "Done!";
}
else
{
# You can use either one to print the error message
echo $payment->getError();
//echo $response['error']['error_msg'];
}

print_r($response);
```

Other actions are also available, Performing a custom action

```
# In this example we will perform a repost about a transaction to get it's status

$gateway->setField('trn_id', 'IDHERE')->setField('status_url', 'WHERE TO POST THE STATUS');
$response = $gateway->customAction('repost');

# This action allows merchants to request the details about a transaction received via the Merchant Gateway.

$gateway->setField('trn_id', 'IDHERE');
$response = $gateway->customAction('status_trn');

# Through the 'Account history' action, the merchant may request a list with the details of all transactions performed by them during a given period.

$gateway->setField('start_date', '29-05-2002');
$response = $gateway->customAction('history');

```

Using the Pay-On-Demand

```
$response = $payment->doTransferAuto('prepare', Zend_Payment_Gateway_MoneyBookers::ON_DEMAND, null, null, 1, true, 'request');

var_dump($response);
/*
array(1) {
["transaction"]=>
array(5) {
["amount"]=>
string(4) "1.20"
["currency"]=>
string(3) "EUR"
["id"]=>
string(6) "497029"
["status"]=>
string(1) "2"
["status_msg"]=>
string(9) "processed"
}
}

*/
```

Refund

```
$response = $payment->doTransferAuto('prepare', Zend_Payment_Gateway_MoneyBookers::REFUND, null, null, 1, true, 'refund');

var_dump($response);
/*
array(5) {
["mb_amount"]=>
string(1) "1"
["mb_currency"]=>
string(3) "EUR"
["mb_transaction_id"]=>
string(8) "21221213"
["status"]=>
string(1) "2"
["transaction_id"]=>
string(0) ""
}

*/
```

Basically every single action MoneyBookers offers can be used here. It's a matter of the right parameters set.

</div>
