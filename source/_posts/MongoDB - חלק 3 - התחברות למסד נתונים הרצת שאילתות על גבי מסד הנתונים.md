---
title: "MongoDB - חלק 3 - התחברות למסד נתונים הרצת שאילתות על גבי מסד הנתונים"
date: 2010-09-28 12:11:51
categories: 
- "linux"
- "mongo"
- "mongodb"
- "PHP"
- "כללי"
tags: 
- "install"
- "install mongo"
- "install mongodb"
- "mongod"
- "mongodb"
- "PHP"
- "windows mongo"
- "windows mongodb"
---

בשלב זה יש לוודא שהחלק הראשון והשני בוצעו כהלכה ושרת ה MongoDB פעיל ורץ, בנוסף לתוסף ה PHP שהותקן ונבדק כפעיל גם הוא. כעת כל מה שנותר לעשות הוא בעצם להתחיל לעבוד עם השרת החדש, ומסד הנתונים החדש.

<!--more-->
<h2>הקדמה</h2>
לאלו שלא מכירים מסדי נתונים המבוססים על אובייקטים, המונחים קצת שונים, לכן בכדי לפשט את הקריאה אנו נציג רשימה של מונחים ואיך הם נקראים בעת השימוש ב MongoDB או במסדי נתונים המבוססים על אובייקטים.
<ul>
	<li>מסד נתונים
<ul>
	<li>ב MYSQL זה נקרא מסד נתונים - Database</li>
	<li>ב MongoDB זה נקרא מסד נתונים - Database</li>
</ul>
</li>
	<li>טבלה
<ul>
	<li>ב MYSQL זה נקרא טבלה - Table</li>
	<li>ב MongoDB זה נקרא אוסף - Collection</li>
</ul>
</li>
	<li>שורה
<ul>
	<li>ב MYSQL  זה נקרא שורה - Row</li>
	<li>ב MongoDB זה נקרא מסמך - Document</li>
</ul>
</li>
</ul>
לאלו שלא הבינו עדיין, שורה הינה מסמך אשר משקף אוסף נתונים, שורות נמצאות בתוך אוסף (Collection) בזמן שאוסף נמצא בתוך מסד נתונים. בדומה ל MYSQL ששורה נמצאת בתוך טבלה וטבלה/טבלאות נמצאות בתוך מסד נתונים.
<h2>יצירת והתחברות למסד נתונים</h2>
<h3>התחברות למסד נתונים</h3>
בכדי להתחבר למסד נתונים בשרת המקומי על הפורט של MongoDB ברירת המחדל 27017 כל מה שצריך לעשות הוא להריץ פקודה כזו:

```
<?php
$connection = new Mongo(); // connects to localhost:27017
?>
```

בכדי להתחבר למסד נתונים בשרת מרוחק על אותו פורט ברירת המחדל ניתן לבצע זאת כך:

‪```‬
<?php
$connection = new Mongo( "example.com" ); // connect to a remote host (default port 27017)
?>
```

בכדי להתחבר למסד נתונים בשרת מרוחק על פורט שונה מברירת המחדל ניתן לעשות זאת כך:

‪```‬
<?php
$connection = new Mongo( "example.com:65432" ); // connect to a remote host at a given port
?>
```

כעת ניתן להשתמש ב connection$ כדי לקבל מסד נתונים.
<h3>קבלה ושימוש במסד נתונים</h3>

‪```‬
<?php
‪$db = $connection->dbname;‬
?>
‪```‬

בכדי להשתמש במסד נתונים כלשהו, אין צורך בליצור אותו קודם. MongoDB מספיק חכם כדי לבדוק אם הוא קיים כבר, במידה ולא אז ליצור אותו באופן מיידי. ניתן ליצור מסדי נתונים חדשים על ידי בחירתם בלבד. יש לשים לב לשגיאות כתיב אם ניסיתם פעם אחת להתחבר למסד נתונים "name" ואז בפעם השנייה בטעות רשמתם "nme" יהיו לכם שני מסדי נתונים שונים. MongoDB לא יכול לתקן שגיאות כתיב, לכן יש לשים לב לנושא הזה.

‪```‬
<?php
$db = $connection->name;
// do some stuff
$db = $connection->nme;
// now connected to a different database!
?>
```

<h2>יצירה ושימוש באוסף (Collection)</h2>
<h3>קבלה ושימוש באוסף</h3>
פקודת קבלת האוסף זהה לפקודת קבלת מסד הנתונים.

‪```‬
<?php
$db = $connection->baz;
$collection = $db->foobar;

// or, more succinctly
$collection = $connection->baz->foobar;
?>
```

גם כאן במידה והאוסף לא קיים באותו מסד נתונים, MongoDB יצור אותו אוטומטית.
<h2>יצירת מסמך (Document)</h2>
ניתן לשמור מערך אסוציאטיבי כנתונים במסמך בתוך אוסף, מסמך אקראי יכול להראות כך:

‪```‬
<?php
$doc = array(
   "name" => "MongoDB",
   "type" => "database",
   "count" => 1,
   "info" => array(
          'key' => 'value',
          'key2' => 'value2',
    ),
   "versions" => array("0.9.7", "0.9.8", "0.9.9")
);
?>
```

