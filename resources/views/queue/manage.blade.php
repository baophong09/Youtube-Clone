@extends('home.dashboard')

@section('page.content')
    <div class="page-head">
        <div class="page-title">
            <h1>Manage queue <small>control, run, edit & delete queue</small></h1>
        </div>
    </div>

    <div class="row margin-top-10">
        @foreach($queues as $queue)
            
        @endforeach      
    </div>

    {{ $queues->links() }}
@endsection