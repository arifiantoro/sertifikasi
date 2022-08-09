@extends('adminlte')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Data Pelatihan</h1>
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
        <form action="/simpan" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="hidden" id="id" name="id" class="form-control" placeholder="id" value="{{ $dbpeserta->id_training }}" readonly>
          </div>
          <div class="mb-3 row">
            <label for="inputName" class="col-sm-2 col-form-label">Pelatihan</label>
            <div class="col-sm-10">
            <input type="text" id="name" name="name" class="form-control" placeholder="Title" value="{{ $dbpeserta->name }}" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputBatch" class="col-sm-2 col-form-label">Batch</label>
            <div class="col-sm-10">
            <input type="text" id="batch" name="batch" class="form-control" placeholder="Batch" value="{{ $dbpeserta->title}}" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputTgl_Pengesahan" class="col-sm-2 col-form-label">Tanggal Pengesahan</label>
            <div class="col-sm-10">
            <input type="date" id="tgl_pengesahan" name="tgl_pengesahan" class="form-control col-lg-4" placeholder="Tanggal Pengesahan" value="">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputMasa_Berlaku" class="col-sm-2 col-form-label">Masa Berlaku</label>
            <div class="col-sm-10">
            <input type="date" id="masa_berlaku" name="masa_berlaku" class="form-control col-lg-4" placeholder="Masa Berlaku" value="">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputNomorSurat" class="col-sm-2 col-form-label">Nomor Surat</label>
            <div class="col-sm-10">
            <input type="text" id="name" name="name" class="form-control" placeholder="Nomor Surat" value="">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputLampiran" class="col-sm-2 col-file-label">Lampiran</label>
            <div class="col-sm-3">
              <input type="file" id="lampiran" name="lampiran" class="custom-file-input" placeholder="Lampiran" value="">
              <label class="custom-file-label" for="inputLampiran">Choose File</label>            
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
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
