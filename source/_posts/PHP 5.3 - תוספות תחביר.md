---
title: "PHP 5.3 - תוספות תחביר"
date: 2010-10-12 18:28:29
categories: 
- "PHP"
- "php 5.3"
- "חדשות"
- "כללי"
tags: 
- "additions"
- "nowdoc"
- "PHP"
- "php 5.3"
- "php5.3"
- "SYNTAX"
- "syntax additions"
- "xyntax"
---

עם כל השינויים המשמעותיים והתוספות ב PHP 5.3 ישנם כמה תוספות תחביר שמקלות ומאפשרות לכתוב את הקוד בצורה שונה, לפעמים גם יעילה יותר, ולפעמים גם קצרה יותר. סיקור קצר של כמה מתוספות התחביר ש PHP 5.3 מאפשרת, כמו: <em>NOWDOC, Ternary Short Cut '?:', Jump Label</em>, ואת המתודה <em>callStatic__</em>.

<!--more-->
<h2>NOWDOC</h2>
<a href="http://il2.php.net/manual/en/language.types.string.php#language.types.string.syntax.nowdoc" target="_blank">nowdoc</a> דומה ל <a href="http://il2.php.net/manual/en/language.types.string.php#language.types.string.syntax.herdoc" target="_blank">herdoc</a>, אותם כללים תקפים גם ל <a href="http://il2.php.net/manual/en/language.types.string.php#language.types.string.syntax.nowdoc" target="_blank">nowdoc</a>, עם הבדל קטן שאין צורך בלהבריח תווים או משתנים בתוך הבלוק של ה-<a href="http://il2.php.net/manual/en/language.types.string.php#language.types.string.syntax.nowdoc" target="_blank">nowdoc</a> מאחר והוא לא מבצע שום עיבוד של משתנים בתוכו, בניגוד ל <a href="http://il2.php.net/manual/en/language.types.string.php#language.types.string.syntax.herdoc" target="_blank">herdoc</a>. דוגמא ל <a href="http://il2.php.net/manual/en/language.types.string.php#language.types.string.syntax.nowdoc" target="_blank">nowdoc</a>:

```
echo <<<'END_OF_HTML'
$hello this is {$a->test}
END_OF_HTML;
```

בדוגמא למעלה הקוד ידפיס את התוכן הבא:

```
$hello this is {$a->test}
```

ללא המרכאות ( ' ) הוא יהיה בדיוק כמו <a href="http://il2.php.net/manual/en/language.types.string.php#language.types.string.syntax.herdoc" target="_blank">herdoc</a> ולכן יחזיר את הערכים שהוצבו למשתנים בתוך בלוק הקוד.
<h2>Ternary Short Cut</h2>
עד היום היה ניתן לבצע את הפעולה הבאה:

```
$value = $expression ? $trueValue : $falseValue;
```

זה היה מפשט מאוד את כתיבת הקוד במידה והיינו צריכים לכתוב פקודת if בקצרה על שורה אחת בלבד. ב PHP 5.3 נוספה האפשרות לתחביר אף יותר קצר, בניגוד לדוגמא למעלה (שאנו בודקים אם expression$ מחזיר ערך השווה ל true, במידה וכן אז הערך שמגיע אחרי הסימן שאלה יוצב למשתנה value$ במידה והמשתנה expression$ מחזיר ערך השווה ל false מה שמגיע אחרי הנקודותיים יוצב למשתנה value$) אנו יכולים יכולים לכתוב את אותו הקוד בצורה קצרה יותר:

```
$value = $trueValue ?: $falseValue;
```

בעצם אופן הפעולה הוא שבמידה והערך trueValue$ מחזיר ערך השווה ל true זה הערך שיוצב למשתנה value$, במידה ולא מה שמגיע אחרי :? שהוא בעצם המשתנה falseValue$ יוצב למשתנה value$. תוספת קטנה אך שוב, מקצרת לנו את הזמנים ונותנת לנו יותר גמישות בקוד.
<h2>(Jump Label (Go To</h2>
האופרטור <em>goto</em> ניתן לשימוש כדי לעבור (לקפוץ) אל חלק אחר בקוד. אותו מקום אליו אנו נעבור (או נקפוץ) מצויין על ידי תווית (מילה כלשהי) ולאחריו נקודותיים (:). ישנם מגבלות בשימוש עם <em>goto</em>. נקודת היעד צריכה להיות באותה הפונקציה/מתודה באותה המחלקה/קובץ, לא ניתן לקפוץ מקובץ לקובץ או מפונקציה/מתודה אל מחוצה לה, כמו כן לא ניתן לקפוץ אל תוך פונקציה או מתודה. בנוסף לכך אין אפשרות לקפוץ אל תוך לולאה כלשהי או פקודת <em>switch</em>, אך ניתן לקפוץ מחוץ לאלו, שימוש נפוץ ב <em>goto</em> יהיה במקום להשתמש בפקודת <em>;break x</em>, כשה-x הוא ערך הגדול מ-1 מה שגורם ל <em>break</em> לצאת מיותר מלולאה אחת (או יותר מפקודת switch אחת).

דוגמא לשימוש

```
<?php
goto a;
echo 'Foo';

a:
echo 'Bar';
?>
```

הדוגמא למעלה תדפיס Bar.
<h2>callStatic</h2>
זהו אומנם לא אפשרות תחביר אלה חלק מה OOP של PHP, אבל בכל זאת נסקר אותה בקצרה. בעת הקריאה למתודה סטטית שאינה קיימת, בדרך כלל PHP יזרוק שגיאת FATAL ERROR, החל מ PHP 5.3 ניתן גם "לתפוס" קריאה למתודה סטטית ולעבד/לנתח אותה בצורה דינאמית. הפונקציה הזו היא זהה לפונקציה ()call__, אשר ניתן להשתמש בה כדי לבצע פעולה מסויימת בעת הקריאה למתודה סטטית שאינה קיימת במחלקה, מונח זה גם נקרא <a href="http://il2.php.net/__callstatic" target="_blank">overloading</a>.

דוגמא קצת יותר ברורה:

```
<?php
class MethodTest {
public function __call($name, $arguments) {
// Note: value of $name is case sensitive.
echo "Calling object method '$name' "
. implode(', ', $arguments). "\n";
}

/**  As of PHP 5.3.0  */
public static function __callStatic($name, $arguments) {
// Note: value of $name is case sensitive.
echo "Calling static method '$name' "
. implode(', ', $arguments). "\n";
}
}

$obj = new MethodTest;
$obj->runTest('in object context');

MethodTest::runTest('in static context');  // As of PHP 5.3.0
?>
```

הקוד למעלה יחזיר את התוצאה הבאה:

```
Calling object method 'runTest' in object context
Calling static method 'runTest' in static context
```

שוב, לא שיפור כל כך גדול, אבל לפחות כעת אפשר גם לתפוס מקרים בהם מנסים לקרוא למתודה סטטית שאינה קיימת במחלקה.
