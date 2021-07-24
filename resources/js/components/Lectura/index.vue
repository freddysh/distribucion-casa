<template>
  <div>
    <div class="card">
      <div class="card-header">
        <h2>Distribucion de su casa </h2>
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
              <span
                v-if="v$.urbanizacion.$error"
                class="text-danger"
              >
                {{ v$.urbanizacion.$errors[0].$message }}
              </span>
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
                @keyup="mayusculasM(busqueda.manzana)"
              >
              <span
                v-if="v$.manzana.$error"
                class="text-danger"
              >
                {{ v$.manzana.$errors[0].$message }}
              </span>
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
                @keyup="mayusculasL(busqueda.lote)"
              >
              <span
                v-if="v$.lote.$error"
                class="text-danger"
              >
                {{ v$.lote.$errors[0].$message }}
              </span>
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
          >Mostrar lectura del periodo anterior ({{ distribucion.periodo_inicio-2 }}/{{ distribucion.periodo_fin-2 }})</button>
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
                      :disabled="(busqueda.anioActual-3)<2000"
                      class="btn btn-block btn-lg"
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
                  <div
                    v-show="false"
                    class="col-12"
                  ><button class="btn btn-block btn-lg"><b>{{ (busqueda.anioActual-1)+'/'+busqueda.anioActual }}</b></button> </div>
                  <div class="col-12">
                    <button
                      :disabled="busqueda.anioActual+1> fecha.getFullYear()"
                      class="btn btn-block btn-lg"
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
            <div class="card bg-primary">
              <div
                class="text-white card-body"
                style="font-size:15px;"
              >
                Codigo:{{ codigo }}
                <button
                  class="btn btn-sm btn-secondary btn-block"
                  v-clipboard:copy="codigo"
                  v-clipboard:success="onCopy"
                  v-clipboard:error="onError"
                > <span v-if="!copiado">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-clipboard"
                      viewBox="0 0 16 16"
                    >
                      <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                      <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                    </svg>
                  </span><span v-if="copiado">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-clipboard-check"
                      viewBox="0 0 16 16"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"
                      />
                      <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                      <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                    </svg>
                  </span> {{copiado?'copiado':'copiar'}}</button>

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

import Swal from "sweetalert2";
import { useVuelidate } from "@vuelidate/core";
import { required, minLength, helpers } from "@vuelidate/validators";
// import moment from "moment";

