<template>
    <div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 border-top border-left border-bottom p-5 mb-5">
                <img :src="imagePrincipal" alt="" class="mx-auto d-block img-fluid">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6  p-5 border-top border-right border-bottom p-5 mb-5">
                <h2 class="title"><b>CHAQUETA MODELO -C-</b></h2>
                <p class="color-parrafo">Nuestra chaqueta unisex está confeccionada en tela impermeable, con forro de malla a juego con la tela de la capucha.</p>
                
                <p class="border-bottom mt-2"></p>
                
                <h2 class="title"><b>CARACTERÍSTICAS</b></h2>
                <ul class="">
                    <li class="color-parrafo">Tela: taslán impermeable. </li>
                    <li class="color-parrafo">Con logos empresariales estampados. </li>
                    <li class="color-parrafo">Bolsillos laterales y uno en el pecho con cierres automáticos invisibles. </li>
                    <li class="color-parrafo">Gomas y cierres mágicos en las muñecas. </li>
                    <li class="color-parrafo">La capucha se enrolla y se cierra con cierre mágico formando un cuello acolchado.</li>
                </ul>

                <p class="border-bottom mt-2"></p>

                <h2 class="title"><b>TALLAS</b></h2>
                <p class="color-parrafo">S, M, L, XL, XXL</p>
                
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

            <ModalCorreo :showModal="modal" @hiddenModal="modal = $event"></ModalCorreo>
        </div>
    </div>
</template>

<script>

import carousel from 'vue-owl-carousel'
import ModalCorreo from './ModalCorreo.vue'

export default {
    
    data(){
        return{
            imagePrincipal:'./images/catalogoProductos-1.png',
            imageCarrusel:'./images/ProductosHome-3.png',

            modal:false
        }
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