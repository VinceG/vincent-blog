---
title: "Zend_Payment - Using Paypal as the Gateway"
date: 2009-04-28 14:03:40
categories: 
- "frameworks"
- "PHP"
- "Zend Framework"
tags: 
- "Component"
- "frame"
- "framework"
- "payment"
- "Paypal"
- "Paypal IPN"
- "Paypal PDT"
- "zend framework"
- "Zend_Payment"
- "Zend_Payment_Gateway_Paypal"
---

<div style='direction: ltr; text-align:left;'>

Zend_Payment

Zend_Payment Is a component that will offer a unified API for various payment providers.
The payment component will allow you to easily process transactions without having to worry about all the back end details of connecting and setting up various options.

Zend_Payment - Using Paypal as the Gateway

Below is a brief Description, Information and Usage examples for using the Zend_Payment with Paypal as the Gateway processor.

In order to use the Zend_Payment component you can either use it's static factory method and specifying which gateway to load as it's first argument, Or initiate it directly by calling the appropriate Gateway class.

```
# Using factory method to load the Paypal gateway
# You can also specify an array with key => value pairs that will be added to the _options array if the gateway
# Requires certain options to be set such such as api_user/pass, email address etc..

$gateway = Zend_Payment::factory('paypal', $options);

# calling the class directly
$gateway = new Zend_Payment_Gateway_Paypal($options);

# Setting options for the Paypal gateway since it requires the merchant email address and password (more options are also required such as currency and language)
$gateway = Zend_Payment::factory('paypal', array( 'api_username' => 'test@gmail.com', 'api_password' => 'md5 hash', 'api_signature' => 'signature' ));

# You can also use an instance of a zend_config as the second argument and the component will do the rest IE:
$config = new Zend_Config(array( 'api_username' => 'test@gmail.com', 'api_password' => 'md5 hash', 'api_signature' => 'signature' ));
$gateway = Zend_Payment::factory('paypal', $config);
```

Most gateways requires certain options set before being able to use the gateway, So reading documentation is encouraged.

Charging using manual charge ( Redirects to the Paypal website ):

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
# All we have to do now is to build the URL and redirect (optionally you can specify to return the formatted URL to store into an html tag and produce a button or a form action)

$gateway->setField('return' => 'http://devserver.com/return.php')->setField('item_name' => 'just testing');
$returned = $payment->buildButton(Zend_Payment_Gateway_Paypal::CMD_BUYNOW, 'billing@godaddy.com', 12.77);

print $returned;
/*
https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=billing@godaddy.com&amount=1&PAYMENTACTION=Sale&CURRENCYCODE=USD
*/

NOTE: in order for this to work you will need to pass a Boolean value True for the PDT key when calling the factory method
```

If you pass in a Boolean True value as the last parameter it will auto redirect to that URL

```
# Auto redirect to the URL returned
$gateway->setField('return' => 'http://devserver.com/return.php')->setField('item_name' => 'just testing');
$returned = $payment->buildButton(Zend_Payment_Gateway_Paypal::CMD_BUYNOW, 'billing@godaddy.com', 12.77, true);

echo "will not be executed";
```

* NOTE: any additional parameters can be set. You will need to refer to the documentation for available parameters to set for this action
The PDF link is included in the method description and will be also included in the docs.


```
# Auto redirect to the URL returned

# Change currency to EUR
$gateway->CURRENCYCODE = 'EUR';

$gateway->setField('return' => 'http://devserver.com/return.php')->setField('item_name' => 'just testing');
$returned = $payment->buildButton(Zend_Payment_Gateway_Paypal::CMD_BUYNOW, 'billing@godaddy.com', 12.77, true);

echo "will not be executed";
```

Calling the PDT


```
# Must pass a valid transaction ID and an optional second parameter which the account identity token
# If it wasn't set already when initializing the class

$gateway->getTransactionDetailsPDT($transactionid, $identitytoken=null);

```

At any time with any method used you can switch from sandbox to paypal live URL using one of the following:


```
# During initialize
$config = new Zend_Config(array( 'api_username' => 'test@gmail.com', 'api_password' => 'md5 hash', 'api_signature' => 'signature', 'debug' => true ));
$gateway = Zend_Payment::factory('paypal', $config);


# Anytime before any method call
$gateway->setConfig('debug', false);
```


For better and quicker usage there is the automated payments interface.
Charging using auto charge ( Instant charge/response ):

```
# DoDirectPayment

$payment = Zend_Payment::factory('paypal', $config);
$creditcard = $payment->creditCardInfo('Visa', '4570988239924515', 04, 2019, null, 'vadim', '', 'gavrilov');

$billingaddress = $payment->billingInfo('Milliken Ave.', 'Los-Angeles', 'US', 'CA', 91730);
$amount = 1;
print_r($creditcard);
print_r($billingaddress);

$response = $payment->doDirectPayment( $creditcard, $billingaddress, $amount, array('cmd' => Zend_Payment_Gateway_Paypal::CMD_NOTIFY , 'notify_url' => 'http://devserver.com/workit.php') );

print_r($response);

```


```
# Obtain information about an Express Checkout transaction.

$return = $gateway->getExpressCheckout($token);

```

```
# Completes an Express Checkout transaction.

$return = $gateway->doExpressCheckout($_token, $_payerid, $_amount);

```

```
# Initiates the creation of a billing agreement.

$return = $gateway->setCustomerBillingAgreement($returnURL, $cancelURL, $amount, $billDesc, $paymentType='Any', $autoContinueOnSuccess=false);

