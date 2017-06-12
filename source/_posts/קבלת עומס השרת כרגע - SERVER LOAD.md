---
title: "קבלת עומס השרת כרגע - SERVER LOAD"
date: 2009-09-24 10:36:23
categories: 
tags: 
- "זמן טעינה"
- "זמן טעינת שרת"
- "זמן שרת"
- "עומס"
- "עומס שרת"
- "שרת"
---


<p>פונקציה אשר מחזירה את זמן טעינת השרת SERVER LOAD תומכת ברוב מערכות ההפעלה כיום.</p>

<!--more-->

```
<?php

/**
 * Retrieve server load
 *
 * NOTE: You should cache the value returned to perform the check every X sec/min
 * To reduce the page load time.
 *
 * @return	string	Server load
 */
function getServerLoad()
{
	$load_limit			= "";

	// Get the server load if loadavg avilable
	if ( @file_exists('/proc/loadavg') )
	{
		if ( $fh = @fopen( '/proc/loadavg', 'r' ) )
		{
			$data = @fread( $fh, 6 );

			@fclose( $fh );

			$load_avg	= explode( " ", $data );
			$load_limit	= trim($load_avg[0]);
		}
	}
	else if( strpos( strtolower( PHP_OS ), 'win' ) === 0 )
	{
		/*---------------------------------------------------------------
		| typeperf is an exe program that is included with Win NT,
		|	XP Pro, and 2K3 Server.  It can be installed on 2K from the
		|	2K Resource kit.  It will return the real time processor
		|	Percentage, but will take 1 second processing time to do so.
		|	This is why we shall cache it, and check only every 2 mins.
		|
		|	Can also be obtained from COM, but it's extremely slow...
		---------------------------------------------------------------*/

		$serverstats = @shell_exec("typeperf \"Processor(_Total)\% Processor Time\" -sc 1");

		if( $serverstats )
		{
			$server_reply	= explode( "\n", str_replace( "\r", "", $serverstats ) );
			$serverstats	= array_slice( $server_reply, 2, 1 );
			$statline		= explode( ",", str_replace( '"', '', $serverstats[0] ) );
			$load_limit		= round( $statline[1], 4 );
		}
	}
	else
	{
		if ( $serverstats = @exec("uptime") )
		{
			preg_match( "/(?:averages)?\: ([0-9\.]+)(,|)[\s]+([0-9\.]+)(,|)[\s]+([0-9\.]+)/", $serverstats, $load );

			$load_limit = $load[1];
		}
	}

	return $load_limit;
}

?>
```

