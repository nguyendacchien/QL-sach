@extends('admin.master')
@section('content')
    <a href="{{route('book.create')}}" class="btn btn-success">create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @forelse($books as $key => $book)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td><img src="{{asset('storage/'.$book->image)}}" style="width: 100px;height: 100px" alt="{{asset('storage/'.$book->image)}}"></td>
            <td>{{$book->name}}</td>
            <td>{{$book->category->name}}</td>
            <td>{{$book->price}}</td>
            <td>{{$book->description}}</td>
            <td>
                <a href="{{route('book.destroy',$book->id)}}" class="btn btn-danger">delete</a>/
                <a href="{{route('book.edit',$book->id)}}" class="btn btn-warning">edit</a>
            </td>
        </tr>
        @empty
            <tr><td colspan="6">No Data</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
