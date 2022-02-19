@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Orders list</h3>
            <div class="tile-body">
            <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Order Date</th>
                    <th>Tracking No.</th>
                    <th>Order Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($orders as $item)
                  <tr>
                    <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                    <td>{{$item->tracking_no}}</td>
                    <td>{{$item->order_amount}}</td>
                    <td>
                    {{$item->status == 0 ? 'Panding':'Completed' }}
                    </td>
                    <td>
                        <a href="{{url('edit-order/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('del-delete/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{url('view/'.$item->id)}}" class="btn btn-primary">View</a>
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
