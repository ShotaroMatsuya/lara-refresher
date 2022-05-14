@extends('layouts.app')



@section('content')

<div class="card card-default">

    <div class="card-header">
        {{ isset($category) ? 'Edit Category' : 'Create Category'}}
    </div>
    <div class="card-body">
        {{-- partials/error.blade.phpの内容を取得 --}}
        @include('partials.errors')

        <!-- name routeを使用-->
    <form action="{{ isset($category) ? route('categories.update',$category->id):route('categories.store')}}" method="POST">
            @csrf
            @if (isset($category))
            @method('PUT') {{-- put ,patch , deleteなどのメソッドはこのように指定する必要がある  --}}

            @endif
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{isset($category)? $category->name: ''}}">

            </div>
            <div class="form-group">
                <button class="btn btn-success">
                    {{isset($category) ? 'Update Category': 'Add Category'}}
                </button>
            </div>
        </form>
    </div>

</div>

@endsection
