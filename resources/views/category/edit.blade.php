@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
               <p>{{ Session::get('message') }}</p>
            </div>

            @endif
            <form action="{{ route('category.update',[$category->id]) }}" method="POST">
                @csrf

                @method('PATCH')
            <div class="card">
                <div class="card-header">Update Category</div>

                <div class="card-body">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                    <div class="alert-danger">{{ $errors->first('name') }}</div>

                </div>
                <div class="form-group">

                    <input type="submit" value="Update"  class="btn btn-outline-primary">
                </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>


@endsection
