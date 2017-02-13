@extends('layouts/site')
@section('content')
    <div class="container">
        <div class="row">
            @if($article)
                <div class="col-md-4">
                    <h2>{{$article->id}}</h2>
                    <p>{{$article->name}}</p>
                </div>
            @endif
        </div>
        <footer>
            <p>&copy; Company 2017</p>
        </footer>
    </div> <!-- /container -->
@endsection