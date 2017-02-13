@extends('layouts/site')
@section('content')
    <div class="container">
        <div class="row">
            <form method="POST" action="{{route('myInsert')}}">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="text" class="form-control" name="pwd">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
                {{csrf_field()}}
            </form>
        </div>
        <footer>
            <p>&copy; Company 2017</p>
        </footer>
    </div> <!-- /container -->
@endsection