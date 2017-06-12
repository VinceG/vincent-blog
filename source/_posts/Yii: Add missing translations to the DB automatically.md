---
title: "Yii: Add missing translations to the DB automatically"
date: 2010-05-03 09:15:16
---

<div style="text-align: left; direction: ltr;">Basically this was not designed to be an extension but rather a tool for development stage where you do not want to manually add every single language string into the database messages table for each language you need the application to be translated to.</div>
<div style="text-align: left; direction: ltr;"><!--more--></div>
<div style="text-align: left; direction: ltr;">

So what this does is basically a class that runs when the onMissingTranslation event raises and it checks if the message being translated exists in the source table, If not it adds it to the source messages table if it is then it skips this stage, The next stage is to check if this message exists in the messages table with the currently used language if it is then nothing is done if not then the message is added to the messages table for translation.

Note: It is highly recommended NOT to use this on a production environment as it run two queries for each message to check if it exists or not, Since i didn't plan this to be optimized and made this as a personal tool i have no plans updating this currently and is only released to help who ever needs such tool.

<a href="http://www.yiiframework.com/extension/db-missing-translations/" target="_blank">More information &amp; Download</a>

</div>
