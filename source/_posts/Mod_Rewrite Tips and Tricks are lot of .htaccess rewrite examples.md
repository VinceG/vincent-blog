---
title: "Mod_Rewrite Tips and Tricks are lot of .htaccess rewrite examples"
date: 2009-08-05 12:19:29
---

<div style="text-align:left;direction:ltr;">

<strong><a id="mod_rewrite-tips-tricks" title="mod_rewrite RewriteRule and RewriteCond tips and tricks" name="mod_rewrite-tips-tricks">Mod_Rewrite Tips and Tricks</a></strong> are lot of <strong>.htaccess rewrite examples</strong> that show specific uses for creating .htaccess rewrites to do all kinds of cool and profitable stuff for your site.   <strong>Htaccess Rewrites</strong> are enabled by using the Apache module <a href="http://www.askapache.com/servers/mod_rewrite.c.html">mod_rewrite</a>, which is one of the most powerful Apache modules and features availale. Htaccess Rewrites through mod_rewrite provide the special ability to <strong>Rewrite requests internally</strong> as well as <em>Redirect request externally</em>.

<!--more-->

When the url in your browser’s location bar stays the same for a request it is an internal rewrite, when the url changes an external redirection is taking place. This is one of the first, and one of the biggest mental-blocks people have when learning about mod_rewrite… But I have a secret weapon for you to use, a new discovery from years of research that makes learning mod_rewrite drastically quicker and easier. It truly does or I wouldn’t be saying so in the introduction of this article.
<blockquote>Despite the tons of examples and docs, <strong>mod_rewrite is voodoo</strong>.
Damned cool voodoo, but still voodoo.
– <cite>Brian Moore</cite></blockquote>
<strong>Note:</strong> After years of fighting to learn my way through rewriting urls with mod_rewrite, I finally had a breakthrough and found a way to outsmart the difficulty of mod_rewrite that I just couldn’t seem to master. The <a href="http://www.askapache.com/htaccess/mod_rewrite-variables-cheatsheet.html">Mod_Rewrite RewriteCond/RewriteRule Variable Value Cheatsheet</a> is the one-of-a-kind tool that changed the game for me and made mod_rewriting no-harder than anything else.

So keep that mod_rewrite reference bookmarked and you will be able to figure out any RewriteRule or RewriteCond, an amazing feat considering it took me a LONG time to figure this stuff out on my own. But that was before <a href="http://www.askapache.com/htaccess/crazy-advanced-mod_rewrite-tutorial.html">the craziness</a>, one of the most challenging and productive .htaccess experiments I’ve done… An experiment so <strong>ILL</strong> it’s sick like a diamond disease on your wrist! $$$. That mod_rewrite experiment/tutorial was the culmination of many different advanced mod_rewrite experiments I had done in the past and included most of my very best .htaccess tricks. With the cheatsheet it’s no longer Voodoo.. Its just what you do. Now lets dig in!
<h2>Htaccess rewrites TOC</h2>
<ul>
	<li><a title=".htaccess mod rewrite should use Options +FollowSymLinks" href="#default-mod-rewrite-hint">.htaccess rewrite examples should begin with:</a></li>
	<li><a title="Use mod_rewrite in Apache htaccess to Require the www for SEO" href="#require-the-www-in-htaccess">Require the www</a></li>
	<li><a title="Use mod_rewrite in Apache htaccess to Require no www for SEO" href="#require-no-www-in-htaccess">Require no www</a></li>
	<li><a title="Search for a key in the query string" href="#check-for-key-in-query-string">Check for a key in QUERY_STRING</a></li>
	<li><a title="Remove the query string from url" href="#delete-query-string">Removes the QUERY_STRING from the URL</a></li>
	<li><a title="Stop internal redirect looping" href="#fix-infinite-loop-redirects">Fix for infinite loops</a></li>
	<li><a title="Redirecting .php file extensions to .html" href="#external-redirect-php-files-to-html">Redirect .php files to .html files (SEO friendly)</a></li>
	<li><a title="Redirecting .html file extensions to .php" href="#internal-redirect-php-files-to-html">Redirect .html files to actual .php files (SEO friendly)</a></li>
	<li><a title="Deny access with Apache htaccess during certain hours of the day" href="#time-based-access">block access to files during certain hours of the day</a></li>
	<li><a title="Change underscores to hyphens for SEO URL" href="#convert-underscore-hyphen">Rewrite underscores to hyphens for SEO URL</a></li>
	<li><a title="mod_rewrite example of SEO 301 redirecting non-www to www" href="#require-www-no-hardcoding">Require the www without hardcoding</a></li>
	<li><a title="mod_rewrite subdomain usage example of SEO 301 redirecting" href="#require-no-subdomain-1">Require no subdomain</a></li>
	<li><a title="Apache htaccess htaccess rewrite ~without slash" href="#require-no-subdomain-2">Require no subdomain</a></li>
	<li><a title="Rewriting WordPress RSS feeds to Feedburner in SEO friendly method" href="#redirect-wordpress-feed">Redirecting Wordpress Feeds to Feedburner</a></li>
	<li><a title="Deny Request Methods other than GET or PUT" href="#only-allow-get-and-put-requests">Only allow GET and PUT request methods</a></li>
	<li><a title="hotlinking and bandwidth stealing with mod_rewrite, hotlinking example" href="#prevent-hotlinking">Prevent Files image/file hotlinking and bandwidth stealing</a></li>
	<li><a title="Fix prefetching in browsers" href="#stop-browser-prefetching">Stop browser prefetching</a></li>
	<li><a title="Help Firefox browser with prefetching in htaccess. " href="#firefox-prefetching-hint">Make a prefetching hint for Firefox. </a></li>
</ul>
<hr />If you really want to take a look, check out the <a href="http://www.askapache.com/servers/mod_rewrite.c.html">mod_rewrite.c</a> and <a href="http://www.askapache.com/servers/mod_rewrite.h.html">mod_rewrite.h</a> files.

Be aware that mod_rewrite (<em>RewriteRule, RewriteBase, and RewriteCond</em>) code is executed for each and every HTTP request that accesses a file in or below the directory where the code resides, so it’s always good to limit the code to certain circumstances if readily identifiable.

<strong>For example</strong>, to limit the next 5 RewriteRules to only be applied to .html and .php files, you can use the following code, which tests if the url does not end in .html or .php and if it doesn’t, it will skip the next 5 RewriteRules.

<hr />
<pre>RewriteRule !\.(html|php)$ - [S=5]
RewriteRule ^.*-(vf12|vf13|vf5|vf35|vf1|vf10|vf33|vf8).+$ - [S=1]</pre>
<h2><a id="default-mod-rewrite-hint" title="Mostly .htaccess rewrite examples should begin with:" name="default-mod-rewrite-hint" href="#default-mod-rewrite-hint">.htaccess rewrite examples should begin with:</a></h2>
<pre>Options +FollowSymLinks

RewriteEngine On
RewriteBase /</pre>
<h2><a id="require-the-www-in-htaccess" title="Require the www" name="require-the-www-in-htaccess" href="#require-the-www-in-htaccess">Require the www</a></h2>
<pre>Options +FollowSymLinks
RewriteEngine On
RewriteBase /
RewriteCond %{HTTP_HOST} !^www\.askapache\.com$ [NC]
RewriteRule ^(.*)$ http://www.askapache.com/$1 [R=301,L]</pre>
<h2>Loop Stopping Code</h2>
Sometimes your rewrites cause infinite loops, stop it with one of these rewrite code snippets.
<pre>RewriteCond %{REQUEST_URI} ^/(stats/|missing\.html|failed_auth\.html|error/).* [NC]
RewriteRule .* - [L]

RewriteCond %{ENV:REDIRECT_STATUS} 200
RewriteRule .* - [L]</pre>
<h2>Cache-Friendly File Names</h2>
This is probably my favorite, and I use it on every site I work on. It allows me to update my javascript and css files in my visitors cache’s simply by naming them differently in the html, on the server they stay the same name. This rewrites all files for <code>/zap/j/anything-anynumber.js to /zap/j/anything.js and /zap/c/anything-anynumber.css to /zap/c/anything.css</code>
<pre>RewriteRule ^zap/(j|c)/([a-z]+)-([0-9]+)\.(js|css)$ /zap/$1/$2.$4 [L]</pre>
<h2>SEO friendly link for non-flash browsers</h2>
When you use flash on your site and you properly supply a link to download flash that shows up for non-flash aware browsers, it is nice to use a shortcut to keep your code clean and your external links to a minimum. This code allows me to link to <code>site.com/getflash/</code> for non-flash aware browsers.
<pre>RewriteRule ^getflash/?$ http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash [NC,L,R=307]</pre>
<h2>Removing the Query_String</h2>
On many sites, the page will be displayed for both page.html and page.html?anything=anything, which hurts your SEO with duplicate content. An easy way to fix this issue is to redirect external requests containing a query string to the same uri without the query_string.
<pre>RewriteCond %{THE_REQUEST} ^GET\ /.*\;.*\ HTTP/
RewriteCond %{QUERY_STRING} !^$
RewriteRule .* http://www.askapache.com%{REQUEST_URI}? [R=301,L]</pre>
<h2>Sending requests to a php script</h2>
This .htaccess rewrite example invisibly rewrites requests for all Adobe pdf files to be handled by <code>/cgi-bin/pdf-script.php</code>
<pre>RewriteRule ^(.+)\.pdf$  /cgi-bin/pdf-script.php?file=$1.pdf [L,NC,QSA]</pre>
<h2>Setting the language variable based on Client</h2>
For sites using multiviews or with multiple language capabilities, it is nice to be able to send the correct language automatically based on the clients preferred language.
<pre>RewriteCond %{HTTP:Accept-Language} ^.*(de|es|fr|it|ja|ru|en).*$ [NC]
RewriteRule ^(.*)$ - [env=prefer-language:%1]</pre>
<h2>Deny Access To Everyone Except PHP fopen</h2>
This allows access to all files by php fopen, but denies anyone else.
<pre>RewriteEngine On
RewriteBase /
RewriteCond %{THE_REQUEST} ^.+$ [NC]
RewriteRule .* - [F,L]</pre>
If you are looking for ways to block or deny specific requests/visitors, then you should definately read <a title="Eight Ways to Blacklist with Apache’s mod_rewrite" href="http://perishablepress.com/press/2009/02/03/eight-ways-to-blacklist-with-apaches-mod_rewrite/">Blacklist with mod_rewrite</a>.  I give it a 10/10
<h2>Deny access to anything in a subfolder except php fopen</h2>
This can be very handy if you want to serve media files or special downloads but only through a php proxy script.
<pre>RewriteEngine On
RewriteBase /
RewriteCond %{THE_REQUEST} ^[A-Z]{3,9}\ /([^/]+)/.*\ HTTP [NC]
RewriteRule .* - [F,L]</pre>
<h2><a id="require-no-www-in-htaccess" title="Require no www" name="require-no-www-in-htaccess" href="#require-no-www-in-htaccess">Require no www</a></h2>
<pre>Options +FollowSymLinks
RewriteEngine On
RewriteBase /
RewriteCond %{HTTP_HOST} !^askapache\.com$ [NC]
RewriteRule ^(.*)$ http://askapache.com/$1 [R=301,L]</pre>
<h2><a id="check-for-key-in-query-string" title="Search for a key in the query string" name="check-for-key-in-query-string" href="#check-for-key-in-query-string">Check for a key in QUERY_STRING</a></h2>
Uses a <a title="RewriteCond Directive Use in htaccess" href="http://askapache.info/trunk/mod/mod_rewrite.html#rewritecond">RewriteCond</a> Directive to check QUERY_STRING for passkey, if it doesn’t find it it redirects all requests for anything in the /logged-in/ directory to the /login.php script.
<pre>RewriteEngine On
RewriteBase /
RewriteCond %{QUERY_STRING} !passkey
RewriteRule ^/logged-in/(.*)$ /login.php [L]</pre>
<h2><a id="delete-query-string" title="Remove the query string from url" name="delete-query-string" href="#delete-query-string">Removes the QUERY_STRING from the URL</a></h2>
If the QUERY_STRING has any value at all besides blank than the<code>?</code>at the end of /login.php? tells mod_rewrite to remove the QUERY_STRING from login.php and redirect.
<pre>RewriteEngine On
RewriteBase /
RewriteCond %{QUERY_STRING} .
RewriteRule ^login.php /login.php? [L]</pre>
<h2><a id="fix-infinite-loop-redirects" title="Fix for infinite loops" name="fix-infinite-loop-redirects" href="#fix-infinite-loop-redirects">Fix for infinite loops</a></h2>
An error message related to this is<code>Request exceeded the limit of 10 internal redirects due to probable configuration error. Use 'LimitInternalRecursion' to increase the limit if necessary. Use 'LogLevel debug' to get a backtrace.</code>or you may see<code>Request exceeded the limit</code>,<code>probable configuration error</code>,<code>Use 'LogLevel debug' to get a backtrace</code>, or<code>Use 'LimitInternalRecursion' to increase the limit if necessary</code>
<pre>RewriteCond %{ENV:REDIRECT_STATUS} 200
RewriteRule .* - [L]</pre>
<h2><a id="external-redirect-php-files-to-html" title="External Redirect .php files to .html files (SEO friendly)" name="external-redirect-php-files-to-html" href="#external-redirect-php-files-to-html">External Redirect .php files to .html files (SEO friendly)</a></h2>
<pre>RewriteRule ^(.*)\.php$ /$1.html [R=301,L]</pre>
<h2><a id="internal-redirect-php-files-to-html" title="Internal Redirect .php files to .html files (SEO friendly)" name="internal-redirect-php-files-to-html" href="#internal-redirect-php-files-to-html">Internal Redirect .php files to .html files (SEO friendly)</a></h2>
Redirects all files that end in .html to be served from filename.php so it looks like all your pages are .html but really they are .php
<pre>RewriteRule ^(.*)\.html$ $1.php [R=301,L]</pre>
<h2><a id="time-based-access" title="block access to files during certain hours of the day" name="time-based-access" href="#time-based-access">block access to files during certain hours of the day</a></h2>
<pre>Options +FollowSymLinks
RewriteEngine On
RewriteBase /
# If the hour is 16 (4 PM) Then deny all access
RewriteCond %{TIME_HOUR} ^16$
RewriteRule ^.*$ - [F,L]</pre>
<h2><a id="convert-underscore-hyphen" title="Change underscores to hyphens for SEO URL" name="convert-underscore-hyphen" href="#convert-underscore-hyphen">Rewrite underscores to hyphens for SEO URL</a></h2>
Converts all underscores “_” in urls to hyphens “-” for SEO benefits…  See the <a href="http://www.askapache.com/htaccess/rewrite-underscores-to-hyphens-for-seo-url.html">full article</a> for more info.
<pre>Options +FollowSymLinks
RewriteEngine On
RewriteBase /

