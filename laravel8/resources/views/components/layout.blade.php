<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
        {{-- publicフォルダからのパスを指定したい場合はurlメソッド --}}
    </head>
    <body>
        <div class="container">
            {{--各viewファイル内でこのlayoutコンポーネントを読み込んでslotに埋め込みたいコードを指定する --}}
            {{ $slot }}
        </div>
    </body>

</html>
