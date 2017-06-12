---
title: "חיוב באמצעות Paypal, פשוט."
date: 2009-03-30 10:48:17
categories: 
tags: 
- "Paypal"
- "חיוב"
- "טרנזקציה"
---

<p style="text-align: right;">כיום ישנם אתרים רבים אשר מעוניינים לגבות תשלום מסויים דרך האתר אונליין מהמשתמשים שלהם, בין אם זה דרך שליחת SMS זה נפוץ מאוד, חיוב באמצעות כרטיס אשראי או הדרך הנפוצה ביותר, Paypal. רבים לא ממש יודעים כיצד לעבוד עם השיטה הזאת, ובסך הכל מציבים כפתור Donate "תרומה" באתר ובלחיצה המשתמש יועבר לעמוד של ההתחברות ב Paypal שם הוא מזין את פרטי החשבון שלו ומעביר את הסכום שהוא מחליט, לאחר מכן הוא פשוט יוצא מחלון הדפדפן שבו הוא העביר את הסכום וחוזר לחלון של האתר בו הוא היה נמצא קודם לכן. ישנם משתמשים שרוצים להרחיב את האפשרויות שלהם ולדעת מי העביר וכמה, ועל מנת לעשות זאת יהיה צורך בקודם כל סקריפט פנימי שיתקשר עם Paypal אך ישב על השרת המקומי של האתר, ודבר שני איזשהו בסיס נתונים או קובץ שישמור את הנתונים הללו.</p>
<p style="text-align: right;">במקרה הזה אנחנו נציג דוגמא לשימוש עם בסיס נתונים פשוט. אנחנו נשתמש במחלקה מאוד פשוטה וקלה לשימוש אשר נכתב במקור על ידי <a href="http://www.micahcarrick.com/04-19-2005/php-paypal-ipn-integration-class.html" target="_blank">הבחור הזה</a> .</p>
<p style="text-align: right;">בכדי להתחיל הורידו את הקובץ המצורף לפוסט זה או דרך הקישור באתר המצויין למעלה, חלצו את הקבצים והעלו אותם לשרת שלכם במקום שתוכלו לגשת אליהם.</p>
<p style="text-align: right;">נתחיל בזה שתצטרכו דף PHP קיים כבר כדי להוסיף את הקודים הדרושים. נצא מנקודת הנחה שהקובץ שלי ממקום ב http://www.domain.com/checkout.php והוא נראה כך:</p>

