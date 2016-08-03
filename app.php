<?php

require_once 'vendor/autoload.php';

use Goutte\Client;

$client = new Client();

$crawler = $client->request('GET', 'http://www.index.hr/vijesti/clanak/presuda-perkovicu-i-mustacu-proglaseni-krivima-i-osudjeni-na-dozivotni-zatvor/910349.aspx');


$content = [];
$content['title'] = $crawler->filter('#article_title_inner > h1')->first()->text();

$crawler->filter('#article_text p')->each(function ($node) use (&$content) {
    $content['body'][] = $node->text();
});

var_dump($content);