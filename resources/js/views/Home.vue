<template>
    <div>
        <!-- carrusel -->
        <header>
            <carousel :autoplay="true" :dots="false"  :nav="false" :responsive="{0:{items:1,nav:false},600:{items:1,nav:false},1000:{items:1,nav:false}}">
                <div class="item">
                    <div class="hero-image-1" style="background-image: url('./images/slider-header-1.jpg')">
                        <div class="hero-text container">
                            <h1>LA BUENA IMAGEN DE SUS PRODUCTOS COMIENZA EN CASA </h1>
                            <h3>La imagen que sus empleados proyectan es más importante que un llamativo empaque</h3>
                            <router-link class="btn verde-p d-2 btn-lg mt-3 rounded-0" :to="{name:'Productos'}">Ver productos</router-link>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hero-image-2" style="background-image: url('./images/slider-header-2.jpg')">
                        <div class="hero-text container">
                            <h1>LA MEJOR CALIDAD EN PRENDAS</h1>
                            <h3>Ayude a su negocio. Vista a su equipo con nuestra exclusiva línea de camisas, chemises, franelas y chaquetas.</h3>
                            <router-link class="btn verde-p d-2 btn-lg mt-3 rounded-0" :to="{name:'Productos'}">Ver productos</router-link>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="hero-image-3" style="background-image: url('./images/slider-header-3.jpg')">
                        <div class="hero-text container">
                            <h1>LA GENTE BIEN VESTIDA VENDE MÁS </h1>
                            <h3>Mejore la imagen de su equipo con nuestras prendas de última moda. </h3>
                            <router-link class="btn verde-p d-2 btn-lg mt-3 rounded-0" :to="{name:'Productos'}">Ver productos</router-link>
                        </div>
                    </div>
                </div>
            </carousel> 
        </header>

        <section class="container-fluid ofrecemos verde-p p-3 mb-5">
            <div class="container p-3">
                <div class="row ">
                    <div class="col-sm-12 col-md-12 col-lg-4 mt-3">
                        <div class="media border-0 verde-p  pb-2 rounded-0">
                            <svg style="width:80px;height:80px" viewBox="0 0 24 24">
                                <path fill="#fff" d="M18,15H16V17H18M18,11H16V13H18M20,19H12V17H14V15H12V13H14V11H12V9H20M10,7H8V5H10M10,11H8V9H10M10,15H8V13H10M10,19H8V17H10M6,7H4V5H6M6,11H4V9H6M6,15H4V13H6M6,19H4V17H6M12,7V3H2V21H22V7H12Z" />
                            </svg>
                            <div class="media-body text-white ml-3">
                                <h4 class="card-title">Quienes somos</h4>
                                <p class="card-text d-2">Asesoría Abeja Reina, C.A.  AARCA es una empresa de confección venezolana, fundada en el año 2004, dedicada al diseño, confección y venta, de franelas, chemises, camisas y chaquetas para el personal de las empresas privadas del país.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 mt-3">
                        <div class="media border-0 verde-p pb-2 rounded-0">
                            <svg style="width:80px;height:80px" viewBox="0 0 24 24">
                                <path fill="#fff" d="M16,21H8A1,1 0 0,1 7,20V12.07L5.7,13.07C5.31,13.46 4.68,13.46 4.29,13.07L1.46,10.29C1.07,9.9 1.07,9.27 1.46,8.88L7.34,3H9C9,4.1 10.34,5 12,5C13.66,5 15,4.1 15,3H16.66L22.54,8.88C22.93,9.27 22.93,9.9 22.54,10.29L19.71,13.12C19.32,13.5 18.69,13.5 18.3,13.12L17,12.12V20A1,1 0 0,1 16,21" />
                            </svg>
                            <div class="media-body text-white ml-3">
                                <h4 class="card-title">Que hacemos</h4>
                                <p class="card-text d-2 ">ARCA también ofrece diversos artículos complementarios a dichos uniformes, tales como, gorras, cavas térmicas, koalas, bolsos, morrales, maletines, bandoleritas, entre otros.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 mt-3">
                        <div class="media border-0 verde-p pb-2 rounded-0">
                            <svg style="width:80px;height:80px" viewBox="0 0 24 24">
                                <path fill="#fff" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                            </svg>
                            <div class="media-body text-white ml-3">
                                <h4 class="card-title">Misión</h4>
                                <p class="card-text d-2">Su misión es la de actuar como coordinadora y eslabón de la capacidad productiva  del grupo artesanal de confección de prendas de vestir de los Valles del Tuy (¨cluster¨) con el mercado institucional del país.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Productos -->
        <section class="container margin-section">
            <ProductosHome></ProductosHome>
        </section>
        
        <!-- Como comprar -->
        <section class="container margin-section">
            <div class="row">
                <div class="col-12 mb-5">
                    <h2 class="">Cómo Comprar Nuestros <span class="text-verde">Productos</span></h2>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 border-left p-3" v-for="(item , index) of pasosParaComprar" :key="index">
                    <div class="card border-0  pb-2 rounded-0 ">
                        <img class="mx-auto d-block" :src="item.image" :alt="item.nombre" height="80" width="80">
                        <div class="card-body text-center">
                            <p class="card-text d-1">{{item.descripcion}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- contacto -->
        <section class="container margin-section m-auto">
            <ContactanosComponent></ContactanosComponent>
        </section>

    </div>
</template>

<script>
import carousel from 'vue-owl-carousel'
import ProductosHome from '../components/ProductosHome'
import ContactanosComponent from '../components/ContactanosComponent'

export default {
    
    data(){
        return{
            pasosParaComprar:[
                {image:'./images/iconos/cuaderno.png',descripcion:'Escoge las prendas del catálogo.'},
                {image:'./images/iconos/telefono.png',descripcion:'Ponte en contacto con nosotros.'},
                {image:'./images/iconos/carro-de-la-compra.png',descripcion:'Pide las prendas y productos que deseas.'},
                {image:'./images/iconos/paquete-o-empaquetar.png',descripcion:'Confeccionamos y entregamos los productos personalizados.'}
            ]
        }
    },
    
    components: { carousel,ProductosHome,ContactanosComponent }
}   
</script>

<style scoped>
    h1{
        font-size:40px;
        text-transform:uppercase;
    }

    h3{
        font-size: 20px;
    }

    h2{
        font-size: 50px;
        text-align: center;
    }

    .negro-s{
        background-color: rgb(34, 31, 31);
    }

    .verde-p{
        background-color:rgb(0, 165, 80);
    }

    .text-verde{
        color: rgb(0, 165, 80);
    }

    .color-parrafo{
        color: #9b9b9b;
    }


    .d-1{
        color: black;
    }

    .d-2{
        color: white;
    }

    .margin-section{
        margin-top: 10%;
        margin-bottom: 10%;
    }

    /* header */
    .hero-image-1, .hero-image-2, .hero-image-3 {
        background-color: #cccccc;
        min-height: 650px;
        background-position: center top;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

     @media (max-width: 500px) {
        .hero-image-1, .hero-image-2, .hero-image-3 {
            height: 350px;
        }
    }

    @media (min-width: 1000px) {
        .hero-image-1, .hero-image-2, .hero-image-3 {
            height: 450px;
        }
    }

    @media (min-width: 1200px) {
        .hero-image-1, .hero-image-2, .hero-image-3 {
            height: 550px;
        }
    }

    @media (min-width: 1400px) {
        .hero-image-1, .hero-image-2, .hero-image-3 {
            height: 750px;
        }
    }

    @media (min-width: 1800px) {
        .hero-image-1, .hero-image-2, .hero-image-3 {
            height: 800px;
        }
    }

    @media (min-width: 2200px) {
        .hero-image-1, .hero-image-2, .hero-image-3 {
            height: 900px;
        }
    }

    .hero-text {
        text-align: center;
        position: absolute;
        top: 65%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white; 
    }

</style>