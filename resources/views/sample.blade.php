@extends('layouts.common')

@section('title', 'タイトル')
@section('keywords', 'キーワード1')
@section('description', 'ページの説明文です')

@include('layouts.header')

@section('content')
    <p>ここにbladeファイルの中身を書いていくことになります</p>
    <p>layouts.commonのbladeを継承し、yieldのcontentに埋め込まれる</p>

    <!-- 下記vueのコンポーネントファイル -->
    <p>Vueのコンポーネントファイルもここで使えます</p>
    <example-component></example-component>
    <table-component></table-component>
@endsection

@include('layouts.footer')
