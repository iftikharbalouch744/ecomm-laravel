@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add Category</h3>
            <div class="tile-body">
              <form action="{{url('InsertCategory')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" name="name" placeholder="Enter full name">
                </div>
                <div class="form-group">
                  <label class="control-label">Slug</label>
                  <input class="form-control" type="text" name="slug" placeholder="Enter email address">
                </div>
                <div class="form-group">
                  <label class="control-label">Discription</label>
                  <input class="form-control" type="text" name="discription" placeholder="Enter email address">
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="status">Status
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="populer">Populer
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Meta Title</label>
                  <input class="form-control" type="text" name="meta_title" placeholder="Enter Meta Title">
                </div>
                <div class="form-group">
                  <label class="control-label">Meta Discription</label>
                  <input class="form-control" type="text" name="meta_discription" placeholder="Enter Meta Discription">
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
