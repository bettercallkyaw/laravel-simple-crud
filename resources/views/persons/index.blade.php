@extends('layouts.master')

@section('title','all persons')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">

           @if (Session::has('successMsg'))
               <div class="alert alert-success">
                   {{ Session::get('successMsg') }}
               </div>
           @endif

           @if (Session::has('alertMsg'))
               <div class="alert alert-danger">
                   {{ Session::get('alertMsg') }}
               </div>
           @endif

            <h1 class="text-center">List All Person</h1>
             <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">LastName</th>
                    <th scope="col">City</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($persons as $person)
                    <tr>
                        <th scope="row">{{ $person->id }}</th>
                        <td>{{ $person->firstName }}</td>
                        <td>{{ $person->lastName }}</td>
                        <td>{{ $person->city }}</td>
                        <td>{{ $person->email }}</td>
                        <td>
                            <a href="{{ route('persons.edit',$person->id) }}" class="btn btn-info waves-effect">
                                edit
                             </a>
                        </td>

                        <td>
                            <a href="{{ route('persons.destroy',$person->id) }}" class="btn btn-info btn-danger">
                                delete
                            </a> 
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>

            </table>
            
            {{ $persons->links() }}
        </div>
    </div>
</div>
@endsection