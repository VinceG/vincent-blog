---
title: "Rain TPL Yii View Renderer"
date: 2012-06-16 15:40:40
categories: 
- "frameworks"
- "PHP"
- "php 5.3"
- "yii"
tags: 
---

<h1>Rain TPL Yii View Renderer</h1>

The easy and fast template engine for PHP.   Rain.TPL makes application easier to create & enables designers/developers to work better together.


<a href="http://www.raintpl.com/">Project Page</a><br />
<a href="http://www.raintpl.com/Download/">Download</a><br />
<a href="http://www.raintpl.com/Documentation/">Documentation</a><br />
<a href="http://www.raintpl.com/PHP-Template-Engines-Speed-Test/">Speed Test</a><br />
<a href="https://github.com/rainphp/raintpl">Github Project Page</a><br />
<a href="https://github.com/VinceG/Yii-Rain-TPL-View-Renderer">Yii Extension Github Project Page</a><br />


<h2>Requirements</h2>

- PHP 5
- Yii 1.1.10 (Tested on 1.1.10 but should work on older versions as well)

<h2>Installation</h2>

1. Download or Clone the files
2. Extract into the extensions folder
3. Edit the application config file and add the following array under the 'components' array:

[php]
'viewRenderer'=>array(
  'class'=>'application.extensions.RainTPLViewRenderer',
),
[/php]

<h2>Configure</h2>

The available options you can set for this view renderer are:

[php]
'viewRenderer'=>array(
	'class'=>'application.extensions.RainTPLViewRenderer',
	// File extension used for views
	'fileExtension' => '.tpl',
	// is the template directory
	'tpl_dir' => null,
	// where it save compiled templates and cache
	'cache_dir' => null,
	// the absolute base url of your application (eg. http://www.raintpl.com)
	'base_url' => null,
	// enable/disable the path replace
	'path_replace' => false,
	// configure what to replace
	'path_replace_list' => array(),
	//  configure what command are not allowed
	'black_list' => array(),
	// enable/disable the control if template was modified by the last compiling
	'check_template_update' => true,
	// enable/disable the use of php tags in your template
	'php_enabled' => false,
	// Use the latest beta version for rain tpl 3
	'useRainBeta' => false,
	// Will not cache templates
	'debug' => false,
	// Auto escape variables
	'auto_escape' => false,
),
[/php]


<h2>Usage</h2>

To render a view you would call the render method the same way
------------------

[php]
$this->render('someview', $params);
[/php]

<h2>Template Syntax Examples</h2>

<table width='100%' border='1'>
    <tr>
        <td>PHP</td>
		<td>Rain TPL</td>
    </tr>
	<tr>
		<td>&lt;?php echo $var; ?&gt;</td>
		<td>{$var}</td>
	</tr>
	<tr>
		<td>&lt;?php echo CONSTANT; ?&gt;</td>
		<td>{#CONSTANT#}</td>
	</tr>
	<tr>
		<td>&lt;?php $num + 10; ?&gt;</td>
		<td>{$num + 10}</td>
	</tr>
	<tr>
		<td>&lt;?php echo $website['name']; ?&gt;</td>
		<td>{$website.name}</td>
	</tr>
	<tr>
		<td>&lt;?php echo $GLOBALS['name']; ?&gt;</td>
		<td>{$GLOBALS.name}</td>
	</tr>
	<tr>
		<td>&lt;?php if($year > 18) {echo 'major';}?&gt;</td>
		<td>{if="$year > 18"}major{/if}</td>
	</tr>
	<tr>
		<td>&lt;?php if($year > 18) {echo 'major';} else {echo 'not major';}?&gt;</td>
		<td>{if="$year > 18"}major{else}not major{/if}</td>
	</tr>
	<tr>
		<td>&lt;?php if() {echo 'Hello' . $name} else{ echo 'Not Logged'; } ?&gt;</td>
		<td>{if="isLogged()"}Hello {$name}{else}Not Logged{/if}</td>
	</tr>
	<tr>
		<td>&lt;?php echo $is_logged ? 'Hellow' . $name : 'Not logged'; ?&gt;</td>
		<td>{$is_logged? 'Hello $name':'Not logged'}</td>
	</tr>
	<tr>
		<td>&lt;?php foreach($user_list as $key => $value) {echo $key . '-' . $value['name'] . '<br />'}?&gt;</td>
		<td>{loop="user_list"}
		{$key} - {$value.name}</br>
		{/loop}</td>
	</tr>
	<tr>
		<td>&lt;?php include 'footer'; ?&gt;</td>
		<td>{include="footer"}</td>
	</tr>
	<tr>
		<td>&lt;?php echo cut_html($news, 0, 12); ?&gt;</td>
		<td>{$news|cut_html:0,12}</td>
	</tr>
	<tr>
		<td>&lt;?php pagination( $selected_page, NEWS_PER_PAGE, URL ); ?&gt;</td>
		<td>{function="pagination( $selected_page, NEWS_PER_PAGE, URL )"}</td>
	</tr>
	<tr>
		<td>&lt;?php echo substr($string,0,5); ?&gt;</td>
		<td>{function="substr($string,0,5)"}</td>
	</tr>
	<tr>
		<td>&lt;?php /* comment */ ?&gt;</td>
		<td>{* comment *}</td>
	</tr>
</table>

For more info see [Documentation](http://www.raintpl.com/Documentation/)

<h2>Authors</h2>

Vincent Gabriel <http://vadimg.com>
