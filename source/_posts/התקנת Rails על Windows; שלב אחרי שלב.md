---
title: "התקנת Rails על Windows; שלב אחרי שלב"
date: 2009-02-04 10:57:09
categories:
tags:
- "Rails"
- "RUBY"
- "windows"
- "התקנה"
- "רובי"
---

זהו יותר מדריך מאשר פוסט לבלוג; אבל נקרא לזה פוסט רק לצורך ההבנה. בפוסט זה אני אסביר כיצד להתקין את Ruby, Rails, Ruby Gems, Mysql על שרת Windows 2000  (ווינדוס XP צריך להיות אותו דבר).

<!--more-->כדי לקבל סביבת פיתוח ועבודה מלאה על המחשב שלכם תצטרכו להתקין כמה דברים חיוניים.
<ul>
	<li>Ruby - השפה עצמה.</li>
	<li>Ruby-Gems  - ניהול התוספים של Ruby</li>
	<li>Scite או  FreeRIDE - עורך חינמי לעבודה עם Ruby</li>
	<li>Mysql  - מסד נתונים</li>
	<li>Mysql query builder / Mysql Admin Tools - כלים להרצת שאילתות, ניהול מסדי נתונים וכו</li>
	<li>Rails</li>
</ul>
<h3>1. התקנת Ruby</h3>
הדרך הפשוטה ביותר היא להשיג את הגרסא האחרונה (כרגע 1.8.6 RC2) באתר <a href="http://rubyforge.org/frs/?group_id=167" target="_blank">הזה</a> (להוריד את הגרסא עם הסיומת .exe ). זוהי התקנה רגילה כמו כל תוכנה אחרת פשוט להריץ אותו ולעקוב אחר ההוראות. ברגע שזה יסיים להתקין יש לבצע פעולה אחת אשר תבדוק אם Ruby קיים ברשימת הנתיבים (PATH) במחשב שלכם. בישביל לעשות זאת לחצו על התחל -&gt; הפעלה (Start -&gt; Run) הקישור "cmd" ולאחר מכן הקלידו "path". תוצגה רשימה של נתיבים יש לוודא שהנתיב "c:\ruby\bin" קיים ברשימה (הנתיב יכול להיות שונה אם ההתקנה הותקנה בכונן אחר או תקיה אחרת שזה לא מומלץ).

הקטע היפה בהתקנה היא שזה מגיעה עם Ruby Gems כבר מותקן ועם העורך Scite גם כן. יש לוודא אבל שהגרסא של Ruby היא אכן אחרונה ולעשות זאת על ידי התחל -&gt; הפעלה (Start -&gt; Run) הקישור "cmd" ולאחר מכן הקלידו "ruby -v" זה יציג את הגרסא של Ruby המותקנת.
<h3>2. התקנת Mysql</h3>
זהו שלב קצת יותר קשה, ויכול להשתנות בהתאם למערכת ההפעלה אותה אתם מריצים. לאלו שכבר יש את MYSQL מותקן יכולים להתעלם משלב זה. בכדי להתחיל הורידו את הגרסא העדכנית של MySQL מהאתר <a href="http://dev.mysql.com/downloads/mysql/5.1.html#win32" target="_blank">הבא</a> יש לבחור באפשרות השנייה "Windows ZIP/Setup.EXE (x86)" וללחוץ על הקישור "Download" בצד ימין.

לאחר ההורדה יש להריץ את קובץ ההתקנה ולעקוב אחר הפעולות והתמונות הבאות:

1. בחרו באפשרות "Detailed Configuration" ולחצו על "Next"

