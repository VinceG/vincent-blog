---
title: "HipHop for PHP: Move Fast"
date: 2010-02-03 10:27:34
---

<p style="text-align: left;direction: ltr;">One of the key values at Facebook is to move fast. For the past six years, we have been able to accomplish a lot thanks to rapid pace of development that PHP offers. As a programming language, PHP is simple. Simple to learn, simple to write, simple to read, and simple to debug. We are able to get new engineers ramped up at Facebook a lot faster with PHP than with other languages, which allows us to innovate faster.</p>
<p style="text-align: left;"><img src="http://wiki.developers.facebook.com/images/a/ac/HipHop_logo_white.png" alt="" /></p>
<p style="text-align: left;">Today I'm excited to share the project a small team of amazing people and I have been working on for the past two years; HipHop for PHP. With HipHop we've reduced the CPU usage on our Web servers on average by about fifty percent, depending on the page. Less CPU means fewer servers, which means less overhead. This project has had a tremendous impact on Facebook. We feel the Web at large can benefit from HipHop, so we are releasing it as open source this evening in hope that it brings a new focus toward scaling large complex websites with PHP. While HipHop has shown us incredible results, it's certainly not complete and you should be comfortable with beta software before trying it out.</p>
<p style="text-align: left;">HipHop for PHP isn't technically a compiler itself. Rather it is a source code transformer. HipHop programmatically transforms your PHP source code into highly optimized C++ and then uses g++ to compile it. HipHop executes the source code in a semantically equivalent manner and sacrifices some rarely used features — such as eval() — in exchange for improved performance. HipHop includes a code transformer, a reimplementation of PHP's runtime system, and a rewrite of many common PHP Extensions to take advantage of these performance optimizations.</p>

