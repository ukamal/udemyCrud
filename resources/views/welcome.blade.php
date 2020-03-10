@extends('layouts.main')
@section('content')


<div class="container">
    @if(session('successMsg'))
        <div class="alert alert-success" role="alert">
            {{ session('successMsg') }}
        </div>
    @endif

    <table class="table">
        <thead class="black white-text">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <th scope="row">{{ $student->id }}</th>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->image }}</td>
                <td>
                    <a href="{{ route('edit', $student->id) }}" class="btn btn-raised btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    ||
                    <form action="{{ route('delete', $student->id) }}" method="post" id="delete-form-{{ $student->id }}" style="display: none">
                        @csrf
                        {{ method_field('delete') }}
                    </form>
                    <button onclick="if (confirm('Are you sure delete the data?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $student->id }}').submit();
                    } else {
                        event.preventDefault();
                            }
                            " class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>
                    </button>

                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
        {{ $students->links() }}
</div>

    @endsection