<template>
  <div>
    <div class="card">
      <div class="card-header">
        <h2>Distribucion de su casa</h2>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12 col-md-3">
            <div class="form-group">
              <label for="urbanizacion">Urbanizacion</label>
              <select
                class="form-control"
                name="urbanizacion"
                id="urbanizacion"
                v-model="busqueda.urbanizacion"
              >
                <option
                  v-for="(urb,index) in urbanizaciones"
                  :key="index"
                  :value="urb.id"
                >{{ urb.nombre }}</option>
              </select>
            </div>
          </div>
          <div class="col-sm-12 col-md-3">
            <div class="form-group">
              <label for="manzana">Manzana</label>
              <input
                class="form-control"
                type="text"
                name="manzana"
                id="manzana"
                placeholder="Ejemlo: A"
                v-model="busqueda.manzana"
              >
            </div>
          </div>
          <div class="col-sm-12 col-md-3">
            <div class="form-group">
              <label for="lote">Lote</label>
              <input
                class="form-control"
                type="text"
                name="lote"
                id="lote"
                placeholder="Ejemlo: 5"
                v-model="busqueda.lote"
              >
            </div>
          </div>
          <div class="col-sm-12 col-md-3">
            <button
              class="mt-4 btn btn-success"
              @click="buscarLectura()"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-search"
                viewBox="0 0 16 16"
              >
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
              </svg>
              Buscar mi casa
            </button>
          </div>
        </div>
        <h4 class="text-primary">Por favor indique los usos dentro de casa por año <b>Periodo actual: {{ distribucion.periodo_inicio+'/'+distribucion.periodo_fin }}</b>
          <button
            @click="mostrarLecturaAnterior()"
            v-if="distribucion.id==0&&rpt==2"
            class="btn btn-primary btn-sm"
          >Mostrar lectura del periodo anterior</button>
        </h4>
        <div class="row">
          <div class="col-sm-12 col-md-3">
            <div class="card">
              <div class="card-body">
                <h4>Espacios</h4><span>Marcar una opción y luego clic en la distribucion para pintar</span>

                <div
                  class="row"
                  v-for="(espacio_,index) in espacios"
                  :key="index"
                >
                  <div
                    class="border col-8 btn btn-sm"
                    :class="espacio_.color"
                    @click="recojerColor(espacio_)"
                  >{{ espacio_.nombre }}</div>
                  <div class="col-4">
                    <svg
                      v-if="espacio.id==espacio_.id"
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-arrow-left-circle-fill"
                      viewBox="0 0 16 16"
                    >
                      <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div
                    class="col-sm-12 col-md-4"
                    v-for="(celda,index) in distribucion.celdas"
                    :key="index"
                  >
                    <p class="text-center">{{ celda.nombre }}</p>
                    <table class="table table-bordered table-striped puntero">
                      <tr>
                        <td
                          class="cur"
                          @click="asignarColor('celda_a',index)"
                          :class="mostrarValor(celda.celda_a)"
                        ></td>
                        <td
                          @click="asignarColor('celda_b',index)"
                          :class="mostrarValor(celda.celda_b)"
                        ></td>
                        <td
                          @click="asignarColor('celda_c',index)"
                          :class="mostrarValor(celda.celda_c)"
                        ></td>
                        <td
                          @click="asignarColor('celda_d',index)"
                          :class="mostrarValor(celda.celda_d)"
                        ></td>
                        <td
                          @click="asignarColor('celda_e',index)"
                          :class="mostrarValor(celda.celda_e)"
                        ></td>
                        <td
                          @click="asignarColor('celda_f',index)"
                          :class="mostrarValor(celda.celda_f)"
                        ></td>
                      </tr>
                      <tr>
                        <td
                          @click="asignarColor('celda_g',index)"
                          :class="mostrarValor(celda.celda_g)"
                        ></td>
                        <td
                          @click="asignarColor('celda_h',index)"
                          :class="mostrarValor(celda.celda_h)"
                        ></td>
                        <td
                          @click="asignarColor('celda_i',index)"
                          :class="mostrarValor(celda.celda_i)"
                        ></td>
                        <td
                          @click="asignarColor('celda_j',index)"
                          :class="mostrarValor(celda.celda_j)"
                        ></td>
                        <td
                          @click="asignarColor('celda_k',index)"
                          :class="mostrarValor(celda.celda_k)"
                        ></td>
                        <td
                          @click="asignarColor('celda_l',index)"
                          :class="mostrarValor(celda.celda_l)"
                        ></td>
                      </tr>
                      <tr>
                        <td
                          @click="asignarColor('celda_m',index)"
                          :class="mostrarValor(celda.celda_m)"
                        ></td>
                        <td
                          @click="asignarColor('celda_n',index)"
                          :class="mostrarValor(celda.celda_n)"
                        ></td>
                        <td
                          @click="asignarColor('celda_o',index)"
                          :class="mostrarValor(celda.celda_o)"
                        ></td>
                        <td
                          @click="asignarColor('celda_p',index)"
                          :class="mostrarValor(celda.celda_p)"
                        ></td>
                        <td
                          @click="asignarColor('celda_q',index)"
                          :class="mostrarValor(celda.celda_q)"
                        ></td>
                        <td
                          @click="asignarColor('celda_r',index)"
                          :class="mostrarValor(celda.celda_r)"
                        ></td>
                      </tr>
                      <tr>
                        <td
                          @click="asignarColor('celda_s',index)"
                          :class="mostrarValor(celda.celda_s)"
                        ></td>
                        <td
                          @click="asignarColor('celda_t',index)"
                          :class="mostrarValor(celda.celda_t)"
                        ></td>
                        <td
                          @click="asignarColor('celda_u',index)"
                          :class="mostrarValor(celda.celda_u)"
                        ></td>
                        <td
                          @click="asignarColor('celda_v',index)"
                          :class="mostrarValor(celda.celda_v)"
                        ></td>
                        <td
                          @click="asignarColor('celda_w',index)"
                          :class="mostrarValor(celda.celda_w)"
                        ></td>
                        <td
                          @click="asignarColor('celda_x',index)"
                          :class="mostrarValor(celda.celda_x)"
                        ></td>
                      </tr>
                      <tr>
                        <td
                          @click="asignarColor('celda_y',index)"
                          :class="mostrarValor(celda.celda_y)"
                        ></td>
                        <td
                          @click="asignarColor('celda_z',index)"
                          :class="mostrarValor(celda.celda_z)"
                        ></td>
                        <td
                          @click="asignarColor('celda_aa',index)"
                          :class="mostrarValor(celda.celda_aa)"
                        ></td>
                        <td
                          @click="asignarColor('celda_ab',index)"
                          :class="mostrarValor(celda.celda_ab)"
                        ></td>
                        <td
                          @click="asignarColor('celda_ac',index)"
                          :class="mostrarValor(celda.celda_ac)"
                        ></td>
                        <td
                          @click="asignarColor('celda_ad',index)"
                          :class="mostrarValor(celda.celda_ad)"
                        ></td>
                      </tr>
                      <tr>
                        <td
                          @click="asignarColor('celda_ae',index)"
                          :class="mostrarValor(celda.celda_ae)"
                        ></td>
                        <td
                          @click="asignarColor('celda_af',index)"
                          :class="mostrarValor(celda.celda_af)"
                        ></td>
                        <td
                          @click="asignarColor('celda_ag',index)"
                          :class="mostrarValor(celda.celda_ag)"
                        ></td>
                        <td
                          @click="asignarColor('celda_ah',index)"
                          :class="mostrarValor(celda.celda_ah)"
                        ></td>
                        <td
                          @click="asignarColor('celda_ai',index)"
                          :class="mostrarValor(celda.celda_ai)"
                        ></td>
                        <td
                          @click="asignarColor('celda_aj',index)"
                          :class="mostrarValor(celda.celda_aj)"
                        ></td>
                      </tr>
                    </table>
                    <div class="row">
                      <div class="text-center col-12">
                        <span>
                          === Calle ===
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm12 col-md-12">
                    <button
                      class="btn btn-block"
                      :class="distribucion.id==0?'btn-primary':'btn-warning'"
                      @click="guardar()"
                    >
                      {{ distribucion.id==0?'Guardar':'Editar' }}
                      <!-- {{ distribucion.id==0&&rpt==2?' (Lectura del año pasado)':'' }} -->
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-2">
            <div class="card">
              <div class="card-body">
                <p>Años</p>
                <div class="row">
                  <div class="col-12">
                    <button
                      class="btn btn-secondary btn-block btn-lg"
                      @click="ponerAnio('-')"
                    >
                      <b>{{ (busqueda.anioActual-3)+'/'+(busqueda.anioActual-2) }}</b>
                      <br>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-arrow-up-circle-fill"
                        viewBox="0 0 16 16"
                      >
                        <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
                      </svg>

                    </button>
                  </div>
                  <div class="col-12"><button class="btn btn-primary btn-block btn-lg"><b>{{ (busqueda.anioActual-1)+'/'+busqueda.anioActual }}</b></button> </div>
                  <div class="col-12">
                    <button
                      class="btn btn-secondary btn-block btn-lg"
                      @click="ponerAnio('+')"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-arrow-down-circle-fill"
                        viewBox="0 0 16 16"
                      >
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                      </svg>
                      <br>
                      <b>{{ (busqueda.anioActual+1)+'/'+(busqueda.anioActual+2) }}</b>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { computed, reactive, ref, toRefs, onMounted } from "vue";
