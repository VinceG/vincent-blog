---
title: "New Yii Extension - Gravatar Support"
date: 2010-04-01 08:48:33
---

<div style="text-align:left;direction:ltr;">
<p style="text-align: left; direction: ltr;">I have recently thought about an extension i needed for a site i was working on, And while i was writing it i though why wouldn't i make it as an extension for the Yii framework as i already use it for the same project and other projects as well. So i would like to introduce to you the new Yii Gravatar Extension.</p>
<p style="text-align: left; direction: ltr;">You can download it by visiting <a href="http://www.yiiframework.com/extension/gravatar/" target="_blank">This Page</a></p>
<p style="text-align: left;"><!--more--></p>
<p style="text-align: left;">The usage is simple:</p>

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


</div>
