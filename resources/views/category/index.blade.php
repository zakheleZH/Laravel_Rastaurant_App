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
            <div class="card">
                <div class="card-header">All Category
                    <span class="float-right">
                          <a href="{{route('category.create')}}">
                              <button class="btn btn-outline-secondary">Add Category</button>
                          </a>
                      </span>
                  </div>

                <div class="card-body">
                   @if(count($categories))



                       <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key=>$category)
                          <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{$category->name  }}</td>
                            <td>
                             <a href="{{ route('category.edit',[$category->id]) }}">
                                 <button class="btn btn-outline-primary">
                                     Edit
                                 </button>
                             </a>
                            </td>
                            <td>





                                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$category->id  }}">
    Delete
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$category->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('category.destroy',[$category->id]) }}" method="POST">
            @csrf
                  @method('DELETE')



        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you Sure
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-danger">Delete</button>
        </div>
    </form>
      </div>
    </div>
  </div>

                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>


                   @else
                   <p>No Category Found</p>
                   @endif


                </div>
            </div>
        </div>
    </div>

</div>


@endsection
