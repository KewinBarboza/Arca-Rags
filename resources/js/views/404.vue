<template>
    <div>
        <div class="page404">
            <h1>4<span>0</span>4</h1>
        </div>
        <div class="row m-0">
            <div class="col-12 text-center">
                <h2>PAGINA NO ENCONTRADA</h2>
                <h3 class="text-center mt-2">Conoce Nuestros <span class="text-verde">Productos</span></h3>
                <router-link class="btn verde-s rounded-0 text-white mt-2" :to="{name:'Productos'}">Ver productos</router-link>  
            </div>
        </div>
        
    </div>
</template>

<script>
export default {

    
}
</script>

<style scoped>
    h1{
        font-size: 180px;
    }

    h2{
        font-size: 80px;
        text-align: center;
    }

    h1 span{
        color: rgb(0, 165, 80) ;
    }

    .verde-s{
        background: rgb(0, 165, 80) ;
    }

    .text-white{
        color: #fff;
    }

    .page404{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40vh;
        text-align: center;
    }
</style>