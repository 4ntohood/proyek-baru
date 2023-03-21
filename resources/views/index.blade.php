@extends('Template')
@section('css')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<Style>
  .pink {
    background-color: rgb(255, 20, 147, 20%) !important;
  }
</style>
@endsection
@section('content')
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"></h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>

  <div class="card-body">
    <div class="content">
      <div class="container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Histori Cetak {{$bPeriode}}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="tabel1" class="table table-bordered table-striped table-sm display">
                <thead>
                  <tr class="small mb-1">
                    <th width="10px" class="text-center">No</th>
                    <th width="100px" class="text-center">Tanggal</th>
                    <th width="250px" class="text-center">No.Sertifikat</th>
                    <th width="200px" class="text-center">Nama Perusahaan</th>
                    <th width="100px" class="text-center">Nama Hak</th>
                    <th width="20px" class="text-center">HalAwal</th>
                    <th width="20px" class="text-center">HalAkhir</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">User</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($datax as $post)
                  <tr class="small mb-1">
                    <td class="text-center">{{ ++$i }}</td>
                    <td>{{ date('d-M-Y', strtotime($post->tgl)) }}</td>
                    <td>{{ $post->no }}</td>
                    <td>{{ strtoupper($post->nama) }}</td>
                    @if ($post->jenis == 1)
                    <td>{{ 'MILIK' }}</td>
                    @else
                    <td>{{ 'GUNAB' }}</td>
                    @endif
                    <td class="text-right">{{ $post->halawal }}</td>
                    <td class="text-right">{{ $post->halakhir }}</td>
                    <td>{{ $post->keterangan }}</td>
                    <td>{{ $post->c_append }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                {{$datax->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <marquee direction="left">Aplikasi Perijinan dan Sertifikat Tanah Dewasutratex</marquee>
      </div>
    </div>
    @endsection
    @section('js')
    <script>
      var table = $('#tabel1').DataTable({
        "paging": false,
        "info": false,
        "rowCallback": function(row, data, index) {
          var stock = parseFloat(data[4]),
            $node = this.api().row(row).nodes().to$();
          if (data[4] == "MILIK") {
            $node.addClass('pink')
          }
        }
      })
    </script>
    @endsection