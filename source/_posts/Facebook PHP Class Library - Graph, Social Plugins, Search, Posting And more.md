---
title: "Facebook PHP Class Library - Graph, Social Plugins, Search, Posting And more"
date: 2010-05-05 13:46:16
categories: 
- "facebook"
- "PHP"
- "אינטגרציה"
- "חדשות"
- "כללי"
tags: 
- "api"
- "class"
- "facebook"
- "facebook api"
- "facebook class"
- "facebook graph"
- "facebook graph api"
- "facebook php sdk"
- "facebook sdk"
- "facebook social plugins"
- "graph"
- "library"
- "PHP"
- "php class"
- "php facebook class"
- "plugins"
- "social"
- "social plugins"
---

<div style="direction: ltr; text-align: left;">
<h1>Facebook PHP Library</h1>

<div style="text-decoration: underline; font-size:25px; color: red;"><strong>Update: Version 3.0 of the Class was released that works with the new Facebook PHP API. <a href='http://vadimg.com/2012/03/23/php-facebook-api-version-3-0-facebook-wrapper-facebook-class/'>Click Here To View It!</a></strong></div>


<span style="text-decoration: underline;"><strong>Update: New version available 1.2a download link updated, Added a new example to search for an item on facebook and return it as an array/json</strong></span>

The facebook PHP SDK offers extended functionality to get, post and show content directly from and to facebook.
The following class was created in order to simplify the development time and make the API even easier to use and manage.

Those are the examples on using this class that extends the facebook SDK class.

<!--more-->

Note: Before using the library and the API you will need to either use a certification and an SSL domain to call the API methods over SSL protocol, Or use the following short tutorial on adding a certification manually to the API calls.
<ol>
	<li>Download: http://www.gknw.net/php/phpscripts/mk-ca-bundle.phps to c:\</li>
	<li>Open cmd and run: c:>php mk-ca-bundle.php</li>
	<li>Output should read: Downloading 'certdata.txt' ...Done (140 CA certs processed).</li>
	<li>This file should be created: c:\ca-bundle.crt</li>
	<li>Move c:\ca-bundle.crt to your preferred path</li>
	<li>After initiating this library add the following line right below that:</li>
</ol>
```
facebookLib::$CURL_OPTS[CURLOPT_CAINFO] = 'path\to\cert\ca-bundle.crt';
```

You'll end up with something looking like this:

```
include_once "facebookLib.php";
$facebook = new facebookLib($config);
facebookLib::$CURL_OPTS[CURLOPT_CAINFO] = 'path\to\cert\ca-bundle.crt';
```

If that's something you can't do or having trouble then you have the option to disable the SSL verification which is not recommended and should be used as a last resort.
<h2>Examples</h2>
<strong>Initialize the Class</strong>

```
try{
include_once "facebookLib.php";
}
catch(Exception $o){
echo '<pre>';
var_dump($o);
echo '</pre>';
}

// Create our Application instance.
$config = array(
'appId'  => 'app id',
'secret' => 'app secrent',
'cookie' => true,
);

// Initiate the library
$facebook = new facebookLib($config);

//$facebook->setThrowExceptions(true); // By default the class will not throw exception when errors happen, Turn this on by using this metho
//$facebook->disableSSLCheck = true; // There is an issue with using facebook graph api on a host that does not utilize an SSL certification.
// please see the documentation for this property in the facebookLibrary class file and set this to true
// only if none of the instructions work.
//$facebook->setDecodeJson(true); // Some responses return a json object, While others a PHP array or an object. Set this to true to return a php object
// when a json object is returned.

```

<strong>Display the login button for users that did not log in yet and the logout button for the users that already logged in</strong>

```

// We may or may not have this data based on a $_GET or $_COOKIE based session.
// If we get a session here, it means we found a correctly signed session using
// the Application Secret only Facebook and the Application know. We dont know
// if it is still valid until we make an API call using the session. A session
// can become invalid if it has already expired (should not be getting the
// session back in this case) or if the user logged out of Facebook.
$session = $facebook->getSession();

// If we do have a session then we have already logged in and we have a valid access_token so display the logout button
// If we don't then show the login link with the parameters of 'req_perms' and 'display', The former specifies the extended permissions we would like to
// Get from the members, While the later specifies that we would like to display the permissions screen as a popup.
// For a full list of extended permissions please see Appendix #1.
if ( $session ) {
echo '<a href="' . $facebook->getLogoutUrl() . '">Logout</a>';
} else {
echo '<a href="' . $facebook->getLoginUrl(array('req_perms' => 'read_stream,email,user_photos', 'display'=>'popup')) . '">Login</a>';
}

```

