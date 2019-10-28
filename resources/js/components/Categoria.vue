<template>
    <div>
        <div class="row h-form">
             <div class="col-sm-12 col-md-5 col-lg-5 border-right">
                <form  @submit.prevent="modificar(categoria)" v-if="modificarActivo">
                    <h2 class="mt-2  pl-0 pr-0 pb-2">Modificar categoría</h2>
                    <div class="form-group mb-3">
                        <label for="nombre mb-0">Ingrese el nombre de la categoría</label>
                        <input type="text" v-model="categoria.nombre" required class="form-control mb-5" placeholder="Nombre de la categoria">
                        
                        <div class="d-flex justify-content-center">
                            <button class="btn verde-s text-white rounded-0" type="submit">Guardar</button>
                            <button class="btn btn-light ml-3  text-verde rounded-0 " @click="cancelarModificar()" type="submit">Cancelar</button>
                        </div>
                    </div>
                </form>

                <div v-else>
                    <form @submit.prevent="registrar" class="mt-3">
                        <h2 class="mt-2  pl-0 pr-0 pb-2">Crear categoría</h2>
                        <div class="form-group mb-3">
                            <label for="nombre mb-0">Ingrese el nombre de la categoría</label>
                            <input type="text" v-model="categoria.nombre" required class="form-control mb-5" placeholder="Nombre de la categoria">
                            
                            <div class="d-flex justify-content-center">
                                <button class="btn verde-s text-white rounded-0 m-auto" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
             </div>
             <div class="col-sm-12 col-md-7 col-lg-7 pl-0 div-scroll">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Categoría</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(categoria , index) in categorias" :key="index">
                            <th scope="row">{{categoria.id}}</th>
                            <td>{{categoria.categoria}}</td>
                            <td class="d-flex justify-content-end">
                                <button class="btn rounded-circle btn-edit text-white" @click="modificarFormulario(categoria)">
                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                        <path fill="#000000" d="M2,6V8H14V6H2M2,10V12H14V10H2M20.04,10.13C19.9,10.13 19.76,10.19 19.65,10.3L18.65,11.3L20.7,13.35L21.7,12.35C21.92,12.14 21.92,11.79 21.7,11.58L20.42,10.3C20.31,10.19 20.18,10.13 20.04,10.13M18.07,11.88L12,17.94V20H14.06L20.12,13.93L18.07,11.88M2,14V16H10V14H2Z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
             </div>
        </div>
        <transition name="fade" mode="out-in">
            <div class="alert alert-dark" role="alert" v-if="toast" transition="expand">
                <p class="mb-0">{{ mensaje }}</p>
            </div>
        </transition>
    </div>
</template>

<script>

    export default {
        data(){

            return{
                categorias:[],
                categoria:{nombre:''},
                modificarActivo:false,
                toast:false,
            }

        },
 
        methods:{

            registrar(){
                if(this.producto.trim() === ''){
                    this.alertShow(true, 'El campo categoría no puede estar vacío');
                    return
                }
                else
                {
                    const params = {nombre: this.categoria.nombre}

                    axios.post('api/categorias', params)
                        .then((res)=>{
                            this.categorias.push(res.data);
                            this.consultar();
                            this.categoria = {nombre:''};
                            this.alertShow(true, 'Categoría registrada con exíto');
                        })
                        .catch(function(error){
                            console.log(error);
                        });
                }
            },

            consultar(){
                axios.get('api/categorias')
                     .then(res=>{
                         this.categorias = res.data;
                     })
                     .catch(function (error) { 
                         console.log(error);
                     });
            },

            modificar(categoria){

                if(this.producto.trim() === ''){
                    this.alertShow(true, 'El campo categoría no puede estar vacío');
                    return
                }else{

                    const params = {nombre: this.categoria.nombre}
                    
                    axios.put(`api/categorias/${categoria.id}`,params)
                        .then(res=>{   
                            this.modificarActivo = false;
                            const index = this.categorias.findIndex(
                                item => categoria.id === res.data.id
                            )

                            this.categorias[index] = res.data;
                            this.categoria={nombre:''};
                            this.consultar();
                            this.alertShow(true, 'Categoría modificada con exíto');
                        })
                        .catch(function(error){
                            console.log(error);
                        });
                }
                
            },

            modificarFormulario(categoria){
                this.modificarActivo = true;
                this.categoria.nombre = categoria.categoria;
                this.categoria.id = categoria.id;
            },

            cancelarModificar(){
                this.categoria = {nombre:''};
                this.modificarActivo = false;
            },

            alertShow(estado, mensaje){
                this.toast = estado;
                this.mensaje = mensaje;
                setTimeout(() => this.toast = false , '5000');
            }

        },

        created(){
            this.consultar();
                
        },
   }

</script>

<style scoped>

    .text-verde{
        color: rgb(0, 165, 80);
    }

    .h-form{
      height: 92vh;
    }

    .table tbody tr:hover td .btn-delete{
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
        visibility: visible;
    }

    .table tbody tr:hover td .btn-edit{
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
        visibility: visible;
    }

    .table tbody tr td .btn-edit:hover{
        background:#00a5504a;
    }

    .table tbody tr td .btn-delete:hover{
        background:#ffb2b2;
    }

    .table tbody tr td{
        cursor: pointer;
    }

    .btn-delete, .btn-edit{
      visibility: hidden;
      
    }
    
    .form-control{
          padding: .375rem .75rem;
    }

    .div-scroll{
        overflow-y: hidden;
        height: 92vh;
    }

    .div-scroll:hover{
        overflow-y: scroll;
    }

    .alert-dark {
      border-radius: 6px;
      position: absolute;
      top: 0;
      right: 5%;
      color: #ffffff;
      background-color: #323232;
      width: auto;
      height: auto;
      max-width: 100%;
      min-height: 48px;
      padding: 10px 25px;
      font-size: 1.1rem;
      font-weight: 300;
      margin-top: 10px;
      cursor: default;
    }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
  }
</style>