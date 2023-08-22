@extends('products.layout')

@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

    <div class="pull-left">
            <h2>DASHBOARD</h2>
     </div>

    <div class="pull-right py-3">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
    </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>

        </div>
        @endif

        <table class ="table table-bordered">
            <tr> <thead><td>id</td> <td>name</td><td>description</td><td>price(usd)</td><td>ratings</td></thead></tr>
   @foreach ($products as $product)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->ratings}}</td>
        <td>           
        <form action="{{route('products.destroy',$product->id)}}" method="POST">
            <a  class="btn btn-info" href="{{route('products.show',$product->id)}}">show</a>
            <a  class= "btn btn-primary"href="{{route('products.edit',$product->id)}}">edit</a>
            <button type="submit" class="btn btn-danger">DELETE</button>
         @csrf
         @method('delete')

         </form>
        </td> 
 
                </tr> 
     @endforeach
        </table>
         
    </div>

</div>


{!! $products->links() !!}
    
@endsection