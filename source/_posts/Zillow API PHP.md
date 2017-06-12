---
title: "Zillow API PHP"
date: 2014-09-16 23:43:34
---

<div id="readme" class="blob instapaper_body"><article class="markdown-body entry-content">
<h1><a class="anchor" href="#zillow-php-wrapper" name="user-content-zillow-php-wrapper"></a>Zillow, PHP Wrapper</h1>
This is a simple PHP Wrapper for the Zillow API services.

<a href='https://github.com/VinceG/zillow' target='_blank'>Visit Github</a>

<a href="https://travis-ci.org/VinceG/zillow"><img style="max-width: 100%;" src="https://camo.githubusercontent.com/bf0d5b82529cd4e3f8c99edbf2c0f3dfc75837dd/68747470733a2f2f7472617669732d63692e6f72672f56696e6365472f7a696c6c6f772e7376673f6272616e63683d6d6173746572" alt="https://travis-ci.org/VinceG/zillow.svg?branch=master" data-canonical-src="https://travis-ci.org/VinceG/zillow.svg?branch=master" /></a>
<h2><a class="anchor" href="#requirements" name="user-content-requirements"></a>Requirements</h2>
depends on PHP 5.4+, Goutte 2.0+, Guzzle 4+.
<h2><a class="anchor" href="#installation" name="user-content-installation"></a>Installation</h2>
Add VinceG/zillow` as a require dependency in your <tt>composer.json</tt> file:
<pre>php composer.phar require vinceg/zillow:~1.0
</pre>
<h2><a class="anchor" href="#usage" name="user-content-usage"></a>Usage</h2>
<pre>use Zillow\ZillowClient;

$client = new ZillowClient('ZWSID');
</pre>
Make requests with a specific API call method:
<pre>// Run GetSearchResults
$response = $client-&gt;GetSearchResults(['address' =&gt; '5400 Tujunga Ave', 'citystatezip' =&gt; 'North Hollywood, CA 91601']);
</pre>
Any Zillow API call will work. Valid callbacks are:
<ul>
	<li>GetZestimate</li>
	<li>GetSearchResults</li>
	<li>GetChart</li>
	<li>GetComps</li>
	<li>GetDeepComps</li>
	<li>GetDeepSearchResults</li>
	<li>GetUpdatedPropertyDetails</li>
	<li>GetDemographics</li>
	<li>GetRegionChildren</li>
	<li>GetRegionChart</li>
	<li>GetRateSummary</li>
	<li>GetMonthlyPayments</li>
	<li>CalculateMonthlyPaymentsAdvanced</li>
	<li>CalculateAffordability</li>
	<li>CalculateRefinance</li>
	<li>CalculateAdjustableMortgage</li>
	<li>CalculateMortgageTerms</li>
	<li>CalculateDiscountPoints</li>
	<li>CalculateBiWeeklyPayment</li>
	<li>CalculateNoCostVsTraditional</li>
	<li>CalculateTaxSavings</li>
	<li>CalculateFixedVsAdjustableRate</li>
	<li>CalculateInterstOnlyVsTraditional</li>
	<li>CalculateHELOC</li>
</ul>
<h2><a class="anchor" href="#license" name="user-content-license"></a>License</h2>
MIT license.

</article></div>
