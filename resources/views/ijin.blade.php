<?php


function option()
{
  $f = $_SERVER['PHP_SELF'];
  echo "\n##===========>> iseng by haripinter";
  echo "\nUsage: php " . $f . " [option] [input] [ouput]";
  echo "\nExamp: php " . $f . " file2hex binari_file binari_file.txt";
  echo "\n##=====>>";
  echo "\n\nOption:";
  echo "\n  - file2hex -> convert any files to hex format";
  echo "\n  - hex2file -> convert hex format to original file";
  echo "\n  - file2base64 -> convert any files to base64 encoding";
  echo "\n  - base642file -> convert base64 encoding to original file";
  echo "\n\n";
  exit;
}

$mode     = $argv[1];
$filename = $argv[2];
$output   = $argv[3];

$res = '';
switch ($mode) {
  case 'file2hex':
    $tmp = unpack("H*", file_get_contents($filename));
    $res = current($tmp);
    break;

  case 'hex2file':
    $res = pack("H*", file_get_contents($filename));
    break;

  case 'file2base64':
    $res = base64_encode(file_get_contents($filename));
    break;

  case 'base642file':
    $res = base64_decode(file_get_contents($filename));
    break;

  default:
    option();
}
file_put_contents($output, $res);