# Example:

$cancelurl = 'http://devserver.com/bad.php';
$returnurl = 'http://devserver.com/done.php';
$set = $payment->setCustomerBillingAgreement( $returnurl, $cancelurl, $amount, 'dest' );

if($payment->isSuccess())
{
    $payment->continueBillingAgreement($set['TOKEN']);
}

```

```
# Process a credit card payment.

$return = $gateway->doDirectPayment($creditInfo=array(), $billingInfo=array(), $amount);

```

```
# Process a payment from a buyer’s account, which is identified by a previous transaction.

$return = $gateway->doReferenceTransaction($ReferenceId, $creditInfo=array(), $billingInfo=array(), $amount);

```

```
# Accept or deny a pending transaction held by Fraud Management Filters.

$return = $gateway->managePendingTransactionStatus($transactionID, $actionType='Accept');

```

```
# Capture an authorized payment.

$return = $gateway->doCapture($authorizationID, $amount, $captureType='Complete');

```

```
# Create a recurring payments profile.

$return = $gateway->createRecurringPayment($token, $creditInfo=array(), $billingInfo=array(), $startDate, $billPeriod, $billFreq, $amount, $desc);

# Example:

$creditcard = $payment->creditCardInfo('Visa', '4570988239924515', 04, 2019, null, 'vadim', '', 'gavrilov');

$billingaddress = $payment->billingInfo('Milliken Ave.', 'Los-Angeles', 'US', 'CA', 91730);

$startDateStr = '04/29/2009';
$start_time = strtotime($startDateStr);
$iso_start = date('Y-m-dT00:00:00Z',  $start_time);
$response = $payment->createRecurringPayment( $_GET['token'], $creditcard, $billingaddress, $iso_start, 'Month', 1, $amount, 'dest' );


```

```
# Update a recurring payments profile.

$return = $gateway->updateRecurringPayment($profileID, $creditInfo=array(), $billingInfo=array(), $startDate, $billPeriod, $billFreq, $amount, $desc);

```

```
# Make a payment to one or more PayPal account holders.

$return = $gateway->massPay($_receivers=array());

# Example:

$getters = array( 'vadimg88@gmail.com', 'test@gmail.com', '1232@gssgg.com'  );
$recivers = array();
foreach($getters as $get)
{
    $data = array(

    'email' => $get,
    'amount' => $amount,
    'note' => 'test',

    );

    $recivers[] = $data;
}

print_r($recivers);

$res = $payment->massPay($recivers);


print_r($res);

```

```
# Updates the PayPal Review page with shipping options, insurance, and tax information.

$return = $gateway->callBack();

```

```
# Bill the buyer for the outstanding balance associated with a recurring payments profile.

$return = $gateway->billOutstandingAmount($profileID);

```

```
# Confirms whether a postal address and postal code match those of the specified PayPal account holder.

$return = $gateway->addressVerify($emailAddress, $streetAddress, $zipCode);

```

```
# Obtain information about a recurring payments profile.

$return = $gateway->getRecurringPaymentDetails($profileId);

```

```
# DoReauthorization API Call

$return = $gateway->doReauthorization($authorizationID, $amount);

```

```
# Void an order or an authorization.

$return = $gateway->doVoid($authorizationID);

```

```
# Obtain the available balance for a PayPal account.

$return = $gateway->getBalance($token);

```

```
# Issue a refund to the PayPal account holder associated with a transaction.

$return = $gateway->refundTransaction($authorizationID, $type='Full', $amount=null);

```

```
# Search transaction history for transactions that meet the specified criteria.

$return = $gateway->transactionSearch($_startdate);

# Example:

$startDateStr = '04/27/2009';
$start_time = strtotime($startDateStr);
$iso_start = date('Y-m-dT00:00:00Z',  $start_time);

$startDateStr2 = '04/27/2009';
$start_time2 = strtotime($startDateStr2);
$iso_start2 = date('Y-m-dT00:00:00Z',  $start_time2);

//$payment->ENDDATE = $iso_start2;
$auth = $payment->transactionSearch($iso_start);

if($payment->isSuccess())
{
    # Do we have results
    if( $payment->hasSearchResults() )
    {
        print "Total results: ". $payment->totalSearchResults();
        foreach($payment->getSearchResults() as $key => $value)
        {
            print $value['name'].'<br />';
        }
    }
}

print_r($auth);

```

```
# Authorize a payment.

$return = $gateway->doAuthorization($authorizationID, $amount);

```

```
# Generate a button Paypal website pro url, For donation purposes, buy now buttons

$return = $gateway->buildButton($_cmd, $email, $amount, $autoRedirect=false );

```

```
# Obtain information about a specific transaction.

$return = $gateway->getTransactionDetails($authorizationID);

```


You can make sure the payment went trough by using the 'isSuccess' & 'isFailed' methods respectively at any time.

```
# Or $gateway->isFailed()
if( $gateway->isSuccess() )
{
    echo "Done!";
}
else
{
    # You can use either one to print the error message
    print_r($payment->getErrorMessages());
}


print_r($response);

# Optional parameter can be inserted to both isSuccess and isFailed that reflects an array returned from the previous call.

if( $gateway->isSuccess($return) )
{
    echo "Done!";
}
else
{
    # You can use either one to print the error message
    print_r($payment->getErrorMessages());
}
```

Most of this was tested already on the sandbox and some of the methods and calls were also tested on a live environment

Feedback and help with this will be very welcome.
</div>
