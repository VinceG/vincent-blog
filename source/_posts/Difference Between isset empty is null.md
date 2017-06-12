---
title: "Difference Between isset empty is null"
date: 2009-11-10 13:38:30
---

<div style="text-align:left; direction: ltr;">

<p>

Quite often in code reviews I have come across code that checks for empty or null values, or if a variable is set. Many of these checks fail as the wrong function is being used to assert the correct value. While it is important to be checking values, it is equally important to understand the difference between the different methods of checking and testing values for empty, null, or if they are set.
</p>
<!--more-->
<p>
Most common is the incorrect use of isset() and empty(). Many times these are seen to be used interchangeably, where the reality is, that the two are complete opposites. Lets look at some code.
</p>
```
<?php

        var_dump( !isset( $var ) );

        var_dump( empty( $var ) );
?>
```
<p>
The above snippet tests for not isset and empty for a variable which has not been set. The results both return true.
</p>
```
bool(true)
bool(true)
```

<p>
The correct method to check if a variable is set or not, is with the isset() function, or, if checking for an empty variable, then use empty(). These functions are provided for good reason, as seen in this code below.
</p>
```
<?php
        error_reporting(E_ALL);

        if( ! isset( $var ) )
        {
                echo 'Variable is not set<br />';
        }

        if( empty( $var ) )
        {
                echo 'Variable is empty<br />';
        }

        if( $var )
        {
                echo 'Variable is set<br />';
        }
?>
```
<p>
The above snippet produces the following..
</p>
<div class="displaybox">
Variable is not set<br />
Variable is empty<br />
Notice: Undefined variable: var in /html/test.php on line 15
</div>
<p>
This shows why the use of if($var) type syntax is shunned by many programmers, as PHP throws an E_NOTICE error when it finds an uninitialized variable. Th checks for isset and empty declare the variable is not set, and that it is empty?? Which is it? The Empty function would have us believe the variable is set, but the value is empty, but this is not the case, the variable is clearly undefined, and the third test which gives and error supports this. Confused?
</p>

<p>

To make matters just a little more complex, the empty function will also return true, if the variable has a value of zero. Lets take it for a drive.
</p>
```
<?php
        /*** turn on error reporting ***/
        error_reporting(E_ALL);

        /*** set variable to zero ***/
        $var = 0;
        if( isset( $var ) )
        {
                echo 'Variable is set<br />';
        }

        if( empty( $var ) )
        {
                echo 'Variable is empty<br />';
        }

        if( $var )
        {
                echo 'Variable is set<br />';
        }
?>
```
<p>
Running this test, provides some more clues to the behavior mentioned earlier. The response is:
<p>
<div class="displaybox">
Variable is set<br />
Variable is empty<br />
</div>
<p>
At the top of the script, the variable is clearly set to zero, and a check with isset asserts this. However, the next check with the empty function shows the variable to be empty, even though a value for it has been set. Then the final check with if( $var ) does not show the text for the same reason empty shows the variable to be empty.
<p>
<p>
To get a better understanding of this seemingly odd behavior lets make a quick test chart can be produced to check for values and the values each returns based on the function that is checking each of the values. The code for producing such a table is provided below, but, here is one we prepared earlier. The error message is produced because the isset() function is trying to check a variable that has not been initialized, as seen earlier in this article.
</p>

<div class="displaybox">
<table style="border: solid 1px black; width:100%;">
<tr style="text-align:left;"><th>TEST</th><th>Not Set</th><th>NULL</th><th>Zero</th><th>FALSE</th><th>Numeric Value</th><th>Empty String</th></tr>
<tfoot><tr><td colspan="6">Comparison Table</td></tr></tfoot>
<tbody>
<br />

<tr><td>isset()</td><td>bool(false)
</td><td>bool(false)
</td><td>bool(true)
</td><td>bool(true)
</td><td>bool(true)
</td><td>bool(true)
</td></tr><tr><td>empty()</td><td>bool(true)
</td><td>bool(true)
</td><td>bool(true)
</td><td>bool(true)
</td><td>bool(false)
</td><td>bool(true)
</td></tr><tr><td>is_null()</td><td>bool(true)

</td><td>bool(true)

</td><td>bool(false)
</td><td>bool(false)
</td><td>bool(false)
</td><td>bool(false)
</td></tr><tr><td>==</td><td>bool(true)
</td><td>bool(true)
</td><td>bool(true)
</td><td>bool(true)
</td><td>bool(false)
</td><td>bool(true)
</td></tr><tr><td>===</td><td>bool(false)
</td><td>bool(false)
</td><td>bool(false)
</td><td>bool(true)

</td><td>bool(false)

</td><td>bool(false)
</td></tr></tbody>
</table>
</div>
<br />

<h2>The Comparison Table Code</h2>
```
<table style="border: solid 1px black; width:100%;">
<tr style="text-align:left;"><th>TEST</th><th>Not Set</th><th>NULL</th><th>Zero</th><th>FALSE</th><th>Numeric Value</th><th>Empty String</th></tr>
<tfoot><tr><td colspan="6">Comparison Table</td></tr></tfoot>
<tbody>
<?php
    /*** turn on error reporting ***/
    error_reporting( E_ALL );

    /*** an array of test values ***/
    $values = array( $var, null, 0, false, 100, '');
    echo '<tr>';
    echo '<td>isset()</td>';
    foreach( $values as $val )
    {
        echo '<td>';
        var_dump( isset( $val ) );
        echo '</td>';
    }
    echo '</tr>';

        echo '<tr>';
    echo '<td>empty()</td>';
        foreach( $values as $val )
        {
                echo '<td>';
                var_dump( empty( $val ) );
                echo '</td>';
        }
    echo '</tr>';

        echo '<tr>';
        echo '<td>is_null()</td>';
        foreach( $values as $val )
        {
                echo '<td>';
                var_dump( is_null( $val ) );
                echo '</td>';
        }
        echo '</tr>';

        echo '<tr>';
    echo '<td>==</td>';
        foreach( $values as $val )
        {
                echo '<td>';
                var_dump( $val == false  );
                echo '</td>';
        }
    echo '</tr>';

        echo '<tr>';
    echo '<td>===</td>';
        foreach( $values as $val )
        {
                echo '<td>';
                var_dump( $val === false );
                echo '</td>';
        }
        echo '</tr>';
?>
</tbody>
</table>
```


<br />
<i>Origanlly posted by: <a href='http://www.phpro.org/articles/Difference-Between-isset-empty-is-null.html' target="_blank">phpro.org</a></i>
</div>

