---
title: "Yii Widget for the Aloha Editor"
date: 2012-06-17 14:10:18
---


<h2>
Yii-Aloha-Editor-Widget
</h2>

<p>
Yii Widget for the Aloha Editor
</p>

<a href="http://aloha-editor.org/">Project Page</a>
<a href="http://aloha-editor.org/demos.php">Examples</a>
<a href="http://aloha-editor.org/builds/development/latest/doc/guides/output/using_aloha.html">Documentation</a>
<a href="https://github.com/VinceG/Yii-Aloha-Editor-Widget">Yii Widget On Github</a>

<h2>
Requirements
</h2>

<ul>

<li>JQuery > 1.7.1</li>
<li>Browser:
<ul><li>Firefox 3+</li>
	<li>Safari 4+</li>
	<li>Chrome 4+</li>
	<li>Opera 10+</li>
	<li>IE 7+</li>
</ul>
</li>
</ul>

<h2>
Installation
</h2>

<ol>

<li>
Download or Clone the files
</li>

<li>
Extract into the widgets folder or extensions folder
</li>

</ol>

<h2>
Usage
</h2>

<h2>
Using with a model
</h2>

[php]
$this->widget('application.widgets.alohaeditor.AlohaEditor', array( 'model' =>
 $model, 'attribute' =>
 'some_attribute', 'showTextarea' =>
 true ));
[/php]

<ul>

<li>
By default 'showTextarea' is set to false
</li>

</ul>

<h2>
Using selector to set multiple elements editable
</h2>

[php]
$this->widget('application.widgets.alohaeditor.AlohaEditor', array( 'selector' =>
 '.editable' ));
[/php]

<h2>
Using with a model and a basic toolbar
</h2>

[php]
$this->widget('application.widgets.alohaeditor.AlohaEditor', array('toolbar' =>
 'basic', 'model' =>
 $model, 'attribute' =>
 'some_attribute' ));
[/php]

<ul>

<li>
There are two toolbars supported right now: basic and advanced
</li>

<li>
At any point you can add more plugins to the toolbar by assigned array elements to the plugins property in the widget
</li>

</ul>

<h2>
Using with a model and a basic toolbar and custom plugins
</h2>

[php]
$this->
widget('application.widgets.alohaeditor.AlohaEditor', array('toolbar' =>
 'basic', 'plugins' =>
 array('extra/hints'), 'model' =>
 $model, 'attribute' =>
 'some_attribute' ));
[/php]

<h2>
Using with a model and a basic toolbar and custom editor settings
</h2>

[php]
$this->widget('application.widgets.alohaeditor.AlohaEditor', array('alohaSettings' =>
 array('lang' =>
 'fr'), 'model' =>
 $model, 'attribute' =>
 'some_attribute' ));
[/php]

<ul>

<li>
Supported languages currently: de, en, fr, lv, pl, pt_br, ru, ua
</li>

<li>
Refer to the documentation for a list of supported params for the settings array
</li>

</ul>

<h2>
Using with a name and value
</h2>

[php]
$this->widget('application.widgets.alohaeditor.AlohaEditor', array( 'name' =>
 'some name', 'value' =>
 'some value' ));
[/php]

<h2>
Authors
</h2>

<p>
Vincent Gabriel <a href="http://vadimg.com">http://vadimg.com</a>
</p>

