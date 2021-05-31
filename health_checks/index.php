pong

<br/><br/><br/>****** Anything this line and down better be gone before this gets to production!!! *********
<br/>ping <br/> Have / going here temporarily.<br/><br/>


<?php
// exec('chown -R www-data:www-data /var/www')
echo "<br/><br/>Toga<br/><br/>";
echo "This server's ip is: {$_SERVER['SERVER_ADDR']}";

echo "<br/><br/>Checking files on the EFS";

$dir = "/var/www/html/toga";

// Open a directory, and read its contents
if (is_dir($dir)){
    echo "It be mounted anyway! <br/>";
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      echo "filename:" . $file . "<br>";
    }
    closedir($dh);
  }
}
$dir = "/var/www/html/LEAF_Request_Portal/templates_c";

// Open a directory, and read its contents
if (is_dir($dir)){
    echo "It be mounted anyway! <br/>";
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      echo "filename:" . $file . "<br>";
    }
    closedir($dh);
  }
}
$dir = "/var/www/html/LEAF_Request_Portal/files";

// Open a directory, and read its contents
if (is_dir($dir)){
    echo "It be mounted anyway! <br/>";
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      echo "filename:" . $file . "<br>";
    }
    closedir($dh);
  }
}
?>