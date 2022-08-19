@extends('adminlte')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Upload Sertifikat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Upload Sertifikat</li>
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
                          
                @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                  @endif

                <p class="card-text">
                  <div class="card-body">
        <form action="/update" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="hidden" id="id" name="id" class="form-control" placeholder="id" value="{{ $dbpeserta->id_peserta }}" readonly>
          </div>
          <div class="mb-3 row">
            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
            <input type="text" id="name" name="name" class="form-control" placeholder="Nama" value="{{ $dbpeserta->name }}" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputBatch" class="col-sm-2 col-form-label">Batch</label>
            <div class="col-sm-10">
            <input type="text" id="batch" name="batch" class="form-control" placeholder="Batch" value="{{ $dbpeserta->title }}" readonly>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label for="inputLampiran" class="col-sm-2 col-file-label">Sertifikat</label>
            <div class="col-sm-3">
              <input type="file" id="sertifikat" name="sertifikat" enctype="multipart/form-data" class="custom-file-input" placeholder="Lampiran" value="">
              <label class="custom-file-label" for="inputLampiran">Choose File</label>            
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputLampiran" class="col-sm-2 col-file-label">Sertifikat SGS</label>
            <div class="col-sm-3">
              <input type="file" id="sertifikatsgs" name="sertifikatsgs" enctype="multipart/form-data" class="custom-file-input" placeholder="Lampiran" value="">
              <label class="custom-file-label" for="inputLampiran">Choose File</label>            
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputLampiran" class="col-sm-2 col-file-label">SKP</label>
            <div class="col-sm-3">
              <input type="file" id="skp" name="skp" enctype="multipart/form-data" class="custom-file-input" placeholder="Lampiran" value="">
              <label class="custom-file-label" for="inputLampiran">Choose File</label>            
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </form>
    </div>
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
