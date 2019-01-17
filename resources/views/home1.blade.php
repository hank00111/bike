@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                        <a href="{{ route('baiku.create') }}">test</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @endif
                    
                    @foreach ($test as $te)
                        <table border="1">
                            <tr>
                                <th>{{ $te->year }}</th>
                                <th>{{ $te->model }}</th>
                            </tr>
                        </table>   
                    @endforeach
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
