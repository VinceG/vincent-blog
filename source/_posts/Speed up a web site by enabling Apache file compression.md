---
title: "Speed up a web site by enabling Apache file compression"
date: 2009-07-28 09:49:59
---

<p style="direction: ltr; text-align: left;"></p>
<p style="text-align: left;">Speed up page load times by automatically compressing CSS, HTML, and JavaScript files in Apache. Compressed files are smaller and faster to send.</p>
<p style="text-align: left;">Apache 1.x and 2.x can automatically compress files, but neither one comes with a compressor enabled by default. Enabling compression reduces CSS, HTML, and JavaScript file sizes by 55-65% and speeds up overall page load times by 35-40%.</p>
<p style="text-align: left;">Apache uses plug-in modules to add functionality. For Apache 1.x, use the free mod_gzip module to compress files. For Apache 2.x, use mod_gzip or the built-in mod_deflate module.</p>
<p style="text-align: left;">The mod_gzip module can be used with Apache 1.x or 2.x, but it doesn’t come with either Apache distribution. You’ll need to download and install it separately.</p>
<p style="text-align: left;">Download the zip file containing ApacheModuleGzip.dll from <a href="http://sourceforge.net/projects/mod-gzip" target="_blank">SourceForge</a>.</p>

<p style="text-align: left;">Move ApacheModuleGzip.dll to your Apache modules folder (typically “c:Program FilesApache GroupApachemodules”).
Edit your server configuration file using a text editor like NotePad (typically “c:Program FilesApache GroupApacheconfhttpd.conf”). Add the following line to your server configuration file as the last loaded module:
<p style="text-align: left;">```LoadModule gzip_module modules/ApacheModuleGzip.dll```</p>
<p style="text-align: left;">Add the following lines to your server configuration file or to a site’s “.htaccess” file:</p>

<p style="text-align: left;">```
<IfModule mod_gzip.c>
mod_gzip_on       Yes
mod_gzip_dechunk  Yes
mod_gzip_item_include file      .(html?|txt|css|js|php|pl)$
mod_gzip_item_include handler   ^cgi-script$
mod_gzip_item_include mime      ^text/.*
mod_gzip_item_include mime      ^application/x-javascript.*
mod_gzip_item_exclude mime      ^image/.*
mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*
</IfModule>
```
<p style="text-align: left;">Restart Apache.</p>
<p style="text-align: left;">The “LoadModule” line in the configuration file makes the module ready, while the other lines configure and enable it. Put these other lines in the server’s configuration file to affect all sites served by the web server. Or put them within a site’s “VirtualHost” block or in its own “.htaccess” file to affect only that site.</p>
<p style="text-align: left;">The “mod_gzip_on” line enables the module. The “mod_gzip_dechunk” line instructs the module to handle bursty (chunked) output from Perl or PHP scripts (such as the Drupal content management system).</p>
<p style="text-align: left;">The remaining lines tell the module to compress files with .htm, .html, .txt, .css, .js, .php, and .pl file name extensions, the output of CGI scripts, and any output that is text or JavaScript, but not images. The last line tells the module to skip compressing content that is already compressed.</p>
<p style="text-align: left;">Enable file compression using mod_deflate</p>
<p style="text-align: left;">The mod_deflate module comes with Apache 2.x. All you need to do is enable it.</p>
<p style="text-align: left;">Add the following lines to your server configuration file or to a site’s “.htaccess” file:</p>

