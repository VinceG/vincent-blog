---
title: "PHP Design Patterns - השימוש ב Singleton"
date: 2009-02-11 23:57:23
---

PHP 5 הציגו כמה תוספות חדשות ושימושיות לתכנות מונחה עצמים, שנקרא באנגלית מקוצרת OOP (קיצור של Object Oriented Programming). אחד התוספות שנוספו ממשפחת ה Design Patterns הוא ה Singleton Pattern , אני לא יודע בידיוק איך להגדיר את זה בעברית אבל בו נקרא לזה "פריט יחיד" לצורך ההסבר הזה. השימוש בו הוא די פשוט, רצוי שיהיה ידע בסיסי ב PHP וב PHP 5 בפרט (כל ה Access Modifiers - public/protected/private ושימוש בערכים סטטיים). אז החלק הראשון הוא פשוט, דוגמא למה שהיינו עושים עד היום אם רצינו ליצור אובייקט פעמיים:

```
<?php

# Require the Class
require_once('ClassName.php');

# Assign to a new object
$object = new ClassName();

# Assign another object with the same class
$object2 = new ClassName();

```

הקוד הבא (נניח והוא חלק מאפליקציה תקינה) יצור 2 משתנים אשר שווים כל אחד לאותה מחלקה אבל ביחוס שונה. לכן אם משהו ישתנה במשתנה הראשון object$ בשני זה לא ישתנה ולכן לא יוצגו השינויים הרלוונטיים. זאת אומרת שאם הייתה לנו מחלקה כזאת בשם ClassName.php :

```
<?php

class ClassName
{
private $number = 1;
public function Set( $value )
{
$this->number = $value;
}

public function Get()
{
return $this->number;
}
}
```

ואז היינו משתמשים במחלקה בצורה הבאה:

```
<?php

# Require the Class
require_once('ClassName.php');

# Assign to a new object
$object = new ClassName();

# Assign another object with the same class
$object2 = new ClassName();

$object-&gt;Set('12'); // We set the value in the class to 12 now

print $object-&gt;Get(); // will print 12

print $object2-&gt;Get(); // will print 1

```

לפעמים זה באמת מה שתצטרכו לעשות, אז תוכלו פשוט לא להשתמש ב singleton ולהשתמש בדרך הישנה. אבל ברוב המקרים במחלקות כלליות שהשימוש בהם נעשה לאורך כל האפליקציה והשימוש הוא זהה דורש יחוס לאובייקט אחד כללי בלי ליצור אובייקט נוסף בכל פעם שקוראים למחלקה שוב פעם. כמובן שזה צורך עוד משאבים אבל לא עד כדי כך (תלוי בגודלה של המחלקה כמובן). בכל מקרה השימוש ב singleton הוא פשוט כל מה שצריך לעשות זה ליצור מחלקה בשם singleton.php עם התוכן הבא:

```
<?php
/**
* Singleton Class
*
*/
class Singleton
{
/**
* Static instance
*
* @var SingletonRegistry
*/
private static $_instance = array(); // array of instance names

/**
* Private constructor
*
*/
private function __construct() {}

/**
* Disallow cloning
*
*/
private function __clone() {}

/**
* Get the single instance
*
* @return Singleton
*/
public static function getInstance($class)
{
if (!array_key_exists($class, self::$_instance))
{
self::$_instance[$class] =& new $class;
}

$instance =& self::$_instance[$class];

return $instance;
}
}
```

כפי שניתן לראות יש כמה כללים שצריך לעקוב אחריהם. דבר ראשון אנחנו מגדירים את הפונקציה "ההתחלתית" (construct__) לפונקציה פרטית וריקה (ככה שלא יוכלו לקרוא לה או לדרוס אותה). פונקציה נוספת היא פונקצית השכפול בעצם (clone__) שהיא הדרך היחידה בעצם ליצור "שכפול" של אובייקט, וזה לא מה שאנחנו רוצים בעזרת ה singleton לכן כדי למנוע טעות אנוש של משהו מנסה לשכפל אובייקט אנחנו יוצרים אותה, קובעים אותה לפרטית ומשאירים אותה ריקה. (לצורך ההבהרה ב PHP ישנם פונקציות שנקראות Magic Methods הם בדרך כלל מתחילות קו תחתון כפול : __ תוכלו לקרוא לגביהם באתר הרשמי של PHP).

בחזרה למחלקה שלנו, ישנו ערך פרטי וסטטי בשם instance_$ שבעצם משמש בתור מערך ששומר את כל האובייקטים שכבר קראנו להם, ונעזר בו בהמשך.

הפונקציה getinstance היא בעצם מה שאנחנו נשתמש בו, כל מה שאנחנו צריכים לעשות זה להעביר בתור פרמטר ראשון ויחיד את שם המחלקה (כמובן שהפונקציה לא תקרא לה, היא לא תבצע require או include את זה עליכם לעשות לבד או בעזרת פקודת require או include או לחלופין בעזרת שימוש בפונקצית autoload__). במידה וקראנו לפונקציה getinstance עם הפרמטר 'ClassName' הפונקציה תבדוק אם הפרמטר הזה קיים במערך instance_$ במידה וכן היא תחזיר את האזכור של אותו אובייקט מהמערך בפעם הראשונה שהוא נקרא. פונקציה לא יכולה להקרא פעמיים לכן במידה והוא לא קיים במערך הפונקציה יוצרת את האובייקט ומחזירה אזכור שלו כדי שנוכל להשתמש אחר כך (נשמע קצת מסובך אבל אני מקווה עם הדוגמא הבאה זה יהיה יותר ברור).

אנחנו נקח לצורך הדוגמא את המחלקה שלנו מלמעלה ClassName.php ואת המחלקה singleton.php ואז נצור קובץ ונכניס לתוכו את התוכן הבא:

```
<?php

# First we will need to include the singleton class
require_once('singleton.php');

# As said before it's either using a manual require/include
# Or using the __autoload function , In this case we will use
# Manual require
require_once('ClassName.php');

# We are loading a new object using the singleton class
$object = Singleton::getInstance('ClassName');

# Assign another object with the same class
$object2 = Singleton::getInstance('ClassName');

# Now we set the value to 12 using the first object
$object->Set('12');

# Print values
print $object->Get(); // will print 12

print $object2->Get(); // will print 12

```

כפי שניתן לראות בדוגמא, ובהערות שבה, השימוש הוא די פשוט. ומה שבעצם קורא זה שאתם תמיד תצרו אובייקט חדש שבעצם משמש בתור "יחוס" לאותו האובייקט שכבר נקרא קודם לכן במידה והוא קיים.

במידה וזה לא ברור מיד, נסו לקרוא את זה עוד פעם או פעמיים, וכמובן לנסות בעצמכם.
