---
title: "התקנה ושימוש ב XDEBUG"
date: 2009-12-02 11:25:29
categories: 
tags: 
- "debug"
- "debugger"
- "PHP"
- "xdebug"
- "דיבאג"
- "דיבאגר"
---

נכון להיום רוב הבעיות של מתכנתי ה PHP והמערכות אותם הם כותבים היא החוסר בבדיקה שנעשית על גביהם. Xdebug  הינו תוסף ל PHP אשר נוצר על ידי Derick Rethans, אחד מהמהנדסים אשר בעצם כותבים את הליבה של שפת ה PHP. בפוסט הזה נסביר בקצרה כיצד להתקין את ה xdebug על גבי השרת ונציג כמה מהדברים האפשרויות הבסיסיות בתוסף זה.
xdebug מאפשר (בין היתר) בעיקר מעקב אחר קוד ה PHP, פרופילינג (שזה בעצם גילוי של צווארי בקבוק), דיבאגינג.

<!--more-->

בעת כתיבת המדריך הזה כל הדוגמאות שהוצגו נעשו על גבי PHP 5.3 ושרת APACHE 2.2.11

ראשית יהיה עליכם להוריד את הגרסא העדכנית ביותר של xdebug (<a href="http://xdebug.org/download.php" target="_blank">לחצו כאן למעבר לעמוד ההורדה</a>)

בהתאם לגרסאת ה PHP שלכם אתם תצטרכו להוריד את הקובץ המתאים. מאחר ואני משתמש ב 5.3 הורדתי את הגרסא של xdebug 2.0.5 את ה 5.3VC6-32BIT

במידה והינכם משתמשים ב 64BIT יש להוריד את 5.3VC6-64BIT . לכל אלו שעדיין משתמשים ב 5.2 אז יש להוריד את ה 5.2VC6 בהתאם.

*בנוגע ל VCx בסוף, זה בסך הכל אומר באיזה גרסא של visual C הקובץ קומפל.

**ישנם גם שני גרסאות ה NTS והללא, זאת אומרת במידה וה Zend Thread Safe היה פעיל או כבוי בזמן הקומפילציה של התוסף.

*** בגרסאות מתחת ל PHP 5.3 יש לבדוק מה הההגדרה של ה ZTS בשרת שלכם, גרסאות PHP 5.3 ומעלה יש לבחור את האפשרות ללא ה NTS.

לאחר שהורדתם את התוסף יש להוסיף אותו לתיקית ה ext של PHP, לצורך הדוגמא הנתיב ל PHP שלי הוא C:\wamp\bin\php\php5.3.0\ext אז יש לבחור את הנתיב המתאים שלכם ולהוסיף את הקובץ לנתיב זה.

לאחר מכן יש לערוך את קובץ ה PHP.INI בדרך כלל הוא יהיה בתיקיה אחת מעל לתיקיה של ה ext, לצורך הדוגמא הקובץ שלי נמצא ב C:\wamp\bin\apache\Apache2.2.11\bin/php.ini אבל הנתיב יכול להשתנות בהתאם להתקנה שלכם.

לערך שפתחתם את הקובץ גללו עד לסוף הקובץ והוסיפו את השורות הבאות:

גרסאות מתחת ל 5.3

```
[xdebug]
zend_extension_ts="<FILE_NAME>"
xdebug.remote_enable=true
xdebug.remote_host=127.0.0.1
xdebug.remote_port=9000
xdebug.remote_handler=dbgp
xdebug.profiler_enable=0
xdebug.profiler_output_name = cachegrind.out.%t.%p
xdebug.profiler_output_dir="C:\tmp"
```

גרסאות 5.3 ומעלה

```
[xdebug]
zend_extension="<FILE_NAME>"
xdebug.remote_enable=true
xdebug.remote_host=127.0.0.1
xdebug.remote_port=9000
xdebug.remote_handler=dbgp
xdebug.profiler_enable=0
xdebug.profiler_output_name = cachegrind.out.%t.%p
xdebug.profiler_output_dir="C:\tmp"
```

ההגדרות למעלה הם הגדרות שאני אישית עובד אתם, ניתן לערוך אותם בהתאם לצרכים האישיים שלכם, לרשימת הגדרות מלאה ניתן לבקר בעמוד הבא: <a href="http://xdebug.org/docs/all_settings" target="_blank">לחץ כאן</a>

בנוסף יש להחליף את הערך של &lt;FILE_NAME&gt; בשם המלא של הקובץ שהורדם כולל הנתיב והסיומת.

לאחר כדי לבדוק אם התוסף הותקן בהצלחה יש לפתוח קובץ PHP חדש ולהזין לתוכו את הקוד הבא:

```
<?php
phpinfo();
```

יש לחפש אחר התמונה הבאה כפי שהיא מוצגת:
<p style="text-align: center;"><a href="http://www.vadimg.com/wp-content/uploads/2009/12/phpinfo.jpg"><img class="aligncenter size-full wp-image-496" style="border: 0pt none;" title="phpinfo" src="http://www.vadimg.com/wp-content/uploads/2009/12/phpinfo.jpg" alt="phpinfo" width="606" height="83" /></a></p>

יש לשים לב לשורה האחרונה במידה והיא קיימת הכל הותקן ואמור לעבוד.

עכשיו בכל פעם שתוצג שגיאה של PHP כלשהי ה XDEBUG יכנס לפעולה ויציג שגיאה בפורמט הזה:
<p style="text-align: center;"><a href="http://www.vadimg.com/wp-content/uploads/2009/12/Untitled.jpg"><img class="aligncenter size-full wp-image-497" style="border: 0pt none;" title="Untitled" src="http://www.vadimg.com/wp-content/uploads/2009/12/Untitled.jpg" alt="Untitled" width="737" height="147" /></a></p>

ככה תקבלו יותר מידע לגבי השגיאה ואיך לטפל בה. כמובן זה רק חלק מאחד ממה שאפשר לעשות עם ה xdebug.

כמו כן ניתן להגדיר אותו לעבוד מול שרת ישירות על ידי שינוי הערכים המוגדרים למעלה.
