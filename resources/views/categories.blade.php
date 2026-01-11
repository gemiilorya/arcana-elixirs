@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="banner3">
    <div class="header3">
        <h1>Categories</h1>
    </div>
    <div class="row3">
        @if($categories && $categories->count() > 0)
            @foreach($categories->chunk(3) as $chunk)
                <div class="row mb-4">
                    @foreach($chunk as $category)
                        <div class="col-md-4">
                            <div class="card-category">
                                <a href="{{ route('categories.show', $category->slug) }}">
                                    <img src="{{ asset('images/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}">
                                    <h2 class="card-title">{{ $category->name }}</h2>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <p>No categories found.</p>
        @endif
    </div>
</div>
@endsection