import moment from "moment";
export default {
  setup() {
    // const fechita = moment().locale("es_PE");
    let fecha = new Date();
    fecha.setHours(fecha.getHours() - 5);
    const copiado = ref(false);
    const rpt = ref(0);
    const codigo = ref("");
    const busqueda = ref({
      urbanizacion: "",
      manzana: "",
      lote: "",
      anioActual: 2001 /*fecha.getFullYear()*/,
      periodo_inicio: 2000 /*fecha.getFullYear() - 1*/,
      periodo_fin: 2001 /*fecha.getFullYear()*/,
    });
    const mustBeLearnVue = (value) => value.includes("learnvue");
    const rulesBusqueda = computed(() => {
      return {
        urbanizacion: { required, minLength: minLength(1) },
        manzana: { required, minLength: minLength(1) },
        lote: { required, minLength: minLength(1) },
        anioActual: { required, minLength: minLength(1) },
        periodo_inicio: { required, minLength: minLength(1) },
        periodo_fin: { required, minLength: minLength(1) },
      };
    });
    const v$ = useVuelidate(rulesBusqueda, busqueda);
    const distribucion = ref({
      id: 0,
      manzana: "",
      lote: "",
      urbanizacion_id: "0",
      periodo_inicio: 2000 /*fecha.getFullYear() - 1*/,
      periodo_fin: 2001 /*fecha.getFullYear()*/,
      celdas: [
        {
          nombre: "Primera planta",
          celda_a: "7",
          celda_b: "7",
          celda_c: "7",
          celda_d: "7",
          celda_e: "7",
          celda_f: "7",
          celda_g: "7",
          celda_h: "7",
          celda_i: "7",
          celda_j: "7",
          celda_k: "7",
          celda_l: "7",
          celda_m: "7",
          celda_n: "7",
          celda_o: "7",
          celda_p: "7",
          celda_q: "7",
          celda_r: "7",
          celda_s: "7",
          celda_t: "7",
          celda_u: "7",
          celda_v: "7",
          celda_w: "7",
          celda_x: "7",
          celda_y: "7",
          celda_z: "7",
          celda_aa: "7",
          celda_ab: "7",
          celda_ac: "7",
          celda_ad: "7",
          celda_ae: "7",
          celda_af: "7",
          celda_ag: "7",
          celda_ah: "7",
          celda_ai: "7",
          celda_aj: "7",
        },
        {
          nombre: "Segunda planta",
          celda_a: "7",
          celda_b: "7",
          celda_c: "7",
          celda_d: "7",
          celda_e: "7",
          celda_f: "7",
          celda_g: "7",
          celda_h: "7",
          celda_i: "7",
          celda_j: "7",
          celda_k: "7",
          celda_l: "7",
          celda_m: "7",
          celda_n: "7",
          celda_o: "7",
          celda_p: "7",
          celda_q: "7",
          celda_r: "7",
          celda_s: "7",
          celda_t: "7",
          celda_u: "7",
          celda_v: "7",
          celda_w: "7",
          celda_x: "7",
          celda_y: "7",
          celda_z: "7",
          celda_aa: "7",
          celda_ab: "7",
          celda_ac: "7",
          celda_ad: "7",
          celda_ae: "7",
          celda_af: "7",
          celda_ag: "7",
          celda_ah: "7",
          celda_ai: "7",
          celda_aj: "7",
        },
        {
          nombre: "Tercera planta",
          celda_a: "7",
          celda_b: "7",
          celda_c: "7",
          celda_d: "7",
          celda_e: "7",
          celda_f: "7",
          celda_g: "7",
          celda_h: "7",
          celda_i: "7",
          celda_j: "7",
          celda_k: "7",
          celda_l: "7",
          celda_m: "7",
          celda_n: "7",
          celda_o: "7",
          celda_p: "7",
          celda_q: "7",
          celda_r: "7",
          celda_s: "7",
          celda_t: "7",
          celda_u: "7",
          celda_v: "7",
          celda_w: "7",
          celda_x: "7",
          celda_y: "7",
          celda_z: "7",
          celda_aa: "7",
          celda_ab: "7",
          celda_ac: "7",
          celda_ad: "7",
          celda_ae: "7",
          celda_af: "7",
          celda_ag: "7",
          celda_ah: "7",
          celda_ai: "7",
          celda_aj: "7",
        },
      ],
    });
    function celdasVacias() {
      distribucion.value.celdas = [
        {
          nombre: "Primera planta",
          celda_a: "7",
          celda_b: "7",
          celda_c: "7",
          celda_d: "7",
          celda_e: "7",
          celda_f: "7",
          celda_g: "7",
          celda_h: "7",
          celda_i: "7",
          celda_j: "7",
          celda_k: "7",
          celda_l: "7",
          celda_m: "7",
          celda_n: "7",
          celda_o: "7",
          celda_p: "7",
          celda_q: "7",
          celda_r: "7",
          celda_s: "7",
          celda_t: "7",
          celda_u: "7",
          celda_v: "7",
          celda_w: "7",
          celda_x: "7",
          celda_y: "7",
          celda_z: "7",
          celda_aa: "7",
          celda_ab: "7",
          celda_ac: "7",
          celda_ad: "7",
          celda_ae: "7",
          celda_af: "7",
          celda_ag: "7",
          celda_ah: "7",
          celda_ai: "7",
          celda_aj: "7",
        },
        {
          nombre: "Segunda planta",
          celda_a: "7",
          celda_b: "7",
          celda_c: "7",
          celda_d: "7",
          celda_e: "7",
          celda_f: "7",
          celda_g: "7",
          celda_h: "7",
          celda_i: "7",
          celda_j: "7",
          celda_k: "7",
          celda_l: "7",
          celda_m: "7",
          celda_n: "7",
          celda_o: "7",
          celda_p: "7",
          celda_q: "7",
          celda_r: "7",
          celda_s: "7",
          celda_t: "7",
          celda_u: "7",
          celda_v: "7",
          celda_w: "7",
          celda_x: "7",
          celda_y: "7",
          celda_z: "7",
          celda_aa: "7",
          celda_ab: "7",
          celda_ac: "7",
          celda_ad: "7",
          celda_ae: "7",
          celda_af: "7",
          celda_ag: "7",
          celda_ah: "7",
          celda_ai: "7",
          celda_aj: "7",
        },
        {
          nombre: "Tercera planta",
          celda_a: "7",
          celda_b: "7",
          celda_c: "7",
          celda_d: "7",
          celda_e: "7",
          celda_f: "7",
          celda_g: "7",
          celda_h: "7",
          celda_i: "7",
          celda_j: "7",
          celda_k: "7",
          celda_l: "7",
          celda_m: "7",
          celda_n: "7",
          celda_o: "7",
          celda_p: "7",
          celda_q: "7",
          celda_r: "7",
          celda_s: "7",
          celda_t: "7",
          celda_u: "7",
          celda_v: "7",
          celda_w: "7",
          celda_x: "7",
          celda_y: "7",
          celda_z: "7",
          celda_aa: "7",
          celda_ab: "7",
          celda_ac: "7",
          celda_ad: "7",
          celda_ae: "7",
          celda_af: "7",
          celda_ag: "7",
          celda_ah: "7",
          celda_ai: "7",
          celda_aj: "7",
        },
      ];
    }
    const lecturaAnterior = ref({});
    const espacios = ref([]);
    const urbanizaciones = ref([]);
    const espacio = ref({ id: "" });

    function recojerColor(espacioEscojido) {
      espacio.value = espacioEscojido;
      console.log("celdaCurrent", espacio.value.id);
    }
    function asignarColor(celdaPicada, index) {
      if (!espacio.value.id) {
        alert("Escoja un color de la lista");
      }
      distribucion.value.celdas[index][celdaPicada] = espacio.value.id;
    }
    function mostrarValor(id) {
      return espacios.value.map((fila) => {
        return fila.id == id ? fila.color : "";
      });
    }
    async function ponerAnio(operacion) {
      this.v$.$validate();
      let existe = await existeLectura();
      if (existe == 1) {
        if (!this.v$.$error) {
          if (operacion == "+") {
            busqueda.value.anioActual = busqueda.value.anioActual + 2;
            distribucion.value.periodo_inicio = busqueda.value.anioActual - 1;
            distribucion.value.periodo_fin = busqueda.value.anioActual;
          } else if (operacion == "-") {
            busqueda.value.anioActual = busqueda.value.anioActual - 2;
            distribucion.value.periodo_inicio = busqueda.value.anioActual - 1;
            distribucion.value.periodo_fin = busqueda.value.anioActual;
          }
        }
        this.buscarLectura();
      } else {
        Swal.fire({
          icon: "warning",
          title: "Espera!",
          text: `Debes ingresar tu distribución para el periodo actual ${distribucion.value.periodo_inicio}/${distribucion.value.periodo_fin}`,
        });
      }
      // busqueda.value.anioActual=anioActual.value-1+'/'+anioActual.value
      // anioAnteriorTexto.value=anioActual.value-2+'/'+anioActual.value-1
      // anioPosteriorTexto.value=anioActual.value+1+'/'+anioActual.value+2
    }
    function getUrbanizaciones() {
      axios.get("urbanizacion-api").then((res) => {
        urbanizaciones.value = res.data;
      });
    }
    function getEspacios() {
      axios.get("espacio").then((res) => {
        espacios.value = res.data;
      });
    }
    async function guardar() {
      this.v$.$validate();
      if (!this.v$.$error) {
        let techados = hay_techados();
        if (techados) {
          guardar_();
        } else {
          Swal.fire({
            title: `No se registran construcciones para este periodo [${distribucion.value.periodo_inicio}/${distribucion.value.periodo_fin}], desea continuar?`,
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Si`,
            denyButtonText: `No`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              guardar_();
            } else if (result.isDenied) {
              //   Swal.fire("Changes are not saved", "", "info");
            }
          });
        }
      }
    }
    async function guardar_() {
      console.log("busqueda", busqueda.value);
      distribucion.value.urbanizacion_id = busqueda.value.urbanizacion;
      distribucion.value.manzana = busqueda.value.manzana;
      distribucion.value.lote = busqueda.value.lote;
      console.log("distribucion antes de guardar", distribucion.value);
      await axios.post(`lectura`, distribucion.value).then((res) => {
        console.log("mensaje", res);
        if (res.data.messaje == 1) {
          let actual = new Date().getFullYear();
          let inicio = new Date().getFullYear() - 1;
          let fin = new Date().getFullYear();
          if (actual / 2 == 0) {
            let inicio = actual;
            let fin = actual + 1;
          } else {
            let inicio = actual - 1;
            let fin = actual;
          }
          let mensaje_ultima_lectura = `para obtener tu codigo ingresa tus construcciones hasta el periodo ${inicio}/${fin}`;
          if (
            distribucion.value.periodo_inicio == inicio &&
            distribucion.value.periodo_fin == fin
          ) {
            codigo.value = res.data.codigo;
            mensaje_ultima_lectura =
              "terminaste de ingresar todas tus contrucciones encuentra tu codigo aqui -->!";
          }
          console.log("tag", res.data);
          Swal.fire({
            icon: "success",
            title: "Buenas noticias",
            text: `Lectura guardada satisfactoriamente, ${mensaje_ultima_lectura}`,
          });
          this.limpiarForm();
        } else {
          Swal.fire({
            icon: "error",
            title: "Opps",
            text: `No se pudo guardar los datos, por favor vuelva a intentarlo.`,
          });
        }
      });
    }
    function limpiarForm() {
      console.log("limpieza", "inicio");
      distribucion.value.id = 0;
      //   distribucion.value.manzana = "";
      //   distribucion.value.lote = "";
      //   distribucion.value.urbanizacion_id = 0;
      //   this.celdasVacias();

      //   busqueda.value.urbanizacion = "";
      //   busqueda.value.manzana = "";
      //   busqueda.value.lote = "";
      rpt.value = 0;
      console.log("limpieza", "fin");
      console.log("distribucion", distribucion.value);
    }
    async function buscarLectura() {
      this.v$.$validate();
      if (!this.v$.$error) {
        busqueda.value.periodo_inicio = distribucion.value.periodo_inicio;
        busqueda.value.periodo_fin = distribucion.value.periodo_fin;

        console.log("busqueda", busqueda.value);

        await axios.post(`lectura-buscar`, busqueda.value).then((res) => {
          console.log("lectura-buscar", res.data);
          rpt.value = 0;
          distribucion.value.id = 0;
          this.celdasVacias();

          if (res.data.rpt >= 1) {
            if (res.data.rpt == 1) {
              rpt.value = 1;
              distribucion.value = res.data.lectura;
              Swal.fire({
                icon: "success",
                title: "Buenas noticias",
                text: "Se encontro un registro",
              });
            } else if (res.data.rpt == 2) {
              rpt.value = 2;
              distribucion.value = res.data.lecturaAnterior;
              distribucion.value.id = 0;
              distribucion.value.periodo_inicio = parseInt(
                distribucion.value.periodo_inicio
              );
              distribucion.value.periodo_fin = parseInt(
                distribucion.value.periodo_fin
              );

              lecturaAnterior.value = res.data.lecturaAnterior;
              lecturaAnterior.value.id = 0;
              lecturaAnterior.value.periodo_inicio =
                parseInt(lecturaAnterior.value.periodo_inicio) + 2;
              lecturaAnterior.value.periodo_fin =
                parseInt(lecturaAnterior.value.periodo_fin) + 2;

              Swal.fire({
                icon: "warning",
                title: "Opps",
                text: `No se encontro registros, pero hay un registro del periodo[${
                  parseInt(distribucion.value.periodo_inicio) - 2
                }/${parseInt(distribucion.value.periodo_fin) - 2}]`,
              });
            }
          } else {
            rpt.value = 0;
            distribucion.value.id = 0;
            this.celdasVacias();

            Swal.fire({
              icon: "warning",
              title: "Opps",
              text: `No se registran datos para ${busqueda.value.urbanizacion} | ${busqueda.value.manzana} | ${busqueda.value.lote} en el periodo [${busqueda.value.periodo_inicio}/${busqueda.value.periodo_fin}] /n ,por favor coloree la distribución de su vivienda para el periodo indicado.`,
            });
          }
        });
      }
    }
    function mostrarLecturaAnterior() {
      distribucion.value = lecturaAnterior.value;
    }
    const onCopy = () => {
      //   alert("Acabas de copiar el siguiente texto en el portapapeles: ");
      copiado.value = !copiado.value;
    };
    const onError = () => {
      alert("No se pudo copiar el texto al portapapeles");
      console.log(e);
    };
    function mayusculasM(valor) {
      busqueda.value.manzana = valor.toUpperCase();
    }
    function mayusculasL(valor) {
      busqueda.value.lote = valor.toUpperCase();
    }
    function hay_techados() {
      let valor = 0;
      distribucion.value.celdas.forEach((element) => {
        valor += element.celda_a != "7" ? 1 : 0;
        valor += element.celda_b != "7" ? 1 : 0;
        valor += element.celda_c != "7" ? 1 : 0;
        valor += element.celda_d != "7" ? 1 : 0;
        valor += element.celda_e != "7" ? 1 : 0;
        valor += element.celda_f != "7" ? 1 : 0;
        valor += element.celda_g != "7" ? 1 : 0;
        valor += element.celda_h != "7" ? 1 : 0;
        valor += element.celda_i != "7" ? 1 : 0;
        valor += element.celda_j != "7" ? 1 : 0;
        valor += element.celda_k != "7" ? 1 : 0;
        valor += element.celda_l != "7" ? 1 : 0;
        valor += element.celda_m != "7" ? 1 : 0;
        valor += element.celda_n != "7" ? 1 : 0;
        valor += element.celda_o != "7" ? 1 : 0;
        valor += element.celda_p != "7" ? 1 : 0;
        valor += element.celda_q != "7" ? 1 : 0;
        valor += element.celda_r != "7" ? 1 : 0;
        valor += element.celda_s != "7" ? 1 : 0;
        valor += element.celda_t != "7" ? 1 : 0;
        valor += element.celda_u != "7" ? 1 : 0;
        valor += element.celda_v != "7" ? 1 : 0;
        valor += element.celda_w != "7" ? 1 : 0;
        valor += element.celda_x != "7" ? 1 : 0;
        valor += element.celda_y != "7" ? 1 : 0;
        valor += element.celda_z != "7" ? 1 : 0;
        valor += element.celda_aa != "7" ? 1 : 0;
        valor += element.celda_ab != "7" ? 1 : 0;
        valor += element.celda_ac != "7" ? 1 : 0;
        valor += element.celda_ad != "7" ? 1 : 0;
        valor += element.celda_ae != "7" ? 1 : 0;
        valor += element.celda_af != "7" ? 1 : 0;
        valor += element.celda_ag != "7" ? 1 : 0;
        valor += element.celda_ah != "7" ? 1 : 0;
        valor += element.celda_ai != "7" ? 1 : 0;
        valor += element.celda_aj != "7" ? 1 : 0;
      });
      return valor;
    }
    async function existeLectura() {
      let valor = 0;
      busqueda.value.periodo_inicio = distribucion.value.periodo_inicio;
      busqueda.value.periodo_fin = distribucion.value.periodo_fin;

      console.log("busqueda", busqueda.value);

      await axios.post(`lectura-buscar`, busqueda.value).then((res) => {
        if (res.data.rpt == 1) {
          valor = 1;
        }
      });
      return valor;
    }
    onMounted(() => {
      //   this.moment = moment;
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
      v$,
      // anioActual,
      // anioAnteriorTexto,
      // anioPosteriorTexto,
      ponerAnio,
      guardar,
      buscarLectura,
      getUrbanizaciones,
      getEspacios,
      celdasVacias,
      lecturaAnterior,
      mostrarLecturaAnterior,
      limpiarForm,
      codigo,
      onCopy,
      onError,
      copiado,
      mayusculasM,
      mayusculasL,
      fecha,
      hay_techados,
      existeLectura,
    };
  },
};
</script>
<style>
table tr td {
  width: 35px;
  height: 40px;
}
</style>
