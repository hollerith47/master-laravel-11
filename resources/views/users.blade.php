@extends("app")

@section("contents")
    <section class="container">
        <div class="row justify-content-center g-2">
            @foreach($users as $user)
                <div class="card" >
                    <div class="card-body">
                        <h2 class="card-title">Name: {{ $user->name }}</h2>
                        <h2 class="card-subtitle mb-2 text-body-secondary">Email: {{ $user->email }}</h2>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection


