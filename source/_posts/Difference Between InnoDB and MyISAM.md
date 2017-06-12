---
title: "Difference Between InnoDB and MyISAM"
date: 2009-07-30 11:56:09
---

<p style="text-align: left; direction:ltr;">After reading <a href="http://tapos.wordpress.com/2008/01/10/difference-between-innodb-and-myisam/" target="_blank">Tapos Blog post</a> about the differences between InnoDB and MyISAM database engines i found out that InnoDB does not only support row level locking but more then that, By doing a small fast research i came to those main differences:</p>
<p style="text-align: left;direction:ltr;"><!--more--></p>

<ul style="text-align: left; direction:ltr;">
	<li>The big difference between MySQL Table Type MyISAM and InnoDB is that InnoDB supports transaction</li>
	<li>InnoDB is for high volume, high performance</li>
	<li>MYISAM does not support the foreign key constraint but InnoDB support it.</li>
	<li>MYISAM is faster then the InnoDB but in case of perforing the count operation it takes more time then the InnoDB.</li>
	<li>MYISAM occupies less memory sapce for tables rather than InnoDB tables.</li>
</ul>
<p style="text-align: left;direction:ltr;">Ultimately i think for a high level application InnoDB should be used. Otherwise MyISAM should do the job quite well.</p>
<p style="text-align: left;direction:ltr;">If you would like to get a little more information about the performance of the two then there was a benchmark done <a href="http://www.mysqlperformanceblog.com/2007/01/08/innodb-vs-myisam-vs-falcon-benchmarks-part-1/" target="_blank">here</a> that shows some good results.</p>
