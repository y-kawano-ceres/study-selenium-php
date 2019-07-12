# study-selenium-php
社外勉強会 https://www.wantedly.com/projects/328589 で使用するソースコードです(当日までに commit します, coming soon!)

## PHP のバージョン
  - ^5.6 || ~7.0 (5.6.0 以上 6.0.0 未満, もしくは 7.0.0 以上 8.0.0 未満) であれば OK です, 動かせます

### macOS にバンドルされている PHP のバージョンを確認する

```bash
$ which php
/usr/bin/php

$ php -v
PHP 7.1.23 (cli) (built: Feb 22 2019 22:08:13) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2018 Zend Technologies
```
※ ターミナル, もしくは iTerm2 等を使用して確認ができます

私は macOS Mojave を使用しており, バンドルされている PHP のバージョンは 7.1.23 でした.

もし, これ以外のバージョンがインストールされている場合は, PHP のバージョンを見直しましょう.    
homebrew を使ったり, など方法は色々あるかと思いますが, macOS のバージョンを上げるのが一番よいかと思います.