<strong>Refreshing user login status</strong>

When a user is logged in to an application he is granted a session and an access token, That session is stored in a cookie
so the user won't need to login every single time he visits the site, That cookie is limited to a certain time (as far as i know and tested it's two hours).
In order to keep that cookie fresh and updated, It's recommended to refresh the users logged in status. This can be done by calling the method

```
$facebook->getLoginStatusUrl();
```

For best results this should be called 'silently' every once in a while (or when the session/cookie expires) to keep the user logged in and the cookie fresh.

<strong>Performing the API calls</strong>

Once we have done that we can now proceed to call api methods from the graph. the most common one will be the '/me' api method which returns the information
regarding the currently logged in user.

The facebook sdk base class provides a method called 'api' ($facebook->api(METHOD_NAME)), That method allows you basically to perform all the required facebook graph calls.
What we have done is to take that and simplify it event more to create some commonly used calls and turn them into methods that are located under our facebook library.

So now instead of calling $facebook->api('/me') or $facebook->api('/USERID'); to get the users information you can do $facebook->getInfo() for the current user logged in or $facebook->getInfo('USERID') for any other user.
In this case there is almost no difference between them, But facebook offers a lot more then just getting a users information, And if you continue reading you will see that this library serves some really useful and common tasks
that can be used to Retrieve, Post, Search, Show, Read objects both from facebook graph and facebook in general.

So to give you a slight idea of the features this class has, Those are the main features the class supports:
<ul>
	<li>Get, get objects information (an object is a user, page, event, like, group, photo, album, note, status message, etc..).</li>
	<li>Get, get user information ( based on the extended permissions the user has provided you, You can get the users information such as email, activities, status messages, wall feed, news feed, movies, groups, picture, photos, albums, tags, notes, links, likes, work, education, etc... ).</li>
	<li>Post, Post certain content directly to facebook ( this requires the publish_stream extended permissions and maybe event more depending on the type of content being posted, You can post status update, wall feed, like, link, note, album, photo, event, comment to a feed, attend/decline/maybe attend an event  ).</li>
	<li>Search, Search for a certain content from facebook ( searching for users requires extended permissions, but you can search by types such as users, pages, groups, events, post, and any search keyword or query ).</li>
	<li>Plugins, You can post any plugin and customize it with simple call to a method, Most of the plugins support both iframe and fbml tags ( publish activity boxes, like buttons, like boxes, recommendations boxes, face pile, live stream, fbml login button ).</li>
</ul>
Although you are using this library you can always fall back to the regular api method call ($facebook->api('METHOD NAME')) when ever you like as this class extends the facebook php sdk class.

There is a PHPDocumentation included so you can read through the descriptions of each method to see what parameters it accepts, what it does and what it returns.

So for a start we will get the current logged in user information

```

// Session based graph API call.
if ($facebook->getSession()) {
try {
print_r($facebook->getInfo());
} catch (Exception $e) {
print $e->getMessage();
}
}

```

The above code returned

```

array(
[id] => 535332309
[name] => Vadim Vincent Gabriel
[first_name] => Vadim
[middle_name] => Vincent
[last_name] => Gabriel
[link] => http://www.facebook.com/vadim.v.gabriel
[about] => Nothing much you need to know about.
[birthday] => 01/31/1988
........
)

```

The same thing ca be done for any other member by passing the member id as the first argument of the method, For example:

```

// Session based graph API call.
if ($facebook->getSession()) {
try {
print_r($facebook->getInfo(4));
} catch (Exception $e) {
print $e->getMessage();
}
}
// The 4 is Mark Zuckerberg profile ID
array(
[id] => 4
[name] => Mark Zuckerberg
[first_name] => Mark
[last_name] => Zuckerberg
[link] => http://www.facebook.com/zuck
[timezone] => -7
[updated_time] => 2010-04-25T15:49:33+0000
)

```

If we need or want to display the members picture we can do the following

Note: You only need to enclose the method calls inside a try catch blocks only if you enabled the throwException option.

```

print $facebook->getPicture();

```

that outputs: https://graph.facebook.com/535332309/picture

So all you need to do to show a members picture from facebook is:

```

print "<img src='". $facebook->getPicture() ."' />";

```

If you need to show another user profile picture then just pass his profile ID as the first argument.
The above method applies not just to users but to any other object such as page, event, group, application, photo album etc...

