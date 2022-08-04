@extends('adminlte')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
            <h3 class="m-0">Peserta Pelatihan {{ $training->title ?? "Training Tidak Ditemukan" }}</h3>
            <a href="/kirim-email/"><button type="button" class="btn btn-primary" > <i class="fa fa-envelope"> </i> Kirim Email</button></a>
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
                  <table class="table table-stripped" id="tatable">
            <thead class="bg-dark text-white">
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </thead>    
            <tbody>
              
                @php $i = 1; @endphp
                @foreach ($dbpeserta as $ser)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ $ser->name }}</td>
                        <td><button class="btn btn-sm btn-success rounded" onClick = "window.open( 'https://api.whatsapp.com/send?phone=<?= $ser->telp ?>&text=Hai+<?= $ser->name ?>+%2CSebelumnya+terima+kasih+telah+melakukan+sertifikasi+di+Sinarindo+Global+Sarana.+Kami+menginformasikan+kepada+anda+bahwa+masa+berlaku+sertifikat+anda+akan+berakhir%2C+anda+dapat+melakukan+perpanjangan+dengan+menghubungi+kami+di+nomor+ini.', '_blank' )" >
                           <i class="fab fa-whatsapp"></i> Kirim Whatsapp
                        </button></td>
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
