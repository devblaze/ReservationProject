<template>
    <b-card :header="header"
            header-tag="h3"
            header-class="text-center"
            header-bg-variant="primary"
            header-text-variant="white"
            class="wrapper">
        <slot/>
    </b-card>
</template>

<style>
.wrapper {
    height: 100vh;
}
.wrapper > .card-body {
    overflow: hidden;
}
</style>

<script>
export default {
    props: {
        'header': { required: true, type: String },
    },
}
</script>
