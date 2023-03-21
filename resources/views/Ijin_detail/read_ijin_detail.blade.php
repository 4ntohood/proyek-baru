<div class="table-responsive">
    <table id="tabel1" class="table table-bordered table-striped table-sm ">
        <thead>
            <tr class="small mb-1">
                <th class="text-center" style="vertical-align:middle;">No</th>
                <th class=" text-center" style="vertical-align:middle;">Tanggal</th>
                <th class="text-center" style="vertical-align:middle;">No Perijinan</th>
                <th class="text-center" style="vertical-align:middle;">Perijinan</th>
                <th class="text-center" style="vertical-align:middle;">Nama Ijin</th>
                <th class="text-center" style="vertical-align:middle;">Tgl Terbit</th>
                <th class="text-center" style="vertical-align:middle;">Tgl Habis</th>
                <th class="text-center" style="vertical-align:middle;">Alrm</th>
                <th class="text-center" style="vertical-align:middle;">Penerbit</th>
                <th class="text-center" style="vertical-align:middle;">Files</th>
                <th class="text-center" style="vertical-align:middle;">Keterangan</th>
                <th class="text-center" style="vertical-align:middle;">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($datax) && $datax->count())
            @foreach ($datax as $post)
            <tr class="small mb-1">
                <td class="text-center">{{ ++$i }}</td>
                <td>{{ ($post->tgl) ? date('d-M-Y', strtotime($post->tgl)) : '' }}</td>
                <td>{{ ($post->no) }}</td>
                <td>{{ strtoupper($post->nama_ijin) }}</td>
                <td>{{ ($post->nama) }}</td>
                <td>{{ ($post->tglterbit) ? date('d-M-Y', strtotime($post->tglterbit)) : '' }}</td>
                <td>{{ ($post->tglhabis) ? date('d-M-Y', strtotime($post->tglhabis)) : '' }}</td>
                <td class="text-right">{{ ($post->pengingat) }}</td>
                <td>{{ ($post->penerbit) }}</td>
                <td>{{ strtoupper($post->namafile) }}</td>
                <td>{{ ($post->keterangan) }}</td>
                <td style="white-space: nowrap">
                    <button style="vertical-align: middle;" class="btn btn-primary btn-xs" onclick='lihat("{{ $post->column_id }}")' title="Lihat"><i class="fa fa-eye"></i></button>
                    <button style="vertical-align: middle;" class="btn btn-success btn-xs" onclick='edit("{{ $post->column_id }}")' title="Edit"><i class="fas fa-edit"></i></button>
                    <button style="vertical-align: middle;" class="btn btn-warning btn-xs" onclick='cetak("{{ $post->column_id }}") ' title="Cetak"><i class="fas fa-print"></i> </button>
                    <button style="vertical-align: middle;" class="btn btn-danger btn-xs" onclick='SwalDelete("{{ $post->column_id }}")' title="Hapus"><i class="fas fa-trash-alt"></i> </button>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="12" style="text-align: center;vertical-align:middle">Data Not Found!.</td>
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
            cKodeBrg = this.cells[6].innerHTML;
        };
    }
    var nID;
    var tabl = document.getElementById('tabel1');
    for (var i = 1; i < tabl.rows.length; i++) {
        tabl.rows[i].ondblclick = function() {
            nID = this.cells[0].innerHTML; //cari Column_ID
            tampilkaninfo(nID)
        };
    }
    var tabel = document.getElementById('tabel1');
    for (var i = 1; i < tabel.rows.length; i++) {
        cells = tabel.rows[i].getElementsByTagName('td');
        var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        var firstDate = new Date();
        var secondDate = new Date(cells[6].innerHTML);
        var pengingat = cells[7].innerHTML;
        var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
        if (diffDays > pengingat) {
            cells[6].style.backgroundColor = 'rgb(' + 0 + ',' + 128 + ',' + 0 + ',' + 0.5 + ')'; //hijau
        }
        if ((diffDays > 1) && (diffDays < pengingat)) {
            cells[6].style.backgroundColor = 'rgb(' + 255 + ',' + 255 + ',' + 0 + ',' + 0.5 + ')'; //kuning
        }
        if (diffDays < 1) {
            cells[6].style.backgroundColor = 'rgb(' + 255 + ',' + 0 + ',' + 0 + ',' + 0.5 + ')'; //merah
        }
    }
</script>
<script>
    let getTds = document.querySelectorAll('table td')

    getTds.forEach(function(row) {
        //Low
        if (row.textContent == 'Low') {
            row.style.background = 'green'
        }
        //Medium
        if (row.textContent == 'Medium') {
            row.style.background = 'yellow'
        }
    })
</script>
<script>
    function lihat(column_id) {
        url = "lihat_pdf";
        id = column_id;
        editUrl = url + '/' + id;
        $.get(editUrl, {}, function(data, status) {
            $("#judulmodal").html('Informasi')
            $("#page_frmlihat").html(data);
            $("#frmlihat").modal('show');
        });
    }
</script>