בכדי להוסיף מסמך אל אוסף ניתן להשתמש ב <a href="http://www.php.net/manual/en/mongocollection.insert.php">MongoCollection::insert</a>, לדוגמא:

‪```‬
<?php
$m = new Mongo();
$collection = $m->foo->bar;
$collection->insert( $doc );
?>
```

<h2>מציאת מסמכים בעזרת FindOne</h2>
בכדי למצוא מסמך כלשהו (אובייקט) יש להשתמש במתודה <a href="http://www.php.net/manual/en/mongocollection.findone.php" target="_blank">MongoCollection::findOne</a> .

בכדי לבדוק אם המסמך מהחלק למעלה נוסף בהצלחה, אנו יכולים לבצע פעולת ()findOne פשוטה כדי לקבל את המסמך הראשון באוסף. מתודה זו מחזירה אובייקט אחד בלבד, בניגוד למתודה ()find אשר מחזירה אובייקט של MongoCursor שצריך לרוץ עליו. זה שימושי למקרים בהם ישנו רק מסמך אחד באוסף או שהנכם רוצים לקבל מסמך אחד בלבד.

‪```‬
<?php
‪$obj = $collection->findOne();‬
‪var_dump( $obj );‬
?>
‪```‬

זה אמור להדפיס את המערך הבא:

‪```‬
array(5) {
  ["_id"]=>
  object(MongoId)#6 (0) {
  }
  ["name"]
  string(7) "MongoDB"
  ["type"]=>
  string(8) "database"
  ["count"]=>
  int(1)
  ["info"]=>
  array (2) {
    ["key"]=>
    string(5) "value"
    ["key2"]=>
    string(6) "value2"
  }
  ["versions"]
  array(3) {
    [0]=>
    string(5) "0.9.7"
    [1]=>
    string(5) "0.9.8"
    [2]=>
    string(5) "0.9.9"
  }
}
```

שימו לב שהאלמנט id_ נוסף אוטומטית למסמך, MongoDB לא מאפשר להוסיף אלמנטים עם שמות המתחילים ב _ או $, מאחר והוא משתמש בהם לשימוש פנימי.
<h2>הוספת מספר מסמכים בבת אחת</h2>
בכדי להוסיף מספר מסמכים בבת אחת, נוסיף אל אותו האוסף כמה מסמכים אשר מכילים בסך הכל את המערך הבא:

‪```‬
<?php
array( "i" => value );
?>
```

בכדי לקצר תהליכים נשתמש בלולאה כדי להוסיף את המסמכים לאוסף:

‪```‬
<?php
for($i=0; $i<100; $i++) {
    $collection->insert( array( "i" => $i ) );
}
?>
```

שימו לב שאנו יכולים להוסיף מערכים עם שמות מפתחות שונים מאלו שכבר נמצאים שם או אלו שהוספנו קודם לכן, זה רק מעיד ש MongoDB הוא אינו משתמש בתרשים כלשהו.
<h2>ספירת כמות המסמכים באוסף</h2>
כעת שהוספנו 101 מסמכים לאוסף, 100 בעזרת הלולאה ואחד שהוספנו קודם לכן בנפרד. אנו יכולים לבדוק אם הם קיימים בעזרת המתודה ()count.

‪```‬
<?php
echo $collection->count();
?>
```

זה אמור להדפיס 101.

<a href="http://www.php.net/manual/en/mongocollection.count.php">MongoCollection::count</a> יכולים לקבל פרמטרים כדי לסנן נתונים מהתוצאה הסופית, כמו כן ניתן לבצע <a href="http://www.php.net/manual/en/mongocollection.count.php">MongoCollection::count</a> על גבי <a href="http://www.php.net/manual/en/class.mongocursor.php" target="_blank">MongoCursor</a> אשר יקח בחשבון את כל הפילטרים שהוספתם למתודה.
<h2>שימוש בסמן כדי לקבל את כל המסמכים</h2>
בכדי לקבל את כל המסמכים הנמצאים באוסף, אנו נשתמש במתודה <a href="http://www.php.net/manual/en/mongocollection.find.php">MongoCollection::find</a>. המתודה ()find מחזירה אובייקט של <a href="http://www.php.net/manual/en/class.mongocursor.php">MongoCursor</a> אשר ניתן לבצע עליו לולאה כדי לקבל את כל המסמכים שהתאימו לשאילתה שלנו. אז כדי לבצע שאילתה ולקבל את כל המסמכים באוסף:

‪```‬
<?php
$cursor = $collection->find();
foreach ($cursor as $id => $value) {
    echo "$id: ";
    var_dump( $value );
}
?>
```

זה אמור להדפיס את כל 101 המסמכים באוסף, id$ הינו השדה id_ במסמך, וה value$ הינו המסמך עצמו.
<h2>הגדרת קריטריון לשאילתה</h2>
אנו יכולים להגדיר קרטריון ולהעביר אותו למתודה ()find כדי לקבל רק את המסמכים אשר תואמים לאותו קריטריון. לדוגמא אם היינו רוצים לקבל מסמך/מסמכים אשר הערך i שלהם שווה ל 71 אנו נעשה את הפעולה הבאה:

‪```‬
<?php
$query = array( "i" => 71 );
$cursor = $collection->find( $query );

while( $cursor->hasNext() ) {
    var_dump( $cursor->getNext() );
}
?>
```

וזה אמור להדפיס:

‪```‬
array(2) {
  ["_id"]=>
  object(MongoId)#6 (0) {
  }
  ["i"]=>
  int(71)
  ["_ns"]=>
  "testCollection"
}
```

<h2>קבלת סט של מסמכים על פי קריטריון</h2>
אנו יכולים להשתמש בקריטריון בשאילתה בכדי לקבל סט של מסמכים מהאוסף. לדוגמא, כדי לקבל את כל המסמכים אשר הערך i שלהם גדול מ 50 זאת אומרת i &gt; 50 נוכל לבצע זאת כך:

‪```‬
<?php
‪$query = array( "i" => array( '$gt' => 50 ) ); //note the single quotes around '$gt'‬
‪$cursor = $coll->find( $query );‬

‪while( $cursor->hasNext() ) {‬
‪    var_dump( $cursor->getNext() );‬
‪}‬
?>
‪```‬

זה אמור להדפיס את כל המסמכים אשר i גדול מ 50, אנו יכולים גם להגדיר טווח לדוגמא i גדול מ-20 אבל קטן או שווה ל-30:

‪```‬
<?php
$query = array( "i" => array( "\$gt" => 20, "\$lte" => 30 ) );
$cursor = $coll->find( $query );

while( $cursor->hasNext() ) {
    var_dump( $cursor->getNext() );
}
?>
```

לעיתים שוכחים להבריח את התו "$", לכן ניתן לבחור את התו המיוחד שלהם שלא חוזר על עצמו בתוך שמות המפתחות במערך. לדוגמא ":" ולהוסיף את השורה הבאה לקובץ php.ini.

‪```‬
mongo.cmd = ":"
```

 ואז הדוגמא למעלה תראה כך:

‪```‬
<?php
$query = array( "i" => array( ":gt" => 20, ":lte" => 30 ) );
?>
```

כמו כן ניתן לשנות את זה באופן ידני במהלך הקוד בעזרת:

‪```‬
 ini_set("mongo.cmd", ":").
```

או שכמובן ניתן פשוט להשתמש במרכאות בודדות בעת השימוש ב "$".
<h2>יצירת אינדקס</h2>
MongoDB תומך באפשרות של אינדקסים, וניתן להוסיף אותם לאוסף בצורה מאוד פשוטה. בכדי ליצור אינדקס, כל מה שיש לעשות הוא להגדיר את השדה שאותו אנו רוצים לאנדקס, ולהגדיר אם אנו רוצים שהאינדקס יהיה בסדר עולה (1) או יורד (1-). הקוד הבא יוצר אינדקס בסדר עולה על השדה "i":

‪```‬
<?php
$coll->ensureIndex( array( "i" => 1 ) );  // create index on "i"
$coll->ensureIndex( array( "i" => -1, "j" => 1 ) );  // index on "i" descending, "j" ascending
?>
```

<h2>דוגמא מהירה</h2>
דוגמא זו, מתחברת למסד נתונים, מוסיפה אובייקטים, מבצעת שאילתות אחר אובייקטים, רצה על גבי התוצאות, ומתנתקת ממסד הנתונים.

‪```‬
<?php
// connect
$m = new Mongo();

// select a database
$db = $m->comedy;
$collection = $db->cartoons;

// add an element
$obj = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
$collection->insert($obj);

// add another element, with a different "shape"
$obj = array( "title" => "XKCD", "online" => true );
$collection->insert($obj);

// find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $obj) {
    echo $obj["title"] . "\n";
}

// disconnect
$m->close();
?>
```

זה אמור להדפיס:


‪```‬
Calvin and Hobbes
XKCD
```


<h2>סיכום</h2>
זוהי רק הדגמה למה שניתן לבצע עם MongoDB לאחר קבלת הידע הבסיסי רצוי לעיין בדוקומנטציה המלאה של MongoDB כדי לקבל מושג על כל האפשרויות שניתן לבצע על גבי מסד נתונים מסוג זה.

למרות שהוא דורש קצת יותר עבודה בכדי להתחיל לעבוד אתו, ברגע שהתחלתם הוא למעשה מפשט ומזרז את העניינים בצורה משמעותית. לאלו שרוצים לפשט את העניינים אף יותר, ישנו כלי בשם <a href="http://github.com/MongoDB-Rox/phpMoAdmin-MongoDB-Admin-Tool-for-PHP/blob/master/moadmin.php" target="_blank">MoAdmin</a> שבעצם מבצע את אותם הפעולות כמו PHPMYADMIN עבור MySQL. לאלו שלא מכירים את PHPMYADMIN אלו הם כלים לניהול מסד הנתונים דרך הדפדפן, במקום לבצע פעולות מסויימות דרך שורת הפקודות או הקוד אפשר לבצע אותם ישירות דרך הדפדפן.
