@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<!-- /.content -->
<div class="content-wrapper" style="background-image: url('img/b_keluarga.jpg');  background-repeat: no-repeat">
    <div class="container">
        <div class="row">
            <div class="col text-center mt-3 mb-3 text-white">
                <h3 class="mt-2">Periode Arisan</h3>
            </div>
        </div>

        <script>
            //function that display value
            function dis(val) {
                let cbulan = val.substr(0, 2)
                let cperiode1 = val.substr(2, 15)
                let ctahun = document.getElementById("tahun").value
                document.getElementById("result").value = cperiode1 + ' ' + ctahun
                document.getElementById("periode1").value = ctahun + cbulan

            }

            function dis2() {

                let cperiode1 = document.getElementById("periodepilih").value
                let cbulan = cperiode1.substr(4, 2)
                let ctahun = document.getElementById("tahun").value
                let cperiodepilih = document.getElementById("result").value
                let pjg = cperiodepilih.length
                if (pjg > 4) {
                    pjg = pjg - 4
                } else {
                    pjg = 4
                }

                document.getElementById("result").value = cperiodepilih.substr(0, pjg) + ctahun
                document.getElementById("periodepilih").value = ctahun + cbulan

            }
        </script>

        <!-- for styling -->
        <style>
            .title1 {
                margin-bottom: 10px;
                text-align: center;
                width: 210px;
                color: green;
                border: solid black 2px;
            }

            input[type="button1"] {
                background-color: green;
                color: white;
                border: solid black 2px;
                width: 100%
            }

            input[type="button2"] {
                background-color: blue;
                color: white;
                border: solid black 2px;
                width: 100%
            }


            input[type="text1"] {
                background-color: white;
                border: solid black 2px;
                width: 100%
            }
        </style>
        </head>


        <?php
        $sekarang = date("Ymd");
        $tahun1 = substr($sekarang, 0, 4);
        $i = 0;
        $pilihantahun = [];
        for ($i = 0; $i <= 7; $i++) {
            $pilihantahun[$i] = $tahun1;
            $tahun1 = strval((int)$tahun1 - 1);
        }

        //$cperiode = PeriodeAktif();
        $cperiode = '202112';
        $tahun = substr($cperiode, 0, 4);
        $bulan = substr($cperiode, 4, 2);
        //$bulanAktif = NamaBulan((int)$bulan) . ' ' . $tahun;
        //$periodeaktif = $cperiode

        ?>

        <div class="container">
            <!-- <div class=title>Pilih Periode Arisan</div> -->

            <form method="post" action="/periode">
                @csrf
                <table border="3" class="table table-danger table-sm">
                    <tr>
                        <td align="center">Tahun </td>
                        <td>

                    <tr>
                        <!-- create button and assign value to each button -->
                        <!-- dis("1") will call function dis to display value -->
                        <td><input class="text-center" type="button1" value="Januari" onclick="dis('01Januari')" /> </td>
                        <td><input class="text-center" type="button1" value="Februari" onclick="dis('02Februari')" /> </td>
                        <td><input class="text-center" type="button1" value="Maret" onclick="dis('03Maret')" /> </td>
                    </tr>
                    <tr>
                        <td><input class="text-center" type="button1" value="April" onclick="dis('04April')" /> </td>
                        <td><input class="text-center" type="button1" value="Mei" onclick="dis('05Mei')" /> </td>
                        <td><input class="text-center" type="button1" value="Juni" onclick="dis('06Juni')" /> </td>

                    </tr>
                    <tr>
                        <td><input class="text-center" type="button1" value="Juli" onclick="dis('07Juli')" /> </td>
                        <td><input class="text-center" type="button1" value="Agustus" onclick="dis('08Agustus')" /> </td>
                        <td><input class="text-center" type="button1" value="September" onclick="dis('09September')" /> </td>

                    </tr>

                    <tr>
                        <td><input class="text-center" type="button1" value="Oktober" onclick="dis('10Oktober')" /> </td>
                        <td><input class="text-center" type="button1" value="November" onclick="dis('11November')" /> </td>
                        <td><input class="text-center" type="button1" value="Desember" onclick="dis('12Desember')" /> </td>

                    </tr>
                    <tr>


                </table>
                <div class="d-grid gap-2">
                    <button class="btn btn-success" type="submit" name="submit" value="Pilih Periode">PILIH PERIODE</button>
                </div>

            </form>
        </div>


        <div class="row my-6 text-center text-dark">
            <p>Stock Barang Jadi</p>
        </div>

    </div>
</div>
@endsection