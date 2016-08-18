<template>
    <div id="fh5co-wrapper">
        <div id="fh5co-page">
            <nav-header></nav-header>
            <aside></aside>
            <nav-search></nav-search>
            <nav-counter></nav-counter>
            <nav-footer></nav-footer>
        </div>

    </div>
</template>

<script>
    import NavHeader from './NavHeader.vue';
    import Aside from './Aside.vue';
    import NavSearch from './NavSearch.vue';
    import NavCounter from './NavCounter.vue';
    import NavFooter from './NavFooter.vue';

    export default {
        components: {
            NavHeader,
            Aside,
            NavSearch,
            NavCounter,
            NavFooter
        }
    }

</script>
