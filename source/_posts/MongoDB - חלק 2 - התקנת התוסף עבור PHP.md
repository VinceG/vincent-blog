---
title: "MongoDB - חלק 2 - התקנת התוסף עבור PHP"
date: 2010-09-28 12:11:00
---

<p style="text-align: right;">לאחר התקנת שרת ה MongoDB על השרת הביתי יש צורך בלהתקין את התוסף עבור PHP כדי להריץ פקודות לשרת בעזרת PHP. בכדי להתקין את התוסף תוכלו להשתמש באחת מהדרכים הבאות בהתאם למערכת ההפעלה בה רץ שרת ה MongoDB.
‪<!--more--></p>

<h2 style="text-align: right;">שימוש ב MongoDB ב-PHP</h2>
<p style="text-align: right;">‪בכדי לגשת אל MongoDB מ-PHP תצרכו שני דברים:‬
‪</p>

<ul style="text-align: right;">‬
	<li>להריץ את שרת ה MongoDB - בכדי לעשות זאת יש להריץ את קובץ ה mongod - יש לשים לב לשם הקובץ זהו קובץ mongod ולא mongo.</li>
	<li>‪תוסף MongoDB עבור PHP מותקן בשרת‬.</li>
</ul>
<h2 style="text-align: right;"><strong>התקנה התוסף עבור מערכות NIX*</strong></h2>
<p style="text-align: right;">‬
‪ניתן להריץ את הפקודה הבאה דרך שורת הפקודות בכדי להתקין את התוסף:‬</p>
<p style="text-align: right;">‪[sourcecode]‬
‪sudo pecl install mongo‬
‪```‬</p>
<p style="text-align: right;">‪לאחר מכן יש להוסיף את השורה באה אל קובץ php.ini :‬</p>
<p style="text-align: right;">‪[sourcecode]‬
‪extension=mongo.so‬
‪```‬</p>
<p style="text-align: right;">‪רצוי להוסיף את השורה למעלה באותו חלק בו נמצאים כל שאר השורות להוספת תוספים אחרים בקובץ. אך זה אמור לעבוד במידה והוספתם את השורה בכל מקום בקובץ.‬</p>
<p style="text-align: right;">‪יש להפעיל מחדש את השרת (Apache, Nginx וכדומה) כדי שהשינויים יכנסו לתוקף.‬</p>
<p style="text-align: right;">‪למידע נוסף אודות התקנות ספציפיות למערכות הפעלה יש לעיין <a href="http://www.php.net/manual/en/mongo.installation.php" target="_blank">בדוקומנטציה</a> באתר הרשמי.‬
‪</p>

<h2 style="text-align: right;">התקנה התוסף עבור מערכות Windows</h2>
<p style="text-align: right;">‬
‪ראשית יש להוריד את הקובץ המתאים בהתאם לסביבת העבודה <a href="http://github.com/mongodb/mongo-php-driver/downloads" target="_blank">מעמוד ההורדות.</a>‬
‪</p>

<ul style="text-align: right;">‬
‪
	<li>VC6 עבור Apache ו VC9 עבור IIS.</li>
‪
	<li>Thread Safe הכוונה היא להרצת PHP כמודול של Apache (שזה בדרך כלל המקרה) Non-Thread Safe היא להרצת PHP כ CGI.</li>
</ul>
<p style="text-align: right;">
‪יש לחלץ את הקבצים מקובץ ה ZIP שהורד, ולהוסיף את הקובץ php_mongo.dll לתיקית התוספים של PHP בשרת המקומי, שבדרך כלל נמצאת בתוך תיקית ההתקנה של PHP בשם "ext" .‬</p>
<p style="text-align: right;">‪לאחר מכן יש להוסיף לקובץ php.ini את השורה הבאה:‬</p>
<p style="text-align: right;">‪[sourcecode]‬
‪extension=php_mongo.dll‬
‪```‬</p>
<p style="text-align: right;">‪יש להפעיל מחדש את השרת (Apache, IIS וכדומה) כדי שהשינויים יכנסו לתוקף.‬</p>
<p style="text-align: right;">‪למידע נוסף יש לקרוא בחלק <a href="http://us3.php.net/manual/en/mongo.installation.php" target="_blank">אודות Windows</a>.‬
‪</p>

<h2 style="text-align: right;">בדיקת האם התוסף הותקן</h2>
<p style="text-align: right;">‬
‪לצורך הבדיקה יש ליצור קובץ PHP חדש ולהוסיף בתוכו את הקוד הבא ולהריצו בדפדפן:‬</p>
<p style="text-align: right;">‪```‬
<‪?php phpinfo(); ?‬>
‪```‬</p>
<p style="text-align: right;">‪זה יציג את ההגדרות והתוספים המותקנים כרגע ב PHP יש לוודא ששרת ה MongoDB הופעל ולחפש אחר "mongo" בתוך חלון הדפדפן שבו הקובץ נטען יש לוודא שהסטטוס הוא "enabled" . בשלב זה במידה והכל נעשה כמו שצריך שרת ה-MongoDB והתוסף ל PHP צריכים להיות מותקנים ופעילים.</p>
