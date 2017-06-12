---
title: "Enterprise Applications - Making Them Social"
date: 2014-02-10 07:47:15
categories: 
- "apache"
- "api"
- "bootstrap"
- "frameworks"
- "jquery"
- "mysql"
- "PHP"
- "php 5.3"
- "PHP 5.5"
tags: 
- "ajax"
- "application"
- "bootstrap"
- "enterprise"
- "framework"
- "jquery"
- "PHP"
- "rebuild"
- "redesign"
- "social"
- "yii"
---

I've been working full time for a company in the real estate industry for nearly two years now. As the senior developer i'd had the opportunity to use and experience with various technologies, services and tools that i haven't used before. I've developed the entire company software, tools they use and the iPhone App that is available for free on the Apple App Store.

When i started working back in July 2012 they hired me after they acquired a software they wanted to use that was poorly coded, used several different frameworks along with custom scripts and native PHP which made everything a big mess, not to mention the UI and design was horrible. since from a financial standpoint, timeframes and deadlines i couldn't start from scratch so we had to use the software as is, just fix and rebuild as the staff was working on it while trying to write good clean separated code as we moved forward.

I'll list some of the pages that were redesigned and rebuilt in order to make a better user experience and a better application workflow overall.

Some info about the technologies being used:
<ul>
	<li>jQuery</li>
	<li>Bootstrap</li>
	<li>PhoneGap (HTML5, JS, CSS, Jquery Mobile)</li>
	<li>PHP 5.4</li>
	<li>Yii Framework (API)</li>
	<li>MySQL</li>
	<li>AWS (EC2, RDS, DynamoDB, SES, SQS, S3, ELB, IAM, ElastiCache, CloudFront)</li>
</ul>
Stats:
<ul>
	<li>2 Large EC2 Instances</li>
	<li>1 RDS database 1 read replication (&gt; 10 Million Records and &gt; 11 GB)</li>
	<li>3 S3 Buckets (over 1TB of files)</li>
	<li>~50,000 Emails sent monthly</li>
	<li>35 Cron jobs</li>
	<li>1 developer</li>
	<li>8,666 Github Commits (Started May 29 2012)</li>
	<li>20 Months, 3,200 hours</li>
</ul>
<h3>Order Page</h3>
The original order page was built in 3-4 different pages, meaning the user was to fill the first page, click continue and the order id was created and the basic info was set, then they'll move to the second page for some more info, third page is the payment info and forth is the order completion message.

The new redesign is a single page, that uses bootstrap, wizard and ajax save and validation on a single page. Each step the data is validated and saved if the page refreshes the user goes back where he last left of.

Old:

<a href="/assets/2014/02/photofun-565817540.jpg"><img class="alignnone  wp-image-1554" alt="photofun-565817540" src="/assets/2014/02/photofun-565817540-300x296.jpg" width="180" height="178" /></a>

&nbsp;

New:

<a href="/assets/2014/02/photofun-2102123463.jpg"><img class="alignnone  wp-image-1583" alt="photofun-2102123463" src="/assets/2014/02/photofun-2102123463-300x268.jpg" width="180" height="161" /></a><img class="alignnone  wp-image-1559" alt="photofun-758811445" src="/assets/2014/02/photofun-758811445-300x203.jpg" width="180" height="122" /><a href="/assets/2014/02/photofun-758810379.jpg"><img class="alignnone  wp-image-1560" alt="photofun-758810379" src="/assets/2014/02/photofun-758810379-300x190.jpg" width="180" height="114" /></a>

&nbsp;
<h3>Order Management &amp; view</h3>
The staff needed to manage and make sure each order is being updated and completed in time. each update involved a log entry, in some cases a phone call and an email. The design for the old application management screen was plain, not user friendly and usually things were not working as they should've.

The new look on the other hand is designed for readability, user experience and easier handling for the staff for each order (New style includes a lot more features that will be discussed shortly).

Old:

<a href="/assets/2014/02/photofun-683311300.jpg"><img class="alignnone  wp-image-1555" alt="photofun-683311300" src="/assets/2014/02/photofun-683311300-300x250.jpg" width="180" height="150" /></a><a href="/assets/2014/02/photofun-68336497.jpg"><img class="alignnone  wp-image-1556" alt="photofun-68336497" src="/assets/2014/02/photofun-68336497-300x244.jpg" width="180" height="146" /></a><a href="/assets/2014/02/photofun-68333967.jpg"><img class="alignnone  wp-image-1557" alt="photofun-68333967" src="/assets/2014/02/photofun-68333967-300x256.jpg" width="180" height="154" /></a>

New:

<a href="/assets/2014/02/Screen-Shot-2014-02-05-at-4.59.01-PM.png"><img class="alignnone  wp-image-1571" alt="Screen Shot 2014-02-05 at 4.59.01 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-4.59.01-PM-300x236.png" width="180" height="142" /></a><a href="/assets/2014/02/Screen-Shot-2014-02-05-at-5.01.46-PM.png"><img class="alignnone  wp-image-1568" alt="Screen Shot 2014-02-05 at 5.01.46 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-5.01.46-PM-272x300.png" width="163" height="180" /></a>

&nbsp;

&nbsp;
<h3>Other Features:</h3>
<strong>Currently Viewing &amp; Last Viewed</strong>

With more than one staff member usually taking care of the same order it often occurs that one staff member will be working on the same file at the same time, causing multiple emails and phone calls to the same client. We've added the last viewed section on the middle left and currently viewing underneath it to show who last viewed this file and when and who is currently viewing it. If someone enters the file a little Notification at the top right of the screen will appear notifying the user who just entered this order and is viewing it. This also applies to clients entering the order on their own dashboard.

<a href="/assets/2014/02/Screen-Shot-2014-02-05-at-5.01.15-PM.png"><img class="alignnone size-full wp-image-1570" alt="Screen Shot 2014-02-05 at 5.01.15 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-5.01.15-PM.png" width="203" height="233" /></a>

&nbsp;

<strong> Auto Assignment Dashboard</strong>

There was a need to create a system that will assign each staff member the order that he is supposed to work on right now and the next one in line. each order placed in line is based on certain parameters, if the order is currently viewed and worked on by another staff member it will not show up in the auto assignment (for example), each staff can see how many he has worked on today, how many are left, other staff members working on what orders and some stats on times that it took to work on a certain order and total time worked on orders today. At the bottom of the order screen they can set when this file should be revisited.

<a href="/assets/2014/02/Screen-Shot-2014-02-05-at-5.01.28-PM.png"><img class="alignnone  wp-image-1569" alt="Screen Shot 2014-02-05 at 5.01.28 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-5.01.28-PM-142x300.png" width="85" height="180" /></a><a href="/assets/2014/02/Screen-Shot-2014-02-05-at-4.59.01-PM.png"><img class="alignnone  wp-image-1571" alt="Screen Shot 2014-02-05 at 4.59.01 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-4.59.01-PM-300x236.png" width="180" height="142" /></a>

&nbsp;

&nbsp;

<strong>Activity Log</strong>

The activity log is all log messages added to each order, staff members can add log entries, emails sent and received regarding this files are also logged and can be viewed by clicking the linkable title, if a client send a support ticket it will also log that. if someone creates an activity log while a staff member is viewing the order page the activity log will refresh and a little notification at the top page will show notifying the user of a new X activity logs. they can also filter them based on certain pre-made filters (show all, show only client, show only emails, show only yours etc...)

<a href="/assets/2014/02/Screen-Shot-2014-02-05-at-5.01.46-PM.png"><img class="alignnone  wp-image-1568" alt="Screen Shot 2014-02-05 at 5.01.46 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-5.01.46-PM-272x300.png" width="163" height="180" /></a>

&nbsp;

&nbsp;

<strong>Active Users &amp; Active iPhone App Users</strong>

We need to know who was using the website at any given time, staff members and clients. we also wanted to log all the activity and usage on the mobile application, so we created the active users page to do just that.

