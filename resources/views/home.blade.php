@extends('layouts.master')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                <ul class="list-group">
                    <li class="list-group-item"><a href="/categories">Category Management</a></li>
                    <li class="list-group-item"><a href="/products">Product Management</a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