Getting information about an object never been easier, All you have to do is use the following method and pass the object unique ID

```

print_r($facebook->get('cocacola'));

print_r($facebook->get('2204501798'));

```

Outputs:

```

array
(
[id] => 40796308305
[name] => Coca-Cola
[picture] => http://profile.ak.fbcdn.net/object3/1853/100/s40796308305_2334.jpg
[link] => http://www.facebook.com/coca-cola
[category] => Consumer_products
[username] => coca-cola
[products] => Coca-Cola is the most popular and biggest-selling soft drink in history, as well as the best-known product in the world.

Created in Atlanta, Georgia, by Dr. John S. Pemberton, Coca-Cola was first offered as a fountain beverage by mixing Coca-Cola syrup with carbonated water. Coca-Cola was introduced in 1886, patented in 1887, registered as a trademark in 1893 and by 1895 it was being sold in every state and territory in the United States. In 1899, The Coca-Cola Company began franchised bottling operations in the United States.

Coca-Cola might owe its origins to the United States, but its popularity has made it truly universal. Today, you can find Coca-Cola in virtually every part of the world.
[fan_count] => 5446406
)
Array
(
[id] => 2204501798
[owner] => Array
(
[name] => Dustin Moskovitz
[id] => 6
)

[name] => Emacs users
[description] => People who use the greatest, most efficient editor around: emacs.*

*Some modifications required.
[link] => http://www.gnu.org/software/emacs/
[privacy] => OPEN
[updated_time] => 2006-07-17T10:23:21+0000
)

```

The following methods are used to retrieve information regarding a user, If no argument is passed to the following methods then it assumes that the user is the currently logged in user.

```

// Get the current logged in users friends
print_r($facebook->getFriends());

// Get Marks movies
print_r($facebook->getMovies(4));

// Get Marks books
print_r($facebook->getBooks(4));

// Get the current logged in users friends
print_r($facebook->getNotes());

// Get the current logged in users friends
print_r($facebook->getPhotos());

// Get the current logged in users friends
print_r($facebook->getVideos());

// Get Marks events
print_r($facebook->getEvents(4));

// Get Marks groups
print_r($facebook->getGroups(4));

// Get the current logged in users friends
print_r($facebook->getLinks());

// Get the current logged in users friends
print_r($facebook->getLikes());

// Get the current logged in users friends
print_r($facebook->getProfileFeed());

// Get the current logged in users friends
print_r($facebook->getNewsFeed());

```

Each of the above methods returns a PHP array, Based on the amount of content exists for each object you can except to have a limited amount of content but with an array element called paging that visiting that link will load the next content in line.
For example if i have 300 links in my profile then it will load 25 of them and the returned array will have an element key called 'paging' that will have the 'next' and 'previous' links to the next and previous pages of content.

If we want or need to get the event attenders to a certain event then we can do this:

```

// 331218348435 is the event ID in this case this refers to Faecbook Developer Garage at SXSW
print_r( $facebook->getEventAttenders('331218348435') );

```

and it will output

```

array(
[data] => Array
(
[0] => Array
(
[name] => Samer El Housseini
[id] => 876430290
)

[1] => Array
(
[name] => Ali Abrahim
[id] => 1257046849
)

[2] => Array
(
[name] => Arya Aryanie
[id] => 100000943650702
)

[3] => Array
(
[name] => Deepesh Choudhary
[id] => 100000729771921
)

[4] => Array
(
[name] => Romualdo Rossi
[id] => 100000496170854
)
..........

```

Note: Most object ids are really big so it you try to load an object by specifying it's id as an integer and you can't seem to get it right then try to specify it as a string instead.

<strong>Posting To Facebook</strong>

One of the tasks we would like to be able to do is to post to a users facebook profile. This library supports posting to different object. Here are a few examples in calling those methods.

The below methods require for an access token, You *MUST* specify it as it won't let you post anything and you will receive a permission error message instead.
Further more, You have to have the user permission to post to his profile, So make sure you requested the 'publish_stream' extended permission when logging him in, Otherwise this won't work.

<strong>Update User Status Message</strong>

```

print_r($facebook->postStatus(null, $access_token, 'Testing some new applications'));

```

By specifying null as the first argument i am updating my own status, If i specify any profile id as the first argument i will post a feed to that user ids wall.

<strong>Posting a feed to a wall</strong>

```

print_r($facebook->postFeed(null, $access_token, array('message'=>'message test', 'picture'=>'some link to a picture', 'name'=>'name test', 'description'=>'desc test')));

```