RewriteRule !\.(html|php)$ - [S=4]
RewriteRule ^([^_]*)_([^_]*)_([^_]*)_([^_]*)_(.*)$ $1-$2-$3-$4-$5 [E=uscor:Yes]
RewriteRule ^([^_]*)_([^_]*)_([^_]*)_(.*)$ $1-$2-$3-$4 [E=uscor:Yes]
RewriteRule ^([^_]*)_([^_]*)_(.*)$ $1-$2-$3 [E=uscor:Yes]
RewriteRule ^([^_]*)_(.*)$ $1-$2 [E=uscor:Yes]

RewriteCond %{ENV:uscor} ^Yes$
RewriteRule (.*) http://d.com/$1 [R=301,L]</pre>
<h2><a id="require-www-no-hardcoding" title="Require the www without hardcoding" name="require-www-no-hardcoding" href="#require-www-no-hardcoding">Require the www without hardcoding</a></h2>
<pre>Options +FollowSymLinks
RewriteEngine On
RewriteBase /
RewriteCond %{HTTP_HOST} !^www\.[a-z-]+\.[a-z]{2,6} [NC]
RewriteCond %{HTTP_HOST} ([a-z-]+\.[a-z]{2,6})$     [NC]
RewriteRule ^/(.*)$ http://%1/$1 [R=301,L]</pre>
<h2><a id="require-no-subdomain-1" title="Require no subdomain" name="require-no-subdomain-1" href="#require-no-subdomain-1">Require no subdomain</a></h2>
<pre>RewriteEngine On
RewriteBase /
RewriteCond %{HTTP_HOST} \.([a-z-]+\.[a-z]{2,6})$ [NC]
RewriteRule ^/(.*)$ http://%1/$1 [R=301,L]</pre>
<h2><a id="require-no-subdomain-2" title="Require no subdomain" name="require-no-subdomain-2" href="#require-no-subdomain-2">Require no subdomain</a></h2>
<pre>RewriteEngine On
RewriteBase /
RewriteCond %{HTTP_HOST} \.([^\.]+\.[^\.0-9]+)$
RewriteRule ^(.*)$ http://%1/$1 [R=301,L]</pre>
<h2><a id="redirect-wordpress-feed" title="Redirecting Wordpress Feeds to Feedburner" name="redirect-wordpress-feed" href="#redirect-wordpress-feed">Redirecting Wordpress Feeds to Feedburner</a></h2>
Full article:<a title="Redirecting Wordpress Feeds to Feedburner" href="http://www.askapache.com/htaccess/redirecting-wordpress-feeds-to-feedburner.html">Redirecting Wordpress Feeds to Feedburner</a>
<pre>RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_URI} ^/feed\.gif$
RewriteRule .* - [L]

