<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

function formattedToFloat(string $number): float
{
    $number = preg_replace('/[^0-9,-]/', '', $number);
    $number = str_replace(',', '.', $number);
    return (float) $number;
}

function getPrice (string $url, string $selector): float {
    $html = Http::get($url);
    $crawler = new Crawler($html);
    $crawler = $crawler->filter($selector);
    if ($crawler->count() === 0) {
        throw new \Exception('Price not found, please adjust selector!');
    }
    $number = $crawler->first()->text();
    return formattedToFloat($number);
}

Route::get('/', function () {
     return getPrice('https://www.moemax.hu/p/modern-living-tkezoasztal-herkules-001630002101', '#currentPrice');
});
