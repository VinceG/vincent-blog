---
title: "Zend Framework - למה באמת כדי להשתמש בה?"
date: 2009-02-19 12:06:09
categories: 
- "frameworks"
- "PHP"
tags: 
- "framework"
- "zend"
- "zend framework"
---

בדרך כלל אני לא בעד כל ה frameworks למיניהם. במיוחד אחרי כל הקטע של "הדימוי" שלהם לכיוון והדרך בה <a title="ruby on rails framework" onclick="javascript:urchinTracker ('/outgoing/www.rubyonrails.org/');" href="http://www.rubyonrails.org/">Ruby on Rails</a> כתוב, כל PHP Framework כיום כותב בעצמו איזה <a title="ruby on rails framework active record implementation" onclick="javascript:urchinTracker ('/outgoing/wiki.rubyonrails.org/rails/pages/ActiveRecord');" href="http://wiki.rubyonrails.org/rails/pages/ActiveRecord">ActiveRecord</a> או <a title="what is scaffolding" onclick="javascript:urchinTracker ('/outgoing/en.wikipedia.org/wiki/Scaffold_(programming)');" href="http://en.wikipedia.org/wiki/Scaffold_%28programming%29">scaffolding</a> ודברים אחרים דומים שקיימים ב Rails ובשפות אחרות (למרות ש Rails היא בעצמה Framework ל Ruby), זה בהחלט כבר יוצא מפרופורציות שכל אחד מנסה "לפתח" את ה framework שלו וטוען שהיא עושה דברים שאחרים לא עושים, והיא הטובה ביותר והמהירה ביותר, שבדרך כלל לא נכון.

לפעמים אני תוהה, למה לבזבז זמן בלכתוב משהו שכבר קיים, ועוד משהו שקיים ויש אותו כל כך הרבה. לדעתי יש יותר Frameworks מאשר משתמשים שבעצם משתמשים בהם. בנוסף לזה שכיום ישנם רק כמה frameworks שבאמת עושים את העבודה כמו שצריך, ורק כמה שבאמת מקבלים פופולאריות ומשתמשים שמשתמשים בהם.

למרות שלדעתי לל ה frameworks הקיימים היום פשוט מבזבזים זמן, הרי ברור שעם כל הפרסום, הוותק והידע של אלו שעובדים ב ZEND , ה Framework של ZEND הוא זה ששולט כרגע וככה זה ימשך לעד. כשבנאדם מגיע ויש לו בחירה בין 2 מערכות שאחת: נכתבה על ידי החברה שמפתחת את השפה בעצמה, מתוכננת על ידי הטובים ביותר, ישנה קהילה עצומה למתן שירותי תמיכה, ונתמכת בכמעט כל השפות. לעומת framework שנכתב על ידי כמה מתכנתים, שעושים את זה מהבית, שלא עשו משהו דומה לזה בעבר, עם קהילה קטנה ותמיכה במעט מאוד שפות. הרי ברור שברוב המקרים אם לא כולן אותו בנאדם שמתלבט יבחר ב ZEND. וזה גם מה שאני עשיתי. למה לטרוח להשתמש במשהו שהוא לא בטוח שימשיך להתקיים בכמה שנים הבאות, עדיף להיות אחראי יותר ובטוח יותר ולקחת משהו שיש לו קורה תומכת ויציבה.

לכן בחרת ב ZEND, העברתי לא מעט זמן וקריאה של כל ההדרכה שלהם, <a href="http//mitchellhashimoto.com/zend-framework-tutorials/" target="_blank">צפייה בוידאו</a> שמסביר על כל מה שאפשר לעשות, ואת האמת זה בהחלט מרשים.

הנה כמה דברים שאני מצאתי לנכון לשתף בנוגע ל Zend Framework:
<ul>
	<li>כל ה framework הוא בעצם תיקיה אחת של מחלקות (בגלל זה הרבה חושבים ש ZEND הינה ספריה של מחלקות יותר מאשר framework וזה בדרך כלל שגוי) שלא ממש מעניינת אותך ומשמשת רק לטעינה של הקבצים שאתה צריך בהתאם.</li>
	<li>אין מבנה (סטרוקטורה) קבוע לאיך שהאפליקציה שלך צריכה להראות (ברוב ה frameworks הם מחייבים אותך להשתמש בשלושה תיקיות בהתאם ל MVC - model/view/controller) ככה שאתה בוחר איך המבנה של המערכת יהיה.</li>
	<li>היא נעמדת מאחורי חברה אמינה ומבטיחה שבין היתר יוצרת את אותה שפה שאתם משתמשים.</li>
	<li>צוות אמין ,מקצועי וגדול של מפתחים שעומדים מאחורי הפיתוח שלה.</li>
	<li>הרבה <a href="http://www.vadimg.co.il/wp-content/uploads/2009/02/zend_components.jpg" target="_blank">מחלקות</a> שנכתבו כבר ומוכנות לשימוש קל פשוט ויעיל שמשתמשות בכל ה design patterns למיניהם.</li>
	<li>מערכת לניהול מדריכים <strong>יעילה</strong>, בשפות שונות, דוקומנטציה ודוגמאות. (מה שחסר בהרבה מקומות בשאר ה frameworks)</li>
	<li>תומכת במודל ה MVC, פלאגינים ועזרים נלווים אחרים.</li>
</ul>
למרות שיש גם כמה חסרונות בשימוש ב ZF ואלו שאני מצאתי לנכון לרשום הם:
<ul>
	<li>דרוש ידע ב PHP 5, ידע ב OOP מורחב מאחר וזה מה שמשתמשים שם, וכמובן ב design patterns</li>
	<li>ZF הינה מערכת גדולה, כבדה, הרבה קבצים שצריך לעלות לשרת. לוקח די הרבה זכרון בזמן טעינה (לפחות יותר מאפליקציה ללא Framework).</li>
	<li>העברה של אפליקציה שכתובה ב ZF דורשת הרבה זמן מאחר וכמו שנאמר יש הרבה קבצים לעלות (אבל לכו תדעו אם ZEND לא יספקו אותה מובנת בגרסאות הבאות של PHP לכן יש עדיפות להשתמש בזה על אחרות).</li>
</ul>
בכל מקרה השתמשתי בלא מעט Frameworks כמו Yii, CodeIgnite, CakePHP, Symfony אבל אף אחד לא באמת מספק את מה ש ZEND יכול לספק, וזה מעבר ל Framework.