<img class="aligncenter size-full wp-image-70" title="p1" src="/assets/2009/02/p1.jpg" alt="p1" width="511" height="385" />
<p style="text-align: center;"></p>
<p style="text-align: right;">2. בחרו באפשרות "Developer Machine" ולאחר מכן Next</p>
<p style="text-align: right;"><img class="aligncenter size-full wp-image-71" title="p2" src="/assets/2009/02/p2.jpg" alt="p2" width="514" height="388" /></p>
<p style="text-align: right;">3. בחרו ב "Multifunctional Database"</p>
<p style="text-align: right;"><img class="aligncenter size-full wp-image-72" title="p3" src="/assets/2009/02/p3.jpg" alt="p3" width="518" height="388" /></p>
<p style="text-align: right;">4. השאירו את המסך הבא כפי שהוא והמשיכו</p>
<p style="text-align: right;"><img class="aligncenter size-full wp-image-73" title="p4" src="/assets/2009/02/p4.jpg" alt="p4" width="518" height="388" /></p>
<p style="text-align: right;">5. בחרו "Decision Support / OLAP"</p>
<p style="text-align: right;"><img class="aligncenter size-full wp-image-74" title="p5" src="/assets/2009/02/p5.jpg" alt="p5" width="515" height="388" /></p>
<p style="text-align: right;">6. סמנו את "Enable TCP/IP Networking" ואת "Strict mode"</p>
<p style="text-align: right;"><img class="aligncenter size-full wp-image-81" title="p61" src="/assets/2009/02/p61.jpg" alt="p61" width="504" height="379" /></p>
<p style="text-align: right;">7. בחרו "Best Support for Multilingualism"</p>
<p style="text-align: right;"><img class="aligncenter size-full wp-image-75" title="p7" src="/assets/2009/02/p7.jpg" alt="p7" width="515" height="385" /></p>
<p style="text-align: right;">8. במסך הבא סמנו את שני האפשרויות</p>
<p style="text-align: right;"><img class="aligncenter size-full wp-image-76" title="p8" src="/assets/2009/02/p8.jpg" alt="p8" width="518" height="388" /></p>
<p style="text-align: right;">9. במסך הבא הגדירו סיסמאת גישה למשתמש ROOT נא לא להשאיר את שדה הסיסמא ריק וסמנו רק את התיבה הראשונה.</p>
<p style="text-align: right;"><img class="aligncenter size-full wp-image-77" title="p9" src="/assets/2009/02/p9.jpg" alt="p9" width="515" height="390" /></p>
<p style="text-align: right;">10. לחצו על  "Execute"</p>
<p style="text-align: right;"><img class="aligncenter size-full wp-image-78" title="p10" src="/assets/2009/02/p10.jpg" alt="p10" width="516" height="389" /></p>
<p style="text-align: right;">11. לאחר זה מסיים את תהליך ההתקנה ישנם כמה דברים קטנים שצריך לעשות כדי לוודא את אבטחת המערכת שלכם. כדי שאף אחד לא יוכל להכנס למחשב שלכם ולהשתמש במסד הנתונים יש לבצע את הפעולה הבאה: יש לפתוח את קובץ my.ini עם עורך טקסט כלשהו, הקובץ נמצא בתיקיה c:\mysql (לרוב, יכול להשתנות בהתאם למיקום בו התקנתם את MYSQL קודם לכן). בקובץ my.ini חפשו את "[mysqld]" והוסיפו תחתיו את השורה הבאה:</p>
<p style="text-align: right;"><strong>bind-address=127.0.0.1</strong></p>
<p style="text-align: right;">כדי לוודא שההתקנה עברה בהצלחה ו MYSQL אכן מותקן יש לבדוק את זה על ידי התחל -&gt; הפעלה -&gt; cmd (באנגלית: Start -&gt; Run -&gt; cmd) ולהזין את הטקסט הבא בשורה:</p>

<strong>mysql.exe -h 127.0.0.1 -u root -p</strong>

אם הכל יעבוד כמוש צריך הוא יבקש מכם את הסיסמא שהזנתם קודם לכן בהתקנה.
<h3>3. התקנת Rails</h3>
בכדי להתקין את Rails עליכם לגשת ל התחל -&gt; הפעלה -&gt; cmd (באנגלית: Start -&gt; Run -&gt; cmd) לגשת לתיקיה של Ruby (בדרך כלל יהיה c:\ruby\bin תדרשו להשתמש בפקודת chdir) ברגע שאתם נמצאים תחת התקיה c:\ruby\bin הזינו את הטקסט הבא:

gem install rails --include-dependencies

(אם פתאום תצוץ שגיאה כלשהי זה סימן שאין לכם את הגרסא העדכנית של Gems הריצו את הפקודה "gem -v" כדי לקבל את הגרסא המותקנת במחשב שלכם, במידה והגרסא נמוכה מ 0.8.10 תצטרכו לעדכן את הגרסא של Ruby , יש לקרוא את תחילת המדריך).

