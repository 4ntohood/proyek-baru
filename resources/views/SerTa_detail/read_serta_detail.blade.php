<div class="table-responsive">
    <table id="tabel1" class="table table-bordered table-striped table-sm">
        <thead>
            <tr class="small mb-1">
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Terbit</th>
                <th class="text-center">Habis</th>
                <th class="text-center">Alrm</th>
                <th class="text-center">No.SerTa</th>
                <th class="text-center">Hak</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Provinsi</th>
                <th class="text-center">Kab/Kota</th>
                <th class="text-center">Kecamatan</th>
                <th class="text-center">Kel/Desa</th>
                <th class="text-center">Tgl.SU</th>
                <th class="text-center">No.SU</th>
                <th class="text-center">Luas</th>
                <th class="text-center">Files</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($datax) && $datax->count())
            @foreach ($datax as $post)
            <tr class="small mb-1">
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ ($post->TGL) ? date('d-M-Y', strtotime($post->TGL)) : '' }}</td>
                <td>{{ ($post->TGLTERBIT) ? date('d-M-Y', strtotime($post->TGLTERBIT)) : '' }}</td>
                <td>{{ ($post->TGLHABIS) ? date('d-M-Y', strtotime($post->TGLHABIS)) : '' }}</td>
                <td>{{ ($post->PENGINGAT) }}</td>
                <td>{{ ($post->NO) }}</td>
                @if ($post->HAK == 1)
                <td>{{ 'MILIK' }}</td>
                @else
                <td>{{ 'GUNAB' }}</td>
                @endif
                <td>{{ strtoupper($post->NAMA) }}</td>
                <td>{{ strtoupper($post->PROVINSI) }}</td>
                <td>{{ strtoupper($post->KOTA) }}</td>
                <td>{{ strtoupper($post->KECAMATAN) }}</td>
                <td>{{ strtoupper($post->DESA) }}</td>
                <td>{{ ($post->SUTGL) ? date('d-m-Y', strtotime($post->SUTGL)) : '' }}</td>
                <td>{{ ($post->SUNO) }}</td>
                <td>{{ ($post->SULUAS) }}</td>
                <td>{{ ($post->FILES) }}</td>
                <td>{{ ($post->KETERANGAN) }}</td>
                <td style="white-space: nowrap" width=5%>
                    <button style="vertical-align: middle;" class="btn btn-primary btn-xs" onclick='lihat("{{ $post->COLUMN_ID }}")' title="Lihat"><i class="fa fa-eye"></i></button>
                    <button style="vertical-align: middle;" class="btn btn-success btn-xs" onclick='edit("{{ $post->COLUMN_ID }}")' title="Edit"><i class="fas fa-edit"></i></button>
                    <button style="vertical-align: middle;" class="btn btn-warning btn-xs" onclick='cetak("{{ $post->COLUMN_ID }}")' title="Cetak"><i class="fas fa-print"></i> </button>
                    <button style="vertical-align: middle;" class="btn btn-danger btn-xs" onclick='SwalDelete("{{ $post->COLUMN_ID }}")' title="Hapus"><i class="fas fa-trash-alt"></i> </button>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="18" style="text-align: center;vertical-align:middle">Data Not Found!.</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{$datax->links()}}
    </div>
</div>
<script>
    var cKodeBrg;
    var table = document.getElementById('tabel1');
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
            $(this).addClass("high-light").siblings().removeClass("high-light"); //agar cursor highlight saat disorot
            //cKodeBrg = this.cells[6].innerHTML;
        };
    }
    // var nID;
    // var tabl = document.getElementById('tabel1');
    // for (var i = 1; i < tabl.rows.length; i++) {
    //     tabl.rows[i].ondblclick = function() {
    //        // nID = this.cells[0].innerHTML; //cari Column_ID
    //        // tampilkaninfo(nID)
    //     };
    // }
    var tabel = document.getElementById('tabel1');
    for (var i = 1; i < tabel.rows.length; i++) {
        cells = tabel.rows[i].getElementsByTagName('td');
        var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        var firstDate = new Date();
        var secondDate = new Date(cells[3].innerHTML);
        var pengingat = cells[4].innerHTML;
        var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
        if (diffDays > pengingat) {
            cells[3].style.backgroundColor = 'rgb(' + 0 + ',' + 128 + ',' + 0 + ',' + 0.5 + ')'; //hijau
        }
        if ((diffDays > 1) && (diffDays < pengingat)) {
            cells[3].style.backgroundColor = 'rgb(' + 255 + ',' + 255 + ',' + 0 + ',' + 0.5 + ')'; //kuning
        }
        if (diffDays < 1) {
            cells[3].style.backgroundColor = 'rgb(' + 255 + ',' + 0 + ',' + 0 + ',' + 0.5 + ')'; //merah
        }
    }
</script>
<script>
    function lihat(Column_ID) {
        url = "tanah_lihat_pdf";
        id = Column_ID;
        editUrl = url + '/' + id;
        $.get(editUrl, {}, function(data, status) {
            $("#judulmodal_tanah").html('Informasi')
            $("#page_frmlihat_tanah").html(data);
            $("#frmlihat_tanah").modal('show');
        });
    }
</script>