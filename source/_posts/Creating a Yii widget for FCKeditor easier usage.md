---
title: "Creating a Yii widget for FCKeditor easier usage"
date: 2009-12-17 13:12:39
---

<div style="direction: ltr; text-align: left;">
<h1>Creating a Yii widget for FCKeditor easier usage</h1>
To start with you need to download the latest stable release of <a href="http://www.fckeditor.net/download" target="_blank">FCKeditor</a>. Extract the downloaded file and place the fckeditor/ folder in your applications webroot directory.

<!--more-->

Next to do is to download the Yii FCKeditor <a href="http://www.yiiframework.com/extension/fckeditor-integration/" target="_blank">extension</a>, created by Ascomae. Extract the downloaded file, and place the fckeditor/ widget folder in your web applications protected/extensions/ directory.
<strong>Configuring the FCKeditorWidget</strong>

In the view where you want to use the FCKeditorWidget:

[sourcecode lang='php']
<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
    "model"=>$pages,                # Data-Model
    "attribute"=>'content',         # Attribute in the Data-Model
    "height"=>'400px',
    "width"=>'100%',
    "toolbarSet"=>'Basic',          # EXISTING(!) Toolbar (see: fckeditor.js)
    "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
                                    # Path to fckeditor.php
    "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                                    # Realtive Path to the Editor (from Web-Root)
    "config" => array(
        "EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
                                    # http://docs.fckeditor.net/FCKeditor_2.x/Developers_Guide/Configuration/Configuration_Options
                                    # Additional Parameter (Can't configure a Toolbar dynamicly)
    ) ); ?>
```
<ul>
	<li>the model property is the instance of the Model to be associated with.</li>
	<li>attribute the Model attribute to be associated with.</li>
	<li>fckeditor, the path to the fckeditor php file.</li>
	<li>fckBasePath, the url to the editor frontend to be loaded inside the iframe.</li>
	<li>config Most parameter in the fckconfig.js can be changed within this config. http://docs.fckeditor.net/FCKeditor_2.x/Developers_Guide/Configuration/Configuration_Options</li>
</ul>
If those instructions have been followed exactly the FCKeditor should work correctly.</div>