By specifying null as the first argument i am posting to my own wall, If i specify any profile id as the first argument i will post a feed to that user ids wall.

<strong>Posting a comment to a feed</strong>

```

print_r($facebook->postComment('535332309_115911521775271', $access_token, 'Ignore me i am just testing stuff...'));

```

The first argument is a feed id which i would like to post a comment to.

<strong>Liking a certain object</strong>

```

print_r($facebook->postLike('535332309_115911521775271', $access_token));

```

The first argument is a feed id i would like to 'like'.

<strong>Posting a note</strong>

```

print_r($facebook->postNote(null, $access_token, array('message'=>'testing', 'subject'=>'test title')));

```

The first argument is the profile id to post this note to, if it's null it will post this to my own profile, if it's set as a users profile id it will post the note in his profile by the currently active user.

<strong>Posting a link</strong>

```

print_r($facebook->postLink(null, $access_token, array('message'=>'link testing', 'link'=>'http://www.google.com')));

```

The first argument is the profile id to post this link to, if it's null it will post this to my own profile, if it's set as a users profile id it will post the link in his profile by the currently active user.

<strong>Creating an event</strong>

```

print_r($facebook->postEvent(null, $access_token, array('description'=>'<b>blah</b>', 'owner' => 'vadim.v.gabriel', 'name'=>'my event', 'start_time'=>time()+60, 'end_time'=> time()+8400)));

```

The first argument is the profile id to post this event to, if it's null it will post this to my own profile, You can't create an event *FOR* a user.

<strong>Attending an event</strong>

```

print_r($facebook->postAttending('116508861714028', $access_token));

```

The current logged in user marks his status as attending to the event id specified in the first argument.

<strong>Maybe attending an event</strong>

```

print_r($facebook->postMaybeAttending('116508861714028', $access_token));

```

The current logged in user marks his status as  maybe attending to the event id specified in the first argument.

<strong>Not attending an event</strong>

```

print_r($facebook->postNotAttending('116508861714028', $access_token));

```

The current logged in user marks his status as not attending to the event id specified in the first argument.

<strong>Post Album</strong>

```

print_r($facebook->postAlbum(null, $sess['access_token'], array('name'=>'My Album', 'message'=>'created...')));

```

Post an album to a users profile. if the first argument is null then it will post to the current logged in user, if it's set to a profile id of anyone else but the current logged in user then it will *NOT* create the album for the profile id set but rather for the currently logged in user.
You can create an album FOR someone.

<strong>Searching</strong>

```

print_r($facebook->search('user', 'vadim gabriel', array('access_token'=>$access_token)));

```

The above will search for a user named 'vadim gabriel'. Notice we specified an access token as it won't search without it.

The above can be changed various of search calls based on the type of search you would like to perform.

The first argument is the type that can be one of the following: user, post, page, event, group.

The second argument is the search query, And the third is the access token which is required when searching.

<strong>Social Plugins</strong>

In todays world websites and web applications try to be more connected and integrated with sites such as twitter, facebook and flickr.

