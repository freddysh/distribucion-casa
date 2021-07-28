<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="./public/css/app.css" rel="stylesheet">
    <style>
        .bg-danger{
            background-color: #e3342f !important
        }.bg-success{
            background-color: #38c172 !important
        }.bg-secondary{
            background-color: #6c757d !important
        }.bg-info{
            background-color: #6cb2eb !important
        }.bg-primary{
            background-color: #3490dc !important
        }.bg-warning{
            background-color: #ffed4a !important
        }.bg-white{
            background-color: #334172 !important
        }
        .bg-purple{
            background-color: #9561e2 !important;
        }
        #tablita td, #tablita th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #tablita tr td {
            width: 14px;
            height: 15px;
          }
          .text-center{
              text-align: center;
          }
    </style>
</head>
<body>
    <table style="width: 500px">
        <tr>
            @foreach ($lectura->celdas as $celda)
                <td style="padding: 2px">
                    <p class="text-center">{{ $celda->nombre }}</p>
                    <table id="tablita">
                        <tr>
                            <td
                            class="{{ $celda->celda_a>0?$espacios[$celda->celda_a]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_b>0?$espacios[$celda->celda_b]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_c>0?$espacios[$celda->celda_c]:''}}"
                        >
                        </td>
                        <td
                            class="{{ $celda->celda_d>0?$espacios[$celda->celda_d]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_e>0?$espacios[$celda->celda_f]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_f>0?$espacios[$celda->celda_f]:''}}"
                            >
                            </td>
                        </tr>

                        <tr>
                            <td
                            class="{{ $celda->celda_g>0?$espacios[$celda->celda_g]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_h>0?$espacios[$celda->celda_h]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_i>0?$espacios[$celda->celda_i]:''}}"
                        >
                        </td>
                        <td
                            class="{{ $celda->celda_j>0?$espacios[$celda->celda_j]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_k>0?$espacios[$celda->celda_k]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_l>0?$espacios[$celda->celda_l]:''}}"
                        >
                        </td>
                        </tr>
                        <tr>
                            <td
                            class="{{ $celda->celda_m>0?$espacios[$celda->celda_m]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_n>0?$espacios[$celda->celda_n]:''}}"
                        >
                        </td>
                        <td
                            class="{{ $celda->celda_o>0?$espacios[$celda->celda_o]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_p>0?$espacios[$celda->celda_p]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_q>0?$espacios[$celda->celda_q]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_r>0?$espacios[$celda->celda_r]:''}}"
                            >
                            </td>
                        </tr>
                        <tr>

                            <td
                            class="{{ $celda->celda_s>0?$espacios[$celda->celda_s]:''}}"
                        >
                        </td>
                        <td
                            class="{{ $celda->celda_t>0?$espacios[$celda->celda_t]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_u>0?$espacios[$celda->celda_u]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_v>0?$espacios[$celda->celda_v]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_w>0?$espacios[$celda->celda_w]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_x>0?$espacios[$celda->celda_x]:''}}"
                        >
                        </td>
                        </tr>
                        <tr>
                        <td
                            class="{{ $celda->celda_y>0?$espacios[$celda->celda_y]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_z>0?$espacios[$celda->celda_z]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_aa>0?$espacios[$celda->celda_aa]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_ab>0?$espacios[$celda->celda_ab]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_ac>0?$espacios[$celda->celda_ac]:''}}"
                        >
                        </td>
                        <td
                            class="{{ $celda->celda_ad>0?$espacios[$celda->celda_ad]:''}}"
                            >
                            </td>
                        </tr>
                        <tr>
                            <td
                            class="{{ $celda->celda_ae>0?$espacios[$celda->celda_ae]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_af>0?$espacios[$celda->celda_af]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_ag>0?$espacios[$celda->celda_ag]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_ah>0?$espacios[$celda->celda_ah]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_ai>0?$espacios[$celda->celda_ai]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_aj>0?$espacios[$celda->celda_aj]:''}}"
                            >
                            </td>
                        </tr>
                        <tr>
                            <td
                            class="{{ $celda->celda_ak>0?$espacios[$celda->celda_ak]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_al>0?$espacios[$celda->celda_al]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_am>0?$espacios[$celda->celda_am]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_an>0?$espacios[$celda->celda_an]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_ao>0?$espacios[$celda->celda_ao]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_ap>0?$espacios[$celda->celda_ap]:''}}"
                            >
                            </td>
                        </tr>
                        <tr>
                            <td
                            class="{{ $celda->celda_aq>0?$espacios[$celda->celda_aq]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_ar>0?$espacios[$celda->celda_ar]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_as>0?$espacios[$celda->celda_as]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_at>0?$espacios[$celda->celda_at]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_au>0?$espacios[$celda->celda_au]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_av>0?$espacios[$celda->celda_av]:''}}"
                            >
                            </td>
                        </tr>
                        <tr>
                            <td
                            class="{{ $celda->celda_aw>0?$espacios[$celda->celda_aw]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_ax>0?$espacios[$celda->celda_ax]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_ay>0?$espacios[$celda->celda_ay]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_az>0?$espacios[$celda->celda_az]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_aaa>0?$espacios[$celda->celda_aaa]:''}}"
                            >
                            </td>
                            <td
                            class="{{ $celda->celda_aab>0?$espacios[$celda->celda_aab]:''}}"
                            >
                            </td>
                        </tr>
                    </table>
                </td>
            @endforeach
        </tr>
    </table>

    <script src="./public/js/app.js" ></script>
    <script>
        function mostrarValor(valor){
            return valor;
        }
    </script>
</body>
</html>
