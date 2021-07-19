<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row">
        @foreach ($celda as $lectura.celdas)
        <div class="col-4">
          <p class="text-center">{{ $celda.nombre }}</p>
          <table class="table table-bordered table-striped puntero">
            <tr>
              <td
                class="{{ mostrarValor(celda.celda_a) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_b) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_c) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_d) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_e) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_f) }}"
              ></td>
            </tr>
            <tr>
              <td
                class="{{ mostrarValor(celda.celda_g) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_h) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_i) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_j) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_k) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_l) }}"
              ></td>
            </tr>
            <tr>
              <td
                class="{{ mostrarValor(celda.celda_m) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_n) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_o) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_p) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_q) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_r) }}"
              ></td>
            </tr>
            <tr>
              <td
                class="{{ mostrarValor(celda.celda_s) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_t) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_u) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_v) }}"
              ></td>
              <td
              class="{{ mostrarValor(celda.celda_w) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_x) }}"
              ></td>
            </tr>
            <tr>
              <td
                class="{{ mostrarValor(celda.celda_y) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_z) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_aa) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_ab) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_ac) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_ad) }}"
              ></td>
            </tr>
            <tr>
              <td
                class="{{ mostrarValor(celda.celda_ae) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_af) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_ag) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_ah) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_ai) }}"
              ></td>
              <td
                class="{{ mostrarValor(celda.celda_aj) }}"
              ></td>
            </tr>
          </table>
        </div>
        @endforeach
    </div>
</body>
<script>
    mostrarValor(valor){
        return valor;
    }
</script>
</html>
