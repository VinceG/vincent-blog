---
title: "צפייה באתר תחת SSL - להכריח את המשתמש - Apache Mod Rewrite"
date: 2009-09-24 16:05:50
---



<p>לפעמים אתה צריך לוודא שהמשתמש צופה באתר תחת SSL
 ישנה דרך פשוטה לבצע פעולה זו על ידי הכרחת המשתמש לצפות באתר תחת הקידומת HTTPS ולא HTTP בכדי לבצע זאת כל מה שליכם לעשות הוא להוסיף את השורות הבאות לקובץ ה .htaccess בשרת:</p>
<!--more-->
```
RewriteEngine On
RewriteCond %{SERVER_PORT} 80
RewriteRule ^(.*)$ https://www.example.com/$1 [R,L]
```

<p>קובץ ה .htaccess חייב להיות בתיקיה הראשית של האתר</p>

<p>במידה ותרצו להכריח את ה SSL תחת תיקיה מסויימת ניתן לבצע:</p>

```
RewriteEngine On
RewriteCond %{SERVER_PORT} 80
RewriteCond %{REQUEST_URI} somefolder
RewriteRule ^(.*)$ https://www.domain.com/somefolder/$1 [R,L]
```

<p>קובץ ה .htaccess הזה יהיה צריך להיות ממוקם תחת התיקיה בה תרצו להכריח SSL</p>


