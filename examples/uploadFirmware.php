<?php
/*
 * @project phpSpark
 * @file    examples/uploadFirmware.php
 * @authors Harrison Jones (harrison@hhj.me)
 * @date    March 16, 2015
 * @brief   Examples file.
 */

// For testing purposes we want to be as strict as possible
error_reporting(E_STRICT);

// Include the required files. You will need to rename phpSpark.config.sample.php to phpSpark.config.php and then set the values within to use this example
if((@include '../phpSpark.class.php') === false)  die("Unable to load phpSpark class");
if((@include '../phpSpark.config.php') === false)  die("Unable to load phpSpark configuration file");

// Grab a new instance of our phpSpark object
$spark = new phpSpark();

// Set the internal debug to true. Note, calls made to $spark->debug(...) by you ignore this line and display always
$spark->setDebug(true);
// Set the debug calls to display pretty HTML format. Other option is "TEXT". Note, calls made to $spark->debug(...) display as set here
$spark->setDebugType("HTML");

// Set our access token (set in the phpConfig.config.php file)
$spark->setAccessToken($accessToken);

// Upload firmware to your Spark Core
$spark->debug("Spark Firmware Upload");
if($spark->uploadFirmware($deviceID,"tinker.bin","tinker.bin",false) == true)
{
    $spark->debug_r($spark->getResult());
}
else
{
    $spark->debug("Error: " . $spark->getError());
    $spark->debug("Error Source" . $spark->getErrorSource());
}
?>