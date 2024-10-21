@extends('super-admin.layouts.master')

@section('content')

<form action="{{ route('super-admin.order.update',$order->id) }}" method="post" id="create-order-form">
    @csrf
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" value="{{$order->title}}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$order->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$order->description}}</textarea>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Status</label>
            <select name="status" class="form-select" aria-label="Default select example">
                <option value="PENDING" {{$order->status == 'PENDING' ? 'selected' : ''}}>PENDING</option>
                <option value="APPROVED" {{$order->status == 'APPROVED' ? 'selected' : ''}}>APPROVED</option>
                <option value="REJECTED" {{$order->status == 'REJECTED' ? 'selected' : ''}}>REJECTED</option>
            </select>
        </div>
    </div>

    <div class="text-center mt-4">
        <a type="button" class="btn btn-dark" href="{{ url()->previous() }}" >Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</div>
</form>
@endsection
