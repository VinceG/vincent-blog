---
title: "Yii - PHP Coding Standards (draft)"
date: 2009-07-13 22:49:23
categories: 
- "frameworks"
- "PHP"
- "yii"
tags: 
- "coding standards"
- "framework"
- "PHP"
- "yii"
---

<div style="direction: ltr; text-align: left;">
<div style="text-align: left; direction: ltr;">Taken from the Zend Framework PHP coding standards, The document was altered and modified to use with Yii framework. If you see anything that needs improvement let me know and i will update it.</div>
<div style="text-align: left; direction: ltr;"><!--more--></div>
<div style="text-align: left; direction: ltr;">
<h2>Yii - PHP Coding Standards (draft)</h2>
</div>
<p class="MsoNormal" style="line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Scope</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">This document provides the coding standards and guidelines for developers and teams working together on projects. The subjects covered are:</span></p>

<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">PHP File Formatting</span></li>
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Naming Conventions</span></li>
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Coding Style</span></li>
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Inline Documentation</span></li>
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Errors and Exceptions</span></li>
</ul>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Goals"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Goals</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Good coding standards are important in any development project, particularly when multiple developers are working on the same project. Having coding standards helps to ensure that the code is of high quality, has fewer bugs, and is easily maintained.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Abstract goals we strive for:</span></p>

<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">extreme simplicity</span></li>
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Tool friendliness, such as use of method      signatures, constants, and patterns that support IDE tools and      auto-completion of method, class, and constant names.</span></li>
</ul>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">When considering the goals above, each situation requires an examination of the circumstances and balancing of various trade-offs.</span></p>
<p class="MsoNormal" style="line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">PHP File Formatting</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-General"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">General</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">For files that contain only PHP code, the closing tag ("?&gt;") is to be omitted. It is not required by PHP, and omitting it prevents trailing whitespace from being accidentally injected into the output.</span></p>

<table class="MsoNormalTable" border="0" cellpadding="0">
<tbody>
<tr>
<td style="padding: 0.75pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"></p>
</td>
<td style="padding: 0.75pt;">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Important</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Inclusion of   arbitrary binary data as permitted by __HALT_COMPILER () is prohibited from   any PHP file or files derived from them. Use of this feature is only   permitted for special installation scripts.</span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Indentation"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Indentation</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Use an indent of 4 spaces with no tab characters. Editors should be configured to treat tabs as spaces in order to prevent injection of tab characters into the source code.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-MaximumLineLeng"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Maximum Line Length</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The target line length is 80 characters; i.e., developers should aim keep code as close to the 80-column boundary as is practical. However, longer lines are acceptable. The maximum length of any line of PHP code is 120 characters.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-LineTermination"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Line Termination</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Line termination is the standard way for UNIX text files. Lines must end only with a linefeed (LF). Linefeeds are represented as ordinal 10, or hexadecimal 0x0A.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Do not use carriage returns (CR) like Macintosh computers (0x0D).</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Do not use the carriage return/linefeed combination (CRLF) as Windows computers (0x0D, 0x0A).</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Lines should not contain trailing spaces. In order to facilitate this convention, most editors can be configured to strip trailing spaces, such as upon a save operation.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-NamingConventio"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Naming Conventions</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-AbstractionsUse"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Abstractions Used in API (Class Interfaces)</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">When creating an API for use by application developers if application developers must identify abstractions using a compound name, separate the names using underscores, not camelCase. For example, the name used for the MySQL PDO driver is 'pdo_mysql', not 'pdoMysql'. When the developer uses a string, normalize it to lowercase. Where reasonable, add constants to support this (e.g. PDO_MYSQL).</span></p>
<p class="MsoNormal" style="line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Classes</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The Yii Framework employs a class naming convention whereby the names of the classes directly map to the directories in which they are stored. The root level directory of the Yii Framework is the "framework/" directory, under which all classes are stored hierarchically.</span></p>

