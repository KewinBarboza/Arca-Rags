<template>
    <div>
        <div class="row" v-for="(item , index) of producto" :key="index">

                <div class="col-sm-12 col-md-6 col-lg-6 border-top border-left border-bottom p-5 mb-5" >
                    <carousel :autoplay="true"  :nav="true" :responsive="{0:{items:1},600:{items:4},1000:{items:1}}">
                        <div class="item" v-for="(img , index) of item.imagen" :key="index">
                            <img :src="img.url" :alt="producto.nombre" class="mx-auto d-block img-fluid">
                        </div>
                    </carousel>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6  p-5 border-top border-right border-bottom p-5 mb-5">
                    <h2 class="title text-uppercase"><b>{{item.nombre}}</b></h2>
                    
                    <p class="border-bottom mt-2"></p>
                    
                    <h2 class="title"><b>DESCRIPCIÓN</b></h2>
                    <p class="color-parrafo">{{item.descripcion}}</p>

                    <p class="border-bottom mt-2"></p>

                    <h2 class="title"><b>TALLAS</b></h2>
                    <p class="color-parrafo">{{item.talla}}</p>
                    
                    <bottom  @click="modal=true" class="btn verde-s text-white rounded-0 mt-2">Consultar precio</bottom>
                
                </div>
            <div class="col-12 mt-5 p-0">
                <div class="mb-5 text-center">
                    <h3 class="">Productos <span class="text-verde">Relacionados</span></h3>
                </div>
                <carousel :autoplay="true" :dots="false"  :nav="false" :responsive="{0:{items:1,nav:false},600:{items:4,nav:false},1000:{items:4,nav:false}}">
                    <div class="item">
                        <div class="card card-sombra border-0" style="width: 17rem;">
                            <img :src="imageCarrusel" class="mx-auto d-block card-img-top p-3" alt="">
                            <div class="card-body p-2">
                                <h5 class="card-title mb-1">CAMISAS OXFORD</h5>
                                <p class="card-text color-parrafo mb-1">Camisa de vestir para caballeros y damas.</p>
                                <a href="#" class="text-decoration-none">Ver mas</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card card-sombra border-0" style="width: 17rem;">
                            <img :src="imageCarrusel" class="mx-auto d-block card-img-top p-3"  alt="">
                            <div class="card-body p-2">
                                <h5 class="card-title mb-1">CAMISAS OXFORD</h5>
                                <p class="card-text color-parrafo mb-1">Camisa de vestir para caballeros y damas.</p>
                                <a href="#" class="text-decoration-none">Ver mas</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card card-sombra border-0" style="width: 17rem;">
                            <img :src="imageCarrusel" class="mx-auto d-block card-img-top p-3"  alt="">
                            <div class="card-body p-2">
                                <h5 class="card-title mb-1">CAMISAS OXFORD</h5>
                                <p class="card-text color-parrafo mb-1">Camisa de vestir para caballeros y damas.</p>
                                <a href="#" class="text-decoration-none">Ver mas</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card card-sombra border-0" style="width: 17rem;">
                            <img :src="imageCarrusel" class="mx-auto d-block card-img-top p-3" alt="">
                            <div class="card-body p-2">
                                <h5 class="card-title mb-1">CAMISAS OXFORD</h5>
                                <p class="card-text color-parrafo mb-1">Camisa de vestir para caballeros y damas.</p>
                                <a href="#" class="text-decoration-none">Ver mas</a>
                            </div>
                        </div>
                    </div>
                </carousel>
            </div>
        </div>
        <ModalCorreo :showModal="modal" @hiddenModal="modal = $event"></ModalCorreo>
    </div>
</template>

<script>

import carousel from 'vue-owl-carousel'
import ModalCorreo from './ModalCorreo.vue'

export default {
    
    data(){
        return{
            producto:[],

            imagePrincipal:'./images/catalogoProductos-1.png',
            imageCarrusel:'./images/ProductosHome-3.png',

            modal:false
        }
    },

    mounted(){
        // console.log();
        axios.get(`api/producto/${this.$route.params.url}`)
             .then(res=>{
                 this.producto = res.data;
             })
             .catch(error =>{
                 console.log(error);
             });
    },
    
    components:{carousel,ModalCorreo,}    
}

</script>

<style scoped>

    a{
        color: rgb(0, 165, 80);
    }

    h3{
        font-size:45px;
    }

    .verde-s{
        background-color: rgb(0, 165, 80);
    }

    .text-verde{
        color: rgb(0, 165, 80);
    }

    .text-white{
        color: #fff;
    }

    .color-parrafo{
        color:#888888;
    }

    .card{
        background: #f1f1f1;
    }

    .card-body{
        background: #fff;
    }

    .titulo-menu{
        background: rgba(76, 175, 79, 0.336);
        border-bottom: 2px solid rgb(0, 165, 80);
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