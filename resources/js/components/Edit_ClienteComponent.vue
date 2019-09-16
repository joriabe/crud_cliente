<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Cliente # {{single_cliente.id}}</div>

                    <div class="card-body">
                       <form v-on:submit.prevent="updateCliente()">                          
                          <input type="hidden" name="id" v-model="single_cliente.id">

                          <div class="form-group row">
                            <label for="nombre_1" class="col-sm-4 col-form-label">Primer Nombre</label>
                            <div class="col-sm-8">
                              <input type="Text" class="form-control" name="nombre_1" v-model="single_cliente.nombre_1">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre_2" class="col-sm-4 col-form-label">Segundo Nombre</label>
                            <div class="col-sm-8">
                              <input type="Text" class="form-control" name="nombre_2" v-model="single_cliente.nombre_2">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="apellido_1" class="col-sm-4 col-form-label">Primer Apellido</label>
                            <div class="col-sm-8">
                              <input type="Text" class="form-control" name="apellido_1" v-model="single_cliente.apellido_1">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="apellido_2" class="col-sm-4 col-form-label">Segundo Apellido</label>
                            <div class="col-sm-8">
                              <input type="Text" class="form-control" name="apellido_2" v-model="single_cliente.apellido_2">
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" class="form-control" name="email" v-model="single_cliente.email">                
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="fecha_n" class="col-sm-4 col-form-label">Fecha Nacimiento</label>
                            <div class="col-sm-4">
                              <input type="date" class="form-control" name="fecha_n" v-model="single_cliente.fecha_n">
                            </div>
                          </div>
                          

                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-success">Guardar Cambios</button>
                            </div>
                          </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default { 
        props: ['clienteid'],       
        mounted() {
          console.log('Component mounted.')
        },
        data(){
            return {
              single_cliente: {}
            }
        },
        
        methods: {
          loadCliente: function (id) {
            axios.get('/cliente/'+id).then((response) => {
                this.single_cliente = response.data;
            });
          },
          updateCliente(){
            const id = this.single_cliente.id;
            const params = {
              id: this.single_cliente.id,
              nombre_1: this.single_cliente.nombre_1,
              nombre_2: this.single_cliente.nombre_2,
              apellido_1: this.single_cliente.apellido_1, 
              apellido_2: this.single_cliente.apellido_2, 
              email: this.single_cliente.email, 
              fecha_n: this.single_cliente.fecha_n
            };

            axios.put('/cliente/'+id, params).then((response) => console.log(response));
            this.$emit('updated');
          }

        }


        
    }
</script>