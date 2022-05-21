<template>
    
    <div class="modal">
        <div class="modal-header"> <h1>{{ title }}</h1> </div>
        
        <div class="modal-body">
            <p> {{ body }} </p>
        </div>
        <div class="over-lay" @click="dismissModal"></div>

    </div>
   
    
</template>

<script>

export default {
    name: 'module-component',
    props: ['title','body'],
    methods: {
        dismissModal: function(){
            this.$bus.$emit('modalDismissed','');
        }
    }
}
</script>

<style>
.modal{
    position: fixed;
    background-color: #dddf;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: .4s ease-in-out;
    padding: 10px;
    border-radius: 5px;
}
.modal.active {
    transform: translate(-50%, -50%) scale(1);
}
.over-lay {
    background-color: #a1585890;
    position: fixed;
    top: 50%;
    left: 50%;
    height: 100vh;
    width: 100vw;
    transform: translate(-50%, -50%);
    opacity: .1;
    z-index: -1;
}
</style>
