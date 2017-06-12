---
title: "Application Installer Wizard Class"
date: 2009-06-24 13:41:18
categories: 
- "mysql"
- "PHP"
tags: 
- "application"
- "class"
- "installer"
- "PHP"
- "php application installer"
- "php class"
- "php installer"
---

<div style="text-align: left; direction: ltr;">Many people were asking about a simple class installer wizard that will do just the basic application installation in PHP, As a developer you would want to make things as simple as possible to the end user, So having an installer that will do all the hard work is something that i find useful and even mandatory.

I took the time to write down a simple (yet efficent) installer class. This class allows you to add an unlimited amount of Database queiries for the installer to run.

All the queries are placed in a single file for easier usage. It also writes down a configuration file with the DB information the base url and base path of the application
That is configurable from the installer wizard.

In addition to that it also protects the wizard from being run again by adding a lock file to the installer, And only by manually removing that file from the FTP you could run the wizard again.

One thing i wanted to add here is the ability to view the wizard in different languages, So now you can view the wizard in any language that suppors it.

Adding translation languages is a matter of copying the base language file and translating less then 30 strings of text and you got yourself a wizard that supports your language.

A small adjusment i did is to also support Right-To-Left users and languages so if your language is an RTL language the wizard will display itself from right to left (for Arabic and Hebrew users)

Comes with a nice look &amp; feel to the wizard and not just blank white page with text inputs. If anyone interested in extending it you are free to do so as long as you keep the copyright intact.

Here are some examples:
<p style="text-align: center;"><a href="http://www.vadimg.com/wp-content/uploads/2009/06/index.jpg"><img class="aligncenter size-thumbnail wp-image-308" style="border: 0pt none;" title="Index page" src="http://www.vadimg.com/wp-content/uploads/2009/06/index-150x150.jpg" alt="Index page" width="150" height="150" /></a></p>
<p style="text-align: center;"></p>
<p style="text-align: center;"><a href="http://www.vadimg.com/wp-content/uploads/2009/06/database.jpg"><img class="aligncenter size-thumbnail wp-image-302" style="border: 0pt none;" title="Database" src="http://www.vadimg.com/wp-content/uploads/2009/06/database-150x150.jpg" alt="Database" width="150" height="150" /></a><a href="http://www.vadimg.com/wp-content/uploads/2009/06/databasedone.jpg"><img class="aligncenter size-thumbnail wp-image-303" style="border: 0pt none;" title="Database Done" src="http://www.vadimg.com/wp-content/uploads/2009/06/databasedone-150x150.jpg" alt="Database Done" width="150" height="150" /></a><a href="http://www.vadimg.com/wp-content/uploads/2009/06/config.jpg"><img class="aligncenter size-thumbnail wp-image-300" style="border: 0pt none;" title="config" src="http://www.vadimg.com/wp-content/uploads/2009/06/config-150x150.jpg" alt="config" width="150" height="150" /></a><a href="http://www.vadimg.com/wp-content/uploads/2009/06/finish.jpg"><img class="aligncenter size-thumbnail wp-image-306" style="border: 0pt none;" title="finish" src="http://www.vadimg.com/wp-content/uploads/2009/06/finish-150x150.jpg" alt="finish" width="150" height="150" /></a></p>
<p style="text-align: left;"></p>
<p style="text-align: left;">Download: <a href="http://www.vadimg.com/wp-content/uploads/2009/06/classinstaller-v1.zip">classinstaller-v1</a></p>
<p style="text-align: center;"></p>

Vadim. :)</div>
