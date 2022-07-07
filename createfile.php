<?php
include 'init.php';
header('Content-type: text/plain');
?>
#!/bin/bash
echo 'LinkTo Dynamic DNS is now running!'
if ! command -v curl &> /dev/null
then
    echo 'Sorry, we were unable to find CURL installed on your machine. CURL is required to use LinkTo Dynamic DNS. Please install CURL and run this script again. Thank you.'
    exit
fi
curl -d "sid=<?=$_SESSION['sid']?>&alias=<?=$_SESSION['alias']?>" -X POST <?=$shorturl?>api
echo 'Your server is now live at <?=$shorturl?><?=$_SESSION['alias']?>'