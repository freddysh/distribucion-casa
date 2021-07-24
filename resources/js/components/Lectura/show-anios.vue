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
                  <th>Codigo cofirmacion/Año</th>
                  <th
                    v-for="(elto,key1) in lecturas[Object.keys(lecturas)[0]]"
                    :key="key1"
                  >{{ key1.toUpperCase()}}</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(lectura,key) in lecturas"
                  :key="key"
                >
                  <td>{{ key-1 }}/{{ key }}</td>
                  <td
                    v-for="(elto,key1) in lectura"
                    :key="key1"
                  >
                    <img
                      :key="elto"
                      :src="elto?`reporte-lecturas-anios-imagen/${elto}`:''"
                      style="width:270px;height: auto;"
                    >
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
    const ancho = ref("50%");
    function getLecturas() {
      axios.get("reporte-lecturas-api-anios").then((res) => {
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
      getLecturas();
    });
    return {
      lecturas,
      getLecturas,
      mostrar,
      ancho,
    };
  },
};
</script>
