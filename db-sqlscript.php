<html>
<body>

<?php 

// v.0.1
// use this script at your own risk!
// i've only tested it once so far.
// good luck!
//
// melissa@fieldanpdpostbk.com

// update these variables
$numSites = 18; // including the main site
$dbName = 'localDB';
$oldDomain = 'liveproject.com';
$newDomain = 'localproject.dev';


// you don't need to do anything else
$numChildSites = $numSites - 1;
$sqlQuery = '';

// update site tables
$sqlQuery = "
   UPDATE `{$dbName}`.`wp_sitemeta` 
      SET `meta_value` = 'http://{$newDomain}/' 
      WHERE `wp_sitemeta`.`meta_key` = 'siteurl';

   UPDATE `{$dbName}`.`wp_site` 
      SET `domain` = '{$newDomain}' 
      WHERE `wp_site`.`domain` LIKE '%{$oldDomain}';

   UPDATE `{$dbName}`.`wp_options` 
      SET `option_value` = 'http://{$newDomain}' 
      WHERE `wp_options`.`option_name` = 'siteurl';

   UPDATE `{$dbName}`.`wp_options` 
      SET `option_value` = 'http://{$newDomain}' 
      WHERE `wp_options`.`option_name` = 'home';

   UPDATE `{$dbName}`.`wp_blogs` 
      SET `domain` = '{$newDomain}';

   ";


// update blog tables
for ($i=0; $i < $numChildSites; $i++) {
   $blogID = $i+2;
   $blogTable = 
      "UPDATE `{$dbName}`.`wp_{$blogID}_options` 
         SET `option_value` = REPLACE(`option_value`, '{$oldDomain}', '{$newDomain}') 
         WHERE `wp_{$blogID}_options`.`option_name` = 'siteurl';
      UPDATE `{$dbName}`.`wp_{$blogID}_options` 
         SET `option_value` = REPLACE(`option_value`, '{$oldDomain}', '{$newDomain}') 
         WHERE `wp_{$blogID}_options`.`option_name` = 'home';
      
      ";

   $sqlQuery = $sqlQuery . $blogTable;
}

echo "<pre>" . $sqlQuery . "</pre>";

?>
</body>
</html>
