@extends('adminlte')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Peserta Pelatihan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title"></h5>

                <p class="card-text">
                  <table class="table table-stripped" id="datatable">
            <thead class="bg-dark text-white">
                <th>No</th>
                
                <th>Nama Pelatihan</th>
                <th>Batch Pelatihan</th>
		            <th>Aksi</th>
            </thead>    
            <tbody>
                @php $i = 1; @endphp
                @foreach ($dbpeserta as $pes)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ $pes->name }}</td>
                        <td>{{ $pes->title}}</td>
                        <td><a href="/third/{{ $pes->id }}" class="btn btn-warning">Input Data</a>
                        </td>
                    </tr>
                @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
                </p>

                {{-- <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> --}}
              </div>
            </div>

            
          </div>
          <!-- /.col-md-6 -->
          

            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
