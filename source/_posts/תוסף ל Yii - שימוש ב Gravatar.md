---
title: "תוסף ל Yii - שימוש ב Gravatar"
date: 2010-04-01 08:55:12
---


לאחרונה כתבתי תוסף ל Yii  אשר מיישם את השימוש של Gravatar לאלו שלא מכירים:<a href="http://en.gravatar.com" target="_blank"> צפייה בעמוד</a>.
לאחר שכתבתי את זה לפרוייקט אישי שאני עובד עליו חשבתי שיהיה שימושי לפרסם את זה כתוסף מאחר ואולי משתמשים אחרים ירצו להשתמש באותו הדבר. לכן פרסמתי אתמול את התוסף הזה בעמוד התוספים של Yii ניתן לצפות בתוסף בקישור הבא:
<!--more-->
ֿ<a href="http://www.yiiframework.com/extension/gravatar/">להורדה</a>

השימוש בו הוא פשוט מאוד

[sourcecode lang='php']

<?php
$this->widget('application.extensions.VGGravatarWidget',
array(
'email' => 'myemail[at]mydomain.com', // email to display the gravatar belonging to it
'hashed' => false, // if the email provided above is already md5 hashed
// then set this property to true, defaults to false
'default' => 'http://www.mysite.com/default_gravatar_image.jpg',
// if an email is not associated with a gravatar this image will be displayed,
// by default this is omitted so the Blue Gravatar icon will be displayed you can also set this to
// "identicon" "monsterid" and "wavatar" which are default gravatar icons
'size' => 50, // the gravatar icon size in px defaults to 40
'rating' => 'PG', // the Gravatar ratings, Can be G, PG, R, X, Defaults to G
'htmlOptions' => array( 'alt' => 'Gravatar Icon' ),
// Html options that will be appended to the image tag
));
?>

```
