---
title: "Zend Server - סביבת פיתוח ועבודה עם PHP בכמה דקות"
date: 2009-02-24 12:04:53
categories: 
- "frameworks"
- "PHP"
- "חדשות"
tags: 
- "zend"
- "zend core"
- "zend framework"
- "zend platform"
- "zend server"
- "סביבת עבודה"
- "פיתוח"
- "שרת"
---

אני מאמין שכל מי שעוסק בפיתוח בשפת PHP מכיר את חברת <a href="http://www.zend.com" target="_blank">Zend</a> אשר בעצם עומדת מאחורי השפה בעצם (שני המנהלים הבכירים שלה הם אלו שהמשיכו את PHP 3 והלאה) מלבד זאת הם גם החברה שמפתחת מגוון מוצרים ומערכות לשימוש כעזר פיתוח בסביבת עבודה עם PHP. במיוחד עכשיו בזמן ש Zend Framework נהיה יותר ויותר פופולארי (ואני חייב להודות אני משתמש עם ZF ואני נדהם מהיכולות כל פעם מחדש, אמנם חסרים כמה דברים שימושיים אבל זה לנושא אחר).

כפי שנאמר ישנם כמה וכמה מוצרים אשר Zend מפתחת אשר מסייעים בשלבי הפיתוח "והפריסה" של המערכות הכתובות ב PHP לשלל לקוחותיהם. חלק מהמוצרים הם Zend Guard, Zend Optimizer ואחרים. לאחרונה Zend הכריזו על מוצר חדש בשם <a href="http://www.zend.com/en/products/server/" target="_blank">Zend Server</a> . הם הציגו אותו בתור:
<blockquote>Zend Server is a complete, enterprise-ready Web Application Server for running and managing PHP applications that require a high level of reliability, performance and security.</blockquote>
שבעברית אומר: "Zend Server הינו שרת ווב מלא ומוכן לשימוש להרצה וניהול של מערכות הכתובות ב PHP, אשר דורשות רמה גבוה של ביצועים, אבטחה ואמינות."

כרגע ישנם 2 גרסאות של Zend Server , האחת היא הגרסא המלאה של המוצר אשר תעלה לפי דעתי לא מעט (כמו כל דבר אחר ב <a href="http://www.zend.com" target="_blank">Zend</a>) והשנייה היא הגרסא החינמית אשר נקראת "Commuinity Edition" או בקיצור CE אשר מציעה רק חלק מהאפשרויות של המערכת וניתן להורידה כבר עכשיו באתר הרשמי.

את האמת אני אישית די התלהבתי בהתחלה, אבל אחרי הורדה מהירה של גרסא ה CE וניסיון אתה, אי אפשר לומר שממש נהנתי, וזה למה:

1. קודם כל לא ניתן לעשות שם כלום מלבד לצפות בכמה מסכי ניהול שונים, הרי זו גרסא חינאמית וכמו כל מוצר של <a href="http://www.zend.com" target="_blank">Zend</a> הם בהחלט מגיבלים באפשרויות כדי שמי שירצה להשתמש בכולם יהיה צריך לרכוש את הגרסא המלאה.

2. אני לא מוצא שום סיבה טובה למה להשתמש בזה על פני שרתי ווב אחרים כמו WAMP, XAMPP ואחרים דומים אשר גם הם מותאמים ל production. שלא לדבר על זה שהם בחינם.

אחד הדברים היותר טובים שקראתי אודות Zend Server היא העבודה שנתן להתקין אותו כשרת IIS עם הגדרות מותאמות אישית, או למי שרוצה להריץ שרת Apache יוכל לעשות זאת גם על ידי בחירת שרת זה בהתקנה של ה Zend Server.

לאלו שמעוניינים לראות אודות ההבדלים בין הגרסא המלאה של Zend Server ל  CE מוזמנים לקרוא <a href="http://www.zend.com/en/products/server/editions" target="_blank">כאן</a>.

קישורים שכדי לקרוא:

<a href="http://andigutmans.blogspot.com/2009/02/zend-server-is-here-almost.html" target="_blank">אנדי גוטמן מציג לראשונה את Zend Server</a>

<a href="http://prematureoptimization.org/blog/archives/96" target="_blank">הבלוג של שחר</a>