export default {
  setup() {
    const rpt = ref(0);
    const busqueda = ref({
      urbanizacion: "",
      manzana: "",
      lote: "",
      anioActual: new Date().getFullYear(),
      periodo_inicio: new Date().getFullYear() - 1,
      periodo_fin: new Date().getFullYear(),
    });
    const distribucion = ref({
      id: 0,
      manzana: "",
      lote: "",
      urbanizacion_id: "0",
      periodo_inicio: new Date().getFullYear() - 1,
      periodo_fin: new Date().getFullYear(),
      celdas: [
        {
          nombre: "Primera planta",
          celda_a: "",
          celda_b: "",
          celda_c: "",
          celda_d: "",
          celda_e: "",
          celda_f: "",
          celda_g: "",
          celda_h: "",
          celda_i: "",
          celda_j: "",
          celda_k: "",
          celda_l: "",
          celda_m: "",
          celda_n: "",
          celda_o: "",
          celda_p: "",
          celda_q: "",
          celda_r: "",
          celda_s: "",
          celda_t: "",
          celda_u: "",
          celda_v: "",
          celda_w: "",
          celda_x: "",
          celda_y: "",
          celda_z: "",
          celda_aa: "",
          celda_ab: "",
          celda_ac: "",
          celda_ad: "",
          celda_ae: "",
          celda_af: "",
          celda_ag: "",
          celda_ah: "",
          celda_ai: "",
          celda_aj: "",
        },
        {
          nombre: "Segunda planta",
          celda_a: "",
          celda_b: "",
          celda_c: "",
          celda_d: "",
          celda_e: "",
          celda_f: "",
          celda_g: "",
          celda_h: "",
          celda_i: "",
          celda_j: "",
          celda_k: "",
          celda_l: "",
          celda_m: "",
          celda_n: "",
          celda_o: "",
          celda_p: "",
          celda_q: "",
          celda_r: "",
          celda_s: "",
          celda_t: "",
          celda_u: "",
          celda_v: "",
          celda_w: "",
          celda_x: "",
          celda_y: "",
          celda_z: "",
          celda_aa: "",
          celda_ab: "",
          celda_ac: "",
          celda_ad: "",
          celda_ae: "",
          celda_af: "",
          celda_ag: "",
          celda_ah: "",
          celda_ai: "",
          celda_aj: "",
        },
        {
          nombre: "Tercera planta",
          celda_a: "",
          celda_b: "",
          celda_c: "",
          celda_d: "",
          celda_e: "",
          celda_f: "",
          celda_g: "",
          celda_h: "",
          celda_i: "",
          celda_j: "",
          celda_k: "",
          celda_l: "",
          celda_m: "",
          celda_n: "",
          celda_o: "",
          celda_p: "",
          celda_q: "",
          celda_r: "",
          celda_s: "",
          celda_t: "",
          celda_u: "",
          celda_v: "",
          celda_w: "",
          celda_x: "",
          celda_y: "",
          celda_z: "",
          celda_aa: "",
          celda_ab: "",
          celda_ac: "",
          celda_ad: "",
          celda_ae: "",
          celda_af: "",
          celda_ag: "",
          celda_ah: "",
          celda_ai: "",
          celda_aj: "",
        },
      ],
    });
    const celdas = [
      {
        nombre: "Primera planta",
        celda_a: "",
        celda_b: "",
        celda_c: "",
        celda_d: "",
        celda_e: "",
        celda_f: "",
        celda_g: "",
        celda_h: "",
        celda_i: "",
        celda_j: "",
        celda_k: "",
        celda_l: "",
        celda_m: "",
        celda_n: "",
        celda_o: "",
        celda_p: "",
        celda_q: "",
        celda_r: "",
        celda_s: "",
        celda_t: "",
        celda_u: "",
        celda_v: "",
        celda_w: "",
        celda_x: "",
        celda_y: "",
        celda_z: "",
        celda_aa: "",
        celda_ab: "",
        celda_ac: "",
        celda_ad: "",
        celda_ae: "",
        celda_af: "",
        celda_ag: "",
        celda_ah: "",
        celda_ai: "",
        celda_aj: "",
      },
      {
        nombre: "Segunda planta",
        celda_a: "",
        celda_b: "",
        celda_c: "",
        celda_d: "",
        celda_e: "",
        celda_f: "",
        celda_g: "",
        celda_h: "",
        celda_i: "",
        celda_j: "",
        celda_k: "",
        celda_l: "",
        celda_m: "",
        celda_n: "",
        celda_o: "",
        celda_p: "",
        celda_q: "",
        celda_r: "",
        celda_s: "",
        celda_t: "",
        celda_u: "",
        celda_v: "",
        celda_w: "",
        celda_x: "",
        celda_y: "",
        celda_z: "",
        celda_aa: "",
        celda_ab: "",
        celda_ac: "",
        celda_ad: "",
        celda_ae: "",
        celda_af: "",
        celda_ag: "",
        celda_ah: "",
        celda_ai: "",
        celda_aj: "",
      },
      {
        nombre: "Tercera planta",
        celda_a: "",
        celda_b: "",
        celda_c: "",
        celda_d: "",
        celda_e: "",
        celda_f: "",
        celda_g: "",
        celda_h: "",
        celda_i: "",
        celda_j: "",
        celda_k: "",
        celda_l: "",
        celda_m: "",
        celda_n: "",
        celda_o: "",
        celda_p: "",
        celda_q: "",
        celda_r: "",
        celda_s: "",
        celda_t: "",
        celda_u: "",
        celda_v: "",
        celda_w: "",
        celda_x: "",
        celda_y: "",
        celda_z: "",
        celda_aa: "",
        celda_ab: "",
        celda_ac: "",
        celda_ad: "",
        celda_ae: "",
        celda_af: "",
        celda_ag: "",
        celda_ah: "",
        celda_ai: "",
        celda_aj: "",
      },
    ];
    const lecturaAnterior = ref({});
    const espacios = ref([]);
    const urbanizaciones = ref([]);
    const espacio = ref({ id: "" });

    function recojerColor(espacioEscojido) {
      espacio.value = espacioEscojido;
      console.log("celdaCurrent", espacio.value.id);
    }
    function asignarColor(celdaPicada, index) {
      if (!espacio.value) {
        alert("Escoja un color de la lista");
      }
      distribucion.value.celdas[index][celdaPicada] = espacio.value.id;
    }
    function mostrarValor(id) {
      return espacios.value.map((fila) => {
        return fila.id == id ? fila.color : "";
      });
    }
    function ponerAnio(operacion) {
      if (operacion == "+") {
        busqueda.value.anioActual = busqueda.value.anioActual + 2;
        distribucion.value.periodo_inicio = busqueda.value.anioActual - 1;
        distribucion.value.periodo_fin = busqueda.value.anioActual;
      } else if (operacion == "-") {
        busqueda.value.anioActual = busqueda.value.anioActual - 2;
        distribucion.value.periodo_inicio = busqueda.value.anioActual - 1;
        distribucion.value.periodo_fin = busqueda.value.anioActual;
      }
      buscarLectura();
      // busqueda.value.anioActual=anioActual.value-1+'/'+anioActual.value
      // anioAnteriorTexto.value=anioActual.value-2+'/'+anioActual.value-1
      // anioPosteriorTexto.value=anioActual.value+1+'/'+anioActual.value+2
    }
    function getUrbanizaciones() {
      axios.get("urbanizacion").then((res) => {
        urbanizaciones.value = res.data;
      });
    }
    function getEspacios() {
      axios.get("espacio").then((res) => {
        espacios.value = res.data;
      });
    }
    async function guardar() {
      console.log("busqueda", busqueda.value);
      distribucion.value.urbanizacion_id = busqueda.value.urbanizacion;
      distribucion.value.manzana = busqueda.value.manzana;
      distribucion.value.lote = busqueda.value.lote;
      await axios.post(`lectura`, distribucion.value).then((res) => {
        console.log("tag", res.data);
      });
    }
    async function buscarLectura() {
      busqueda.value.periodo_inicio = distribucion.value.periodo_inicio;
      busqueda.value.periodo_fin = distribucion.value.periodo_fin;

      console.log("busqueda", busqueda.value);

      await axios.post(`lectura-buscar`, busqueda.value).then((res) => {
        console.log("lectura-buscar", res.data);
        rpt.value = 0;
        distribucion.value.id = 0;
        distribucion.value.celdas = celdas;

        if (res.data.rpt >= 1) {
          if (res.data.rpt == 1) {
            rpt.value = 1;
            distribucion.value = res.data.lectura;
            alert("Se encontro un registro");
          } else if (res.data.rpt == 2) {
            rpt.value = 2;
            // distribucion.value = res.data.lecturaAnterior;
            // distribucion.value.id = 0;
            // distribucion.value.periodo_inicio =
            //   parseInt(distribucion.value.periodo_inicio) + 2;
            // distribucion.value.periodo_fin =
            //   parseInt(distribucion.value.periodo_fin) + 2;
            lecturaAnterior.value = res.data.lecturaAnterior;
            lecturaAnterior.value.id = 0;
            lecturaAnterior.value.periodo_inicio =
              parseInt(lecturaAnterior.value.periodo_inicio) + 2;
            lecturaAnterior.value.periodo_fin =
              parseInt(lecturaAnterior.value.periodo_fin) + 2;
            alert(
              `Se encontro un registro del periodo[${
                parseInt(distribucion.value.periodo_inicio) - 2
              }/${parseInt(distribucion.value.periodo_fin) - 2}]`
            );
          }
        } else {
          rpt.value = 0;
          distribucion.value.id = 0;
          distribucion.value.celdas = celdas;
          alert("No se encontro un registro");
        }
      });
    }
    function mostrarLecturaAnterior() {
      distribucion.value = lecturaAnterior.value;
    }
    onMounted(() => {
      getUrbanizaciones();
      getEspacios();
    });
    return {
      rpt,
      distribucion,
      urbanizaciones,
      espacios,
      espacio,
      recojerColor,
      asignarColor,
      mostrarValor,
      busqueda,
      // anioActual,
      // anioAnteriorTexto,
      // anioPosteriorTexto,
      ponerAnio,
      guardar,
      buscarLectura,
      getUrbanizaciones,
      getEspacios,
      celdas,
      lecturaAnterior,
      mostrarLecturaAnterior,
    };
  },
};
</script>
