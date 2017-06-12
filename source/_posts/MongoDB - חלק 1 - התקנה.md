---
title: "MongoDB - חלק 1 - התקנה"
date: 2010-10-09 15:17:55
categories: 
- "linux"
- "mongo"
- "mongodb"
- "PHP"
- "כללי"
tags: 
- "install"
- "install mongo"
- "install mongod"
- "install mongodb"
- "mongo"
- "mongod"
- "mongodb"
- "PHP"
- "windows mongo"
- "windows mongodb"
---

אי אפשר שלא לקרוא או לשמוע אודות MongoDB, כיום יותר ויותר מערכות ואפליקציות ממירות את המידע למסדי נתונים אשר לא כוללים בתוכם תרשים (Schema). כמו שאפשר היה להבין זה אומר ש-MongoDB הינו עוד מסד נתונים אשר מבוסס מאובייקטים בתוך מסמך/מסמכים בדומה לכמה אחרים שקיימים כבר ברשת. היופי במסד נתונים מסוג MongoDB הוא שאין צורך בלהגדיר וליצור טבלאות או עמודות אלה פשוט לקרוא להם ובמידה והאם אינם קיימים MongoDB יוצר אותם אוטומטית.

<!--more-->

אנו לא נדבר על סוגי מסדי הנתונים הללו, ולא נשווה ביניהם, במקום אנו נסביר כיצד להתקין, ולהשתמש ב MongoDB בתור מסד הנתונים לאפליקציה הבאה אותה אתם כותבים, או לאפליקציה הנוכחית אם תרצו.

<s>לפני שנתחיל חשוב לציין ש MongoDB עובד רק עם PHP 5.3 נכון לעכשיו (וזה מאחר והמפתחים טוענים שלקמפל אותו ל 5.2 פשוט מסובך מדי, אני מעולם לא קמפלתי קוד ב C לכן אני לא יודע מה זה אומר בידיוק), אז תוודאו שאתם מריצים PHP 5.3 לפני שאתם מנסים לעבוד עם MongoDB.</s>
MongoDB עובד עם גרסאות של PHP 5.2 ו 5.3. לכן בשני הגרסאות ניתן להשתמש במסד נתונים זה.

בחלק הזה ינתן הסבר כיצד להתקין ולהריץ את MongoDB על גבי שלושת מערכות ההפעלה: Windows, Linux, OS X - ובעברית ווינדוס, לינוקס ו OS X (מערכת ההפעלה של Apple).
<h2>התקנת MongoDB על גבי ווינדוס -Windows</h2>
<h3>הורדת הקבצים</h3>
הדרך הקלה ביותר (והמומלצת) להתקין את MongoDB היא על ידי הורדת הקבצים המקומפלים בהתאם למערכת ההפעלה.
<h4>מערכות הפעלה מבוססת 32ביט</h4>
יש <a href="http://www.mongodb.org/display/DOCS/Downloads" target="_blank">להוריד</a> את קובץ ה-ZIP ולחלץ את הקבצים למיקום המתאים. רצוי לבחור מהרשימה של "Production".
<h4>מערכות הפעלה מבוססות64ביט</h4>
יש <a href="http://www.mongodb.org/display/DOCS/Downloads" target="_blank">להוריד</a> את קובץ ה-ZIP ולחלץ את הקבצים למיקום המתאים.

<strong>הערה</strong>: ישנם <a href="http://blog.mongodb.org/post/137788967/32-bit-limitations" target="_blank">הגבלות</a> למערכות אשר מבוססות על 32ביט, לכן 64ביט הינו מומלץ.
<h3>חילוץ הקבצים</h3>
יש לחלץ את הקבצים מקובץ ה-ZIP שירד למיקום הנוח ביותר עבורכם, תוכלו לשנות את שם התיקיה מ-mongo-xxxxxxx ל- mongo בלבד, כדי לפשט את הדברים.
<h3>יצירת תיקית המידע</h3>
כברירת מחדל MongoDB יאחסן את הקבצים בנתיב data/db/ אך הוא אינו יוצר את התיקיה במידה והיא אינה קיימת. לכן כדי לוודא שהתיקיה קיימת במיקום המתאים כל מה שעליכם לעשות הוא להריץ את הפקודות הבאות בשורת הפקודות:

[sourcecode]
C:\> mkdir \data
C:\> mkdir \data\db
```

כמובן ניתן לבצע זאת לא דרך שורת הפקודות אלה ישירות דרך חלון תצוגה במערכת ההפעלה.
<h3>הפעלת והרצת השרת</h3>
הקבצים החשובים להרצה הראושנית הם:

1. mongod.exe - שרת מסד הנתונים

2. mongo.exe - שורת הפקודות לניהול המסד

בכדי להריץ את השרת יש ללחוץ על mongod.exe או להריץ את הפקודה הבאה דרך שורת הפקודות:

[sourcecode]
C:\> cd \my_mongo_dir\bin
C:\my_mongo_dir\bin > mongod
```

ניתן גם להריץ את שרת מסד הנתונים <a href="http://www.mongodb.org/display/DOCS/Windows+Service" target="_blank">כשירות</a> שרץ ברקע, אך נוכל לעשות את זה בשלב מאוחר יותר.

כעת בכדי להריץ את שורת הפקודות לניהול המסד יש ללחוץ על mongo.exe או להריץ את הקובץ משורת הפקודות בדומה לקובץ שהרצנו בקוד למעלה. כברירת מחדל mongo.exe מתחבר לשרת מסד נתונים הרץ על גבי localhost ומשתמש במסד נתונים בשם test, בכדי לראות אפשרויות נוספות יש להריץ את הקובץ mongo עם פרמטר העזרה help-- . בצורה הזו: mongo --help

