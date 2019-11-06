<template>
    <div>
        <div v-if="busquedaSinResultado" class="">
            <!-- <div class="row "> -->
                <h1 class="text-center mt-5 mb-5 text-muted">No hay productos disponibles</h1>
            <!-- </div> -->
        </div>

        <div v-else></div>
        <div class="col-sm-12 col-md-4 col-lg-4 float-left mb-5" v-for="(producto,index) in filtrarProductos" :key="index">
            <div class="card card-sombra border-0">
                <div v-for="(img , index) of producto.imagen" :key="index">
                    <img :src="img.url" class="img-fluid card-img-top p-3" :alt="producto.nombre" v-if="index === 0">
                </div>
                <div class="card-body p-2">
                    <h5 class="card-title mb-1 text-uppercase"><b>{{producto.nombre}}</b></h5>
                    <p class="card-text color-parrafo mb-1">{{producto.descripcion}}</p>
                    <p class="card-text color-parrafo mb-1">{{producto.categoria.categoria}}</p>
                    <router-link class="text-decoration-none" :to="{name:'Producto', params:{url: producto.id}}"><b>Ver mas</b></router-link>
                </div>
            </div>
        </div>

        <infinite-loading @infinite="infiniteHandler">
            <div slot="spiral">Loading...</div>
            <div slot="no-more"></div>
            <div slot="no-results">No se encontraron resultados</div>
        </infinite-loading>
    </div>
</template>

<script>
    export default {
        props:['categoria'],

        data(){
            return{
                productos:[],

                busquedaSinResultado:false,
                pages:0
            }
        },

        methods:{
            // consultarProductos(){

            //     axios.get('api/productos')
            //          .then((res)=>{
            //              this.productos = res.data;
            //          })
            //          .catch((error)=>{
            //              console.log(error)
            //          });
            // },

            infiniteHandler($state){
                this.pages++
                let url = 'api/productos?page=' + this.pages;

                // console.log(url)
                axios.get(url)
                     .then((res)=>{
                         let product = res.data.data;
                         console.log(res.data.data);

                        if (product.length) {
                            this.productos = this.productos.concat(product)
                            $state.loaded()
                        }else{
                            $state.complete()
                        }
                     })
                     .catch((error)=>{
                         console.log(error)
                     });
            },


            filtrarCategoria(categoria){
                this.categoria = categoria;
            }
        },

        mounted(){
            // this.consultarProductos();
        },

        computed:{
            filtrarProductos(){
                return this.productos.filter((producto)=>{
                    const productoPorCategoria = producto.categoria.categoria.match(this.categoria);
                    console.log(productoPorCategoria);    
                    if (productoPorCategoria) {
                        
                        this.busquedaSinResultado=false;
                        return productoPorCategoria;

                    }else{

                        this.busquedaSinResultado=true;
                    }

                });
            }
        }
    }
</script>

<style scoped>
    a{
        color: #4CAF50;
    }

    .card{
        background: #f1f1f1;
    }

    .card-body{
        background: #fff;
    }

    .titulo-menu{
        background: rgba(76, 175, 79, 0.336);
        border-bottom: 2px solid #00ff08;
    }
    .card-text{
        color: #868686;
    }

    .card-sombra{
        transition: all 1s;
    }

    .card-sombra:hover{
        box-shadow: 0 2px 30px -2px rgba(0, 0, 0, 0.281);
    }  

</style>