<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Listado de Clientes</div>

                    <div class="card-body">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombres</th>
                              <th scope="col">Apellidos</th>
                              <th scope="col">Email</th>
                              <th scope="col">F. Nacimiento</th>
                              <th scope="col">Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="cliente in clientes">
                              <td>{{cliente.id}}</td>
                              <td>{{cliente.nombre_1}} {{cliente.nombre_2}}</td>
                              <td>{{cliente.apellido_1}} {{cliente.apellido_2}}</td>
                              <td>{{cliente.email}}</td>
                              <td>{{cliente.fecha_n}}</td>
                              <td>
                                <button class="btn btn-sm btn-warning" v-on:click="updateCli(cliente.id)">
                                Editar  
                                </button>
                                <button class="btn btn-sm btn-danger" v-on:click="deleteCli(cliente.id)">
                                Eliminar  
                                </button>
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
    export default {
        props: ['clientes'],
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
          deleteCli: function ($id) {
            axios.delete('/cliente/'+$id).then();
            this.$emit('deleted');
          },
          updateCli: function ($id) {
            this.$emit('update', $id);
          }
        }
    }
</script>