לאחר מכן תוכלו לבצע שאילתה פשוטה כדי לבדוק שמסד הנתונים אכן עובד.

[sourcecode]
C:\> cd \my_mongo_dir\bin
C:\my_mongo_dir\bin> mongo
> // the mongo shell is a javascript shell connected to the db
> 3+3
6
> db
test
> // the first write will create the db:
> db.foo.insert( { a : 1 } )
> db.foo.find()
{ _id : ..., a : 1 }
```

זה הכל, כעת מסד הנתונים מותקן ועובד והרגע בצעתם שאלתה בעזרת MongoDB.
<h2>התקנת MongoDB על גבי לינוקס - Linux - או מערכות מבוססות Unix אחרות.</h2>
<h3>ניהול חבילות</h3>
משתמשי Ubuntu ו Debian יכולים להתקין את החבילה המתאימה בעזרת apt. קראו <a href="http://www.mongodb.org/display/DOCS/Ubuntu+and+Debian+packages" target="_blank">חבילות Ubuntu ו Debian</a> למידע נוסף.

משתמשי CentOS ו Fedora יכולים להתקין את החבילות מעמוד <a href="http://www.mongodb.org/display/DOCS/CentOS+and+Fedora+Packages" target="_blank">החבילות של CentOS ו Fedora</a>.

קבצים בינאריים ל-32ביט

הערה: <a href="http://blog.mongodb.org/post/137788967/32-bit-limitations" target="_blank">מומלץ להשתמש ב-64ביט.</a>

[sourcecode]
$ curl http://downloads.mongodb.org/linux/mongodb-linux-i686-1.4.4.tgz > mongo.tgz
$ tar xzf mongo.tgz
```

קבצים בינאריים ל-64ביט

[sourcecode]
$ curl http://downloads.mongodb.org/linux/mongodb-linux-x86_64-1.4.4.tgz > mongo.tgz
$ tar xzf mongo.tgz
```
<h3>יצירת תיקית המידע</h3>
כברירת מחדל MongoDB יאחסן את הקבצים בנתיב data/db/ אך הוא אינו יוצר את התיקיה במידה והיא אינה קיימת. לכן כדי לוודא שהתיקיה קיימת במיקום המתאים כל מה שעליכם לעשות הוא להריץ את הפקודות הבאות בשורת הפקודות:

[sourcecode]
$ sudo mkdir -p /data/db/
$ sudo chown `id -u` /data/db
```

ניתן לשנות את המיקום בו המידע מאוחסן על ידי הפעלת השרת עם הפרמטר dbpath--
<h3>הפעלת והרצת השרת</h3>
ראשית, הפעילו את שרת MongoDB בטרמינל נפרד:

[sourcecode]
$ ./mongodb-xxxxxxx/bin/mongod
```

לאחר מכן הפעילו את קובץ ניהול השרת בטרמינל נוסף:

[sourcecode]
$ ./mongodb-xxxxxxx/bin/mongo
> db.foo.save( { a : 1 } )
> db.foo.find()
```

זה הכל.
<h2>התקנת MongoDB על גבי os x.</h2>
<h3>התקנה</h3>
הדרך הקלה והמהירה ביותר להתקנה היא להשתמש בחבילות מוכנות מראש או במנהל חבילות כלשהו:

לאלו שמשתמשים ב- <a href="http://mxcl.github.com/homebrew/">Homebrew</a> כדי להתקין את החבילות יש להריץ:

[sourcecode]
$ brew install mongodb
```

לאלו שמשתמשים ב - <a href="http://www.macports.org/">MacPorts</a> כדי להתקין את החבילות תוכלו להריץ:

[sourcecode]
$ sudo port install mongodb
```

ההתקנה יכולה לקחת קצת זמן.

קבצים בינאריים ל-32ביט

הערה: <a href="http://blog.mongodb.org/post/137788967/32-bit-limitations" target="_blank">מומלץ להשתמש ב-64ביט.</a>

[sourcecode]
$ curl http://downloads.mongodb.org/osx/mongodb-osx-i386-1.4.4.tgz > mongo.tgz
$ tar xzf mongo.tgz
```

קבצים בינאריים ל-64ביט

[sourcecode]
$ curl http://downloads.mongodb.org/osx/mongodb-osx-x86_64-1.4.4.tgz > mongo.tgz
$ tar xzf mongo.tgz
```
<h3>יצירת תיקית המידע</h3>
כברירת מחדל MongoDB יאחסן את הקבצים בנתיב data/db/ אך הוא אינו יוצר את התיקיה במידה והיא אינה קיימת. לכן כדי לוודא שהתיקיה קיימת במיקום המתאים כל מה שעליכם לעשות הוא להריץ את הפקודות הבאות בשורת הפקודות:

[sourcecode]
$ mkdir -p /data/db
```

ניתן לשנות את המיקום בו המידע מאוחסן על ידי הפעלת השרת עם הפרמטר dbpath--
<h3>הפעלת והרצת השרת</h3>
ראשית, הפעילו את שרת MongoDB בטרמינל נפרד:

[sourcecode]
$ ./mongodb-xxxxxxx/bin/mongod
```

לאחר מכן הפעילו את קובץ ניהול השרת בטרמינל נוסף:

[sourcecode]
$ ./mongodb-xxxxxxx/bin/mongo
> db.foo.save( { a : 1 } )
> db.foo.find()
```

זה הכל.
<h2>סיכום</h2>
ניתן גם להתקין בצורה ידנית אך אלו הם הדרכים הקלות והמומלצות להתקנת MongoDB על השרת הביתי/שיתופי/פרטי.
