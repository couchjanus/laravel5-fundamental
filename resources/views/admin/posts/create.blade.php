@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            Add New Post <a href="{{ route('posts.index') }}" class="btn btn-success btn-sm  float-right" title="All posts"> <span data-feather="arrow-left"></span>  Go Back</a>
        </div>
        <div class="panel-body">
            @if (Session::get('message') != Null)
            <div class="row">
                <div class="col-md-9">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('message') }}
                    </div>
                </div>
            </div>
            @endif
            <br/>
            <div class="table-responsive">
              <form action="{{ route('posts.store') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card">
                    <div class="card-block">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" class="form-control" type="text" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                            <select name="category_id" class="form-control selectpicker">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-md-3 col-form-label">Is Active</label>
                            <div class="col-md-9">
                              <label class="radio-inline" for="inline-radio1">
                                <input type="radio" id="inline-radio1" name="is_active" value="1"> Yes
                              </label>
                              <label class="radio-inline" for="inline-radio2">
                                <input type="radio" id="inline-radio2" name="is_active" value="0"> No
                              </label>
                            </div>
                    </div>
                    <div class="card-footer text-muted">
                      <button type="submit" class="btn btn-primary btn-sm float-right"><span data-feather="save"></span> Save</button>
                    </div>
                
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
</div>
@endsection  
