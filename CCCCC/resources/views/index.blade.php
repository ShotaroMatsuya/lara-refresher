<x-layout>
    <x-slot name="title">
        {{-- slot以外の変数を埋め込みたい場合はlayoutで定義した変数をname属性に渡す --}}
        My BBS
    </x-slot>
    {{-- lauyoutコンポーネントのslotに読み込ませたいcodeをここに書く --}}
    <h1>My BBS</h1>

    <ul>
        {{-- @foreach ($posts as $post)
            <li>{{ $post }}</li>
        @endforeach --}}
        @forelse ($posts as $post)
        <a href="{{ route('posts.show',$post) }}">
            <li>{{ $post->title }}</li>
        </a>
        @empty
            <li>No posts yet!</li>
        @endforelse
    </ul>
</x-layout>