RewriteCond %{HTTP_USER_AGENT} !^.*(FeedBurner|FeedValidator) [NC]
RewriteRule ^feed/?.*$ http://feeds.feedburner.com/apache/htaccess [L,R=302]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]</pre>
<h2><a id="only-allow-get-and-put-requests" title="Only allow GET and PUT request methods" name="only-allow-get-and-put-requests" href="#only-allow-get-and-put-requests">Only allow GET and PUT Request Methods</a></h2>
Article: <a title="List of Apache Recognized Request Methods" href="http://www.askapache.com/htaccess/apache-status-code-headers-errordocument.html#http-methods-recognized">Request Methods</a>
<pre>RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_METHOD} !^(GET|PUT)
RewriteRule .* - [F]</pre>
<h2><a id="prevent-hotlinking" title="Prevent Files image/file hotlinking and bandwidth stealing" name="prevent-hotlinking" href="#prevent-hotlinking">Prevent Files image/file hotlinking and bandwidth stealing</a></h2>
<pre>RewriteEngine On
RewriteBase /
RewriteCond %{HTTP_REFERER} !^$
RewriteCond %{HTTP_REFERER} !^http://(www\.)?askapache.com/.*$ [NC]
RewriteRule \.(gif|jpg|swf|flv|png)$ /feed/ [R=302,L]</pre>
<h2><a id="stop-browser-prefetching" title="Stop browser prefetching" name="stop-browser-prefetching" href="#stop-browser-prefetching">Stop browser prefetching</a></h2>
<pre>RewriteEngine On
SetEnvIfNoCase X-Forwarded-For .+ proxy=yes
SetEnvIfNoCase X-moz prefetch no_access=yes

# block pre-fetch requests with X-moz headers
RewriteCond %{ENV:no_access} yes
RewriteRule .* - [F,L]</pre>
<blockquote cite="http://askapache.info/trunk/mod/mod_rewrite.html#rewritebase">This module uses a rule-based rewriting engine (based on a regular-expression parser) to rewrite requested URLs on the fly. It supports an unlimited number of rules and an unlimited number of attached rule conditions for each rule, to provide a really flexible and powerful URL manipulation mechanism. The URL manipulations can depend on various tests, of server variables, environment variables, HTTP headers, or time stamps. Even external database lookups in various formats can be used to achieve highly granular URL matching.

This module operates on the full URLs (including the path-info part) both in per-server context (<code>httpd.conf</code>) and per-directory context (<code>.htaccess</code>) and can generate query-string parts on result. The rewritten result can lead to internal sub-processing, external request redirection or even to an internal proxy throughput.

Further details, discussion, and examples, are provided in the <a href="http://askapache.info/trunk/rewrite/index.html">detailed mod_rewrite documentation</a>.</blockquote>
<h2>Directives</h2>
<ul>
	<li><a href="http://askapache.info/trunk/mod/mod_rewrite.html#rewritebase">RewriteBase</a></li>
	<li><a href="http://askapache.info/trunk/mod/mod_rewrite.html#rewritecond">RewriteCond</a></li>
	<li><a href="http://askapache.info/2.2/mod/mod_rewrite.html#rewriteengine">RewriteEngine</a></li>
	<li><a href="http://askapache.info/trunk/mod/mod_rewrite.html#rewritelock">RewriteLock</a></li>
	<li><a href="http://askapache.info/2.0/mod/mod_rewrite.html#rewritelog">RewriteLog</a></li>
	<li><a href="http://askapache.info/trunk/mod/mod_rewrite.html#rewriteloglevel">RewriteLogLevel</a></li>
	<li><a href="http://askapache.info/trunk/mod/mod_rewrite.html#rewritemap">RewriteMap</a></li>
	<li><a href="http://askapache.info/1.3/mod/mod_rewrite.html#rewriteoptions">RewriteOptions</a></li>
	<li><a href="http://askapache.info/trunk/mod/mod_rewrite.html#rewriterule">RewriteRule</a></li>
</ul>
Source: <a href="http://www.askapache.com/htaccess/mod_rewrite-tips-and-tricks.html#require-the-www-in-htaccess" target="_blank">AskApache.com</a></div>
