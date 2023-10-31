@extends('layouts')
@section('main')
  <div class="container">
    <div class="text-right">
    <a href="product/create" class="btn btn-dark mt-2">New Product</a>
    </div>
    @if($message=Session::get('success'))
<div class="alert alert-success alert-block">

<strong>{{$message}}</strong>
</div>
@endif
    <table class="table mt-2 table-hover">
    <thead>
      <tr>
        <th>S. No.</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $prod)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$prod->name}}</td>
        <td>{{$prod->description}}</td>
        <td>
          <img src="products/{{$prod->image}}" class="rounded-circle" width="50px" height="50px" alt="">
        </td>
        <td><a href="/product/{{$prod->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
        <!-- <a href="/product/{{$prod->id}}/delete" class="btn btn-danger btn-sm">Delete</a> -->
<form class="d-inline" action="/product/{{$prod->id}}/delete" method="post">
  @method('delete')
  @csrf
  <button class="btn btn-danger btn-sm" value="submit">Delete</button>
</form>

      </td>
      </tr>
     @endforeach
    </tbody>
  </table>
  </div>
@endsection
  

 