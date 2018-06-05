@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center col-xs-offset-2 col-xs-8 ">
        <h3> <strong>MassBunk App</strong></h3>
        <p style='color:black; font-weight:bolder'>This app helps the students to decide for a mass bunk. A student who's registered
            in the database may create a request for bunk, all the students will be notified of the request and the deadline before which the vote will be counted.
            They can check the poll status and give their respond.
            The response will be kept anonymous i.e. even we the developing team will not know who has voted for/against it.
        <br>
        PS: To get registered to this app, send the details to the developer and they will add you to the database providing you the login details.
        You are requested to change to details later.
        </p>
    </div>
@endsection