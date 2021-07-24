<template>
  <div>
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-10">
            <h2>Urbanizaciones</h2>
          </div>
          <div class="col-2"><button
              class="btn btn-success"
              data-toggle="modal"
              data-target="#exampleModal"
              @click="nuevo()"
            >Nuevo</button></div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover table-bordered table-sm">
          <thead class="bg-primary text-white">
            <tr>
              <th>#</th>
              <th>Urbanizacion</th>
              <th>Operaciones</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(urbanizacion,key) in urbanizaciones"
              :key="key"
            >
              <td>{{ key+1 }}</td>
              <td>{{ urbanizacion.nombre }}</td>
              <td>
                <div class="btn-group">
                  <button
                    class="btn btn-warning btn-sm"
                    data-toggle="modal"
                    data-target="#exampleModal"
                    @click="editar(urbanizacion)"
                  >Editar</button>
                  <button
                    class="btn btn-danger btn-sm"
                    @click="borrar(urbanizacion.id)"
                  >Borrar</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="exampleModalLabel"
            >{{urbanizacion.id?'Editar':'Nuevo'}}</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input
                    class="form-control"
                    type="text"
                    id="nombre"
                    name="nombre"
                    placeholder="nombre de la urbanizacion"
                    v-model="urbanizacion.nombre"
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >Cerrar</button>
            <button
              type="button"
              class="btn btn-primary"
              @click="guardar()"
            >Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { ref, onMounted } from "vue";
import Swal from "sweetalert2";
import { useVuelidate } from "@vuelidate/core";
import { required, minLength, helpers } from "@vuelidate/validators";

export default {
  setup() {
    const urbanizacion = ref({ nombre: "" });
    const urbanizaciones = ref([]);
    const getUrbanizaciones = () => {
      axios.get("urbanizacion-api").then((res) => {
        urbanizaciones.value = res.data;
      });
    };
    const guardar = () => {
      console.log("guardar", urbanizacion.value);
      if (urbanizacion.value.id) {
        axios
          .put(`urbanizacion/${urbanizacion.value.id}`, urbanizacion.value)
          .then((res) => {
            console.log("edit", res);
            if (res.data.status == 1) {
              Swal.fire({
                icon: "success",
                title: "Buenas noticias",
                text: res.data.message,
              });
              getUrbanizaciones();
              limpiarForm();
              modalToggle();
            } else if (res.data.status == 0) {
              Swal.fire({
                icon: "error",
                title: "Opps",
                text: res.data.message,
              });
              limpiarForm();
              modalToggle();
            }
          });
      } else {
        axios.post("urbanizacion", urbanizacion.value).then((res) => {
          console.log("save", res);
          if (res.data.status == 1) {
            Swal.fire({
              icon: "success",
              title: "Buenas noticias",
              text: res.data.message,
            });
            getUrbanizaciones();
            limpiarForm();
            modalToggle();
          } else if (res.data.status == 0) {
            Swal.fire({
              icon: "error",
              title: "Opps",
              text: res.data.message,
            });
            limpiarForm();
          } else if (res.data.status == -1) {
            Swal.fire({
              icon: "info",
              title: "Opps",
              text: res.data.message,
            });
          }
        });
      }
    };
    const limpiarForm = () => {
      urbanizacion.value = { nombre: "" };
    };
    const nuevo = () => {
      limpiarForm();
    };
    const editar = (urb) => {
      urbanizacion.value = urb;
    };
    const borrar = (id) => {
      Swal.fire({
        title: "Estas seguro?",
        text: "No podrás revertir esta operación!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Borrar!",
        cancelButtonText: "No, Cancelar!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete(`urbanizacion/${id}`).then((res) => {
            console.log("save", res);
            if (res.data.status == 1) {
              Swal.fire({
                icon: "success",
                title: "Buenas noticias",
                text: res.data.message,
              });
              getUrbanizaciones();
            } else if (res.data.status == 0) {
              Swal.fire({
                icon: "error",
                title: "Opps",
                text: res.data.message,
              });
            }
          });
        }
      });
    };
    const modalToggle = () => {
      $("#exampleModal").modal("toggle");
    };
    onMounted(() => {
      getUrbanizaciones();
    });
    return {
      urbanizacion,
      urbanizaciones,
      getUrbanizaciones,
      guardar,
      limpiarForm,
      nuevo,
      editar,
      borrar,
      modalToggle,
    };
  },
};
</script>
