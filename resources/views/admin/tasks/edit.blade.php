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
                @if ($errors->storetask->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->storetask->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <form action="{{ route('admin.checklists.tasks.update', [$checklist,$task]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">{{ __('Edit Task') }}</div>
        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input value="{{ $task->name }}" class="form-control" name="name" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Description') }}</label>
                                        <textarea rows="5" id="task-textarea"  class="form-control" name="description" type="text">{{ $task->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">{{ __('Save Task') }}</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
