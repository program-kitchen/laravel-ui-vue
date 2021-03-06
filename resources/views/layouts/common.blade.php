<DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>@yield('title')｜nodoame.net</title>
<meta name="description" itemprop="description" content="@yield('description')">
<meta name="keywords" itemprop="keywords" content="@yield('keywords')">
<link href="../../css/app.css" rel="stylesheet">
</head>
<body>
@yield('header')

<div id="app" class="h-75">
    <!-- コンテンツ -->
    <div class="main">
        @yield('content')
    </div>

    <!-- 共通メニュー -->
    <!-- <div class="sub">
        @yield('submenu')
    </div> -->
</div>

@yield('footer')
<script src="js/app.js"></script>
</body>
</html>
