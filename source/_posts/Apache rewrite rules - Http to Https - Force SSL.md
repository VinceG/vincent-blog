---
title: "Apache rewrite rules - Http to Https - Force SSL"
date: 2009-09-24 15:59:20
categories: 
- "apache"
- "PHP"
- "אופטימיזציה"
tags: 
- "apache"
- "force"
- "http"
- "https"
- "rewrite"
- "rules"
- "ssl"
---

<div style="text-align:left; direction: ltr;">

<p>Sometimes you may need to make sure that the user is browsing your site over securte connection.
An easy to way to always redirect the user to secure connection (https://) can be accomplished with a .htaccess file containing the following lines:</p>
<!--more-->
```
RewriteEngine On
RewriteCond %{SERVER_PORT} 80
RewriteRule ^(.*)$ https://www.example.com/$1 [R,L]
```

<p>Please, note that the .htaccess should be located in the web site main folder.</p>

<p>In case you wish to force HTTPS for a particular folder you can use:</p>

```
RewriteEngine On
RewriteCond %{SERVER_PORT} 80
RewriteCond %{REQUEST_URI} somefolder
RewriteRule ^(.*)$ https://www.domain.com/somefolder/$1 [R,L]
```

<p>The .htaccess file should be placed in the folder where you need to force HTTPS.</p>

</div>
