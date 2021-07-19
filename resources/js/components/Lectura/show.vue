<template>
  <div>
    <div class="card">
      <div class="card-header">
        <h2>Distribucion de su casa</h2>
      </div>
      <div class="card-body">

        <div class="row">
          <div class="col-12">
            <table class="table table-striped table-bordered table-responsive table-hover">
              <thead>
                <tr class="bg-primary text-white">
                  <th>Urbanización</th>
                  <th>Manzana</th>
                  <th>Lote</th>
                  <th>Codigo de confirmación</th>
                  <th>Año</th>
                  <th>Sala/comedor</th>
                  <th>Cocina</th>
                  <th>Dormitorio</th>
                  <th>Baño</th>
                  <th>Otro(techado)</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(urbanizacion,key) in lecturas.urbanizacion"
                  :key="key"
                >
                  <td>{{ urbanizacion }}</td>
                  <td>{{ lecturas.manzana[key] }}</td>
                  <td>{{ lecturas.lote[key] }}</td>
                  <td>{{ lecturas.codigo[key] }}</td>
                  <td>{{ lecturas.anio[key] }}</td>
                  <td>
                    <span
                      v-for="(celda,key1) in lecturas['2'][key].split(',')"
                      :key="key1"
                      v-show="celda.length"
                    >{{ lecturas.codigo[key] }}_{{ celda }}<br /></span>
                  </td>
                  <td>
                    <span
                      v-for="(celda,key1) in lecturas['2'][key].split(',')"
                      :key="key1"
                      v-show="celda.length"
                    >{{ lecturas.codigo[key] }}_{{ celda }}<br /></span>
                  </td>
                  <td>
                    <span
                      v-for="(celda,key1) in lecturas['3'][key].split(',')"
                      :key="key1"
                      v-show="celda.length"
                    >{{ lecturas.codigo[key] }}_{{ celda }}<br /></span>
                  </td>
                  <td>
                    <span
                      v-for="(celda,key1) in lecturas['4'][key].split(',')"
                      :key="key1"
                      v-show="celda.length"
                    >{{ lecturas.codigo[key] }}_{{ celda }}<br />
                    </span>
                  </td>
                  <td>
                    <span
                      v-for="(celda,key1) in lecturas['5'][key].split(',')"
                      :key="key1"
                      v-show="celda.length"
                    >{{ lecturas.codigo[key] }}_{{ celda }}<br /></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { computed, reactive, ref, toRefs, onMounted } from "vue";

import Swal from "sweetalert2";
import { useVuelidate } from "@vuelidate/core";
import { required, minLength, helpers } from "@vuelidate/validators";

export default {
  setup() {
    const lecturas = ref([]);
    const espacios = ref([]);

    function getEspacios() {
      axios.get("espacio").then((res) => {
        espacios.value = res.data;
      });
    }
    function getLecturas() {
      axios.get("reporte-lecturas-api").then((res) => {
        lecturas.value = res.data;
        console.log("lecturas", res.data);
      });
    }
    function mostrar(cadena) {
      let cade = cadena.split(",");
      //   let cad = "";
      for (let index = 0; index < cade.length; index++) {
        const element = cade[index];
        return `${element}<br/>`;
      }
    }
    onMounted(() => {
      getEspacios();
      getLecturas();
    });
    return {
      espacios,
      lecturas,
      getEspacios,
      getLecturas,
      mostrar,
    };
  },
};
</script>
