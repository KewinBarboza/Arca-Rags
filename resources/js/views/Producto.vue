<template>
  <div>
    <!-- jumbotron -->
    <header>
        <jumbotrom></jumbotrom>
    </header>

    <section class="container producto">
        <DetallesProductoComponent></DetallesProductoComponent>
    </section>
  </div>
</template>

<script>
    
    import DetallesProductoComponent from '../components/DetallesProductoComponent'
    import jumbotrom from '../components/Jumbotrom'

    export default {
        components:{DetallesProductoComponent,jumbotrom}
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