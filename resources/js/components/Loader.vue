<template>
    <div class="loader"> <div class="spiner"></div> </div>    
</template>
<script>
    export default {

    }
</script>

<style>
    .loader {
        
        width: 100vw;
        height: 100vh;
        background: #ee1c2587;
        padding: 0;
        margin: 0;
        position: fixed;
        top: 0;
        z-index: 200;

    }
    .spiner {
        width: 80px;
        height: 80px;
        background: red;
        position: absolute;
        top: 50%;
        right: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(.8);
        border-radius: 50%;
        animation-name: zoomInOut;
        animation-duration: 2s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
    }
    @keyframes zoomInOut{
        0% {transform: translate(-50%, -50%) scale(.8)}
        50% {transform: translate(-50%, -50%) scale(1.2);}
        100% {transform: translate(-50%, -50%) scale(.8);}
    }
</style>