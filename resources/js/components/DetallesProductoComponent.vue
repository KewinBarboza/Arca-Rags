<template>
    <div>
        <div class="row" v-for="(item , index) of producto" :key="index">
            <div class="col-sm-12 col-md-6 col-lg-6 border-top border-left border-bottom p-5 mb-5" >
                <carousel :autoplay="true"  :nav="false" :responsive="{0:{items:1},600:{items:1},1000:{items:1}}">
                    <template slot="next">
                        <span class="next">
                            <svg style="width:34px;height:44px" viewBox="0 0 24 24">
                                <path fill="#000000" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
                            </svg>
                        </span>
                    </template>
                    <div class="item" v-for="(img , index) of item.imagen" :key="index">
                        <img :src="img.url" :alt="producto.nombre" class="mx-auto d-block img-fluid">
                    </div>
                        <template slot="prev">
                            <span class="prev">
                            <svg style="width:34px;height:44px" viewBox="0 0 24 24">
                                <path fill="#000000" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                            </svg>
                        </span>
                    </template>
                </carousel>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6  p-5 border-top border-right border-bottom p-5 mb-5">
                <h2 class="title text-uppercase"><b>{{item.nombre}}</b></h2>
                <p class="border-bottom color-parrafo mt-2"><b>Modelo:</b>{{item.modelo}}</p>
                
                <h2 class="title"><b>DESCRIPCIÓN</b></h2>
                <p class="color-parrafo">{{item.descripcion}}</p>
                <p class="color-parrafo border-bottom mt-2"><b>Tela:</b>{{item.tela}}</p>

                <h2 class="title"><b>TALLAS</b></h2>
                <p class="color-parrafo">{{item.talla}}</p>
                
                <bottom  @click="modal=true" class="btn verde-s text-white rounded-0 mt-2">Consultar precio</bottom>
            </div>
        </div>
        <!-- {{idUrl}} -->
        <otros-productos></otros-productos>
        
        <modal-correo :showModal="modal" @hiddenModal="modal = $event"></modal-correo> 
    </div>
</template>

<script>

import carousel from 'vue-owl-carousel'
import ModalCorreo from './ModalCorreo.vue'
import otrosProductos from './OtrosProductos.vue'

export default {
     components:{carousel,ModalCorreo,otrosProductos},

    data(){
        return{
            producto:[],
            // idUrl:this.$route.params.url,
            modal:false
        }
    },

    methods:{
        consultarProducto(){
            axios.get(`api/producto/${$route.params.url}`)
             .then(res=>{
                 this.producto = res.data;
             })
             .catch(error =>{
                 console.log(error);
             });
        },
    },

    mounted(){
        this.consultarProducto();
    },
   
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

    .titulo-menu{
        background: rgba(76, 175, 79, 0.336);
        border-bottom: 2px solid rgb(0, 165, 80);
    }

    .next{
        position: absolute;
        top: 45%;
        z-index: 5;
        cursor: pointer;
    }

    .prev{
        position: absolute;
        top: 45%;
        left: 86.5%;
        z-index: 5;
        cursor: pointer;
        
    }

    .next:hover, .prev:hover{
        background: #d8d8d871;
    }

</style>