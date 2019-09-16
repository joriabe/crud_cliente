<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Nuevo Cliente</div>

                    <div class="card-body">
                        <form v-on:submit.prevent="newCliente()">                          

                          <div class="form-group row">
                            <label for="nombre_1" class="col-sm-4 col-form-label">Primer Nombre</label>
                            <div class="col-sm-8">
                              <input type="Text" class="form-control" name="nombre_1" placeholder="" v-model="nombre_1">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="nombre_2" class="col-sm-4 col-form-label">Segundo Nombre</label>
                            <div class="col-sm-8">
                              <input type="Text" class="form-control" name="nombre_2" placeholder="" v-model="nombre_2">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="apellido_1" class="col-sm-4 col-form-label">Primer Apellido</label>
                            <div class="col-sm-8">
                              <input type="Text" class="form-control" name="apellido_1" placeholder="" v-model="apellido_1">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="apellido_2" class="col-sm-4 col-form-label">Segundo Apellido</label>
                            <div class="col-sm-8">
                              <input type="Text" class="form-control" name="apellido_2" placeholder="" v-model="apellido_2">
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" class="form-control" name="email" placeholder="" v-model="email">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="fecha_n" class="col-sm-4 col-form-label">Fecha Nacimiento</label>
                            <div class="col-sm-4">
                              <input type="date" class="form-control" name="fecha_n" placeholder="Email"  v-model="fecha_n">
                            </div>
                          </div>
                          

                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-success">Agregar Cliente</button>
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
        mounted() {
            console.log('Component mounted.')
        }, data(){
            return {
              nombre_1: '',
              nombre_2: '',
              apellido_1: '',
              apellido_2: '',
              email: '',
              fecha_n: ''
            }
        },
        methods: {
          newCliente(){
            const params = {
              nombre_1: this.nombre_1,
              nombre_2: this.nombre_2,
              apellido_1: this.apellido_1, 
              apellido_2: this.apellido_2, 
              email: this.email, 
              fecha_n: this.fecha_n
            };
            axios.post('/cliente', params).then((response) => console.log(response));
            this.$emit('created');
          }
        }
    }
</script>