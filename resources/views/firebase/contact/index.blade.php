@extends('firebase.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if(session('status'))
            
            <h4 class ="alert alert-warning mb-2">{{session('status')}}</h4>

            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Contact List</h4>
                     <a href="{{ url('add-contact')}}" class="btn btn-sm btn-primary float-end">Add Contact</a>
                </div>
                <div class="card-body">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone Number</th>
                                <th>Email Address</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @if (empty($contacts))
                            <tr>
                                <td colspan ="7">No Record Found!</td>
                            </tr>
                            @else
                                <!-- @forelse  ($contacts as $key=>$item) -->
                               
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item['fname']}}</td>
                                <td>{{$item['lname']}}</td>
                                <td>{{$item['phone']}}</td>
                                <td>{{$item['email']}}</td>
                                <td><a href="{{url('edit-contact/' .$key)}}" class="btn btn-sm btn-success">Edit</a></td>
                                <td>
                                    <!-- <a href="{{url('delete-contact/' .$key)}}" class="btn btn-sm btn-danger">Delete</a> -->
                                    <form action ="{{url('delete-contact/' .$key)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-sm btn-danger" value=Delete>
                                        
                                        </button>

                                    </form>

                                </td>
                                <td></td>
                            </tr>
                            
                            <!-- @empty -->
        
                            <!-- @endforelse -->
                            @endif
                        </tbody>
                      
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection



