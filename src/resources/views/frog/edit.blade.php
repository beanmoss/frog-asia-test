@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Updating a Frog</h1>
        <form action="{{route('frog.update', ['id' => $frog->id])}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="frog-name">Name</label>
                <input type="text" class="form-control" id="frog-name" placeholder="Enter frog name" name="name" value="{{$frog->name}}">
                <span class="help-block"><p class="text-danger">{{$errors->first('name')}}</p></span>
            </div>
            <div class="form-group">
                <label for="frog-gender">Gender</label>
                <select class="form-control" id="frog-gender" name="gender">
                    <option value="M" @if($frog->gender == 'M'){{'selected'}}@endif>Male</option>
                    <option value="F" @if($frog->gender == 'F'){{'selected'}}@endif>Female</option>
                </select>
                <span class="help-block"><p class="text-danger">{{$errors->first('gender')}}</p></span>
            </div>
            <button type="submit" class="btn btn-success">Update this frog</button>
        </form>
    </div>
</div>
@stop