<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;


class WebScraperController extends Controller
{
   public function index() {
       return view('scrapper');
   }

   public function scraper() {
       $client = new Client();
       $crawler = $client->request('GET', 'https://www.symfony.com/blog/');
       $goutteClient = new Client();
       $guzzleClient = new GuzzleClient(array(
           'timeout' => 60,
       ));
       $goutteClient->setClient($guzzleClient);
       // Get the latest post in this category and display the titles
       $crawler->filter('h2 > a')->each(function ($node) {
           print $node->text()."\n";
       });
   }
}
