<?php
// Created 2024 by Gustav Neustadt
// gustavneustadt.de
// MIT License. See http://opensource.org/licenses/MIT


// A PHP script tailored for the Kirby CMS that helps
// to identify and remove unreferenced media files
// along with their associated TXT files.
//
// Given a content file and a directory, the script
// will find all referenced file UUIDs in the content
// file and then compare each UUID with the one present
// within each media TXT file located in the directory.
// If a media TXT file’s UUID is not found in the
// content, both the media file and its TXT file are
// marked for deletion. The script supports two modes –
// default and `--execute` mode.
//
// - In default mode, the script will print out the
// list of media files that would be deleted under
// normal operation, without actually deleting
// anything.
// - In `--execute` mode, the script will delete the
// identified files.
//
// ## How to use this script
//
// Run this script via command line by typing:
// `php script.php /path/to/content/ content.txt` or
// `php script.php /path/to/content/ content.txt
// --execute` to execute the deletion.
//
// Replace `/path/to/content/` and `content.txt` with
// your relative directory path and actual content file
// name.
//
// ## Warning
//
// ALWAYS BACKUP your files before running this script.
// I’m NOT responsible for any loss of data. Please use
// at your own risk!
//
// Make sure to run the script first in default mode to
// ensure the script works as expected before running
// the `--execute` mode.


function promptUserYN($message = "Continue? [y/N]") {
    echo $message;

    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    $response = strtolower(trim($line));

    return ($response === 'y');
}

if ($argc < 3) {
    var_dump($argv);
    die("You need to provide the directory and content file names!" . PHP_EOL . "Usage: php script.php ./relative/path/ content.txt" . PHP_EOL);
}

$relative_directory = $argv[1]; // Getting relative directory path from the first input argument
$directory = realpath($relative_directory) . '/'; // Converting to absolute path
$content_file_name = $argv[2]; // Getting content_file_name from the second input argument

$execute = isset($argv[3]) && $argv[3] == "--execute" ? true : false;
$file_extension = '.txt';

$content_file_path = $directory . $content_file_name;

if (!file_exists($content_file_path)){
    var_dump($argv);
    die("Content file does not exist." . PHP_EOL);
}

echo "Reading content from file: $content_file_name ..." . PHP_EOL;
$content = file_get_contents($content_file_path);

echo "Extracting file UUIDs from content..." . PHP_EOL;
preg_match_all('/file:\/\/(.+)/', $content, $matches);
$file_uuids = $matches[1];
echo "Found " . count($file_uuids) . " file UUIDs in content." . PHP_EOL;

echo "Checking txt files in directory: $directory ..." . PHP_EOL;
$txt_files = array_filter(glob($directory . '*' . $file_extension), fn($file) => $file != $content_file_path);

echo "Found " . count($txt_files) . " txt files in directory." . PHP_EOL . PHP_EOL;

$delete_files = [];

foreach ($txt_files as $txt_file) {
    if ($txt_file !== $content_file_path) {
        // Get UUID from txt file
        $media_content = file_get_contents($txt_file);
        preg_match('/Uuid: (.+)/', $media_content, $media_uuid_match);
        if(!isset($media_uuid_match[1])) {
            continue;
        }
        $media_uuid = $media_uuid_match[1];

        echo "File: ".str_replace($directory, '', $txt_file).PHP_EOL;
        echo "UUID: $media_uuid".PHP_EOL;

        if (!in_array($media_uuid, $file_uuids)) {
            echo "\033[31mUnused. Marking file for deletion...\033[0m" . PHP_EOL;
            $delete_files[] = str_replace($file_extension, '', $txt_file); // Add filename without extension
        } else {
            echo "\033[32mFile will not be deleted.\033[0m" . PHP_EOL;
        }
        echo PHP_EOL;
    }
}

if(count($delete_files) < 1) {
    die("\033[32mNo abandoned files found.\033[0m".PHP_EOL);
}

echo "Check the list of marked files (".count($delete_files).") for deletion: " . PHP_EOL;
foreach($delete_files as $filename) {
    echo str_replace($directory, '', $filename) . PHP_EOL;
}
echo PHP_EOL;


$confirm = $execute ? true : promptUserYN("\033[31mDo you want to proceed? [y/N]\033[0m");

// Delete each file that is not referenced
$deleted_files = 0;

if($confirm) {

    foreach($delete_files as $filename)
    {
        $media = $filename;
        $text_file = $media . $file_extension;

        // Delete the media file and txt file if they exist
        if (file_exists($media)) {
            echo "Deleting media file: $filename ..." . PHP_EOL;
            unlink($media);
            $deleted_files++;
        }
        if (file_exists($text_file)) {
            echo "Deleting txt file: $text_file ..." . PHP_EOL;
            unlink($text_file);
        }
    }

    echo "$deleted_files files were deleted." . PHP_EOL;

}

echo "Execution complete." . PHP_EOL;
?>