@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Mate With</h1>
        <form action="{{route('frog.mate.go', ['id' => $frog->id])}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="frog-name">The Frog</label>
                <input type="text" class="form-control" id="frog-name" placeholder="Frog Name" name="name" value="{{$frog->name}}">
            </div>
            <div class="form-group">
                <label for="frog-partnerr">Choose Partner</label>
                <select class="form-control" id="frog-partner" name="partner_id">
                    @foreach($partners as $partner)
                    <option value="{{$partner->id}}">{{$partner->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Lets Do This!</button>
        </form>
    </div>
</div>
@stop