@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                

                <div class="card-body">
                    <!-- @include('layouts.flash') -->
                    <x-alert>
                        <h6><b> <i>Here is response from the image upload</i></b></h6>

                    </x-alert>
                    <form action="/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                        <input type="Submit" value="Upload">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection