---
title: "Yii - Version 1.0.11 Released"
date: 2009-12-17 12:54:28
---

<div style="direction: ltr; text-align: left;">

"The 1.0.11 release is a maintenance release over the previous 1.0 releases. It includes about ten bug fixes and many minor feature enhancements. Please check the change log for complete list of changes."

<!--more-->

Yii development team have just released the new version of the Yii 1.0 series, The Yii 1.0.11.

One of the main feature enhancements is Parameterizing Hostnames. Meaning you can have URLs like:

http://en.domain.com/page/1

And retrieve the 'en' part of the sub-domain name as one of th _GET parameters. More info about this can be found <a href="http://www.yiiframework.com/doc/guide/topics.url" target="_blank">here</a>

Complete change log:
<pre>Version 1.0.11 December 13, 2009
--------------------------------
- Bug #608: yiic webapp command may generate incorrect path referring to yii scripts (Qiang)
- Bug #637: CDateTimeParser::parse() may generate unexpected result offset by the timezone in some environment (Qiang)
- Bug #639: CJSON::decode() should respect the second parameter recursively (Qiang)
- Bug #641: CDbCache::gc() is not defined (Qiang)
- Bug #651: Fixed a bug in Oracle driver that may cause big loop (Qiang)
- Bug #653: CDbMessageSource does translate messages when caching is enabled (Qiang)
- Bug #670: Requirements checker page shows wrong minute (Qiang)
- Bug #691: CUploadedFile::saveAs() may not return correct value for some PHP versions (Qiang)
- Bug #692: CHtml::listOptions() ignores the HTML options when handling nested options (Qiang)
- Bug #710: CRequiredValidator does not work as expected when its requiredValue is not null (Qiang)
- Bug: CQueue::peek() should return the first item in the queue (Qiang)
- Enh #629: Added support for specifying shell command search path via an environment variable YIIC_SHELL_COMMAND_PATH (Qiang)
- Enh #643: Enhanced CAccessControlFilter::expression, COutputCache::varyByExpression and CExpressionDependency::expression so that they can use PHP callback (Qiang)
- Enh #665: Added support for using CStarRating to collect tabular input (Qiang)
- Enh #672: Added Italian translation of error views (Qiang)
- Enh #674: Improved CPgsqlSchema to support auto-incremental column in composite primary  key (Qiang)
- Enh #677: Improved CPgsqlColumnSchema to recognize more column data types (Qiang)
- Enh #679: Added support for parsing and creating URLs with parameterized hostnames (Qiang)
- Enh #684: Improved Yii::import() to throw exception when set_include_path fails (Qiang)
- Enh #685: Added support for recognizing "Z" in CDateFormatter (Qiang)
- Enh #690: Enhanced the email validator pattern to capture 99% valid email addresses (Qiang)
- Enh #694: CActiveRecord count methods will ignore criterias that are incomatible with COUNT SQL statement (Qiang)
- Enh #697: Relational AR queries now also invoke CActiveRecord::beforeFind() (Qiang)
- Enh #703: Upgraded autocomplete js code to version 1.1.0 (Qiang)
- Enh #715: CHtml::textArea and CHtml::activeTextArea should respect the 'encode' option (Qiang)
- Enh: Added core message translation in Thai (Peerajak)
- Enh: Allow CHtml::label() and CHtml::activeLabel() not to render the 'for' attribute when it is set false (Qiang)
- Chg #723: When merging a CDbCriteria with another, the latter's order clause will take precedence over the former (Qiang)
- New #709: Added core message translation in Bosnian language (kenci81)</pre>
</div>
