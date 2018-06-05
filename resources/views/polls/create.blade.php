@extends('layouts.app')

@section('content')

<h1>Create Poll</h1>
    {!!Form::open(['action'=>'PollsController@store', 'method'=>'POST'])!!}
   <div class='form-group'>
    {{Form::label('Duration','Duration')}}
    {{Form::text('Duration','',['placeholder'=>'Duration of MassBunk(From-To)', 'class'=>'form-control'])}}
   </div>
   <div class='form-group'>
        {{Form::label('Reason','Reason')}}
        {{Form::text('Reason','',['placeholder'=>'Reason', 'class'=>'form-control'])}}
       </div>
       <div class='form-group'>
            {{Form::label('Deadline','Deadline')}}
            {{Form::date('Deadline','',['placeholder'=>'Deadline', 'class'=>'form-control'])}}
           </div>
           {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection