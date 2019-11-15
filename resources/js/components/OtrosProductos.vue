<template>
    <div>
        <div class="row">
            <div class="col-12 mt-5 p-0 mb-5 text-center">
                <h3 class="">Añadidos  <span class="text-verde">recientemente</span></h3>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 float-left" v-for="(item , index) of productos.data" :key="index">
                <div class="card card-sombra border-0" v-if="index <= 3" >
                    <div v-for="(img , index) of item.imagen"  :key="index" class="div-img">
                        <img :src="img.url" v-if="index===0" class="img-fluid card-img-top p-3"  :alt="item.nombre">  
                    </div>
                    <div class="card-body p-2">
                        <h5 class="card-title mb-1 card-text text-uppercase"><b>{{ item.nombre }}.</b></h5>
                        <p class="card-text color-parrafo mb-1">{{ item.descripcion }}.</p>
                        <router-link class="text-decoration-none"  :to="{name:'Producto', params:{url: item.id}}" ><b>Ver mas</b></router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import carousel from 'vue-owl-carousel'

export default {
    components:{carousel},

    data(){
        return{
            productos:[]
        }
    },

    methods:{
        consultarProductos(){
            axios.get('api/productos')
                .then(res=>{
                    this.productos = res.data;
                })
                .catch(error =>{
                    console.log(error);
                });
        },
    },

    mounted(){
        this.consultarProductos();
    }
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

    .card{
        background: #f1f1f1;
    }

    .card-body{
        background: #fff;
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

    .div-img img{
        width: 420px;
        height: 300px;
    }

</style>