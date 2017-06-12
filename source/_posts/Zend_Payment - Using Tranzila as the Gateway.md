---
title: "Zend_Payment - Using Tranzila as the Gateway"
date: 2009-04-28 12:21:29
---

<p style="text-align: left;">Zend_Payment</p>
<div style="direction: ltr;text-align: left;">

Zend_Payment Is a component that will offer a unified API for various payment providers.
The payment component will allow you to easily process transactions without having to worry about all the backend details of connecting and setting up various options.

Zend_Payment - Using Tranzila as the Gateway

Below is a brief Description, Information and Usage examples for using the Zend_Payment with Tranzila as the Gateway processor.

In order to use the Zend_Payment component you can either use it's static factory method and specifying which gateway to load as it's first argument, Or initiate it directly by calling the appropriate Gateway class.

```
# Using factory method to load the tranzila gateway
# You can also specify an array with key => value pairs that will be added to the _options array if the gateway
# Requires certain options to be set such such as api_user/pass, email address etc..

$gateway = Zend_Payment::factory('tranzila', $options);

# calling the class directly
$gateway = new Zend_Payment_Gateway_Tranzila($options);

# Setting options for the tranzila gateway since it requires a supplier key set
$gateway = Zend_Payment::factory('tranzila', array( 'supplier' => 'supplier key' ));

# You can also use an instance of a zend_config as the second argument and the component will do the rest IE:
$config = new Zend_Config(array( 'supplier' => 'supplier key' ));
$gateway = Zend_Payment::factory('tranzila', $config);
```

Most gateways requires certain options set before being able to use the gateway, So reading documentation is encourged.

Charging a credit card using the 'doCharge':

Before you could actually charge something you will need to set the fields to pass to the gateway
Fields like credit card number, credit card name holder, amount, email addresses and other things that are on a gateway basis.
In order to do that there are several ways to do that quickly and easily:

```
# Using the setField method:
$gateway->setField('ccnum', '1234567890');
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
# Reaching here it will parse all fields in an NVP (name value pair) string and query the required URL.
$response = $gateway->doCharge();
```

You can make sure the payment went trough by using the 'isSuccess' &amp; 'isFailed' methods respectivly.

```
# Or $gateway->isFailed()
if( $gateway->isSuccess() )
{
echo "Done!";
}
else
{
echo $this->_error_string;
echo $this->_errorcode
}

print_r($response);

outputs
/*
array(20) {
["Response"]=>
string(3) "033"
["fname"]=>
string(3) "àôé"
["expmonth"]=>
string(2) "02"
["contact"]=>
string(11) "àôé áåøåëåá"
["description"]=>
string(37) "RentCenter - çéåá òáåø îåöøéí ùäåæîðå"
["orderid"]=>
string(4) "3438"
["email"]=>
string(0) ""
["ccno"]=>
string(12) "234234234234"
["expyear"]=>
string(2) "09"
["npay"]=>
string(1) "1"
["supplier"]=>
string(3) "123"
["lname"]=>
string(7) "áåøåëåá"
["IMaam"]=>
string(5) "0.155"
["CVVstatus"]=>
string(1) "0"
["company"]=>
string(11) "àôé áåøåëåá"
["sum"]=>
string(1) "1"
["ConfirmationCode"]=>
string(7) "0000000"
["index"]=>
string(4) "3178"
["Tempref"]=>
string(8) "74550001"
["Responsesource"]=>
string(1) "0"
}

*/
```

In this gateway case the response went trough when the 'Response' element is 000 any other value means an error.
You can print the error using:

```
echo $gateway->_error_string;
# Printing the code
echo $gateway->error_code;
```

This gateway has only two options either charge someone or charge-back the former was explained above, In order to do the later
All you have to do is use the same methods/options/fields as above AND adding another 3:

'tranmode' -&gt; this field must be added to the gateway fields stack by using on of the methods above to add a field and assign it to a capital 'C' letter.
That way the gateway knows it's a charge-back and not a charge. Also the credit card number must be specified as well, and the 'Tempref' value returned in the response above.
So it will be a good ideas saving it for later use.

That's a bout it with this gateway. Others probably have more things and methods to choose and use from.
</div>