<h2 style="text-align: left;">Scaling PHP as a Scripting Language</h2>
<p style="text-align: left;">PHP's roots are those of a <a href="http://en.wikipedia.org/wiki/Server-side_scripting">scripting language</a>, like Perl, Python, and Ruby, all of which have major benefits in terms of programmer productivity and the ability to iterate quickly on products. This is compared to more traditional <a href="http://en.wikipedia.org/wiki/Compiled_language">compiled languages</a> like C++ and <a href="http://en.wikipedia.org/wiki/Interpreted_language">interpreted languages</a> like Java. On the other hand, scripting languages are known to generally be less efficient when it comes to CPU and memory usage. Because of this, it's been challenging to scale Facebook to over 400 billion PHP-based page views every month.</p>
<p style="text-align: left;">One common way to address these inefficiencies is to rewrite the more complex parts of your PHP application directly in C++ as PHP Extensions. This largely transforms PHP into a glue language between your front end HTML and application logic in C++. From a technical perspective this works well, but drastically reduces the number of engineers who are able to work on your entire application. Learning C++ is only the first step to writing PHP Extensions, the second is understanding the <a href="http://theserverpages.com/php/manual/en/zend.php">Zend APIs</a>. Given that our engineering team is relatively small — there are over one million users to every engineer — we can't afford to make parts of our codebase less accessible than others.</p>
<p style="text-align: left;">Scaling Facebook is particularly challenging because almost every page view is a logged-in user with a customized experience. When you view your home page we need to look up all of your friends, query their most relevant updates (from a custom service we've built called Multifeed), filter the results based on your privacy settings, then fill out the stories with comments, photos, likes, and all the rich data that people love about Facebook. All of this in just under a second. HipHop allows us to write the logic that does the final page assembly in PHP and iterate it quickly while relying on custom back-end services in C++, Erlang, Java, or Python to service the News Feed, search, Chat, and other core parts of the site.</p>
<p style="text-align: left;">Since 2007 we've thought about a few different ways to solve these problems and have even tried implementing a few of them. The common suggestion is to just rewrite Facebook in another language, but given the complexity and speed of development of the site this would take some time to accomplish. We've rewritten aspects of the <a href="http://en.wikipedia.org/wiki/Zend_Engine">Zend Engine</a> — PHP's internals — and contributed those patches back into the PHP project, but ultimately haven't seen the sort of performance increases that are needed. HipHop's benefits are nearly transparent to our development speed.</p>

<h2 style="text-align: left;">Hacking Up HipHop</h2>
<p style="text-align: left;">One night at a Hackathon a few years ago (see <a href="http://www.facebook.com/video/video.php?v=124728580468&amp;ref=mf">Prime Time Hack</a>), I started my first piece of code transforming PHP into C++. The languages are fairly similar syntactically and C++ drastically outperforms PHP when it comes to both CPU and memory usage. Even PHP itself is written in C. We knew that it was impossible to successfully rewrite an entire codebase of this size by hand, but wondered what would happen if we built a system to do it programmatically.</p>
<p style="text-align: left;">Finding new ways to improve PHP performance isn't a new concept. At run time the Zend Engine turns your PHP source into opcodes which are then run through the Zend Virtual Machine. Open source projects such as <a href="http://pecl.php.net/package/APC">APC</a> and <a href="http://eaccelerator.net/">eAccelerator</a> cache this output and are used by the majority of PHP powered websites.  There's also <a href="http://en.wikipedia.org/wiki/Zend_Server">Zend Server</a>, a commercial product which makes PHP faster via opcode optimization and caching. Instead, we were thinking about transforming PHP source directly into C++ which can then be turned into native machine code. Even compiling PHP isn't a new idea, open source projects like <a href="http://www.roadsend.com/">Roadsend</a> and <a href="http://www.phpcompiler.org/">phc</a> compile PHP to C, <a href="http://www.caucho.com/resin-3.0/quercus/">Quercus</a> compiles PHP to Java, and <a href="http://www.php-compiler.net/">Phalanger</a> compiles PHP to .Net.</p>
<p style="text-align: left;">Needless to say, it took longer than that single Hackathon. Eight months later, I had enough code to demonstrate it is indeed possible to run faster with compiled code. We quickly added Iain Proctor and Minghui Yang to the team to speed up the pace of the project. We spent the next ten months finishing up all the coding and the following six months testing on production servers. We are proud to say that at this point, we are serving over 90% of our Web traffic using HipHop, all only six months after deployment.</p>

<h2 style="text-align: left;">How HipHop Works</h2>
<p style="text-align: left;">The main challenge of the project was bridging the gap between PHP and C++. PHP is a scripting language with dynamic, weak typing. C++ is a compiled language with static typing. While PHP allows you to write magical dynamic features, most PHP is relatively straightforward. It's more likely that you see <code>if (...) {...} else {..}</code> than it is to see <code>function foo($x) { include $x; }</code>. This is where we gain in performance. Whenever possible our generated code uses static binding for functions and variables. We also use type inference to pick the most specific type possible for our variables and thus save memory.</p>
<p style="text-align: left;">The transformation process includes three main steps:</p>

<ol style="text-align: left;">
	<li>Static analysis where we collect information on who declares what and dependencies,</li>
	<li>Type inference where we choose the most specific type between C++ scalars, String, Array, classes, Object, and Variant, and</li>
	<li>Code generation which for the most part is a direct correspondence from PHP statements and expressions to C++ statements and expressions.</li>
</ol>
<p style="text-align: left;"><a href="http://wiki.developers.facebook.com/images/2/23/HipHop_transformation_process.png"><img src="http://wiki.developers.facebook.com/images/2/23/HipHop_transformation_process.png" alt="" width="450" height="281" /></a></p>
<p style="text-align: left;">We have also developed HPHPi, which is an experimental interpreter designed for development. When using HPHPi you don't need to compile your PHP source code before running it. It's helped us catch bugs in HipHop itself and provides engineers a way to use HipHop without changing how they write PHP.</p>
<p style="text-align: left;">Overall HipHop allows us to keep the best aspects of PHP while taking advantage of the performance benefits of C++. In total, we have written over 300,000 lines of code and more than 5,000 unit tests. All of this will be released this evening on GitHub under the open source PHP license.</p>

<h2 style="text-align: left;">Learn More this Evening</h2>
<p style="text-align: left;">This evening we're hosting a small group of developers to dive deeper into HipHop for PHP and will be streaming this tech talk live. Check back here around 7:30pm Pacific time if you'd like to watch.</p>
<p style="text-align: left;">As I'm sure there will be plenty of questions, starting this evening take a look at the <a href="http://github.com/facebook/hiphop-php/wikis">HipHop wiki</a> or join the <a href="http://groups.google.com/group/hiphop-php-dev">HipHop developer mailing list</a>.  You'll also find us at <a href="http://www.fosdem.org/2010/schedule/events/scalingfacebook">FOSDEM</a>, <a href="http://www.socallinuxexpo.org/scale8x/">SCALE</a>, <a href="http://www.phpconference.co.uk/">PHP UK</a>, <a href="http://www.confoo.ca/">ConFoo</a>, <a href="http://tek.phparch.com/">TEK X</a>, and <a href="http://en.oreilly.com/oscon2010">OSCON</a> over the next few months talking about HipHop for PHP. We're very excited to evolve HipHop into a thriving open source project along with all of you.</p>
<p style="text-align: left;">Source: <a href="http://developers.facebook.com/news.php?tab=blog" target="_blank">Facebook</a></p>