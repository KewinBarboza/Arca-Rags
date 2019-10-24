<template>
    <div>
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="">Nuestros <span class="text-verde">Productos</span></h2>
                <p class="text-center color-parrafo">Ofrecemos diversos artículos complementarios tales como uniformes, gorras, cavas térmicas, koalas, bolsos, morrales, maletines, bandoleritas, entre otros.</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mt-4 p-0">
                <div class="card card-fondo border-0 rounded-0" style="width: 22rem;  background-image: url('./images/banner-1.jpg');">
                    <div class="card-body card-ropa  text-white">
                        <h5 class="card-title">Camisas</h5>
                        <router-link class="btn verde-p rounded-0" :to="{name:'Productos'}">Ver más</router-link>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mt-4 p-0">
                <div class="card card-fondo border-0 rounded-0" style="width: 22rem;  background-image: url('./images/banner-2.jpg');">
                    <div class="card-body card-ropa text-white">
                        <h5 class="card-title">Chalecos</h5>
                        <router-link class="btn verde-p rounded-0" :to="{name:'Productos'}">Ver más</router-link>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mt-4 p-0">
                <div class="card card-fondo border-0 rounded-0" style="width: 22rem;  background-image: url('./images/banner-3.jpg');">
                    <div class="card-body card-ropa text-white">
                        <h5 class="card-title">Chemises</h5>
                        <router-link class="btn verde-p rounded-0" :to="{name:'Productos'}">Ver más</router-link>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
    h2{
        font-size: 50px;
        text-align: center;
    }

    p{
        font-size: 25px;
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
    .productos{
        margin-top: 10%;
        margin-bottom: 10%;
    }

    .card-fondo{
        height: 20rem;
        background-size: cover;
        transition: all 1s;
        background-position: center;
        max-width: 100%;
        /* height: auto; */
    }

    .card-fondo:hover{
        box-shadow: 0 2px 30px -2px rgba(0, 0, 0, 0.281);
        background-repeat: no-repeat;
        transition: all 1s;
    }

    .card-body h5{
        font-size: 40px;
        color: rgba(34, 31, 31, 1);
    }

    .card-body a{
       color: #ffffff;
    }

</style>