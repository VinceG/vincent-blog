---
title: "שימוש ב MICROPAY לשליחת SMS"
date: 2009-06-21 11:08:02
categories: 
- "PHP"
- "אינטגרציה"
tags: 
- "micropay"
- "MMS"
- "SMS"
- "חיוב הפוך"
- "שליחת הודעות SMS"
---

הרבה שאלות נשאלו בעבר על שיטות שונות לעבודה עם שליחת SMS ישירות מהאתר. לפני כמה ימים השתמשתי בשירות של <a href="http://micropay.co.il/" target="_blank">http://micropay.co.il/</a> כדי לבצע את הפעולות הללו. במדריך הבא יוצגו שני פונקציות. האחת תשמש בתור הפונקציה לשליחת הודעת SMS למספר פאלפון אחד או למספר לא מוגבל של מספרי פאלפון בבת אחת, והשנייה תשמש בתור פונקציה לבירור היתרה שלכם בחשבון ה micropay שלכם. ישנם עוד כמה אפשרויות ש micropay מאפשרות כמו חיוב הפוך ושגם אותם אפשר להגדיר בצורה דומה (במידה ויהיה ביקוש אני אשמח לכתוב פונקציה לשימוש בחיוב הפוך).
<h4><strong>פונקציה 1 - שליחת הודעת SMS</strong></h4>

```
/**
 * Send SMS function call via micropay API
 *
 * @link http://www.micropay.co.il
 * @see http://www.micropay.co.il
 *
 * @param string $message - the message to send (the limit is 70 chars in hebrew and 126 in english)
 * @param array $numbers - array of numbers to send the message to
 * @return error string on failure, array of return values on success
 */
function sendSms($message="", array $numbers=array())
{

    # If we don't have a message return the error
    if(!$message)
    {
        return "אנא ציין הודעה";
    }

    # No numbers
    if(count($numbers) <= 0)
    {
        return "אנא ציין מספרים לשליחה";
    }

    # Complie the URL
    $host = 'micropay.co.il';
    $path = '/ExtApi/ScheduleSms.php';
    $formdata['uid'] = 'XXX'; // the UID number provided by micropay
    $formdata['un'] = 'YYY'; // the UN number provided by micropay, this is your username
    $formdata['charset'] = 'utf-8';
    $formdata['post'] = 2;
    $formdata['from'] = 'ZZZZZ'; # Phone number that the SMS will be sent from, By micropay TOS you must put a valid phone number to allow
    # The clients to get back to you if they need to.
    # Message
    $formdata['msg'] = $message;

    # Make list
    $formdata['list'] = implode(',', preg_replace('/[^0-9]/', '', $numbers));

    $poststring = '';
    // formatting the request string
    foreach($formdata AS $key => $val)
    {
        $poststring .= $key . "=" . $val . "&";
    }
    // strip off trailing ampersand
    $poststring = substr($poststring, 0, -1);

    // init curl connection
    $CR = curl_init();
    curl_setopt($CR, CURLOPT_URL, "http://".$host.$path);
    curl_setopt($CR, CURLOPT_POST, 1);
    curl_setopt($CR, CURLOPT_FAILONERROR, true);
    curl_setopt($CR, CURLOPT_POSTFIELDS, $poststring);
    curl_setopt($CR, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($CR, CURLOPT_SSL_VERIFYPEER, 0);
    // actual curl execution perfom
    $result = curl_exec( $CR );
    $error = curl_error( $CR );
    // on error - exit with error message
    if( !empty( $error ))
    {
        return $error;
    }
    curl_close( $CR );
    // re-format the string into array

    $answer = array();
    $answer['query'] = $poststring;
    $response = explode('&', $result);
    foreach($response as $key=>$value)
    {
        unset($tmparr);
        $tmparr=explode("=",$value);
        $answer[$tmparr[0]]=$tmparr[1];
    }

    # Return
    return $answer;
}
```

השימוש בה הוא פשוט:

```
# Send a message
$message = "some message to send";
$numbers = array('050123456789', '05291837462');
sendSms($message, $numbers);
```


<h4><strong>פונקציה 2 - קבלת המאזן שלכם בחשבון של MicroPay</strong></h4>
<h4></h4>

```
/**
 * Get SMS credit from you micropay account
 *
 * @link http://www.micropay.co.il
 * @see http://www.micropay.co.il
 *
 * @return int - the amount left on your account
 */
function getSmsCredit()
{

    $host = 'micropay.co.il';
    $path = '/ExtApi/ScheduleSms.php?get=1&';
    $formdata['uid'] = 'XXX'; // the UID number provided by micropay
    $formdata['un'] = 'YYY'; // the UN number provided by micropay, this is your username
    $formdata['act'] = 'credit'; // the action which will return the balance in your account

    $poststring = '';
    // formatting the request string
    foreach($formdata AS $key => $val)
    {
        $poststring .= $key . "=" . $val . "&";
    }
    // strip off trailing ampersand
    $poststring = substr($poststring, 0, -1);

    // init curl connection
    $CR = curl_init();
    curl_setopt($CR, CURLOPT_URL, "http://".$host.$path.$poststring);
    curl_setopt($CR, CURLOPT_FAILONERROR, true);
    curl_setopt($CR, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($CR, CURLOPT_SSL_VERIFYPEER, 0);
    // actual curl execution perfom
    $result = curl_exec( $CR );
    $error = curl_error( $CR );
    // on error - exit with error message
    if( !empty( $error ))
    {
        return $error;
    }
    curl_close( $CR );
    // re-format the string into array

    $answer = array();
    $answer['query'] = $poststring;
    $response = explode('&', $result);
    foreach($response as $key=>$value)
    {
        unset($tmparr);
        $tmparr=explode("=",$value);
        $answer[$tmparr[0]]=$tmparr[1];
    }

    return $result;
}
```

השימוש בה:

```
# Get SMS account balance
echo getSmsCredit();
```

ישנם כמה ערכים שצריך יהיה להגדיר בתוך הפונקציות והם מוצגים עם הערות להבנה קלה יותר.

לכל שאלה או בקשה יש לכתוב תגובה לפוסט זה.

ואדים.
