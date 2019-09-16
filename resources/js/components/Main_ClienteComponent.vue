<template>

     <div>
        
        <edit_cliente-component v-show="edit" @updated="showIndex()" ref="usernameInput"></edit_cliente-component>
        <create_cliente-component v-show="create" @created="showIndex()"></create_cliente-component>
        <index_cliente-component v-show="index" :clientes="clientes" @deleted="deleteCli" @update="updateCliente"></index_cliente-component>
        <hr>      
        <div class="col-md-3 offset-md-8">
            <button v-on:click="showCreate" v-show="btn" class="btn btn-primary">Agregar Cliente</button>            
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            this.listClientes();
            console.log('Component mounted.')
        },
        data: function () {
          return {
            edit: false,
            create: false,
            index: true,
            btn: true,
            clientes: []                
          }
        },
        methods: {
            showCreate: function () {
              this.create = true;
              this.index = false;
              this.btn = false;
            },
            showIndex: function () {
              this.edit = false;
              this.create = false;
              this.index = true;
              this.btn = true;

              this.listClientes();
              
            },
            listClientes: function () {
              axios.get('/cliente').then((response) => {
                this.clientes = response.data;
              });
            },
            deleteCli: function () {
              this.listClientes();
            },
            updateCliente: function (id) {
              this.edit = true;
              this.create = false;
              this.index = false;
              this.btn = false;
              
              this.$refs.usernameInput.loadCliente(id);
            }
        }
    }

</script>