<?php
 
/**
* Laravel Custom Folder Structure Printer
*
* Prints ONLY custom/useful folders/files
* Ignores vendor, node_modules, storage, etc.
*/
 
$projectPath = __DIR__; // <<< CHANGE PROJECT PATH HERE
 
$ignoredFolders = [
  'vendor',
  'node_modules',
  '.git',
  'storage',
  'bootstrap/cache',
  'public/build',
  'public/hot',
  '.idea',
  '.vscode',
  'tests',
];
 
$ignoredFiles = [
  '.env',
  '.env.example',
  '.gitignore',
  'artisan',
  'composer.lock',
  'package-lock.json',
  'vite.config.js',
  'README.md',
];
 
$allowedExtensions = [
  'php',
  'js',
  'ts',
  'vue',
  'blade.php',
  'json',
  'css',
  'scss',
];
 
function shouldIgnore($path, $ignoredFolders, $ignoredFiles)
{
  foreach ($ignoredFolders as $folder) {
    if (str_contains($path, DIRECTORY_SEPARATOR . $folder)) {
      return true;
    }
  }
 
  if (in_array(basename($path), $ignoredFiles)) {
    return true;
  }
 
  return false;
}
 
function isAllowedFile($file, $allowedExtensions)
{
  foreach ($allowedExtensions as $ext) {
    if (str_ends_with($file, '.' . $ext) || str_ends_with($file, $ext)) {
      return true;
    }
  }
 
  return false;
}
 
function printTree($dir, $basePath, $ignoredFolders, $ignoredFiles, $allowedExtensions, $prefix = '')
{
  $items = scandir($dir);
 
  $items = array_filter($items, function ($item) {
    return $item !== '.' && $item !== '..';
  });
 
  $items = array_values($items);
 
  $count = count($items);
 
  foreach ($items as $index => $item) {
 
    $path = $dir . DIRECTORY_SEPARATOR . $item;
 
    if (shouldIgnore($path, $ignoredFolders, $ignoredFiles)) {
      continue;
    }
 
    // Skip unsupported files
    if (is_file($path) && !isAllowedFile($path, $allowedExtensions)) {
      continue;
    }
 
    $isLast = ($index === $count - 1);
 
    echo $prefix;
    echo $isLast ? '└── ' : '├── ';
    echo $item . PHP_EOL;
 
    if (is_dir($path)) {
      printTree(
        $path,
        $basePath,
        $ignoredFolders,
        $ignoredFiles,
        $allowedExtensions,
        $prefix . ($isLast ? '    ' : '│   ')
      );
    }
  }
}
 
echo basename($projectPath) . PHP_EOL;
 
printTree(
  $projectPath,
  $projectPath,
  $ignoredFolders,
  $ignoredFiles,
  $allowedExtensions
);
 
 