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
                    <form action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">{{ __('Edit Checklist') }}</div>
        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input value="{{ $checklist->name }}" class="form-control" name="name" type="text" placeholder="{{ __('Checklist Name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">{{ __('Save Checklist') }}</button>
                        </div>
                        
                    </form>
                </div>
                <form action="{{ route('admin.checklist_groups.checklists.destroy',[$checklistGroup, $checklist]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete This Checklist Group') }}</button>
                </form>
            </div>

        </div>

        <hr>
        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>{{ __('List of Tasks') }}</div>
            <div class="card-body">
            <table class="table table-responsive-sm">
                <tbody>
                    @foreach ($checklist->tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.checklists.tasks.edit',[$checklist,$task])  }}">{{ __('Edit') }}</a>
                            <form style="display: inline-block" action="{{ route('admin.checklists.tasks.destroy',[$checklist,$task]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
             </table>
            </div>
        </div>

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
            <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST">
                @csrf
                <div class="card-header">{{ __('New Task') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input value="{{ old('name') }}" class="form-control" name="name" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">{{ __('Description') }}</label>
                                <textarea id="task-textarea"  class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
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
@endsection

