<?php
require_once 'vendor/autoload.php';

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverSelect;

$port = null; // 個別にお知らせした Selenium Server のポート番号に書き換えてくださいませ
$host = "http://192.168.0.19:{$port}/wd/hub";

$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

/**
 * テスト用サイト(リニューアルされた予約フォーム)にアクセスする
 */
$driver->get('http://example.selenium.jp/reserveApp_Renewal/');
sleep(3);

/**
 * 宿泊日を設定する (宿泊日のテキストボックスに「2019/10/01」を入力し, 宿泊数のプルダウンから「3」泊を選択する)
 */
// 宿泊日を入力してください
$driver->findElement(WebDriverBy::id('datePick'))->clear()->sendKeys('2019/10/01');
// おまじない: 宿泊日のカレンダーが, 人数のプルダウンを覆ってしまい後続の処理で選択できなくなるので, カレンダーを消しておく
$driver->findElement(WebDriverBy::tagName('body'))->click();

// 宿泊数を選択してください(ヒント: 宿泊数はテキストボックスからプルダウンに変更になっています. プルダウンを選択したい場合は下記のコードを参考にしてください)
$selector = new WebDriverSelect($driver->findElement(WebDriverBy::name('reserve_t')));
$selector->selectByValue(3);
sleep(3);


/**
 * 人数を設定する (プルダウンから「3」人を選択する)
 */
$selector = new WebDriverSelect($driver->findElement(WebDriverBy::name('hc')));
$selector->selectByValue(3);
sleep(3);


/**
 * 朝食バイキングを設定する (ラジオボタンの「なし」を選択する)
 */
$driver->findElement(WebDriverBy::id('breakfast_off'))->click();
sleep(3);


/**
 * プランを設定する(チェックボックスの「昼からチェックインプラン」を選択する)
 */
$driver->findElement(WebDriverBy::name('plan_a'))->click();
sleep(3);


/**
 * お名前を設定する (テキストボックスに「hoge」を入力する)
 */
$driver->findElement(WebDriverBy::name('gname'))->clear()->sendKeys('hoge');
sleep(3);


/**
 * 利用規約に同意して次へをクリックする
 */
$driver->findElement(WebDriverBy::id('agree_and_goto_next'))->click();
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
