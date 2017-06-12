---
title: "Exceptional PHP: Introduction to Exceptions"
date: 2009-10-29 13:27:08
---

<div style="text-align:left; direction: ltr;">
<p>Exceptions make it easy to interrupt program flow in the event that something goes wrong. They allow you to customize how a program handles errors, and gracefully degrades an application. This week, we will discuss various exception handling techniques, and today we will discuss the basic dos and don&#8217;ts for exceptions.</p>
<p>First, what is an exception? An exception is an object that is &#8220;thrown&#8221; by your application. When an exception is thrown, it halts processing until the exception is either caught, or left <a href="http://en.wikipedia.org/wiki/Exception_handling">unhandled</a>. To throw an exception, you use the following syntax:</p>
<!--more-->
```
<?php

throw new Exception('my exception message');
```
<p>There are a couple of things at work here: first, we are using the &#8220;new Exception&#8221; syntax to instantiate a new instance of the built-in Exception class. Second, we are using a special keyword in PHP called &#8220;throw&#8221; which allows for an exception to be placed onto the stack.</p>

<p>If left like this, the exception thrown above will bubble up and cause processing to halt at the point when the exception is raised. This is typical error behavior, but what makes exceptions special (and useful) is the ability to &#8220;catch&#8221; them.</p>
```
<?php
try {

throw new Exception('my exception message');
}
catch (Exception $e)
{
// do some sort of error handling here
}
```
<p>Catching exceptions allows us to try and recover from the error, or allow our application to degrade gracefully. In production, unhandled exceptions will cause the page to stop loading (or not load at all), but handled exceptions allow you the ability to redirect a user to an error page or do other error handling.</p>
<p>That is the basic syntax for using exceptions. But when should you use them and under what conditions? Here are some tips for making proper use of exceptions:</p>
<p><strong>Exceptions are a part of object-oriented programming.</strong><br />
This may well be the most controversial point of this blog entry, but objects are really best used and should mostly be used with <a href="http://en.wikipedia.org/wiki/Object-oriented_programming">object-oriented programming</a>. The exception itself is an object. PHP offers a number of <a href="http://php.net/manual/en/function.trigger-error.php">error raising options</a> that I recommend for use in procedural code, but exceptions should mostly be used with objects.</p>

<p><strong>Extending exceptions is cool and encouraged.</strong><br />
As a developer you are allowed and encouraged to <a href="http://www.php.net/manual/en/language.exceptions.extending.php">extend the base exception class</a> on your own to create custom exceptions. These custom exceptions need not implement any custom methods; instead, you can use them to raise exceptions in different parts of your application. For example, you can raise a custom DatabaseException in the database class while raising a custom ActionException when actions are performed.</p>
<p>Exceptions can be extended like any other class:</p>
```

class CustomException extends Exception {}
```
<p>We can then throw CustomException. You can even further extend CustomException (for example if you want to implement certain custom methods and then have other exceptions use those methods). Note that in order to throw something it must extend the base Exception class; otherwise PHP will not allow it to be thrown.</p>
<p><strong>Be sure that your exceptions honor layer abstraction.</strong><br />

One of the more complicated things about handling exceptions is that you want to honor <a href="http://en.wikipedia.org/wiki/Principle_of_abstraction">layer abstraction</a> when throwing and catching exceptions.</p>
<p>For example, let&#8217;s say that <a href="http://php.net/manual/en/book.pdo.php">PDO</a> raises an exception due to a unique key constraint in the database. Unhandled, it will bubble up to the top. If the PDO exception was caused by something in your Controller, allowing the PDO exception to bubble up would be a violation of layer abstraction.</p>
<p>A better choice would be to catch the PDO exception and wrap it in a Controller exception. For example:</p>
```
<?php

try {
// some PDO action here
}
catch(PDOException $pdoE)
{
throw new ControllerException('There was an error: ' . $pdoE->getMessage() );
}

```
<p>When the exception bubbles up, the PDO exception will have been handled, but the message will be included in a ControllerException. This is an acceptable way to handle exceptions that honors the principle of layer abstraction.</p>
<p><strong>Don&#8217;t use exceptions to manage normal program flow.</strong><br />
There&#8217;s a temptation to use exceptions to manage program flow. Take the following source code for example:</p>
```
<?php

try {

if($var == $condition)
{
throw new TypeA();
}
else
{
throw new TypeB();
}

} catch (TypeA $e) {

} catch (TypeB $e) {

}
```
<p><a href="http://blueparabola.com/blog/exceptional-situations-require-exceptional-measures">Exceptions are designed to be used for exceptional situations.</a> Exceptional situations are situations in which the normal flow would result in an error or other detrimental behavior; exceptions are designed to reduce the detrimental result.</p>
<p>In this case, the exceptions are being thrown purely to control what information is executed. There is clearly no normal operation of this code without the exceptions, as an exception is going to be raised no matter the value you pass to the if-else block.</p>

