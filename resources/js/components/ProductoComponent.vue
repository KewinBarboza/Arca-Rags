<template>
    <div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 float-left mb-5" v-for="(producto,index) in filtrarProductos" :key="index">
                <router-link class="text-decoration-none" :to="{name:'Producto', params:{url: producto.id}}">
                    <div class="card card-sombra border-0">
                        <div v-for="(img , index) of producto.imagen" :key="index" class="div-img">
                            <img :src="img.url" class="img-fluid card-img-top p-3" :alt="producto.nombre" v-if="index === 0">
                        </div>
                        <div class="card-body p-2">
                            <h5 class="card-title mb-1 card-text text-uppercase"><b>{{producto.nombre}}</b></h5>
                            <p class="card-text color-parrafo mb-1 text-truncate">{{producto.descripcion}}</p>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>

        <infinite-loading @infinite="infiniteHandler">
            <div slot="spiral">Cargando...</div>
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

            infiniteHandler($state){
                this.pages++
                let url = 'api/productos?page=' + this.pages;

                axios.get(url)
                     .then((res)=>{
                         let product = res.data.data;

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

        computed:{
            filtrarProductos(){
                return this.productos.filter((producto)=>{
                    const productoPorCategoria = producto.categoria.categoria.match(this.categoria);
                    return productoPorCategoria;
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

    .owl-theme .owl-nav [class*='owl-'] {
        color: #FFF;
        font-size: 14px;
        margin: 5px;
        padding: 4px 7px;
        background: rgb(49, 49, 49);
        display: inline-block;
        cursor: pointer;
        border-radius: 3px;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
  
    .fade-enter, .fade-leave-to{
        opacity: 0;
    }

    .div-img img{
        width: 420px;
        height: 300px;
    }

</style>