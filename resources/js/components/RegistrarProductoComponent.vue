<template>
  <div>
    <div class="row h-form">
      
      <div class="col-sm-12 col-md-5 col-lg-5 border-right">
        <form @submit.prevent="modificar(producto)" v-if="modificarActivo" class="mt-3" enctype="multipart/form-data">
          <h2 class="mt-2  pl-0 pr-0 pb-2">Modificar producto</h2>
          
          <div class="form-group text-center imagen">
              <img :src="imageEditar" v-if="imgModificar" class="mx-auto d-block img-fluid" alt="foto">
              <img :src="producto.imagen" v-else class="mx-auto d-block img-fluid" alt="foto">
              <input @change="obtenerImagen" type="file" hidden  class="form-control-file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label  for="inputGroupFile01" class="mt-2 btn btn-outline-success">Seleccione una imagen</label>
          </div>

          <div class="form-row">
            <div class="form-group col-12">
              <label for="nombre mb-0">Nombre</label>
              <input type="text" class="form-control" id="nombre"  required v-model="producto.nombre">
            </div>
            
            <div class="form-group col-6">
              <label>Categoria</label>
              <select class="custom-select rounded-0"  id="inputGroupSelect" required v-model="producto.categoria" >
                <option v-for="(categoria, index) in categorias" :key="index" v-bind:value="categoria.id">{{categoria.categoria}}</option>
              </select>
            </div>

            <div class="form-group col-6">
              <label for="modelo">Modelo</label>
              <input type="text" class="form-control" id="modelo"  required v-model="producto.modelo">
            </div>

            <div class="form-group col-6">
              <label for="talla">Talla</label>
              <input type="text" class="form-control" id="talla"  required v-model="producto.talla">
            </div>

            <div class="form-group col-6">
              <label for="tela">Tela</label>
              <input type="text" class="form-control" id="tela"  required v-model="producto.tela">
            </div>

            <div class="form-group col-12">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control mb-2"    id="descripcion" required rows="3" v-model="producto.descripcion"></textarea>
            </div>
          </div>

          <div class="d-flex justify-content-center">
            <button class="btn verde-s   text-white  rounded-0 mt-2 mr-3" type="submit">Guardar</button>
            <button class="btn btn-light text-verde  rounded-0 mt-2" @click="cancelarMidificar()" type="submit">Cancelar</button>
          </div>
        </form>

        <div v-else> 
          <h2 class="mt-2  pl-0 pr-0 pb-2">Registrar producto</h2>
          <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"  v-on:vdropzone-sending="sendingEvent"></vue-dropzone>
          <form @submit.prevent="registrar"  class="mt-3" enctype="multipart/form-data">
            <!-- <div class="form-group text-center imagen">
                <img :src="image" class="mx-auto d-block img-fluid" alt="foto">
                <input @change="obtenerImagen" type="file" hidden  class="form-control-file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label  for="inputGroupFile01" class="mt-2 btn btn-outline-success">Seleccione una imagen</label>
            </div> -->

            <div class="form-row">
              <div class="form-group col-12">
                <label for="nombre mb-0">Nombre</label>
                <input type="text" placeholder="Ingrese el nombre del producto" required class="form-control" v-model="producto.nombre" />
              </div>

              <div class="form-group col-6">
                <label>Seleccione una categoría</label>
                <select class="custom-select mb-3 rounded-0" @click="consultarCategorias()" id="inputGroupSelect" required v-model="producto.categoria" >
                  <option v-for="(categoria, index) in categorias" :key="index" v-bind:value="categoria.id">{{categoria.categoria}}</option>
                </select>
              </div>

              <div class="form-group col-6">
                <label for="modelo">Modelo</label>
                <input type="text" id="modelo" placeholder="Ingrese el Modelo" required class="form-control" v-model="producto.modelo" />
              </div>

              <div class="form-group col-6">
                <label for="talla">Talla</label>
                <input type="text" id="talla" placeholder="Ingrese la talla"  required class="form-control" v-model="producto.talla"  />
              </div>

              <div class="form-group col-6">
                <label for="tela">Tela</label>
                <input type="text" id="tela" placeholder="Ingrese el tipo de tela"   required class="form-control" v-model="producto.tela"   />
              </div>

              <div class="form-group col-12">
                <label for="descripcion">Descripción</label>
                 <textarea class="form-control mb-2" id="descripcion" required rows="3" placeholder="Descripción" v-model="producto.descripcion"></textarea>
              </div>
              
            </div>
            
            <button class="btn verde-s text-white btn-block rounded-0 mt-2" type="submit">Guardar</button>
          </form>
        </div>
      </div>

      <div class="col-sm-12 col-md-7 col-lg-7  pl-0 div-scroll">
        <form class="form-inline">
          <input type="text" v-model="buscar"   class="form-control form-control-buscar w-100 border-left-0 border-top-0 border-right-0 form-control-lg"  placeholder="Buscar" aria-label="Buscar">
        </form>
          <div class="media border-bottom" v-for="(producto, index) of filtrarProductos" :key="index">
            <img :src="producto.imagen" class="align-self-center mr-3 pl-3 img-fluid" height="80" width="80" alt="...">
            <div class="media-body">
              <div class="row p-0">
                <div class="col-10">
                  <h5 class="mt-1 mb-0"><b>{{producto.nombre}}</b></h5>
                  <p class="font-weight-bold mb-1 text-mt"> 
                      Modelo:    <span class="text-m font-weight-normal">{{producto.modelo}}</span>  / 
                      Tallas:    <span class="text-m font-weight-normal">{{producto.talla}}</span> / 
                      Tela:      <span class="text-m font-weight-normal">{{producto.tela}}</span>  / 
                      Categoría: <span class="text-m font-weight-normal">{{producto.categoria.categoria}}</span> 
                  </p>
                  <p>{{producto.descripcion}}</p>
                </div>
                <div class="col-2 d-flex align-items-center d-flex justify-content-center p-0 ">
                  <button @click="modificarFormulario(producto)" class="btn btn-light rounded-circle btn-edit mr-2">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                      <path fill="#000000" d="M2,6V8H14V6H2M2,10V12H14V10H2M20.04,10.13C19.9,10.13 19.76,10.19 19.65,10.3L18.65,11.3L20.7,13.35L21.7,12.35C21.92,12.14 21.92,11.79 21.7,11.58L20.42,10.3C20.31,10.19 20.18,10.13 20.04,10.13M18.07,11.88L12,17.94V20H14.06L20.12,13.93L18.07,11.88M2,14V16H10V14H2Z" />
                    </svg>
                  </button>
                  <button @click.prevent="eliminar(producto, index)" class="btn btn-light rounded-circle btn-delete mr-2">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                      <path fill="#000000" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
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
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
  components: {
    vueDropzone: vue2Dropzone
  },

  data(){
      return{
          productos:[],
          producto:{nombre:'', modelo:'', talla:'', tela:'', descripcion:'',categoria:''},
          
          categorias:[],

          modificarActivo:false,
          imgModificar:false,
          toast:false,

          mensaje:'',
          buscar:'',

          imgProducto:'./images/logo.jpg',
          imgProductoNuevo:'./images/sin-foto.jpg',
          imgProductoModificar:'',

          dropzoneOptions: {
            url:'api/imagenes',
            dictDefaultMessage: "Arrastra las fotos aqui para subirlas",
            acceptedFiles:'image/*',
            paramName:'imagen',
            maxFilesize: 2,
            headers: {"X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content},
            autoProcessQueue:false,
          }
      }
  },

 
  methods:{

    obtenerImagen(e){
      let file = e.target.files[0];

      if (!(/\.(jpg|png|gif)$/i).test(file.name)) {
        this.alertShow(true,'Puede seleccionar solo imagenes');
      }
      else
      {
        this.producto.imagen = file;
        if(this.modificarActivo){
          this.cargarImagenEditada(file);
          this.imgModificar=true;

        }else{
          this.cargarImagen(file);
        }
      }
      
    },

    cargarImagen(file){
      let reader = new FileReader();

      reader.onload = (e) => {
        console.log(e);
        this.imgProductoNuevo = e.target.result;
      }

      reader.readAsDataURL(file);
    },

    cargarImagenEditada(file){
      let reader = new FileReader();

      reader.onload = (e) => {
        console.log(e);
        const img = this.imgProductoModificar = e.target.result;
         
      }

      reader.readAsDataURL(file);
    },


    consultar(){

      axios.get('api/productos')
      .then(res => {
        this.productos = res.data;

      }).catch(function (error) {
          console.log(error);
      });

      
    },

    registrar(){

        if(this.producto.nombre.trim() === '' || this.producto.modelo.trim() === '' || this.producto.talla.trim() === '' || this.producto.tela.trim() ===''|| this.producto.descripcion.trim() === ''){

          this.alertShow(true,'Ninguno de los campos puede estar vacío intente de nuevo');
          return;
        }
        else
        { 
          let formData = new FormData();

          formData.append('nombre', this.producto.nombre);
          formData.append('modelo', this.producto.modelo);
          formData.append('talla', this.producto.talla);
          formData.append('tela', this.producto.tela);
          formData.append('descripcion', this.producto.descripcion);
          formData.append('categoria', this.producto.categoria);
          // formData.append('imagen', this.producto.imagen);

          axios.post('api/productos', formData)
            .then((res) => {

                // this.productos.push(res.data);
                this.consultar();
                this.producto = {nombre:'', modelo:'', talla:'', tela:'', descripcion:''};
                // this.dropzoneOptions = {};
                this.$refs.myVueDropzone.processQueue();

                this.alertShow(true,'Producto registrado con éxito');

            })
            .catch(function (error) {

              console.log(error);

            });
        }

    },

    eliminar(producto, index ){

      if (confirm("Desea eliminar este producto"+' '+producto.id)) {
        const url = `api/productos/${producto.id}`;
        axios.delete(url)
        .then(res => {
          this.consultar();

          this.modificarActivo = false;
          this.alertShow(true , res.data);
        })
        .catch(function (error) {
          console.log(error);
        });

      } else {

        console.log("producto no eliminado");
      }
      
    },

    modificar(producto){
      if(this.producto.imagen === '' ||this.producto.nombre.trim() === '' || this.producto.modelo.trim() === '' || this.producto.talla.trim() === '' || this.producto.tela.trim() ===''|| this.producto.descripcion.trim() === ''){

          this.alertShow(true,'Ninguno de los campos puede estar vacío intente de nuevo');
          return;
        }
      else
      { 
          let formData = new FormData();

              formData.append('nombre',      this.producto.nombre);
              formData.append('modelo',      this.producto.modelo);
              formData.append('talla',       this.producto.talla);
              formData.append('tela',        this.producto.tela);
              formData.append('descripcion', this.producto.descripcion);
              formData.append('imagen',      this.producto.imagen);
              formData.append('categoria',   this.producto.categoria);
              formData.append('_method', 'PUT');
              
          axios.post(`api/productos/${producto.id}`, formData)
            .then(res=>{
                this.modificarActivo = false;
                const index = this.productos.findIndex(
                  item => producto.id === res.data.id
                )

                console.log(res.data)
                this.productos[index] = res.data;
                this.producto = {nombre:'', modelo:'', talla:'', tela:'', descripcion:'',imagen:''}
                
                this.consultar();
                this.alertShow(true,'Producto actualizado con éxito');

            })
            .catch(function (error) {
              console.log(error);
            });
      }
    },

    consultarCategorias(){
      axios.get('api/categorias')
      .then(res => {
        this.categorias = res.data;

      }).catch(function (error) {
          console.log(error);
      });
    },

    modificarFormulario(producto){

      this.modificarActivo = true;
      
      this.producto.nombre      = producto.nombre;
      this.producto.modelo      = producto.modelo;
      this.producto.talla       = producto.talla;
      this.producto.tela        = producto.tela;
      this.producto.descripcion = producto.descripcion;
      this.producto.id          = producto.id;
      this.producto.imagen      = producto.imagen;
      this.producto.categoria   = producto.id_categoria;

      this.consultarCategorias();

    },

    cancelarMidificar(){
      this.producto = {nombre:'', modelo:'', talla:'', tela:'', descripcion:'', imagen:''}
      this.imgProductoNuevo = './images/sin-foto.jpg';
      this.modificarActivo = false;
    },

    alertShow(estado, mensaje){
      this.toast = estado;
      this.mensaje = mensaje;
      setTimeout(() => this.toast = false , '5000');
    },

    sendingEvent (file, xhr, formData) {

      // let formData = new FormData();

        formData.append('id_producto', this.producto.id);

        console.log(formData)
    }

  },

  created(){
    this.consultarCategorias();
    this.consultar();
    
  },

  computed:{
    image(){
      return this.imgProductoNuevo;
    },

    imageEditar(){
      return this.imgProductoModificar;
    },

    filtrarProductos(){
      return this.productos.filter((producto)=>{
        return producto.nombre.match(this.buscar);
      });
    }
  }

};
</script>

<style scoped>
    .text-verde{
        color: rgb(0, 165, 80);
    }

    .text-mt{
      font-size: 13px;
      color: rgb(63, 63, 63);
    }

    .text-m{
      font-style:initial;
      color: #575757ee;
    }

    .form-control{
      padding: .375rem .75rem;

    }

    .form-control-buscar:focus{
      border-color: #ced4da;
      box-shadow: none;
    }

    .media:hover .btn-delete{
        display: block;
    }

    .media:hover .btn-edit{
        display: block;
    }

    .h-form{
      min-height: 92vh;
    }

    .btn-delete, .btn-edit{
      display: none;
    }

    .btn-delete:hover{
      background:#ffb2b2;
      
    }

    .btn-edit:hover{
      background:#00a5504a;
    }

    .div-scroll{
        overflow-y: hidden;
        height: 92vh;
    }

    .div-scroll:hover{
        overflow-y: scroll;
    }

    .imagen{
      max-height: auto;
      max-width:  30%;
      margin: auto;

    }

    .imagen img{
      width: 100%;
      height: auto;
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