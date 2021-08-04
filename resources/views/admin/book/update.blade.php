@extends('admin.master')
@section('content')
    <form action="{{route('book.update',$book->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                Name:
                <input type="text" name="name" value="{{$book->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name" aria-label="First name">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col">
                Price:
                <input type="text"  value="{{$book->price}}" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price" aria-label="Last name">
                @error('price')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-12">
                Description:
                <input type="text" value="{{$book->description}}" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" aria-label="Last name">
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col">
                Category:
                <br>
                <select name="category">
                    @forelse($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @empty
                        <option>category</option>
                    @endforelse
                </select>
            </div>
            <div class="col">
                Image:
                <input type="file" name="image" value="{{$book->image}}" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">submit</button>
        <a href="{{route('book.list')}}" class="btn btn-danger mt-3">Back</a>
    </form>
@endsection