<p style="text-align: left;">```
<Location />
SetOutputFilter DEFLATE
SetEnvIfNoCase Request_URI
.(?:gif|jpe?g|png)$ no-gzip dont-vary
SetEnvIfNoCase Request_URI
.(?:exe|t?gz|zip|gz2|sit|rar)$ no-gzip dont-vary
</Location>
```
<p style="text-align: left;">Restart Apache.</p>
<p style="text-align: left;">Put the configuration lines in the server’s configuration file to affect all sites served by the web server. Or put them within a site’s “VirtualHost” block or in its “.htaccess” file to affect only that site.</p>
<p style="text-align: left;">The “SetOutputFilter” line enables the module.</p>
<p style="text-align: left;">The next two lines instruct the module to skip compressing image files (.gif, .jpg, .jpeg, .png), executables (.exe), and compressed files (.gz, .tgz, .zip, .gz2, .sit, .rar). Everything else gets compressed</p>
<p style="text-align: left;"><strong>What does it do?</strong></p>
<p style="text-align: left;">The mod_gzip and mod_deflate modules both add file compression features to Apache. When enabled and configured, text-based files and script output is automatically compressed before it is sent to the visitor’s browser. While the effort to compress a file slows down the web server, this slow down is easily offset by the time saved to send the much smaller compressed file. This is particularly true when the server or the site visitor have a slow network connection.</p>
<p style="text-align: left;">Even with file compression enabled and configured, Apache always checks first to see if a visitor’s browser can handle compressed files. Only the oldest web browsers cannot, but if the visitor is using an old browser Apache will skip file compression and send an uncompressed file.</p>
<p style="text-align: left;"><strong>How well does it work?</strong></p>
<p style="text-align: left;">I benchmarked the effect of file compression on two representative test sites: a simple site with a basic page layout, and a complex site with a complex page layout (see my Specifications for Drupal web site testing). Both sites use the Drupal content management system. Both sites have no other performance improvements (e.g., no PHP script cache, no MySQL query cache, and no Drupal page cache or CSS file aggregation). Load times are for each site’s home page, including HTML, CSS, JavaScript, and images. Tests simulated a web page uploaded over a 64Kbps cable modem, such as that used to serve small web sites from a home or small business.</p>
<p style="text-align: left;"><strong>With file compression, the total file size is reduced by 55-65%</strong>.</p>
<p style="text-align: left;"><img class="aligncenter" src="http://nadeausoftware.com/sites/NadeauSoftware.com/files/File_compression_plot_page_size.jpg" alt="" width="300" height="210" /></p>
<p style="text-align: left;"><strong>The total page load times improved by 35-40%</strong>.</p>
<p style="text-align: left;"><img class="aligncenter" src="http://nadeausoftware.com/sites/NadeauSoftware.com/files/File_compression_plot_load_time.jpg" alt="" width="300" height="210" /></p>
<p style="text-align: left;">The simple and complex web sites both benefit substantially from file compression. The complex site has a fancier home page that requires more HTML and CSS, which compresses well. But the complex site also requires more server-side effort to build pages using Drupal. The page load times for the complex site are then much higher than for the simple site, and file compression has less impact on a percentage basis on speeding up the site.</p>
<p style="text-align: left;"><strong>When doesn’t it work?</strong></p>
<p style="text-align: left;">All current web browsers support compression, and these file compression Apache modules work well. They are unlikely to require your further attention once enabled.</p>
<p style="text-align: left;">According to the mod_gzip documentation, very old web browsers prior to Internet Explorer 4, Netscape 6, and Opera 5 do not properly support compressed files. Fortunately, according to monthly browser statistics reported by W3schools.com, these old browsers dropped below 1% market share way back in 2003. While you can configure the compression modules to handle these browsers specially, it hardly seems worth the effort.</p>
<p style="text-align: left;">Internet Explorer 5.5 and 6 had a rare problem with compressed JavaScript files. A patch was distibuted as a service pack back in 2002. It is unlikely that unpatched IE 6 browsers remain a significant part of the user base any more.</p>
<p style="text-align: left;"><strong>What else could be used?</strong></p>
<p style="text-align: left;">PHP has optional obj_gzhandler and zlib output handlers that can automatically compress all data sent from a PHP program. Unfortunately, if the PHP program itself compresses its data (and many of them do), then these output handlers will erroneously compress it a second time. The doubly-compressed data is sent to the visitor’s browser, where it is uncompressed only once, producing the original still-compressed data that then gets displayed as a garbled mess. Since PHP’s output handlers can’t be configured to work properly, make sure that they are disabled by editing your “php.ini” file and setting output_handler to empty and zlib.output_compression to Off. These are the default settings anyway.</p>
<p style="text-align: left;"><strong>Conclusions</strong></p>
<p style="text-align: left;">Enabling a file compression module in Apache provides a huge 35-40% page load time improvement. No other single configuration change I’ve tested has worked as well. Enabling compression should be the first performance change made to any web site.</p>
<p style="text-align: left;"><a href="http://nadeausoftware.com/node/33" target="_blank">Source</a>.</p>
