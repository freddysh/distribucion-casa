<template>
    <div>
        <div class="card">
            <div class="card-header"><h2>Distribucion de su casa</h2></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label for="urbanizacion">Urbanizacion</label>
                            <select class="form-control" name="urbanizacion" id="urbanizacion" :value="busqueda.urbanizacion">
                                <option v-for="(urb,index) in urbanizaciones" :key="index" :value="urb.id">{{ urb.nombre }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label for="manzana">Manzana</label>
                            <input class="form-control" type="text" name="manzana" id="manzana" placeholder="Ejemlo: A" :value="busqueda.manzana">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label for="lote">Lote</label>
                            <input class="form-control" type="text" name="lote" id="lote" placeholder="Ejemlo: 5" :value="busqueda.lote">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <button class="btn btn-success mt-4" @click="buscarLectura()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                            Buscar mi casa
                        </button>
                    </div>
                </div>
                <h4 class="text-primary">Por favor indique los usos dentro de casa por año <b>Periodo actual: {{ (busqueda.anioActual-1)+'/'+busqueda.anioActual }}</b> </h4>
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>Espacios</h4><span>Marcar una opción y luego clic en la distribucion para pintar</span>

                                <div class="row" v-for="(espacio_,index) in espacios" :key="index">
                                    <div class="col-8 btn btn-sm" :class="espacio_.color" @click="recojerColor(espacio_)">{{ espacio_.nombre }}</div>
                                    <div class="col-4">
                                        <svg v-if="espacio.id==espacio_.id" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3" v-for="(celda,index) in distribucion.celdas" :key="index">
                                        <p class="text-center">{{ celda.nombre }}</p>
                                        <table class="table table-bordered table-striped puntero">
                                            <tr>
                                                <td class="cur" @click="asignarColor(celda.celda_a.nombre,index)" :class="mostrarValor(celda.celda_a.valor)"></td>
                                                <td @click="asignarColor(celda.celda_b.nombre,index)" :class="mostrarValor(celda.celda_b.valor)"></td>
                                                <td @click="asignarColor(celda.celda_c.nombre,index)" :class="mostrarValor(celda.celda_c.valor)"></td>
                                                <td @click="asignarColor(celda.celda_d.nombre,index)" :class="mostrarValor(celda.celda_d.valor)"></td>
                                                <td @click="asignarColor(celda.celda_e.nombre,index)" :class="mostrarValor(celda.celda_e.valor)"></td>
                                                <td @click="asignarColor(celda.celda_f.nombre,index)" :class="mostrarValor(celda.celda_f.valor)"></td>
                                            </tr><tr>
                                                <td @click="asignarColor(celda.celda_g.nombre,index)" :class="mostrarValor(celda.celda_g.valor)"></td>
                                                <td @click="asignarColor(celda.celda_h.nombre,index)" :class="mostrarValor(celda.celda_h.valor)"></td>
                                                <td @click="asignarColor(celda.celda_i.nombre,index)" :class="mostrarValor(celda.celda_i.valor)"></td>
                                                <td @click="asignarColor(celda.celda_j.nombre,index)" :class="mostrarValor(celda.celda_j.valor)"></td>
                                                <td @click="asignarColor(celda.celda_k.nombre,index)" :class="mostrarValor(celda.celda_k.valor)"></td>
                                                <td @click="asignarColor(celda.celda_l.nombre,index)" :class="mostrarValor(celda.celda_l.valor)"></td>
                                            </tr><tr>
                                                <td @click="asignarColor(celda.celda_m.nombre,index)" :class="mostrarValor(celda.celda_m.valor)"></td>
                                                <td @click="asignarColor(celda.celda_n.nombre,index)" :class="mostrarValor(celda.celda_n.valor)"></td>
                                                <td @click="asignarColor(celda.celda_o.nombre,index)" :class="mostrarValor(celda.celda_o.valor)"></td>
                                                <td @click="asignarColor(celda.celda_p.nombre,index)" :class="mostrarValor(celda.celda_p.valor)"></td>
                                                <td @click="asignarColor(celda.celda_q.nombre,index)" :class="mostrarValor(celda.celda_q.valor)"></td>
                                                <td @click="asignarColor(celda.celda_r.nombre,index)" :class="mostrarValor(celda.celda_r.valor)"></td>
                                            </tr><tr>
                                                <td @click="asignarColor(celda.celda_s.nombre,index)" :class="mostrarValor(celda.celda_s.valor)"></td>
                                                <td @click="asignarColor(celda.celda_t.nombre,index)" :class="mostrarValor(celda.celda_t.valor)"></td>
                                                <td @click="asignarColor(celda.celda_u.nombre,index)" :class="mostrarValor(celda.celda_u.valor)"></td>
                                                <td @click="asignarColor(celda.celda_v.nombre,index)" :class="mostrarValor(celda.celda_v.valor)"></td>
                                                <td @click="asignarColor(celda.celda_w.nombre,index)" :class="mostrarValor(celda.celda_w.valor)"></td>
                                                <td @click="asignarColor(celda.celda_x.nombre,index)" :class="mostrarValor(celda.celda_x.valor)"></td>
                                            </tr><tr>
                                                <td @click="asignarColor(celda.celda_y.nombre,index)" :class="mostrarValor(celda.celda_y.valor)"></td>
                                                <td @click="asignarColor(celda.celda_z.nombre,index)" :class="mostrarValor(celda.celda_z.valor)"></td>
                                                <td @click="asignarColor(celda.celda_aa.nombre,index)" :class="mostrarValor(celda.celda_aa.valor)"></td>
                                                <td @click="asignarColor(celda.celda_ab.nombre,index)" :class="mostrarValor(celda.celda_ab.valor)"></td>
                                                <td @click="asignarColor(celda.celda_ac.nombre,index)" :class="mostrarValor(celda.celda_ac.valor)"></td>
                                                <td @click="asignarColor(celda.celda_ad.nombre,index)" :class="mostrarValor(celda.celda_ad.valor)"></td>
                                            </tr><tr>
                                                <td @click="asignarColor(celda.celda_ae.nombre,index)" :class="mostrarValor(celda.celda_ae.valor)"></td>
                                                <td @click="asignarColor(celda.celda_af.nombre,index)" :class="mostrarValor(celda.celda_af.valor)"></td>
                                                <td @click="asignarColor(celda.celda_ag.nombre,index)" :class="mostrarValor(celda.celda_ag.valor)"></td>
                                                <td @click="asignarColor(celda.celda_ah.nombre,index)" :class="mostrarValor(celda.celda_ah.valor)"></td>
                                                <td @click="asignarColor(celda.celda_ai.nombre,index)" :class="mostrarValor(celda.celda_ai.valor)"></td>
                                                <td @click="asignarColor(celda.celda_aj.nombre,index)" :class="mostrarValor(celda.celda_aj.valor)"></td>
                                            </tr>
                                        </table>
                                        <span class="text-center">
                                            ------------- Calle ------------
                                        </span>
                                    </div>
                                    <div class="col-sm-12 col-md-2 text-center">
                                        <p>Años</p>
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-secondary btn-block btn-lg" @click="ponerAnio('-')">
                                                    <b>{{ (busqueda.anioActual-3)+'/'+(busqueda.anioActual-2) }}</b>
                                                    <br>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                                                    </svg>

                                                </button>
                                            </div>
                                            <div class="col-12"><button class="btn btn-primary btn-block btn-lg"><b>{{ (busqueda.anioActual-1)+'/'+busqueda.anioActual }}</b></button> </div>
                                            <div class="col-12">
                                                <button class="btn btn-secondary btn-block btn-lg" @click="ponerAnio('+')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
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
        </div>
    </div>
</template>
<script>
import {computed, reactive, ref, toRefs} from "vue";
export default({

    setup() {
        const busqueda=ref({
            urbanizacion:'',
            manzana:'',
            lote:'',
            anioActual:new Date().getFullYear()
        });
        const distribucion=ref({
            manzana:'A',
            lote:'5',
            urbanizacion_id:'',
            periodo_id:'',
            celdas:[
                    {
                        nombre:'Primera planta',
                        celda_a:{nombre:'celda_a',valor:''},
                        celda_b:{nombre:'celda_b',valor:''},
                        celda_c:{nombre:'celda_c',valor:''},
                        celda_d:{nombre:'celda_d',valor:''},
                        celda_e:{nombre:'celda_e',valor:''},
                        celda_f:{nombre:'celda_f',valor:''},
                        celda_g:{nombre:'celda_g',valor:''},
                        celda_h:{nombre:'celda_h',valor:''},
                        celda_i:{nombre:'celda_i',valor:''},
                        celda_j:{nombre:'celda_j',valor:''},
                        celda_k:{nombre:'celda_k',valor:''},
                        celda_l:{nombre:'celda_l',valor:''},
                        celda_m:{nombre:'celda_m',valor:''},
                        celda_n:{nombre:'celda_n',valor:''},
                        celda_o:{nombre:'celda_o',valor:''},
                        celda_p:{nombre:'celda_p',valor:''},
                        celda_q:{nombre:'celda_q',valor:''},
                        celda_r:{nombre:'celda_r',valor:''},
                        celda_s:{nombre:'celda_s',valor:''},
                        celda_t:{nombre:'celda_t',valor:''},
                        celda_u:{nombre:'celda_u',valor:''},
                        celda_v:{nombre:'celda_v',valor:''},
                        celda_w:{nombre:'celda_w',valor:''},
                        celda_x:{nombre:'celda_x',valor:''},
                        celda_y:{nombre:'celda_y',valor:''},
                        celda_z:{nombre:'celda_z',valor:''},
                        celda_aa:{nombre:'celda_aa',valor:''},
                        celda_ab:{nombre:'celda_ab',valor:''},
                        celda_ac:{nombre:'celda_ac',valor:''},
                        celda_ad:{nombre:'celda_ad',valor:''},
                        celda_ae:{nombre:'celda_ae',valor:''},
                        celda_af:{nombre:'celda_af',valor:''},
                        celda_ag:{nombre:'celda_ag',valor:''},
                        celda_ah:{nombre:'celda_ah',valor:''},
                        celda_ai:{nombre:'celda_ai',valor:''},
                        celda_aj:{nombre:'celda_aj',valor:''}
                    },
                    {
                        nombre:'Segunda planta',
                        celda_a:{nombre:'celda_a',valor:''},
                        celda_b:{nombre:'celda_b',valor:''},
                        celda_c:{nombre:'celda_c',valor:''},
                        celda_d:{nombre:'celda_d',valor:''},
                        celda_e:{nombre:'celda_e',valor:''},
                        celda_f:{nombre:'celda_f',valor:''},
                        celda_g:{nombre:'celda_g',valor:''},
                        celda_h:{nombre:'celda_h',valor:''},
                        celda_i:{nombre:'celda_i',valor:''},
                        celda_j:{nombre:'celda_j',valor:''},
                        celda_k:{nombre:'celda_k',valor:''},
                        celda_l:{nombre:'celda_l',valor:''},
                        celda_m:{nombre:'celda_m',valor:''},
                        celda_n:{nombre:'celda_n',valor:''},
                        celda_o:{nombre:'celda_o',valor:''},
                        celda_p:{nombre:'celda_p',valor:''},
                        celda_q:{nombre:'celda_q',valor:''},
                        celda_r:{nombre:'celda_r',valor:''},
                        celda_s:{nombre:'celda_s',valor:''},
                        celda_t:{nombre:'celda_t',valor:''},
                        celda_u:{nombre:'celda_u',valor:''},
                        celda_v:{nombre:'celda_v',valor:''},
                        celda_w:{nombre:'celda_w',valor:''},
                        celda_x:{nombre:'celda_x',valor:''},
                        celda_y:{nombre:'celda_y',valor:''},
                        celda_z:{nombre:'celda_z',valor:''},
                        celda_aa:{nombre:'celda_aa',valor:''},
                        celda_ab:{nombre:'celda_ab',valor:''},
                        celda_ac:{nombre:'celda_ac',valor:''},
                        celda_ad:{nombre:'celda_ad',valor:''},
                        celda_ae:{nombre:'celda_ae',valor:''},
                        celda_af:{nombre:'celda_af',valor:''},
                        celda_ag:{nombre:'celda_ag',valor:''},
                        celda_ah:{nombre:'celda_ah',valor:''},
                        celda_ai:{nombre:'celda_ai',valor:''},
                        celda_aj:{nombre:'celda_aj',valor:''}
                    },
                    {
                        nombre:'Tercera planta',
                        celda_a:{nombre:'celda_a',valor:''},
                        celda_b:{nombre:'celda_b',valor:''},
                        celda_c:{nombre:'celda_c',valor:''},
                        celda_d:{nombre:'celda_d',valor:''},
                        celda_e:{nombre:'celda_e',valor:''},
                        celda_f:{nombre:'celda_f',valor:''},
                        celda_g:{nombre:'celda_g',valor:''},
                        celda_h:{nombre:'celda_h',valor:''},
                        celda_i:{nombre:'celda_i',valor:''},
                        celda_j:{nombre:'celda_j',valor:''},
                        celda_k:{nombre:'celda_k',valor:''},
                        celda_l:{nombre:'celda_l',valor:''},
                        celda_m:{nombre:'celda_m',valor:''},
                        celda_n:{nombre:'celda_n',valor:''},
                        celda_o:{nombre:'celda_o',valor:''},
                        celda_p:{nombre:'celda_p',valor:''},
                        celda_q:{nombre:'celda_q',valor:''},
                        celda_r:{nombre:'celda_r',valor:''},
                        celda_s:{nombre:'celda_s',valor:''},
                        celda_t:{nombre:'celda_t',valor:''},
                        celda_u:{nombre:'celda_u',valor:''},
                        celda_v:{nombre:'celda_v',valor:''},
                        celda_w:{nombre:'celda_w',valor:''},
                        celda_x:{nombre:'celda_x',valor:''},
                        celda_y:{nombre:'celda_y',valor:''},
                        celda_z:{nombre:'celda_z',valor:''},
                        celda_aa:{nombre:'celda_aa',valor:''},
                        celda_ab:{nombre:'celda_ab',valor:''},
                        celda_ac:{nombre:'celda_ac',valor:''},
                        celda_ad:{nombre:'celda_ad',valor:''},
                        celda_ae:{nombre:'celda_ae',valor:''},
                        celda_af:{nombre:'celda_af',valor:''},
                        celda_ag:{nombre:'celda_ag',valor:''},
                        celda_ah:{nombre:'celda_ah',valor:''},
                        celda_ai:{nombre:'celda_ai',valor:''},
                        celda_aj:{nombre:'celda_aj',valor:''}
                    }
                ]
            }
        );
        const espacios=ref([
            {id:'0',color:'bg-white',nombre:'Clic para borar'},
            {id:'1',color:'bg-danger',nombre:'Sala/comedor'},
            {id:'2',color:'bg-success',nombre:'Cocina'},
            {id:'3',color:'bg-secondary',nombre:'Dormitorio'},
            {id:'4',color:'bg-info',nombre:'Baño'},
            {id:'5',color:'bg-dark',nombre:'Otro (techado)'},
            {id:'6',color:'bg-warning',nombre:'Otro/Ninguno (sin techar)'}
            ]);
        const urbanizaciones=ref([
            {id:'1',nombre:'TAWANTNSUYO'},
            {id:'2',nombre:'KARIGRANDE'},
            {id:'3',nombre:'SAN LUIS'},
            {id:'4',nombre:'LOS INCAS'},
            {id:'5',nombre:'AGUA BUENA'},
            {id:'6',nombre:'SAJUAN'}
            ])
        const espacio=ref({id:''});

        function recojerColor(espacioEscojido){
            espacio.value=espacioEscojido;
            console.log('celdaCurrent', espacio.value.id)
        };
        function asignarColor(celdaPicada,index){
            if(!espacio.value){
                alert('Escoja un color de la lista');
            }
            distribucion.value.celdas[index][celdaPicada].valor=espacio.value.id;
        };
        function mostrarValor(id){
            return espacios.value.map(fila=>{return fila.id==id?fila.color:''});
        };
        function ponerAnio(operacion){
            if(operacion=='+'){
                busqueda.value.anioActual=busqueda.value.anioActual+2
            }
            else if(operacion=='-'){
                busqueda.value.anioActual=busqueda.value.anioActual-2
            }
            // busqueda.value.anioActual=anioActual.value-1+'/'+anioActual.value
            // anioAnteriorTexto.value=anioActual.value-2+'/'+anioActual.value-1
            // anioPosteriorTexto.value=anioActual.value+1+'/'+anioActual.value+2
        };
        return {
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
        }
    },
})
</script>
