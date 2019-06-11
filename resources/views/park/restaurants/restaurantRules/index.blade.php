@extends('layout.master')

@section('content')

    <section class="menuSection">
        <div class="container">

            @if (session('message'))
                <div class='alert alert-success'>
                    {{ session('message') }}
                </div>
            @endif

            <h2>Menu van {{ $restaurant->facilitie->name }}</h2>

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/park/restaurants/'.$restaurant->id.'/restaurantRules') }}">Overzicht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/park/restaurants/'.$restaurant->id.'/restaurantRules/create') }}">Toevoegen</a>
                    </li>
                </ul>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Gerecht</th>
                            <th>Prijs</th>
                            <th colspan="2">Linkjes</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($restaurantRules as $restaurantRule)
                        <tr>
                            <td>{{ $restaurantRule->dish->name }}</td>
                            <td>&euro; {{ $restaurantRule->dish->price }}</td>
                            <td><a class="btn btn-info" href="{{ url('park/restaurants/dishes/'.$restaurantRule->dish->id) }}">Details</a></td>
                            <td><a class="btn btn-danger" href="{{ url('park/restaurants/'.$restaurantRule->restaurant_id.'/restaurantRules/'.$restaurantRule->id.'/delete') }}">Verwijderen</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection