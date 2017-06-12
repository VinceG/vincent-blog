---
title: "Realtor.com PHP library to Search and View"
date: 2014-09-18 21:03:11
categories: 
- "PHP"
- "PHP 5.5"
tags: 
- "library"
- "listings"
- "mls"
- "PHP"
- "realtor"
- "realtor.com"
- "search"
- "view"
---

<article class="markdown-body entry-content">
<h1><a class="anchor" href="#realtorcom-search" name="user-content-realtorcom-search"></a>Realtor.com Search</h1>
<a href="https://github.com/VinceG/realtor.com" target="_blank">View On Github</a>

This is a simple PHP Wrapper for searching Realtor.com and viewing listing information. Please read the realtor.com Terms Of Use before using this library.
<h2><a class="anchor" href="#requirements" name="user-content-requirements"></a>Requirements</h2>
depends on PHP 5.4+, Goutte 2.0+, Guzzle 4+.
<h2><a class="anchor" href="#installation" name="user-content-installation"></a>Installation</h2>
Add vince/realtor.com` as a require dependency in your <tt>composer.json</tt> file:
<pre>php composer.phar require vince/realtor.com:~1.0
</pre>
<h2><a class="anchor" href="#usage" name="user-content-usage"></a>Usage</h2>
<pre>use Realtor\RealtorClient;

$client = new RealtorClient();
</pre>
Make requests with a specific API call method:
<div class="highlight highlight-php">
<pre>// Run search by address
$response = $client-&gt;searchByAddress('5400 Tujunga Ave');
// Run search by address
$response = $client-&gt;getListingsByZip(90021, $perPage[10,20,50], $currentPage=1);
// Run search by address
$response = $client-&gt;getListingsByCityAndState('Los Angeles', 'CA', $perPage[10,20,50], $currentPage=1);
// Run search by address
$response = $client-&gt;getInformation('LISTING FULL URL');
</pre>
</div>
<ul>
	<li>See example directory for example usage. The result will always be an array. refer to the RESULT file to see an example result.</li>
</ul>
<h2><a class="anchor" href="#license" name="user-content-license"></a>License</h2>
MIT license.

</article>
