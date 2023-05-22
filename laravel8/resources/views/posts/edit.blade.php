<x-layout>
    <x-slot name="title">
        Edit Post - My BBS
    </x-slot>
    <div class="back-link">
        &laquo; <a href="{{ route('posts.show',$post) }}">Back</a>
    </div>
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update',$post) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">

            <label for="">
                <input type="text" name="title" value="{{ old('title',$post->title) }}">
            </label>
            @error('title')
            <div class="error">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">

            <label >
                Body
                <textarea name="body" id="" cols="30" rows="10">{{ old('body',$post->body) }}</textarea>
            </label>
            @error('body')
            <div class="error">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-button">

            <button>Update</button>
        </div>
    </form>

</x-layout>
