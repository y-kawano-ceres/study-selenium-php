<?php
require_once 'vendor/autoload.php';

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverSelect;

$host = 'http://localhost:14444/wd/hub';
//$host = 'http://172.16.3.247:4444/wd/hub';

$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

/**
 * テスト用サイト(リニューアルされた予約フォーム)にアクセスする
 */
$driver->get('http://example.selenium.jp/reserveApp_Renewal/');


/**
 * 宿泊日を設定する (宿泊日のテキストボックスに「2019/08/01」を入力し, 宿泊数のプルダウンから「3」泊を選択する)
 */
// 宿泊日を入力してください

// おまじない: 宿泊日のカレンダーが, 人数のプルダウンを覆ってしまい後続の処理で選択できなくなるので, カレンダーを消しておく
$driver->findElement(WebDriverBy::tagName('body'))->click();

// 宿泊数を選択してください(ヒント: 宿泊数はテキストボックスからプルダウンに変更になっています. プルダウンを選択したい場合は下記を参考にしてください)
// $selector = new WebDriverSelect($driver->findElement(...));
// $selector->selectByValue(...);


/**
 * 人数を設定する (プルダウンから「3」人を選択する)
 */


/**
 * 朝食バイキングを設定する (ラジオボタンの「なし」を選択する)
 */


/** 
 * プランを設定する(チェックボックスの「昼からチェックインプラン」を選択する)
 */


/**
 * お名前を設定する (テキストボックスに「hoge」を入力する)
 */


/**
 * 利用規約に同意して次へをクリックする
 */


/**
 * 確定をクリックする
 */


/**
 * ウィンドウを閉じる
 */
$driver->quit();