<p>A good rule of thumb is that if you cannot remove the thrown exceptions from your application and still have it complete successfully (given the right information), you&#8217;ve incorrectly used exceptions.</p>
<p><strong>Exceptions are meant to be handled.</strong><br />
The very existence of the try-catch loop indicates that exceptions are meant to be handled. They are meant to be resolved, even if that resolution is to rethrow the exception after doing some sort of error handling.</p>
<p>With errors, fatal or otherwise, there&#8217;s the possibility that something was completed half-way. Exceptions help eliminate this possibility by halting processing long enough for you to clean up before terminating the application. For example, with exceptions you can effectively utilize <a href="http://en.wikipedia.org/wiki/Database_transaction">transactions</a> &#8211; if an exception is raised, it can be caught, a rollback can be performed and the exception can be rethrown.</p>
<p>It&#8217;s a best practice to try and handle as many exceptions as possible, rather than leaving them to bubble up, as it enhances user experience and reduces the likelihood that they will break your application in some way (by half writing a file, for example).</p>

<p><strong>Exceptions are not meant to be silenced.</strong><br />
Occasionally I run across code that does this:</p>
```
<?php

function myFunction()
{
try {
// do something that raises an exception
}
catch (Exception $e) {}
}
```
<p>The end result here will be that the exception is silenced. The application will not be halted, and there is no error handling in the catch block; the exception simply disappears. This means there is no reason for the exception to be raised in the first place since it won&#8217;t be heeded by the developer!</p>
<p>Most of the time that I see this is when PHP itself raises some sort of exception (meaning the developer can&#8217;t remove the exception from possibility, and thus just mitigates it). Struggle against the urge to do this. PHP&#8217;s classes throw exceptions because there is a problem, and frameworks do the same. Handle those exceptions; don&#8217;t just silence them.</p>
<p>The only time it is appropriate to silence an exception is if it has been completely handled and there are no further issues related to that exception. For example, if an exception is raised by a file writing class because the file doesn&#8217;t exist and in your catch block you create the file, silence the exception. But don&#8217;t silence exceptions simply because they&#8217;re inconvenient.</p>

<p><strong>Go from more specific to less when trapping exceptions</strong><br />
What happens if you have the following code?</p>
```

class ExceptionA extends Exception {}
class ExceptionB extends ExceptionA {}

try {

throw new ExceptionB();

} catch (ExceptionB $e) {

} catch (ExceptionA $e) {

} catch (Exception) {

}
```
<p>The correct answer is that the very first catch block (the block that catches ExceptionB) will handle the exception. This will happen despite the fact that ExceptionB is a child of ExceptionA and Exception. This is because PHP will execute the first catch block that meets the requirements. This is useful for situations in which you might have multiple different types of exceptions raised, and want to handle them differently.</p>
<p><strong>Use exception codes to differentiate between exceptions</strong><br />
All exceptions in PHP take an optional second argument of an exception code. This code can be used to determine what kind of exception you have.</p>
```

$randomException = new Exception('message');
$specificException = new Exception('message', 123);

```
<p>The first exception looks like every other exception raised. However, the second exception has a code &#8211; which you can use to differentiate it from other types of exceptions of the same type. This is useful in the event that you have database exceptions, one of which is for a failed connection and another is for a unique key violation; you can therefore tell the user what exactly went wrong.</p>
<p><strong>Summary</strong><br />
For those who have not used exceptions, this should provide a fairly basic introduction to their use and management. On Wednesday, we&#8217;ll talk about writing your own exceptions.
<p><em>Originally posted on <a href="http://www.brandonsavage.net/">BrandonSavage.net</a>.</em></p>
</div>
