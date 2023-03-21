@extends('Template')
@section('css')
<style>
    .lightRed {
        background-color: #f0aaaa !important
    }
</style>
@endsection
@section('content')
<!------------------------------- Modal Isi KBesar start------------------------------------------>

<form action="{{route('kelompok.store')}}" method="POST">
    @csrf
    @method('POST')
    <div class="modal fade" id="isiModalbesar" tabindex="-1" aria-labelledby="isiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="isiModalLabel">Isi Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="isikelompok" class="form-label">Master Ijin :</label>
                        <input type="text" class="form-control" id="isikelompok" name="kelompokbesar" placeholder="Master Ijin" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!------------------------------- Modal Isi end--------------------------------------------->
<!------------------------------- Modal Edit KB start---------------------------------------->
@foreach($datax as $dt)

<form action="{{route('kelompok.update', $dt->Column_ID)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="editModal-{{$dt->Column_ID}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editkelompok" class="form-label">Kelompok Kecil :</label>
                        <input type="text" class="form-control" id="editkelompok" name="kelompokbesar" value="{{$dt->KELOMPOK}}">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
<!------------------------------- Modal Edit end--------------------------------------------->
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Master Ijin

                <i class="float-sm-right"><button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#isiModalbesar">
                        <i class="fas fa-plus-square"></i> Tambah</button>
                </i>

            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabel1" class="table table-bordered table-striped table-sm ">
                        <thead>
                            <tr class="small mb-1">
                                <th width="10px" class="text-center">No</th>
                                <th width="400px" class="text-center">Master Ijin</th>
                                <th width="180px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($datax) && $datax->count())
                            @foreach ($datax as $post)
                            <tr class="small mb-1">
                                <td class="text-center">{{ ++$i }}</td>
                                <td>{{ strtoupper($post->KELOMPOK) }}</a></td>
                                <td style="white-space: nowrap" width=5%>
                                    <form action="{{route('kelompok.destroy', $post->Column_ID)}}" method="POST">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal-{{$post->Column_ID}}">
                                            <i class="fas fa-edit"></i></button>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3" style="text-align: center;vertical-align:middle">Data Not Found!.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{$datax->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                KELOMPOK KECIL

                <i class="float-sm-right"><button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#isiModalkecil">
                        <i class="fas fa-plus-square"></i> Tambah</button>
                </i>

            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabel12" class="table table-bordered table-striped table-sm display">
                        <thead>
                            <tr class="small mb-1">
                                <th width="10px" class="text-center">No</th>
                                <th width="200px" class="text-center">Kelompok</th>
                                <th width="400px" class="text-center">Golongan</th>
                                <th width="180px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="small mb-1">
                                <th width="10px" class="text-center">No</th>
                                <th width="200px" class="text-center">Kelompok</th>
                                <th width="400px" class="text-center">Golongan</th>
                                <th width="180px" class="text-center">Action</th>
                        </tfoot>
                        <tbody>

                            @foreach ($datagol as $dtgol)
                            <tr class="small mb-1">
                                <td class="text-center">{{ ++$j }}</td>
                                <td>{{ strtoupper($dtgol->KELOMPOK) }}</a></td>
                                <td>{{ strtoupper($dtgol->GOLONGAN) }}</a></td>
                                <td style="white-space: nowrap" width=5%>
                                    <form action="{{route('kelompok.destroy', $dtgol->Column_ID)}}" method="POST">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModalkecil-{{$dtgol->Column_ID}}">
                                            <i class="fas fa-edit"></i></button>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
    <!------------------------------- Modal Isi KKecil start------------------------------------------>

    <!--    <form action="{{route('golongan.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="modal fade" id="isiModalkecil" tabindex="-1" aria-labelledby="isiModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="isiModalLabel">Isi Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="hak" class="form-label">Kelompok Kecil :</label>
                                <div class="input-group">
                                    <select class=" form-select form-select" aria-label=".form-select-sm example" name="kelompokkecil">
                                        @foreach ($datagoldistinc as $dtgol)
                                        <option value="{{ $dtgol->KELOMPOK }}">{{$dtgol->KELOMPOK}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label for="isigolongan" class="form-label">Golongan :</label>
                            <input type="text" class="form-control" id="isigolongan" name="golongan" placeholder="golongan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form> -->
    <!------------------------------- Modal Isi end--------------------------------------------->
    <!------------------------------- Modal Edit KK start---------------------------------------->
    <!--    @foreach($datagol as $dtgol)

    <form action="{{route('golongan.update', $dtgol->Column_ID)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal fade" id="editModalkecil-{{$dtgol->Column_ID}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="kelompokkecil" class="form-label">Kelompok Kecil :</label>
                                <div class="input-group">
                                    <select class=" form-select form-select" aria-label=".form-select-sm example" name="kelompokkecil">
                                        @foreach($datagoldistinc as $dtgl)
                                        <option value="{{ $dtgl->KELOMPOK ? 'selected' : '' }}">{{ $dtgl->KELOMPOK}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editgolongan" class="form-label">Golongan :</label>
                            <input type="text" class="form-control" id="editgolongan" name="golongan" placeholder="golongan" value="{{$dtgol->GOLONGAN}}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach
   ----------------------------- Modal Edit end--------------------------------------------->
    @endsection
    @section('js')
    <!-- <script>
    </script>
    <script>
        $(function() {
            $("#tabel1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "retrieve": true,
                "bInfo": false

            }).buttons().container().appendTo('#tabel1_wrapper .col-md-6:eq(0)');
            $("#tabel12").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "retrieve": true,
                "buttons": ["excel", "colvis"]
            }).buttons().container().appendTo('#tabel12_wrapper .col-md-6:eq(0)');

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
    </script> -->

    @endsection