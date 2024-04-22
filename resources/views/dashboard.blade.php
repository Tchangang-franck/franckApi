    @extends('layouts')
@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>       
                @endif                
            </div>
        </div>
    </div> 
</div>
    @role('admin')
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user )
    <tr>
        <td>{{ $user->id }}</td>
         <td>{{ $user->name }}</td>
         <td>{{ $user->email }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
    <p style="text-align: center"> Bienvenue <strong> {{ Auth::user()->name }}</strong></p>
@endrole
@endsection