<pre><span style="font-size: 11pt; font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Class names may only contain alphanumeric characters. Numbers are permitted in class names but are discouraged. Dot (.) is only permitted in place of the path separator. For example, the filename "framework/web/CController.php" must map to the class name "CController".</span></pre>
<pre><span style="font-size: 11pt; font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Yii uses path aliases extensively. A path alias is associated with a directory or file path. It is specified in dot syntax, similar to that of widely adopted namespace format:</span></pre>
<pre><span style="font-size: 11pt; font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">RootAlias.path.to.target</span></pre>
<pre><span style="font-size: 11pt; font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">* system: refers to the Yii framework directory; </span></pre>
<pre><span style="font-size: 11pt; font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">* application: refers to the application's base directory; </span></pre>
<pre><span style="font-size: 11pt; font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">* webroot: refers to the directory containing the entry script file. This alias has been available since version 1.0.3</span></pre>
<pre><span style="font-size: 11pt; font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">It will be mapped under the Yii framework as ‘system.web.ccontroller’ using the Yii:import method. </span></pre>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">If a class name is comprised of more than one word, the first letter of each new word must be capitalized. Successive capitalized letters are not allowed; e.g., a class "Test_CLASS" is not allowed, while "Test_Class" is acceptable.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Yii Framework classes that are authored by Yii or one of the participating partner companies and distributed with the Framework must always start with the letter "C” and must be stored under the "framework/" directory hierarchy accordingly.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">These are examples of acceptable names for classes:</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">CController</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">My_Class</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Test_Class</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>

<table class="MsoNormalTable" border="0" cellpadding="0">
<tbody>
<tr>
<td style="padding: 0.75pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"></p>
</td>
<td style="padding: 0.75pt;">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Important</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Code that   operates with the framework but is not part of the framework, such as code   written by a framework end-user and not Yii or one of the framework's partner   companies, must never start with "C”</span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Interfaces"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Interfaces</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Interface classes must follow the same conventions as other classes (see above), but must end with "_Interface", such as in these examples:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">My_Class_Interface </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Filenames"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Filenames</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">For all other files, only alphanumeric characters, underscores, and the dash character ("-") are permitted. Spaces are prohibited.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Any file that contains any PHP code must end with the extension ".php" (except View scripts, which end in ".phtml" by default). These examples show the acceptable filenames for containing the class names from the examples in the section above:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">My/Class.php </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Test/Controller/Front.php </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Site/View/Helper/FormRadio.php </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">File names must follow the mapping to class names described above.</span></p>
<p class="MsoNormal" style="line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Functions and Methods</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Function names may only contain alphanumeric characters. Underscores are not permitted. Numbers are permitted in function names but are discouraged.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Function names must always start with a lowercase letter. When a function name consists of more than one word, the first letter of each new word must be capitalized. This is commonly called the "camelCase" method.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Verbosity is encouraged. Function names should be as illustrative as is practical to enhance understanding.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">These are examples of acceptable names for functions:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">filterInput() </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">getElementById() </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">widgetFactory() </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">For object-oriented programming, accessors for object members should always be prefixed with either "get" or "set". When using design patterns, such as the Singleton or Factory patterns, the name of the method should contain the pattern name where practical to make the pattern more readily recognizable.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Though function names may not contain the underscore character, class methods that are declared as protected or private must begin with a single underscore, as in the following example:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">class Foo_Bar </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> protected function _fooBar() </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> // ... </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> } </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Functions in the global scope, or "floating functions," are permitted but discouraged. It is recommended that these functions be wrapped in a class and declared static.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Functions or variables declared with a "static" scope in a class generally should not be "private", but protected instead. Use "final" if the function should not be extended.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-OptionalParamet"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Optional Parameters</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Use "null" as the default value instead of "false", for situations like this:</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">public function foo($required, $optional = null)</span></p>
<p class="MsoNormal" style="line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">When</span></strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> $optional does not have or need a particular default value.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">However, if an optional parameter is boolean, and its logical default value should be true, or false, then using true or false is acceptable.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Variables"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Variables</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Variable names may only contain alphanumeric characters. Underscores are not permitted. Numbers are permitted in variable names but are discouraged.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">For class member variables that are declared with the private or protected construct, the first character of the variable name must be a single underscore. This is the only acceptable usage of an underscore in a variable name. Member variables declared as "public" may never start with an underscore. For example:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">class Foo_Bar </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> protected $_bar; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Like function names, variable names must always start with a lowercase letter and follow the "camelCase" capitalization convention.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Verbosity is encouraged. Variable names should always be as verbose as practical. Terse variable names such as "$i" and "$n" are discouraged for anything other than the smallest loop contexts. If a loop contains more than 20 lines of code, variables for such indices or counters need to have more descriptive names.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Constants"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Constants</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Constants may contain both alphanumeric characters and the underscore. Numbers are permitted in constant names.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Constant names must always have all letters capitalized.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">To enhance readability, words in constant names must be separated by underscore characters. For example, "EMBED_SUPPRESS_EMBED_EXCEPTION" is permitted but "EMBED_SUPPRESSEMBEDEXCEPTION" is not.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Constants must be defined as class members by using the "const" construct. Defining constants in the global scope with "define" is permitted but discouraged.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-BooleansandtheN"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Booleans and the NULL Value</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Unlike PHP's documentation, the Yii Framework uses lowercase for both boolean values and the "null" value.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-CodingStyle"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Coding Style</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-PHPCodeDemarcat"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">PHP Code Demarcation</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">PHP code must always be delimited by the full-form, standard PHP tags (although you should see the note about </span><a href="http://framework.zend.com/wiki/display/ZFDEV/PHP+Coding+Standard+%28draft%29#PHPCodingStandard%28draft%29-General"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;; color: windowtext; text-decoration: none;">the closing PHP tag</span></a><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">):</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">&lt;?php </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">?&gt; </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Short tags are never allowed.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Strings"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Strings</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-StringLiterals"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">String Literals</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">When a string is literal (contains no variable substitutions), the apostrophe or "single quote" must always used to demarcate the string:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">$a = 'Example String'; </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-StringLiteralsC"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">String Literals Containing Apostrophes</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">When a literal string itself contains apostrophes, it is permitted to demarcate the string with quotation marks or "double quotes". This is especially encouraged for SQL statements:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">$sql = "SELECT `id`, `name` from `people` WHERE `name`='Fred' OR `name`='Susan'"; </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The above syntax is preferred over escaping apostrophes.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-VariableSubstit"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Variable Substitution</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Variable substitution is permitted using either of these two forms:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">$greeting = "Hello $name, welcome back!"; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">$greeting = "Hello {$name}, welcome back!"; </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">For consistency, this form is not permitted:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">$greeting = "Hello ${name}, welcome back!"; </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-StringConcatena"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">String Concatenation</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Strings may be concatenated using the "." operator. A space must always be added before and after the "." operator to improve readability:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">$company = ‘This’   . ‘ is’ . ‘ a test’; </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">When concatenating strings with the "." operator, it is permitted to break the statement into multiple lines to improve readability. In these cases, each successive line should be padded with whitespace such that the "." operator is aligned under the "=" operator:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">$sql = "SELECT `id`, `name` FROM `people` " </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> <span> </span> . "WHERE `name` = 'Susan' " </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> <span> </span>. "ORDER BY `name` ASC "; </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Arrays"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Arrays</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-NumericallyInde"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Numerically Indexed Arrays</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Negative numbers are not permitted as array indices.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">An indexed array may be started with any non-negative number, however this is discouraged and it is recommended that all arrays have a base index of 0.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">When declaring indexed arrays with the array construct, a trailing space must be added after each comma delimiter to improve readability:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">$sampleArray = array(1, 2, 3, ‘test’,   ‘Yii’); </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">It is also permitted to declare multi-line indexed arrays using the array construct. In this case, each successive line must be padded with spaces such that beginning of each line aligns as shown below:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">$sampleArray = array(1, 2, 3, 'Zend', 'Studio', </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> <span> </span> $a, $b, $c, </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> <span> </span>56.44, $d, 500); </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-AssociativeArra"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Associative Arrays</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">When declaring associative arrays with the array construct, it is encouraged to break the statement into multiple lines. In this case, each successive line must be padded with whitespace such that both the keys and the values are aligned:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">$sampleArray = array('firstKey'  =&gt; 'firstValue', </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> <span> </span> 'secondKey' =&gt; 'secondValue'); </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Classes</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-ClassDeclaratio"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Class Declarations</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Classes must be named by following the naming conventions.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The brace is always written on the line underneath the class name ("one true brace" form).</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Every class must have a documentation block that conforms to the phpDocumentor standard.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Any code within a class must be indented the standard indent of four spaces.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Only one class is permitted per PHP file.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Placing additional code in a class file is permitted but discouraged. In these files, two blank lines must separate the class from any additional PHP code in the file.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">This is an example of an acceptable class declaration:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">/**</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * Class Docblock Here</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> */ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">class Test_Class </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> // entire content of class </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> // must be indented four spaces </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-ClassMemberVari"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Class Member Variables</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Member variables must be named by following the variable naming conventions.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Any variables declared in a class must be listed at the top of the class, prior to declaring any functions.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The var construct is not permitted. Member variables always declare their visibility by using one of the private, protected, or public constructs. Accessing member variables directly by making them public is permitted but discouraged in favor of accessor methods having the set and get prefixes.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-FunctionsandMet"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Functions and Methods</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Function and Method Declaration</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Functions and class methods must be named by following the naming conventions.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Methods must always declare their visibility by using one of the private, protected, or public constructs.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Following the more common usage in the PHP developer community, static methods should declare their visibility first:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">public static foo() { ... } </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">private static bar() { ... } </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">protected static goo() { ... } </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">As for classes, the opening brace for a function or method is always written on the line underneath the function or method name ("one true brace" form). There is no space between the function or method name and the opening parenthesis for the arguments.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">This is an example of acceptable class method declarations:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">/**</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * Class Docblock Here</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> */ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">class Bar_Foo </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> /**</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * Method Docblock Here</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> */ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> public function sampleMethod($a) </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> // entire content of function </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> // must be indented four spaces </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> } </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> /**</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * Method Docblock Here</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> */ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> protected function _anotherMethod() </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> // ... </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> } </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>

<table class="MsoNormalTable" border="0" cellpadding="0">
<tbody>
<tr>
<td style="padding: 0.75pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"></p>
</td>
<td style="padding: 0.75pt;">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Please note</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Passing   function or method arguments by reference is only permitted by defining the   reference in the function or method declaration, as in the following example:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">function sampleMethod(&amp;$a) </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Call-time   pass by-reference is prohibited.</span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The return value must not be enclosed in parentheses. This can hinder readability and can also break code if a function or method is later changed to return by reference.</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">function foo() </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> // WRONG </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> return($this-&gt;bar); </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> // RIGHT </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> return $this-&gt;bar; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The use of </span><a href="http://php.net/manual/en/language.oop5.typehinting.php"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;; color: windowtext; text-decoration: none;">type hinting</span></a><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> is encouraged where possible with respect to the component design. For example,</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">class Test_Component </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> public function foo(SomeInterface $object) </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> {} </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> public function bar(array $options) </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> {} </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Where possible, try to keep your use of exceptions vs. type hinting consistent, and not mix both approaches at the same time in the same method for validating argument types. However, before PHP 5.2, "Failing to satisfy the type hint results in a fatal error," and might fail to satisfy other coding standards involving the use of throwing exceptions. Beginning with PHP 5.2, failing to satisfy the type hint results in an E_RECOVERABLE_ERROR, requiring developers to deal with these from within a custom error handler, instead of using a try..catch block.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-FunctionandMeth"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Function and Method Usage</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Function arguments are separated by a single trailing space after the comma delimiter. This is an example of an acceptable function call for a function that takes three arguments:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">threeArguments(1, 2, 3); </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Call-time pass by-reference is prohibited. Arguments to be passed by reference must be defined in the function declaration.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">For functions whose arguments permit arrays, the function call may include the "array" construct and can be split into multiple lines to improve readability. In these cases, the standards for writing arrays still apply:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">threeArguments(array(1, 2, 3), 2, 3); </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">threeArguments(array(1, 2, 3, 'Yii’, </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> <span> </span>$a, $b, $c, </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> <span> </span>56.44, $d, 500), 2, 3); </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-ControlStatemen"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Control Statements</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-If/Else/Elseif"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">If / Else / Elseif</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Control statements based on the "if", "else", and "elseif" constructs must have a single space before the opening parenthesis of the conditional, and a single space between the closing parenthesis and opening brace.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Within the conditional statements between the parentheses, operators must be separated by spaces for readability. Inner parentheses are encouraged to improve logical grouping of larger conditionals.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The opening brace is written on the same line as the conditional statement. The closing brace is always written on its own line. Any content within the braces must be indented four spaces.</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">if ($a != 2) { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> $a = 2; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">For "if" statements that include "elseif" or "else", the formatting must be as in these examples:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">if ($a != 2) { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> $a = 2; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} else { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> $a = 7; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">if ($a != 2) { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> $a = 2; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} else if ($a == 3) { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> $a = 4; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} else { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> $a = 7; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">PHP allows for these statements to be written without braces in some circumstances. The coding standard makes no differentiation and all "if", "elseif", or "else" statements must use braces.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Use of the "elseif" construct is permitted but highly discouraged in favor of the "else if" combination.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Switch"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Switch</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Control statements written with the "switch" construct must have a single space before the opening parenthesis of the conditional statement, and also a single space between the closing parenthesis and the opening brace.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">All content within the "switch" statement must be indented four spaces. Content under each "case" statement must be indented an additional four spaces.</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">switch ($numPeople) { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> case 1: </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> break; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> case 2: </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> break; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> default: </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> break; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The construct "default" may never be omitted from a "switch" statement.</span></p>

<table class="MsoNormalTable" border="0" cellpadding="0">
<tbody>
<tr>
<td style="padding: 0.75pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"></p>
</td>
<td style="padding: 0.75pt;">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Please note</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">It is   sometimes useful to write a "case" statement which falls through to   the next case by not including a "break" or "return". To   distinguish these cases from bugs, such "case" statements must   contain the comment "// break intentionally omitted".</span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-InlineDocumenta"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Inline Documentation</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-DocumentationFo"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Documentation Format</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">All documentation blocks ("docblocks") must be compatible with the phpDocumentor format. Describing the phpDocumentor format is beyond the scope of this document. For more information, visit </span><a href="http://phpdoc.org/"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;; color: windowtext; text-decoration: none;">http://phpdoc.org</span></a><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">All source code file written for the Yii Framework or that operates with the framework must contain a "file-level" docblock at the top of each file and a "class-level" docblock immediately above each class. Below are examples of such docblocks.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The sharp, '#', character should not be used to start comments.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Files"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Files</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Every file that contains PHP code must have a header block at the top of the file that contains these phpDocumentor tags at a minimum:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">/**</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * Short description for file</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> *</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * Long description for file (if any)...</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> *</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * LICENSE: Some license information</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> *</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * @copyright  2006 Yii</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * @license    http://www.gnu.com/license/3_0.txt   PHP License 3.0</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * @version    $Id$</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;"></td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * @since      1.0.0</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> */ </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Classes"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Classes</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Every class must have a docblock that contains these phpDocumentor tags at a minimum:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">/**</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * Short description for class</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> *</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * Long description for class (if any)...</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> *</span></p>
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">*<span> </span>@author author name</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * @version    Release: @package_version@</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> */ </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Functions"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Functions</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Every function, including object methods, must have a docblock that contains at a minimum:</span></p>

<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">A description of the function</span></li>
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">All of the arguments</span></li>
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">All of the possible return values</span></li>
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">If a function/method may throw an      exception, use "@throws"</span></li>
</ul>
<table class="MsoNormalTable" border="0" cellpadding="0">
<tbody>
<tr>
<td style="padding: 0.75pt;" valign="top">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"></p>
</td>
<td style="padding: 0.75pt;" colspan="2">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Please note</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">It is not   necessary to use the "@access" tag because the access level is   already known from the "public", "private", or "protected"   construct used to declare the function.</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">/**</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * Does something interesting</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> *</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * @param  Place    $where  Where something interesting takes place</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * @param  integer  $repeat How many times something interesting should happen</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * @throws Some_Exception_Class If something interesting cannot happen</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> * @return Status</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> */ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">public function doSomethingInteresting(Place $where, $repeat = 1) </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> // implementation... </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt; background: white none repeat scroll 0% 0%;" colspan="3">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
<!--[if !supportMisalignedColumns]-->
<tr height="0">
<td style="border: medium none;" width="3"></td>
<td style="border: medium none;" width="20"></td>
<td style="border: medium none;" width="510"></td>
<td style="border: medium none;" width="215"></td>
</tr>
<!--[endif]--></tbody></table>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Require/Include"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Require / Include</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">If a component uses another component, then the using component is responsible for loading the other component. If the use is conditional, then the loading should also be conditional.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The include, include_once, require, and require_once statements should not use parentheses.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Using include, include_once, require, and require_once is acceptable but discouraged in favor for Yii:import();</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-ErrorsandExcept"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Errors and Exceptions</span></strong></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">The Yii Framework codebase must be E_STRICT compliant. Yii Framework code should not emit PHP warning (E_WARNING, E_USER_WARNING), notice (E_NOTICE, E_USER_NOTICE), or strict (E_STRICT) messages when error_reporting is set to E_ALL | E_STRICT.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">See </span><a href="http://www.php.net/errorfunc"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;; color: windowtext; text-decoration: none;">http://www.php.net/errorfunc</span></a><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> for information on E_STRICT.</span></p>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Yii Framework code should not emit PHP errors, if it is reasonably possible. Instead, throw meaningful exceptions. Yii Framework components have Exception class derivatives specifically for this purpose:</span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">class CException extends Exception </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{} </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">class CController_Exception extends CException </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{} </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">class CController_Other_Exception extends CController_Exception </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">It is considered best practice within framework component code that exceptions are instantiated through the traditional new constructor method. </span></p>

<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Yii::import(‘application.component.exception’);</span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">class Test_Component </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">{ </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> public function foo($condition) </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> if ($condition) { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> throw new    Component_Exception( </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> 'Some meaningful exception message'); </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> } </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> } </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Some concern was raised about scripts that incur overhead by loading exception classes that are by definition only used in exceptional cases. When an application's performance requirements are such that this overhead is an issue, one should use either of two solutions:</span></p>

<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Load the exception class in a traditional      manner, and run the application in an environment that uses a PHP bytecode      cache. A bytecode cache reduces the overhead of loading and parsing PHP      classes that have been used in the environment earlier.</span></li>
</ul>
<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Lazy-load the exception class inside the      code block where the exception is thrown. For example: </span></li>
</ul>
<table class="MsoNormalTable" style="background: white none repeat scroll 0% 0%; width: 100%; margin-left: 0.5in; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">if ($condition) { </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> require_once 'Component_Exception.php'; </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> throw new    Component_Exception( </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> 'Some meaningful exception message'); </span></p>
</td>
</tr>
<tr>
<td style="padding: 0in 0in 0in 4.7pt;">
<p class="MsoNormal" style="margin: 0.95pt 0in; line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">} </span></p>
</td>
</tr>
</tbody></table>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Reasonable care should be taken to avoid throwing exceptions except when genuinely appropriate. In general, if a Yii Framework component is asked to perform a duty that it cannot perform in a certain situation (e.g., illegal input, cannot read requested file), then throwing an exception is a sensible course of action. Conversely, if a component is able to perform its requested duty, despite some variance from expected input, then the component should continue with its work, rather than throw an exception.</span></p>
<p class="MsoNormal" style="line-height: normal;"><a name="PHPCodingStandard(draft)-Exceptionbestpr"></a><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Exception best practices</span></strong></p>

<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Use specific derived exceptions in both throw      and catch. See the following two items:</span></li>
</ul>
<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Avoid throwing the Exception base class,      or other exception superclass. The more specific the exception, the better      it communicates to the user what happened.</span></li>
</ul>
<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Avoid catching the Exception base class,      or other exception superclass. If a try block might encounter more than      one type of exception, write a separate catch block for each specific      exception, not one catch block for an exception superclass.</span></li>
</ul>
<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Some classes may require you to write more      than one derived exception class. Write as many exception classes as      needed, to distinguish between different types of situations. For example,      "<em>invalid argument value</em>" is different from, "<em>you      don't have a needed privilege</em>." Create different exceptions to      identify different cases.</span></li>
</ul>
<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Don't put important diagnostic information      only in the text of the exception method. Create methods and members in      derived exception classes as needed, to provide information to the catch      block. Create an exception constructor method that takes appropriate      arguments, and populate the members of the class with those arguments.</span></li>
</ul>
<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Don't silently suppress exceptions and      allow execution to continue in an erroneous state. If you catch an      exception, either correct the condition or throw a new exception.</span></li>
</ul>
<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Keep implementation-specific exceptions      isolated to the appropriate layer of your application. For instance, don't      propagate SQLException out of the data layer code and into business layer      code.</span></li>
</ul>
<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Don't use exceptions as a mechanism of      flow control, or to return valid return values from a function.</span></li>
</ul>
<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Clean up resources such as database      connections or network connections. PHP does not support a finally block      as some programming languages do, so either clean up in the catch blocks,      or else design flow control outside the catch block to perform cleanup,      and let execution continue after the catch.</span></li>
</ul>
<ul type="disc">
	<li class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">Use documentation from other languages for      other best practices regarding using exceptions. Many of the principles      are applicable, regardless of the language.</span></li>
</ul>
<p class="MsoNormal" style="line-height: normal;"><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;"> </span></p>
<p class="MsoNormal" style="line-height: normal;"><strong><span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;;">PHP Error Suppression (@ ) in front of method names, class members and properties is prohibited. </span></strong></p>

</div>
