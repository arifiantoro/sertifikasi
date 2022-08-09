@extends('adminlte')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Seluruh Pelatihan</h1>
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
      <div class="grid-container">
           

        <div class="container-fluid">
         
        <div class="row">
          @php $i = 1; @endphp
                @foreach ($dbpeserta as $pes)
          
            
           <div class="col-sm-3 mb-2" style="">
              <div class="card card-primary card-outline h-100 ">
              <div class="card-body">               
                <h5 class="card-title">{{ $pes->name }}</h5>
                <p class="card-text">
                  
                </p>
                <a href="/sub/{{ $pes->id_training }}" class="card-link">Tampilkan Pelatihan</a>
                
                </div>
              </div>
            </div>
              
            @endforeach
          </div>
          <!-- /.col-md-6 -->
          
  <div class="d-felx justify-content-center">

            {{ $dbpeserta->links() }}

        </div>
            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


@endsection
