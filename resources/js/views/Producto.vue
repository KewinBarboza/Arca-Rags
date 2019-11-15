<template>
  <div>
    <!-- jumbotron -->
    <header>
        <jumbotrom></jumbotrom>
    </header>

    <section class="container producto">
        <detalles-producto></detalles-producto>
    </section>
  </div>
</template>

<script>
    
    import DetallesProducto from '../components/DetallesProducto'
    import jumbotrom from '../components/Jumbotrom'

    export default {
        components:{DetallesProducto,jumbotrom}
    };
    
</script>

<style>
    .verde-s{
        background-color: rgb(0, 165, 80);
    }

    .producto{
        margin-top: 5%;
        margin-bottom: 10%;
    }
    .producto h2{
        font-size: 1.6em;
        text-align: left
    }

    .producto p{
        font-size: 1em;
        text-align: left
    }
</style>