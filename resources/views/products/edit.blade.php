@extends('layouts')
@section('main')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <h3>Product Edit #{{$product->name}}</h3>
            <form action="/product/{{$product->id}}/update" method="post" enctype="multipart/form-data">
@method('put')
            @csrf
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" class="form-control" value="{{old('name',$product->name)}}"/>
@if($errors->has('name'))
<span class="text-danger">{{$errors->first('name')}}</span>
@endif
</div>

<div class="form-group">
<label for="description">Description</label>
<textarea name="description" id="" class="form-control"cols="30" rows="4">{{old('description',$product->description)}}</textarea>
@if($errors->has('description'))
<span class="text-danger">{{$errors->first('description')}}</span>
@endif
</div>

<div class="form-group">
<label for="upload">Upload Image</label>
<input type="file" name="image" class="form-control">
@if($errors->has('image'))
<span class="text-danger">{{$errors->first('image')}}

@endif
</div>
<button type="submit" class="btn btn-dark mt-3">Submit</button>
            </form>
            </div>
        </div>
    </div>
  </div>

  @endsection

 