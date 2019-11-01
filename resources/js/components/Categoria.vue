<template>
    <div>
        <div class="row h-form">
             <div class="col-sm-12 col-md-5 col-lg-5 border-right">
                <form  @submit.prevent="modificar(categoria)" v-if="modificarActivo">
                    <h2 class="mt-2  pl-0 pr-0 pb-2">Modificar categoría</h2>
                    <div class="form-group mb-3">
                        <label for="nombre mb-0">Ingrese el nombre de la categoría</label>
                        <input type="text" v-model="categoria.nombre" required class="form-control mb-3" placeholder="Nombre de la categoria">
                        
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
                            <input type="text" v-model="categoria.nombre" required class="form-control mb-3" placeholder="Nombre de la categoria">
                            
                            <div class="d-flex justify-content-center">
                                <button class="btn verde-s text-white rounded-0 m-auto" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
             </div>
             <div class="col-sm-12 col-md-7 col-lg-7 pl-0 div-scroll">
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item p-0">
                         <form class="form-row">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light  border-0" id="inputGroupPrepend2">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" v-model="buscar" class="form-control form-control-buscar  border-0 form-control-lg" placeholder="Buscar" aria-describedby="inputGroupPrepend2">
                            </div>
                        </form>
                     </li>
                    <li v-for="(categoria , index) in filtrarCategoria" :key="index" class="list-group-item">
                       <div class="row">
                           <div class="col-10">
                                <span class="badge badge-light badge-pill mr-5"> <b>id</b>-{{categoria.id}}</span>  <b> Categoria: </b> {{categoria.categoria}}
                           </div>
                        
                            <div class="col-2">
                                <button class="btn rounded-circle btn-edit text-white ml-5" @click="modificarFormulario(categoria)">
                                    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                        <path fill="#000000" d="M2,6V8H14V6H2M2,10V12H14V10H2M20.04,10.13C19.9,10.13 19.76,10.19 19.65,10.3L18.65,11.3L20.7,13.35L21.7,12.35C21.92,12.14 21.92,11.79 21.7,11.58L20.42,10.3C20.31,10.19 20.18,10.13 20.04,10.13M18.07,11.88L12,17.94V20H14.06L20.12,13.93L18.07,11.88M2,14V16H10V14H2Z" />
                                    </svg>
                                </button>
                            </div>
                       </div>
                    </li>
                </ul>
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

                buscar:''
            }

        },
 
        methods:{

            registrar(){
                if(this.categoria.nombre.trim() === ''){
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

                if(this.categoria.nombre.trim() === ''){
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

        computed:{
            filtrarCategoria(){
                return this.categorias.filter((categoria)=>{
                    return categoria.categoria.match(this.buscar);
                });
            }
        }
   }

</script>

<style scoped>

    .text-verde{
        color: rgb(0, 165, 80);
    }

    .h-form{
      height: 92vh;
    }

    .form-control-buscar:focus{
        border-color: #ced4da;
        box-shadow: none;
    }

    .list-group-item:hover .btn-edit{
        visibility: visible;
    }
      
    .btn-edit:hover{
        background:#00a5504a;
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