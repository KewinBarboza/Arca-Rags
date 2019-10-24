<template>

    <div>
        <section class="container margin-section m-auto mt-5">
            <ContactanosComponent></ContactanosComponent>
        </section>
    </div>

</template>

<script>
    import ContactanosComponent from '../components/ContactanosComponent'

    export default {
        components:{ContactanosComponent}
    }

</script>

<style scoped>
    .margin-section{
        margin-top: 10%;
        margin-bottom: 10%;
    }
</style>