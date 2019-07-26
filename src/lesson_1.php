<?php
require_once 'vendor/autoload.php';

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

// $host = 'http://localhost:14444/wd/hub';
$port = null;
$host = "http://192.168.0.19:{$port}/wd/hub";

$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

// テスト用サイト(予約フォーム)にアクセスする
$driver->get('http://example.selenium.jp/reserveApp/');
sleep(3);


/**
 * 宿泊日を設定する (各テキストボックスに「2019」年「8」月「1」日から「3」泊を入力する)
 */
$driver->findElement(WebDriverBy::name('reserve_y'))->clear()->sendKeys(2019);
$driver->findElement(WebDriverBy::name('reserve_m'))->clear()->sendKeys(8);
$driver->findElement(WebDriverBy::name('reserve_d'))->clear()->sendKeys(1);
$driver->findElement(WebDriverBy::name('reserve_t'))->clear()->sendKeys(3);


/**
 * 人数を設定する (テキストボックスに「3」人を入力する)
 */
$driver->findElement(WebDriverBy::name('hc'))->clear()->sendKeys(3);


/**
 * 朝食バイキングを設定する (ラジオボタンの「なし」を選択する)
 */
$driver->findElement(WebDriverBy::id('breakfast_off'))->click();


/**
 * プランを設定する(チェックボックスの「昼からチェックインプラン」を選択する)
 */
$driver->findElement(WebDriverBy::name('plan_a'))->click();


/** 
 * お名前を設定する (テキストボックスに「hoge」を入力する)
 */
$driver->findElement(WebDriverBy::name('gname'))->clear()->sendKeys('hoge');
sleep(3);


/**
 * 次へをクリックする
 */
$driver->findElement(WebDriverBy::id('goto_next'))->click();
sleep(3);


/**
 * 確定をクリックする
 */
$driver->findElement(WebDriverBy::id('commit'))->click();
sleep(3);


/**
 * ウィンドウを閉じる
 */
$driver->quit();
