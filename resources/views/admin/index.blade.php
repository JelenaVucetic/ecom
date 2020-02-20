@extends('admin.master')

@section('content')


  <div class="row">
    <main role="main" class=" col-md-12">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

     

      <h2 style="margin-top:100px;">Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Ime</th>
              <th>Prezime</th>
              <th>Email</th>
              <th>Ulica</th>
              <th>Grad</th>
              <th>Zip</th>
              <th>Ime proizvoda</th>
              <th>Kolicina</th>
              <th>Ukupno</th>
            </tr>
          </thead>
          <tbody>
          @foreach($data as $row)
            <tr>
              <td>{{$row->firstname}}</td>
              <td>{{$row->lastname}}</td>
              <td>{{$row->email}}</td>
              <td>{{$row->street}}</td>
              <td>{{$row->city}}</td>
              <td>{{$row->zip}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->qty}}</td>
              <td>{{$row->total}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>


@endsection