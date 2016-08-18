<template>
    <div>
        <router-view></router-view>
        <container></container>
    </div>
</template>

<script>
    import Container from './components/partials/Container.vue';

    export default {
        components: {
            Container
        }
    }

</script>