Facebook introduced the graph API and the social plugins (Appendix #2) on the last f8 meeting.

The social plugins allows developers or even site administrators to incorporate certain content from facebook directly into their websites with a simple customization.

This class implements and gains access to all social plugins facebook currently offers, Each has it's own name, method and arguments you can pass and modify to customize it's behavior and the look & feel.

Here are some examples of using the class to display the social plugins.

First thing first, Make sure you've added the fbm namespace into the document by adding the following line into the  tag of your document.

```

xmlns:fb="http://www.facebook.com/2008/fbml"

```

So eventually it looks like this:

```

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">

```

If you plan on using the Open graph protocol make sure you include it's name space in the document  tag as well.

Later we would probably like to include the JS SDK to be able to use the  tags and to be able to display them properly.
In order to include the required JS call the following method in the head section of your document:

```

$facebook->includeScript('APPLICATION ID');

```

Then anything that comes after will be properly loaded and displayed since the required JS is present in the document.

<strong>Show Comments</strong>

```

print $facebook->showComments('http://www.google.com');

```

<strong>Show faces pile</strong>

```

print $facebook->showFacePile();

```

<strong>Show Activity</strong>

```

print $facebook->showActivity('http://www.google.com');

```

<strong>Show Like Button</strong>

```

print $facebook->showLike('http://yiiframework.co.il');

```

<strong>Show Like Box</strong>

```

// PAGE ID instead of URL

print $facebook->showLikeBox('45576747489');

```

<strong>Show Live Stream</strong>

```

// Application ID instead of URL

print $facebook->showLiveStream('112544488784139');

```

<strong>Show Login Button</strong>

```

print $facebook->showLoginButton();

```

<strong>Show Recommendations Box</strong>

```

print $facebook->showRecommendations('yiiframework.co.il');

```
<h5>New!! Search an item on facebook return an array/json of the results. Please read the comments in the file as they show the detailed information and usage for this example.</h5>
```
<?php
// Include and initiate the library
require('facebookLib.php');
$fbtest = new facebooktest;
class facebooktest
{
    // global variables
    public $facebook;
    public $facebookAccessToken;
    public $facebookSession;

    public function __construct() {
        $this->facebook = new facebookLib(array(
                        'appId' => 'xxxx',
                        'secret' => 'xxxx',
                        'cookie' => true
        ));

        facebookLib::$CURL_OPTS[CURLOPT_CAINFO] = 'ca-bundle.crt';

        // In the previous version thoes two were not set by default
        // The first one makes sure then on each request it will use
        // a fresh connect instance so if u had "SSL ERROR..." error messages before
        // it should clear those and create new fresh instances for the new calls
        // the second one actually a mistake i made that i set the default port to 80
        // while most of the time the class connects to a secure url
        // so in the new version 1.2a it was added and set to those settings
        // by default
        facebookLib::$CURL_OPTS[CURLOPT_FRESH_CONNECT] = 1;
        facebookLib::$CURL_OPTS[CURLOPT_PORT] = 443;

        $this->facebookAccessToken = $this->facebook->getAccessToken();

        $this->facebookSession = $this->facebook->getSession();

        // I'm going to think of a better method of doing this, or avoiding doing this...
        if ( $this->facebookSession ) {
            echo '<a href="' . $this->facebook->getLogoutUrl() . '">Logout</a>';
            $this->currentAlbumFacebookArtistBadge();
            } else {
            echo '<a href="' . $this->facebook->getLoginUrl(array('next' => 'http://dev.com/facebookLibrary/test.php', 'req_perms' => 'read_stream,email,user_photos', 'display'=>'popup')) . '">Login</a>';
        }
    }

    // Search method
    public function currentAlbumFacebookArtistBadge() {
        //$albumInfo = $this->currentAlbumAsArray(); // dont know what his is!!

        // By default facebook always returns a json object that you have to manipulate.
        // in the class i wrote i added a flag with getter and setter to help the developer
        // to easily flag the returned response as an array and not json.
        // this is done using the following setting
        $this->facebook->setDecodeJson(true);

        // Use search to find pages matching akon
        $possibleArtists = $this->facebook->search('page', 'akon'); //This is returning a string not an array!!!

        var_dump($possibleArtists);exit;

        if(is_array($possibleArtists)) {
            print_r($possibleArtists); // this should print an array with matches by the search
        } else  {
            // only will get here if the the above search method will return a json object
            // and that will happen if we set the argument in the 'setDecodeJson' to false.
            $somethingBetter = json_decode($possibleArtists);

            $firstChoiceID = $somethingBetter->data[0]->id;

            print($firstChoiceID);
        }

        if ($this->facebook->getSession())
        {
            try {
                $moreInfoFromFacebook = $this->facebook->getInfo($firstChoiceID); // Can't call this with no access info
            } catch (Exception $e) {
                print $e->getMessage();
            }
        }
        // It never seemed to make it this far last night, nor did it throw an error... It started failing higher up even though I had it working down to here previously...
    }
}
```
<h5>Full Documentation and PHPDocumentation available inside the zip/tar archives.</h5>
<h3>Download</h3>
<ul>
	<li><a href="http://yiiframework-co-il-extensions.googlecode.com/files/facebookLibrary1.2a2.zip">Click Here To Download ZIP Archive</a></li>
</ul>
<h4>Issues</h4>
<a href="http://code.google.com/p/yiiframework-co-il-extensions/issues/list" target="_blank">Report Bugs & Feature Requests</a>

<strong>Appendix</strong>
<ol>
	<li>http://developers.facebook.com/docs/authentication/permissions</li>
	<li>http://developers.facebook.com/plugins</li>
</ol>
<strong>Contact Me</strong>

If for some reason your comments are not appearing (due to the high amount of spam i get every day >< ) then you can either post your comment/bug/feature request in the issue tracker above, Or email me directly.

My email is: vadimg88 [at] gmail [dot] com

</div>
