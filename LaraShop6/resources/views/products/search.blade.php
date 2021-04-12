@extends('layouts.master')

@section('hero')
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
    </div>
@endsection
   
@section('content')
   @foreach ($products as $product)
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">
            @foreach ( $product->categories as $category )
              {{$category->name}}
            @endforeach
          </strong>
          <h4 class="mb-0">{{$product->title}}</h4>
          <div class="mb-1 text-muted">{{$product->created_at->format('d/m/y')}}</div>
          <div class="card-text mb-auto">{{$product->subtitle}}</div>
          <div class="card-text mb-auto"><strong>{{$product->getPrice()}}</strong></div>
          <a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-success">Voir l'article</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="{{asset('storage/'.$product->image )}}" alt="">
        </div>
      </div>
    </div>
    @endforeach
    {{ $products->appends(request()->input())->links() }}
@endsection