פקודה זו תתקין את גרסאת ה Rails ואת ה "RDoc documentation" שלה. פעולה זו יכולה לקחת 5-10 דקות אז לא לדאוג אם אתם רואים שלא קורה כלום בזמן שאתם מחכים. אתם תראו הודעה כמו "Updating Gem source index for: <a href="http://gems.rubyforge.org/">http://gems.rubyforge.org/</a>" בזמן שזה מבצע את הפקודה. לא קיימת איזשהי אינדיקציה על זמן ותהליך הפעולה אבל זה אכן עושה את העבודה.

בסופו של דבר אתם תראו משהו דומה לזה:

<img class="aligncenter size-full wp-image-79" title="p11" src="/assets/2009/02/p11.jpg" alt="p11" width="569" height="223" />

לאחר מכן תצטרכו ליצור תיקיה שתכיל את כל הפרוייקטים שלכם. אני פתחתי תיקיה בשם "projects" בתיקיה הראשית של Ruby שנמצאת אצלי ב "c:\ruby" . לאחר מכן יש לגשת לתיקיה הזאת בעזרת פקודת cd לדוגמא: "cd c:\ruby/projects" ברגע שאתם נמצאים בתיקיה הזאת תוכלו ליצור את הפרוייקט הראשון שלכם על ידי הרצת הפקודה הבאה:

<strong>rails demo</strong>

פקודה זו תצור תיקיה בשם "demo" ותצור את כל הקבצים הנחוצים לפרוייקט הראשון שלכם ב rails. לאחר הרצת הפקודה אתם תראו משהו דומה לזה:

<img class="aligncenter size-full wp-image-80" title="p12" src="/assets/2009/02/p12.jpg" alt="p12" width="473" height="639" />

לאחר מכן יש להריץ פקודה כדי בעצם "להתחיל" להריץ את הפרוייקט. אז לבסוף הזינו את הטקסט "cd demo" כדי לעבור לתיקיה demo שנמצאת בתוך c:\ruby\projects ואז להריץ את הפקודה:

<strong>ruby script/server</strong>

פקודה זו תריץ את הפרוייקט שלכם ותריץ את ה deamon בשם "WEBrick" , שרק בעזרתו ניתן להריץ את הפרוייקטים במחשב. לאחר ההרצה כדי לבדוק אם הכל עובד יש לגשת לקישור הבא <a href="http://127.0.0.1:3000/">http://127.0.0.1:3000/</a> אם הכל הותקן כמו שצריך אתם תראו את החלון הבא:

<img class="aligncenter size-full wp-image-82" title="p131" src="/assets/2009/02/p131.jpg" alt="p131" width="500" height="436" />

חלון זה אומר שהכל הותקן והפרוייקט שלכם מוכן לפיתוח.

דבר אחד חשוב! בכדי שהפרוייקט ירוץ תמיד, חשוב שהחלון בו הרצתם את הפקודה "ruby script/server" שמריץ את WEBrick לא יסגר. לכן כל עוד אתם עובדים על הפרוייקטים החלון הזה צריך להיות פתוח. במידה ובמקרה החלון נסגר כל מה שעליכם לעשות זה להריץ את הפקודה שוב בחלון חדש.

למרות שלא כיסינו את השלבים בהתקנת Mysql Query Browser / Admin Tools אלו הם תוכנות עזר בלבד, אפשר לעבוד בלעדיהם אבל לעבוד אתם מקל על המפתחים.
<h3>לסיכום</h3>
התקנת Rails ואת סביבת העבודה והפיתוח שלה היא לא מטלה קשה במיוחד, אבל ברגע שהתקנתם אותה זמן הפיתוח והעבודה מתקצר לאלו שמפתחים ב Rails לוקאלית. ברגע שכבר תבנו את הפרוייקט והוא יהיה מוכן לצאת לפועל תוכלו לבחור אחד <a href="http://wiki.rubyonrails.com/rails/pages/RailsWebHosts" target="_blank">מהאחסונים </a>אשר מספקים תמיכה ב RoR ולהציג את העבודות שלכם לעולם.
