@extends('layouts.common')

@section('title', 'タイトル')
@section('keywords', 'キーワード1')
@section('description', 'ページの説明文です')

@include('layouts.header')

@section('content')
    <p>ここにbladeファイルの中身を書いていく</p>
    <p>layouts.commonのbladeを継承し、yieldのcontentに埋め込まれる</p>

    <!-- 下記vueのコンポーネントファイル -->
    <example-component></example-component>
@endsection

@include('layouts.submenu')

@include('layouts.footer')
