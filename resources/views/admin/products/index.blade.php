@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Products list</h3>
            <div class="tile-body">
            <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Discription</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach($category as $items)
                    @if(count($items->products)>0)
                    <tr>
                        <th colspan="5">{{$items->name}} has Products ({{count($items->products)}})</th>
                    </tr>

                    @foreach($items->products as $product)
                    <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                      <img style="width:100px; height:60px;" src="{{asset('assets/uploads/product/'.$product->image)}}" alt="Image"/>
                    </td>
                    <td>
                        <a href="{{url('edit_product/'.$product->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('del_product/'.$product->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                    @endforeach
                    @endif
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
            </div>
          </div>
        </div>

      </div>
@endsection