```

# Set the Env mode
define('DEV', true);

# Define your email address here for paypal
define('PAYPAL_EMAIL_ADDRESS', 'youremailaddress@here.com');

# Load Paypal class
require_once('paypal.class.php');
$paypal = new paypal_class;

# Assign the url, Basd on the 'DEV' value set above for development or for production
# We use the sandbox for dev and the real IPN url for production
$paypal->paypal_url = DEV ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

# Assign the current script URL
$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

# If no action set , set it to the default process
$_GET['action'] = $_GET['action'] ? $_GET['action'] : 'process';

# What do we want to do?
switch ($_GET['action'])
{

case 'process':

// There should be no output at this point. To process the POST data,
// the submit_paypal_post() function will output all the HTML tags which
// contains a FORM which is submited instantaneously using the BODY onload
// attribute. In other words, don't echo or printf anything when you're
// going to be calling the submit_paypal_post() function.

// This is where you would have your form validation and all that jazz.
// You would take your POST vars and load them into the class like below,
// only using the POST values instead of constant string expressions.

// For example, after ensureing all the POST variables from your custom
// order form are valid, you might have:
//
// $p->add_field('first_name', $_POST['first_name']);
// $p->add_field('last_name', $_POST['last_name']);

$paypal->add_field('business', PAYPAL_EMAIL_ADDRESS);
$paypal->add_field('return', $this_script.'?action=success');
$paypal->add_field('cancel_return', $this_script.'?action=cancel');
$paypal->add_field('notify_url', $this_script.'?action=ipn');
$paypal->add_field('item_name', 'Paypal Test Transaction');
$paypal->add_field('amount', '1.99');

$paypal->submit_paypal_post(); // submit the fields to paypal
if(DEV)
{
$paypal->dump_fields(); // for debugging, output a table of all the fields
}
break;

case 'success': // Order was successful...

// This is where you would probably want to thank the user for their order
// or what have you. The order information at this point is in POST
// variables. However, you don't want to "process" the order until you
// get validation from the IPN. That's where you would have the code to
// email an admin, update the database with payment status, activate a
// membership, etc.

echo "Success
<h3>Thank you for your order.</h3>
";
foreach ($_POST as $key => $value) { echo "$key: $value
"; }
echo "";

// You could also simply re-direct them to another page, or your own
// order status page which presents the user with the status of their
// order based on a database (which can be modified with the IPN code
// below).

break;

case 'cancel': // Order was canceled...

// The order was canceled before being completed.

echo "Canceled
<h3>The order was canceled.</h3>
";
echo "";

break;

case 'ipn': // Paypal is calling page for IPN validation...

// It's important to remember that paypal calling this script. There
// is no output here. This is where you validate the IPN data and if it's
// valid, update your database to signify that the user has payed. If
// you try and use an echo or printf function here it's not going to do you
// a bit of good. This is on the "backend". That is why, by default, the
// class logs all IPN data to a text file.

if ($paypal->validate_ipn()) {

// Payment has been recieved and IPN is verified. This is where you
// update your database to activate or process the order, or setup
// the database with the user's order details, email an administrator,
// etc. You can access a slew of information via the ipn_data() array.

// Check the paypal documentation for specifics on what information
// is available in the IPN POST variables. Basically, all the POST vars
// which paypal sends, which we send back for validation, are now stored
// in the ipn_data() array.

// For this example, we'll just email ourselves ALL the data.
$subject = 'Instant Payment Notification - Recieved Payment';
$to = 'YOUR EMAIL ADDRESS HERE'; // your email
$body = "An instant payment notification was successfully recieved\n";
$body .= "from ".$paypal->ipn_data['payer_email']." on ".date('m/d/Y');
$body .= " at ".date('g:i A')."\n\nDetails:\n";

foreach ($paypal->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
mail($to, $subject, $body);
}
break;
}
```
<p style="text-align: right;">ישנם הערות מאוד נרחבות לכל אורך הסקריפט אפשר להבין טוב מאוד מה כל חלק אמור לעשות ואיך Paypal מגיב לכל העניין. ישנם 4 אפשרויות שניתן לבצע שם. האחד הוא החיוב עצמו והקריאה לעמוד Paypal, שהוא ברירת המחדל במידה ולא הוגדר שום ערך אחר לפעולות בקובץ. השני היא האפשרות בה החיוב בוצע בהצלחה והוא מציג נתונים אשר מוצגים למשתמש שביצע העברה בהצלחה. השלישי הוא האפשרות בה הייתה שגיאה, בין אם זה שהמשתמש לא העביר סכום, לא היית אפשרות להעביר סכום, הוא יצא מהחלון, או ביטל העברה אז האפשרות הזאת נכנסת לפעולה ומה שיודפס שם יוצג למשתמש. האפשרות הרבעית והאחרונה היא במידה ו Paypal מאמת את הנתונים והכל בוצע בהצלחה אז הוא מתקשר עם הקובץ הזה ומריץ את האפשרות של 'ipn' שבמקרה שלנו אנחנו נוכל להוסיף שם את הפרטים של המשתמש למסד, לשלוח לו אימייל וכן הלאה.</p>
<p style="text-align: right;">באפשרות הראשונה בה הוא שולח את כל הפרטים ל Paypal ובעצם מעביר אותו לשם, אין להדפיס שום תוכן, אחרת יווצרו שגיאות שאתם ממש לא רוצים לראות. בסופו של דבר זה תהליך די פשוט, אך חיוני לכל אתר אשר רוצה לגבות תשלום ממשתמשים ובהתאם לתשלום להציג תוכן מסויים, לפתוח חלקים מסויימים באתר וכן הלאה.</p>
<p style="text-align: right;">זה עד כדי כך פשוט.</p>
