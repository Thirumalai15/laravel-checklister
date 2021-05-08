@extends('layouts.app')
@section('js')
<script>
    ClassicEditor
        .create( document.querySelector( '#task-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">{{ __('Edit Page') }}</div>
                        
                        <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div> 
                            @endif
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('Name') }}</label>
                                        <input value="{{ $page->title }}" class="form-control" name="title" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="content">{{ __('Content') }}</label>
                                        <textarea rows="5" id="task-textarea"  class="form-control" name="content" type="text">{{ $page->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">{{ __('Save Page') }}</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
