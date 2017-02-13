@extends('layouts/site')
@section('content')
<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        @foreach($res as $item)
            <div class="col-md-4">
                <h2>{{$item->name}}</h2>
                <p>{{$item->desc}}</p>
                <p>{{ Carbon\Carbon::parse($item->time)->format('d-m-Y i') }}</p>
                <p>{{ date('F d, Y', strtotime($item->time)) }}</p>
                <p>{{ date_format(date_create($item->time), 'Y-m-d H:i:s') }}</p>
                <p><a class="btn btn-secondary" href="{{route('myShow', ['id' => $item->id])}}" role="button">View details &raquo;</a></p>
            </div>
        @endforeach
    </div>
    <hr>
    <footer>
        <p>&copy; Company 2017</p>
    </footer>
</div> <!-- /container -->
    @endsection