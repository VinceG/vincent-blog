---
title: "PHP Console Progress Bar"
date: 2013-03-23 21:48:51
---

<h1>PHP Console Progress Bar</h1>
This class creates and maintains progress bars to be printed to the console. This file is a replica of the ezComponents console progress bar class (@link <a href="http://ezcomponents.org/docs/api/latest/ConsoleTools/ezcConsoleProgressbar.html">http://ezcomponents.org/docs/api/latest/ConsoleTools/ezcConsoleProgressbar.html</a>) allows a developer to just use the console progress bar features without the rest of the classes saving all the extra files and classes.
<h1><a href="https://github.com/VinceG/PHP-Console-Progress-Bar#available-options" name="available-options"></a>Available Options</h1>
<ul>
	<li>barChar: Processed progress bar char (Default '=')</li>
	<li>emptyChar: Empty progress bar char (Default '-')</li>
	<li>formatString: Progress bar formatted line that actually displays the processed number, step count, total count, percentage etc.. (Default '%act% / %max% [%bar%] %fraction%%')</li>
	<li>fractionFormat: Progress bar fraction format (Default '%01.2f')</li>
	<li>progressChar: Progress bar progress leading char (Default '&gt;')</li>
	<li>redrawFrequency: Redraw/Update the progress bar every X step(s) (Default: 1)</li>
	<li>step: Progress bar each advance call will advance X step(s) (Default: 1)</li>
	<li>width: Progress bar width (Default 100)</li>
	<li>actFormat: Progress bar current step format (Default '%.0f')</li>
	<li>maxFormat: Progress bar maximum step format (Default '%.0f')</li>
	<li>max: Progress bar maximum value (When it reaches 100%) (Default 100)</li>
</ul>
&nbsp;

<code>
< ?php
require_once('ConsoleProgressBar.php');
// initiate the class with the maximum value being 100
$progress = new ConsoleProgressBar(100);
// Setting options are done using one of the following:
// $progress = new ConsoleProgressBar(100, array('step' => 5, 'barChar' => '+'));
// $progress->setOptions(array('step' => 5, 'barChar' => '+'));
// $progress->setOptions('step', 5);
// $progress->options = array('step' => 5);
// Start the progress bar before the actual actions are taken place
$progress->start();
// This is just an example that's why a simple look is being used
// in real world this can be a db record set process or any other long operation that is being
// done via the cli
for ($i = 0; $i < = 100; $i++) {
	// Do the actual processing here
	// .....
	// .....
	// .....
	// Advance one step by default
	// you can pass a second argument $step which will advance that number of steps
    $progress->advance();
    // For this example we will just sleep for a second
    sleep(1);
}
// Call finish at the end to make sure the bar goes to 100% if it didn't
$progress->finish();
</code>

<a href="https://github.com/VinceG/PHP-Console-Progress-Bar" target="_blank">Fork On Github</a>
