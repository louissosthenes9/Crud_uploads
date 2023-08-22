@extends('products.layout')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
         <h2>Add product</h2>
      </div>
     <div class="pull-right">
        <a href="{{route('products.index')}}">Back</a>
     </div>
 </div>
</div>

  <div class="alert alert-danger">
    @if ($errors->any())
        <p>Something went wrong with the inputs</p>
       <ul>
        @foreach ($errors->all() as $error)
         <li>{{$error}}</li> 
        @endforeach
      </ul> 
    @endif
  </div>
    
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                <input type="text" name="name" class="form-control" placeholder="Name">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Choose the product cover:</strong>

                <input type="file" name="image" class="form-control" placeholder="image">

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Description:</strong>

                <textarea class="form-control" style="height:150px" name="description" placeholder="description"></textarea>

            </div>
        </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>price:</strong>

                <input type="text" name="price" class="form-control" placeholder="price">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>ratings:</strong>

                <input type="text" name="ratings" class="form-control" placeholder="ratings">

            </div>

        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center margin-8-tb">

                <button type="submit" class="btn btn-primary ">Create</button>

        </div>

    </div>

   

</form>
    
@endsection