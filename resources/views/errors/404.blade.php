@extends('layouts.client')

@section('main-content')
    <!-- Masthead -->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/client/background/header.jpg') }}')">
        <div class="container">
            <div class="heading-jumbo justify">{{ __('Erreur 404') }}</div>
        </div>
    </header>
@endsection
