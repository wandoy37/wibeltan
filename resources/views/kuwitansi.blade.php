<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo_kaltim.png') }}">

    <title>Invoice</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        @media print {
            @page {
                size: 210mm 330mm;
                /* Ukuran kertas F4 */
                margin: 10mm;
                /* Sesuaikan margin sesuai kebutuhan */
            }

            .invoice-box {
                max-width: 100%;
                box-shadow: none;
                border: none;
            }
        }

        .underline {
            text-decoration: underline;
        }
    </style>

</head>

<body>

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('img/logo_kaltim.png') }}" style="width:15%; max-width:300px;">
                            </td>

                            <td class="text-end">
                                Invoice #: 123<br>
                                Created: January 1, 2015<br>
                                Due: February 1, 2015
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="5">
                    <table>
                        <tr>
                            <td>
                                <b style="font-size: 24px;">UPTD BPPSDMP</b><br>
                                <i>Dinas Pangan, Tanaman Pangan dan Hortikultura</i><br>
                                <i>Provinsi Kalimantan Timur</i>
                            </td>
                            <td class="text-end">
                                Jl. Thoyib Hadiwijaya No.36, Sempaja Selatan <br>
                                Samarinda - Kalimantan Timur
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading text-center">
                <td width="40%">
                    Item
                </td>
                <td width="16%">
                    Harga Satuan
                </td>
                <td width="5%"></td>
                <td width="16%">
                    Volume
                </td>
                <td width="24%">
                    Jumlah
                </td>
            </tr>

            <tr class="item">
                <td>
                    Pembelajaran Budidaya Tanaman Kangkung
                </td>
                <td class="text-end">
                    Rp. 10.000
                </td>
                <td class="text-center">
                    x
                </td>
                <td class="text-center">
                    50 Orang
                </td>
                <td class="text-end">
                    Rp. 500.000
                </td>
            </tr>

            <tr class="total">
                <td colspan="4"></td>
                <td class="text-end">
                    Total: $385.00
                </td>
            </tr>

            <tr class="information">
                <td colspan="5">
                    <table>
                        <tr>
                            <td width=50%></td>
                            <td class="text-center">
                                Samarinda, {{ date('d, F Y') }}
                                <br>
                                <br>
                                <br>
                                <br>
                                <b class="underline">Syamsudin</b>
                                <br>
                                <span>Bendahara Penerima</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
