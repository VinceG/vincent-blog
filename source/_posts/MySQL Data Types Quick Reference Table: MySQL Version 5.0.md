---
title: "MySQL Data Types Quick Reference Table: MySQL Version 5.0"
date: 2009-07-30 12:01:05
categories: 
- "mysql"
- "כללי"
tags: 
- "data"
- "data types"
- "mysql"
- "mysql 5"
- "reference"
- "type"
---

<div style="text-align: left; direction: ltr;">
<h1>MySQL Data Types Quick Reference Table: MySQL Version 5.0</h1>
Learning how to use the MySQL database properly can take quite a bit of time. It is not uncommon to select a less than optimal data type when setting up a new table. Multiple data types are available for each value that you wish to store. This MySQL data type tutorial is intended to help take some of the mystery out of the proper type selections for database columns.

The following is a summary of some of the more commonly used MySQL data types and explanations regarding when each should be used.
<strong>Notes:</strong>
<ul>
	<li><sup>1</sup> Storage will be # of characters or bytes, plus byte(s) to record length.</li>
	<li><sup>2</sup> These String data types are NOT case sensitive, unless given the "binary" attribute or have a case-sensitive CHARACTER SET collation.</li>
	<li>"E" is an abbreviation for "exponent".  E18 means move the decimal over 18 places (search "scientific notation").</li>
	<li>SERIAL DEFAULT VALUE <em>attribute</em> is an alias for "AUTO_INCREMENT NOT NULL UNIQUE".</li>
	<li>SERIAL <em>data type</em> is a synonym for "BIGINT UNSIGNED AUTO_INCREMENT NOT NULL UNIQUE".</li>
	<li>BOOL and BOOLEAN <em>data types</em> are synonyms for TINYINT(1).</li>
	<li>REAL[(M,D)] and DOUBLE PRECISION[(M,D)] <em>datatypes</em> are synonyms for DOUBLE[(M,D)].</li>
	<li>REAL_AS_FLOAT <em>system variable</em> can make REAL[(M,D)] a synonym for FLOAT[(M,D)].</li>
	<li>"UNSIGNED ZEROFILL" <em>attributes</em>: ZEROFILL means if you specify an M value for an integer, it will be padded with zeros to fill up the M spaces. Ex: M=6, integer=247, display="000247". UNSIGNED means no negative values and often expands your range.</li>
	<li>Corresponding non-binary and binary string types:
<ul>
	<li>CHAR vs. BINARY</li>
	<li>VARCHAR vs. VARBINARY</li>
	<li>TEXT vs. BLOB</li>
</ul>
</li>
</ul>
Several of the data types used by MySQL are legacy types, which means that they are based upon data types used during the evolution of relational databases. That is why there appears to be a lot of overlap among different data types.

<strong>What is a BLOB?</strong>
This is one of the first questions that comes up with anyone that is new to relational databases. A BLOB is a binary large object that can hold a variable amount of data. It is not restricted to text characters. You can store images and other objects using BLOBs. If you just want to store text, then use one of the TEXT data types. But if you want to store objects and data other than text, use a BLOB type. The maximum size for a BLOB is determined by its type, BLOB, MEDIUMBLOB, TINYBLOB or LONGBLOB.</div>
