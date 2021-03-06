@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="text-center">
                        {{$user->name}}'s Profile
                    </p>
                </div>
                <div class="panel-body">
                    <img src="{{ $user->avatar}}" width="70px" hight="70px" style="border-radius:50%;">
                    <p class="text-center">{{ $user->profile->location}}</p>
                    <p class="text-center">
                        @if(Auth::id()==$user->id)
                        <a href="{{route('profile.edit')}}" class="btn btn-lg btn-info">Edit Your Profile</a>
                        @endif    
                    </p>
                </div>
                @if(Auth::id()!==$user->id)
                    <div class="panel panel-default">
                        <div class="body">
                        <friend :profile_user_id="{{$user->id}}"></friend> 
                        </div>
                    </div>
                @endif
                <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="text-center">
                        About Me .
                    </p>
                </div>
                <div class="panel-body">
                    {{$user->profile->about}}
                </div>
                
            </div>
        </div>
    </div>
@stop