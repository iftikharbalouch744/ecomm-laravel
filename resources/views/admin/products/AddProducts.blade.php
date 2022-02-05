@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add Product</h3>
            <div class="tile-body">
              <form action="{{url('inset_product')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                  <select class="form-control" name="categor_id" aria-label="Default select example">
                    <option selected>Select Category</option>
                    @foreach($category as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                 </div>
                <div class="form-group">
                  <label class="control-label">Product Name</label>
                  <input class="form-control" type="text" name="product_name" placeholder="Enter Product name">
                </div>
                <div class="form-group">
                  <label class="control-label">Small Description</label>
                  <input class="form-control" type="text" name="small_description" placeholder="Small Description">
                </div>
                <div class="form-group">
                  <label class="control-label">Discription</label>
                  <input class="form-control" type="text" name="description" placeholder="Enter Description">
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="status">Status
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="trending">Trending
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Product Quantity</label>
                  <input class="form-control" type="number" name="qty" placeholder="Enter Product Quantity">
                </div>
                <div class="form-group">
                  <label class="control-label">Original Price</label>
                  <input class="form-control" type="number" name="original_price" placeholder="Enter Original Price">
                </div>
                <div class="form-group">
                  <label class="control-label">Selling Price</label>
                  <input class="form-control" type="number" name="selling_price" placeholder="Enter Selling Price">
                </div>
                <div class="form-group">
                  <label class="control-label">Tex</label>
                  <input class="form-control" type="number" name="tex" placeholder="Enter tex">
                </div>
                <div class="form-group">
                  <label class="control-label">Meta Title</label>
                  <input class="form-control" type="text" name="meta_title" placeholder="Enter Meta Title">
                </div>
                <div class="form-group">
                  <label class="control-label">Meta Discription</label>
                  <input class="form-control" type="text" name="meta_description" placeholder="Enter Meta Discription">
                </div>
                <div class="form-group">
                  <label class="control-label">Meta key</label>
                  <input class="form-control" type="text" name="meta_keywords" placeholder="Enter Meta key">
                </div>
                <div class="form-group">
                  <label class="control-label">Feature Image</label>
                  <input class="form-control" type="file" name="image">
                </div>
            </div>
            <div class="tile-footer">
            <input class="btn btn-primary" type="submit" value="Submit"/>
            </div>
            </form>
          </div>
        </div>

        <div class="clearix"></div>

      </div>
@endsection
