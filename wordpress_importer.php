<?php

define('START', microtime());

$source = $_SERVER['argv'][1] ?? null;
$dest = $_SERVER['argv'][2] ?? dirname(__FILE__);

$sourcePath = $dest . '/source/';
$draftsPath = $dest . '/source/_drafts/';
$postsPath = $dest . '/source/_posts/';

if(!$source || !file_exists($source)) {
    die('Source file was not found.');
}

// Load xml file
$contents = simplexml_load_file($source, "SimpleXMLElement", LIBXML_NOCDATA | LIBXML_PARSEHUGE |
                                                            LIBXML_BIGLINES | LIBXML_NOBLANKS |
                                                            LIBXML_NOEMPTYTAG);

if(!$contents) {
    die('Source file is invalid.');
}

$items = $contents->channel;
$json_string = json_encode($items);
$data = json_decode($json_string, true);

$items = $data['item'];

$dirsToDelete = [$draftsPath, $postsPath];
foreach($dirsToDelete as $dir) {
    if(is_dir($dir)) {
        deleteDir($dir);
    }

    mkdir($dir);
    chmod($dir, 0777);
}

foreach($items as $item) {
    if($item['post_type'] == 'attachment') {
        continue;
    }
    if($item['post_type'] == 'page') {
        importPage($item);
    } elseif($item['post_type'] == 'post') {
        importPost($item);
    } else {
        //print_r($item['post_type']);
    }
}

function info($item) {
    global $sourcePath, $draftsPath, $postsPath;

    $cats = $item['category'];
    $tags = $item['tag'];
    $isPost = $item['post_type'] == 'post';
    $isPage = $item['post_type'] == 'page';
    $published = $postsPath . $item['title'] . '.md';
    $draft = $draftsPath . $item['title'] . '.md';

    if($isPost) {

    }

    return [
        'name' => $item['post_name'],
        'date' => $item['post_date'],
        'title' => $item['title'],
        'dir' => $sourcePath . $item['post_name'],
        'postDir' => $item['status'] == 'publish' ? $published : $draft,
        'status' => $item['status'],
        'categories' => $cats,
        'isPost' => $isPost,
        'isPage' => $isPage,
        'tags' => $tags,
        'content' => $item['encoded'],
    ];
}

function importPage($item) {
    extract(info($item));

    if(is_dir($dir)) {
        deleteDir($dir);
    }

    mkdir($dir);
    chmod($dir, 0777);

    // Create
    $full = $dir . '/index.md';
    e(sprintf("Converting %s", $name));

    if(!$content) {
        e(sprintf("-- No Content"));
        return;
    }

    create($full, info($item));
}

function importPost($item) {
    extract(info($item));

    // Create
    $full = $postDir;
    e(sprintf("Converting %s", $name));

    if(!$content) {
        e(sprintf("-- No Content"));
        return;
    }

    create($full, info($item));
}

function e($msg) {
    echo $msg . PHP_EOL;
}

function create($fullPath, $info) {
    extract($info);

    $contents = $isPage ? templatePage() : templatePost();

    $_categories = getCategories($info);
    $_tags = getTags($info);

    $tempContent = str_replace(
        [
            "[sourcecode language='php']",
            '[/sourcecode]',
            'http://vadimg.com/wp-content/uploads/'
        ],
        [
            '```',
            '```',
            '/assets/'
        ], $content);

    $contents = str_replace(
            [
                '{title}',
                '{date}',
                '{content}',
                '{cats}',
                '{tags}',
            ],
            [
                $title,
                $date,
                $tempContent,
                $_categories,
                $_tags,
            ],
            $contents);

    file_put_contents($fullPath, $contents);
}

function getCategories($info) {
    $rows = [];

    if(isset($info['categories']) && is_array($info['categories'])) {
        foreach($info['categories'] as $category) {
            $rows[] = sprintf('- "%s"', str_replace('"', '', $category));
        }
    }

    return count($rows) ? ("\n" . implode("\n", $rows)) : '';
}

function getTags($info) {
    $rows = [];

    if(isset($info['tags']) && is_array($info['tags'])) {
        foreach($info['tags'] as $tag) {
            $rows[] = sprintf('- "%s"', $tag);
        }
    }

    return count($rows) ? ("\n" . implode("\n", $rows)) : '';
}

function templatePage() {
    return <<<EOF
---
title: "{title}"
date: {date}
---

{content}

EOF;
}

function templatePost() {
    return <<<EOF
---
title: "{title}"
date: {date}
categories: {cats}
tags: {tags}
---

{content}

EOF;
}


function deleteDir($path) {
    return is_file($path) ?
            @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
}
