@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"><h2>Edit Tag</h2></div>
          <div class="panel-body">

            <a href="{{ route('tags.index') }}" class="btn btn-success btn-sm" title="All tags">
                <span data-feather="arrow-left"></span>  Go Back
            </a>
            @include('partials.admin._messages')
            <br/>
            <div class="table-responsive">
              <form action="{{ route('tags.update',['id' => $tag->id]) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card">
                    <div class="card-block">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" class="form-control" type="text" value="{{ $tag->name }}" required>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                      <button type="submit" class="btn btn-primary btn-sm pull-right"><span data-feather="save"></span> Update</button>
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

