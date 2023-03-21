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
        <div class="row">
          <div class="col-lg-6">

            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Perijinan : </span>
                <span class="info-box-number">{{$countijin}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fas fa-award"></i></span>
              <div class=" info-box-content">
                <span class="info-box-text">Total Sertifikat : </span>
                <span class="info-box-number">{{$countserta}} </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-radiation"></i></span>

              <div class="info-box-content">
                <div class="row">
                  <div class="col-md-3">
                    <span class="info-box-text">Expired Perijinan : </span>
                    <span class="info-box-number">{{$perdate}} <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right text-white"></i></a> </span>
                  </div>
                  <div class="col-md-3">
                    <span class="info-box-text">Expired Sertifikat : </span>
                    <span class="info-box-number">{{$serdate}} <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right text-white"></i></a> </span>
                  </div>
                </div>
              </div>

              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cetak</span>
                <span class="info-box-number">{{$count}}</span>
              </div>

              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

          </div>

          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Grafik</h3>
                  <a href="#"> </a>
                </div>
              </div>
              <div class="card-body">
                <div>
                  <canvas width="100" height="38" id="myChart"></canvas>
                </div>
                <!--
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg"></span>
                  <span></span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 3%
                  </span>
                  <span class="text-muted">S</span>
                </p>
              </div>
             

              <div class="position-relative mb-4">
                <canvas id="sales-chart" height="165"></canvas>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> 2021
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> 2020
                </span>
              </div>-->
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
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
                <tfoot>
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
                </tfoot>
              </table>
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
      var $2018 = <?php echo $ijin2018 ?>;
      var $2019 = <?php echo $ijin2019 ?>;
      var $2020 = <?php echo $ijin2020 ?>;
      var $2021 = <?php echo $ijin2021 ?>;
      var $2022 = <?php echo $ijin2022 ?>;

      var $2018s = <?php echo $serta2018 ?>;
      var $2019s = <?php echo $serta2019 ?>;
      var $2020s = <?php echo $serta2020 ?>;
      var $2021s = <?php echo $serta2021 ?>;
      var $2022s = <?php echo $serta2022 ?>;

      $(function() {
        $("#tabel1").DataTable({
          "responsive": false,
          "lengthChange": false,
          "autoWidth": false,
          "retrieve": true,
          "buttons": ["excel", "colvis"]
        }).buttons().container().appendTo('#tabel1_wrapper .col-md-6:eq(0)');
        $('#tabel2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    <script>
      const labels = [

        '2018',
        '2019',
        '2020',
        '2021',
        '2022',
      ];
      const data = {
        labels: labels,
        datasets: [{
            label: 'Perijinan',
            data: [$2018, $2019, $2020, $2021, $2022],
            backgroundColor: [

              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)',
            ],
            borderColor: [

              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)',
            ],
            borderWidth: 2
          },
          {
            label: 'Sertifikat',
            data: [$2018s, $2019s, $2020s, $2021s, $2022s],
            backgroundColor: [
              'rgba(201, 203, 207, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(255, 205, 86, 0.2)',
            ],
            borderColor: [
              'rgb(201, 203, 207)',
              'rgb(153, 102, 255)',
              'rgb(54, 162, 235)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
            ],
            borderWidth: 2
          }
        ]
      };

      const config = {
        type: 'bar',
        data: data,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          },
          indexAxis: 'x', //horisontal atau vertical
        },
        responsive: true,

      };

      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
    </script>
    <script>
      var table = $('#tabel1').DataTable({
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