<a href="/assets/2014/02/Screen-Shot-2014-02-05-at-5.04.52-PM.png"><img class="alignnone  wp-image-1566" alt="Screen Shot 2014-02-05 at 5.04.52 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-5.04.52-PM-300x238.png" width="180" height="143" /></a><a href="/assets/2014/02/Screen-Shot-2014-02-05-at-5.05.12-PM.png"><img class="alignnone  wp-image-1565" alt="Screen Shot 2014-02-05 at 5.05.12 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-5.05.12-PM-300x279.png" width="180" height="167" /></a>

&nbsp;

&nbsp;

<strong>Calendar &amp; Admin Dashboard Notifications</strong>

Each staff member can create their own individual private events in the calendar, they can also create public events and select who will see that even in their calendar. on the day of the event they receive a notification and the calendar tab is highlighted red.

<a href="/assets/2014/02/Screen-Shot-2014-02-05-at-5.04.10-PM.png"><img class="alignnone  wp-image-1563" alt="Screen Shot 2014-02-05 at 5.04.10 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-5.04.10-PM-300x208.png" width="180" height="125" /></a><a href="/assets/2014/02/Screen-Shot-2014-02-05-at-5.03.35-PM.png"><img class="alignnone  wp-image-1562" alt="Screen Shot 2014-02-05 at 5.03.35 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-5.03.35-PM-300x60.png" width="180" height="36" /></a>

<strong>Social Notifications</strong>

Recent addition was the social alert navigation bar, which basically shows any new alerts added for this staff member. when someone assigns a support ticket, creates a log entry with the staff member name linked it will create an alert to let the staff member know.

<a href="/assets/2014/02/Screen-Shot-2014-02-05-at-4.57.40-PM.png"><img class="alignnone  wp-image-1561" alt="Screen Shot 2014-02-05 at 4.57.40 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-4.57.40-PM-300x54.png" width="180" height="32" /></a>

<strong>Assignment Page</strong>

In order to provide the best results the assignment page was rebuilt and designed to make the assignment process easier. each order will show the closest X appraisers to the property with useful information for the engager to determine who to assign this to by calling or sending emails/invites to the appraisers.

<a href="/assets/2014/02/Screen-Shot-2014-02-05-at-5.04.26-PM.png"><img class="alignnone  wp-image-1567" alt="Screen Shot 2014-02-05 at 5.04.26 PM" src="/assets/2014/02/Screen-Shot-2014-02-05-at-5.04.26-PM-300x226.png" width="180" height="136" /></a>

&nbsp;
<h3>API</h3>
We've built an API so third party companies can integrate with our software and service. we also use the same API for the iPhone application we've built.

<a href="/assets/2014/02/photofun-184061529.jpg"><img class="alignnone  wp-image-1578" alt="photofun-184061529" src="/assets/2014/02/photofun-184061529-300x198.jpg" width="180" height="119" /></a> <a href="/assets/2014/02/photofun-1881615018.jpg"><img class="alignnone  wp-image-1579" alt="photofun-1881615018" src="/assets/2014/02/photofun-1881615018-300x148.jpg" width="180" height="89" /></a> <a href="/assets/2014/02/photofun-1881615030.jpg"><img class="alignnone  wp-image-1580" alt="photofun-1881615030" src="/assets/2014/02/photofun-1881615030-300x135.jpg" width="180" height="81" /></a> <a href="/assets/2014/02/photofun-1840512626.jpg"><img class="alignnone  wp-image-1581" alt="photofun-1840512626" src="/assets/2014/02/photofun-1840512626-300x172.jpg" width="180" height="103" /></a>

Those changes and hundreds others make the daily task of managing and running the company an easier task. Some of the features included can be seen by just looking at the Admin Dashboard.

<a href="/assets/2014/02/photofun-149629590.jpg"><img class="alignnone  wp-image-1576" alt="photofun-149629590" src="/assets/2014/02/photofun-149629590-300x292.jpg" width="180" height="175" /></a>
