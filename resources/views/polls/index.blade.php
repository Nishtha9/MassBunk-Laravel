@extends('layouts.app')
@section('content')
    <h1>Polls</h1>
    @if(count($polls)> 0)
        @foreach ($polls as $poll)
        <div class='well'>
            @if ($poll->Status == 'Alive')
            <ul>
                <li><strong>{{$poll->Duration}}</li>
                <li>Reason : {{$poll->Reason}}</li>
                <li>Deadline : {{$poll->Deadline}}</li>
                <li>In favour : {{$poll->Yes}}</li>
                <li>Not in favour : {{$poll->No}}</li>
                </strong>
            </ul>
            <div>
            {!!Form::open(['action'=>['PollsController@update',$poll->id], 'method'=>'POST'])!!}
            {{Form::radio('Response', 'Yes', false )}}<span class='glyphicon glyphicon-thumbs-up' style='font-size:30px;'></span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{Form::radio('Response', 'No', true)}} <span class='glyphicon glyphicon-thumbs-down' style='font-size:30px;'></span>
            <br>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            <?php date_default_timezone_set("Asia/Kolkata");  ?>
            @if((date('Y-m-d')>$poll->Deadline))
            @if (Auth::user()->id == $poll->Roll_No)
                   <a href="polls/{{$poll->id}}/edit">
                    {{Form::button('Stop',['class'=>'btn btn-danger'])}}
                   </a>
            @endif
            @endif


            {{Form::hidden('_method','PUT')}}
            {!!Form::close()!!}
            </div>

        </div>
        @endif
        @if ($poll->Status == 'Dead')
            <div class='well'>
                    <ul>
                            <li><strong>{{$poll->Duration}}</li>
                            <li>Mass Bunk : {{$poll->Result}}</li>
                            </strong>
                        </ul>
            </div>
        @endif  
        
        @endforeach
        {{$polls->links()}}
    @else
    <div class='well'>
            <h1><strong>No polls</strong></h1>
        </div>
    @endif
@endsection