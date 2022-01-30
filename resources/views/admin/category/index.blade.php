@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Categories list</h3>
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
                  <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->name}}</td>
                    <td>{{$items->discription}}</td>
                    <td>
                      <img style="width:100px; height:60px;" src="{{asset('assets/uploads/category/'.$items->image)}}" alt="Image"/>
                    </td>
                    <td>
                        <a href="{{url('edit-prod/'.$items->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('del-prod/'.$items->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
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
