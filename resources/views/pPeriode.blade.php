<!doctype html>
<html lang="en">

<head>
    <title>Periode</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/periode/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{ asset('assets/periode/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/periode/jquery/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/periode/jquery/bootstrap.bundle.min.js')}}"></script>
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
        html,
        body {
            height: 100%
        }

        .bg {
            background-image: url("{{ asset('assets/img/bg.jpg') }}");
            height: 100%;
            /*filter: blur(1px);*/
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        #bg {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset('assets/img/bg.jpg') }}") no-repeat center center fixed;
            background-size: cover;
        }

        #element {
            caret-color: rgba(0, 0, 0, 0);
        }

        .title1 {
            margin-bottom: 10px;
            text-align: center;
            width: 210px;
            color: green;
            border: solid black 2px;
        }

        input[type="button1"] {
            color: black;
            border: solid black 1px;
            width: 100%;
            caret-color: rgba(0, 0, 0, 0);
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


<body>
    <div class="bg"></div>

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
    $cperiode = date("Ymd");
    $tahun = substr($cperiode, 0, 4);
    $bulan = substr($cperiode, 4, 2);
    //$bulanAktif = NamaBulan((int)$bulan) . ' ' . $tahun;
    $periodeaktif = $cperiode

    ?>

    <!-- Modal -->
    <div class="modal modal-transparent fade" id="ModalPeriode" tabindex="-1" aria-labelledby="ModalPeriodeLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalPeriodeLabel">Periode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- <div class=title>Pilih Periode Arisan</div> -->
                    <div class="container">
                        <form method="get" action="{{route('setsession')}}">
                            @csrf

                            <table class="flex-container">
                                <tr class="d-flex">
                                    <td class="col-2" style="text-align:center">Tahun </td>
                                    <td class="col-4">
                                        <select id="tahun" class="form-control form-select-sm " aria-label="Default select example" value="<?= $tahun; ?>" name="tahun" onclick="dis2()">
                                            <option selected>Tahun aktif</option>
                                            <?php foreach ($pilihantahun as $cthn) {
                                            ?> <option value="<?= $cthn; ?>" <?php if ($cthn == $tahun) { ?> selected <?php } ?>><?= $cthn; ?> </option>
                                            <?php
                                            } ?>
                                        </select>
                                    </td>
                                    <td class="col-6" style="text-align:right">
                                        <input type="text " class="form-control" style="text-align: center;" id="result" name="periodebulan" value="<?= $periodeaktif; ?>" />
                                    </td>

                                <tr class="d-flex">
                                    <!-- create button and assign value to each button -->
                                    <!-- dis("1") will call function dis to display value -->
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="Januari" onclick="dis('01Januari')" /> </td>
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="Februari" onclick="dis('02Februari')" /> </td>
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="Maret" onclick="dis('03Maret')" /> </td>
                                </tr>
                                <tr class="d-flex">
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="April" onclick="dis('04April')" /> </td>
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="Mei" onclick="dis('05Mei')" /> </td>
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="Juni" onclick="dis('06Juni')" /> </td>

                                </tr>
                                <tr class="d-flex">
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="Juli" onclick="dis('07Juli')" /> </td>
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="Agustus" onclick="dis('08Agustus')" /> </td>
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="September" onclick="dis('09September')" /> </td>

                                </tr>
                                <tr class="d-flex">
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="Oktober" onclick="dis('10Oktober')" /> </td>
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="November" onclick="dis('11November')" /> </td>
                                    <td><input class="text-center col-4 btn btn-outline-primary" type="button1" value="Desember" onclick="dis('12Desember')" /> </td>

                                </tr>
                                <tr>
                                    <td colspan="3"><input type="text" id="periode1" name="periodepilih" value="" hidden /> </td>
                                </tr>
                            </table>
                            <div class="d-grid gap-2">
                                <button class="btn-outline-primary" type="submit" name="submit" value="Pilih Periode">PILIH PERIODE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var myModal = new bootstrap.Modal(document.getElementById('ModalPeriode'))
        myModal.show()
    </script>
</body>

</html>