@extends('bootstrap-theme')

@section('content')

<h1>Staff</h1>
<a href="{{ url('/staff/create') }}" class="btn btn-sm btn-success mr-4">New Record</a>
<form action="{{ url('/staff') }}" method="GET" class="my-4">
    <input name="search" id="search" value="{{ request('search') }}" />
    <button type="submit">Search</button>
</form>

<table class="table table-sm table-bordered text-right" >
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Salary</th> 
        <th>Phone</th> 
        <th>Action</th>
    </tr>
    @foreach($staffs as $item)
    <tr>
        <td>{{ $item->Name }}</td>
        <td>{{ $item->Age }}</td>
        <td>{{ $item->Salary }}</td>
        <td>{{ $item->Phone }}</td>
        
        <td>
            <a href="{{ url('/staff/'.$item->id ) }}" class="btn btn-sm btn-primary">View</a>
            <a href="{{ url('/staff/'.$item->id.'/edit' ) }}" class="btn btn-sm btn-warning">Edit</a>

            <form method="POST" action="{{ url('/staff' . '/' . $item->id) }}" style="display:inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirm delete?')">
                    Delete
                </button>
            </form>
        </td>

    </tr>
    
</table>
<div class="mt-4"style="width:50%">{{ $staffs->appends(['search' => request('search')])->links() }}</div>
@endforeach