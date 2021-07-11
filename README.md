<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel-Vueの環境

本プロジェクトはdevelopブランチに環境が作られています。

すぐ環境を使いたい場合はdevelopブランチを利用ください。


## LaravelでVue利用のセッティング


LaravelにVueを導入し、Bladeに組み込んだりする方法を記載します。

大まかな手順は下記となります。

- Laravelのインストール
- Laravel-uiの導入
- Vueの導入
- Laravel Mixの導入

## 必要環境

下記は事前にインストールしておいてください。

- php
- Composer
- DB環境(MySQLなど)
- node
- npm

## Laravelのインストール

下記コマンドでプロジェクトを作成する

```
composer create-project laravel/laravel [プロジェクト名] --prefer-dist
```

## Laravel-uiのインストール

下記コマンドでLaravel-uiをインストールします

```
composer require laravel/ui
```

## Vueのインストール

Laravel-uiがインストールされたので、Vueを導入します

```
php artisan ui vue
```

※もし、認証機能も一緒に入れたい場合は `--auth` オプションをつけると認証機能も合わせて導入されます。

すでにLaravelをインストールした際に、package.jsonがあるため、そこにVueの記載が出来上がります。

## Laravel Mixの導入

Laravel Mixとは、フロントのアセットをコンパイルするツールのことです。

デフォルトのpackage.jsonファイルには、Laravel Mixの使用を開始するために必要なすべてのものがすでに含まれています。

先程のVueインストールで、この中にVueの導入も含まれるようになったので、下記コマンドでインストールを実施しましょう。

```
npm install
```

Vueはコンパイルで使用ができるようになります(Webpack)

Laravel Mixを使うことで簡単にWebpackを使うことができるようになっています。


そのため、下記コマンドで全てのMixタスクの実行(コンパイル)を実施しましょう。

resourcesディレクトリ以下のファイルがコンパイルされます。

```
npm run dev
```

本番環境とかに上げる前は必ず下記を実行しましょう。(圧縮)

```
npm run prod
```

アセットの変更を監視しながらの場合は下記コマンドを実行します。

```
npm run watch
```


### コンパイル設定

コンパイルの設定については、`webpack.mix.js` に書かれています。

下記設定によって、`resources/js/app.js'`が`public/js`にコンパイルされたファイルをおくディレクトリになり、`resources/sass/app.scss`が`public/css`にコンパイルされたファイルをおくディレクトリと言った設定になっています。


```
mix.js('resources/js/app.js', 'public/js').vue({ version: 2 })
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
```


### Vueのコンパイル

Laravel Mixでは、vueメソッドを使用することで、Vue単一ファイルコンポーネントのコンパイルサポートに必要なBabelプラグインを自動的にインストールします。

JavaScriptがコンパイルされたら、アプリケーションから参照できるようになります。

```
<head>
    <!-- ... -->

    <script src="/js/app.js"></script>
</head>
```


## Vueの単一ファイルコンポーネントの利用

Vueファイルを利用する場合について明記します。

Vueのサンプルファイルが`resources/js/components`以下に`ExampleComponent.vue`として置かれています。

このディレクトリに置くことで、Laravel Mixのタスク実行で自動的にコンパイルされます。

Bladeファイルで利用するためには、`resources/js/app.js`に以下を追記する必要があります。

```
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// コンポーネントを作ったら下記にどんどん追記する。
Vue.component('ケバブケースでの記述', require('./components/vueファイル名').default);
```

Bladeファイルでは下記のように記述して利用します。

```
<example-component></example-component>
```


この時、resources/js/app.jsでは、
```
const app = new Vue({
    el: '#app',
});
```
と記載されているため、`id="app"`タグの中でvueファイルを使う必要があります。

Bladeファイルの親を`id="app"`で括ってあげればVueの単一ファイルコンポーネントをどこでも利用できるようになります。


## (補足)Bootstrapのインストール

BootstrapもLaravel-uiで簡単に導入できます。

```
php artisan ui bootstrap
```
