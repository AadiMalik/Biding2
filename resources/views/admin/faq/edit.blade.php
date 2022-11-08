@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} FAQ
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.faq.update", $faq->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">Title</label>
                <input type="text" name="title" value="{{$faq->title??''}}" class="form-control" id="" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            @if($faq->image!=null)
            <div class="form-group">
                <img src="{{asset($faq->image??'')}}" style="width: 100px; width:100px;" alt="">
            </div>
            @endif
            <div class="form-group">
                <label class="required" for="image">Image(optional)</label>
                <input type="file" name="image" class="form-control" id="">
            </div>
            <div class="form-group">
                <label class="required" for="video">Video(optional)</label>
                <input type="text" name="video" value="{{$faq->video??''}}" class="form-control" id="">
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea name="description" class="form-control" id="textArea" required>{{$faq->description??''}}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

</div>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js"
        integrity="sha512-MbhLUiUv8Qel+cWFyUG0fMC8/g9r+GULWRZ0axljv3hJhU6/0B3NoL6xvnJPTYZzNqCQU3+TzRVxhkE531CLKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: '#textArea'
        });
    </script>


@endsection