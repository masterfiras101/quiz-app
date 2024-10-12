<script setup>
    const props = defineProps({
        visible: Boolean,
    });
</script>

<template>
    <Transition name="create_question_model" class="font-cairo">
        <div v-if="visible" class="modal-background font-cairo">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <slot name="success"></slot>
                    <div class="flex justify-between">
                        <f></f>
                        <f></f>
                        <button type="button" @click="$emit('close')" class="close btn bg-red-400  btn-sm px-5 py-1" >&times;</button>
                    </div>
                    <div class="mt-0 flex justify-center font-cairo">
                     <slot name="header"> </slot>
                    </div>

                    <div class="modal-body font-cairo">
                    <slot name="body"> </slot>
                    </div>

                    <div class="modal-footer font-cairo">
                        <slot name="footer"></slot>
                    </div>

                </div>
            </div>
        </div>
    </Transition>
</template>

<style scoped>

    .modal-background {
        position: fixed;
        z-index: 999998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }
    
    .modal-background.modal-wrapper {
        display: table-cell;
        vertical-align: middle;
        height: 10%;

    }

    .modal-container {
        border-radius: 50px;

        border: none;
        border-radius: 13px;

        box-shadow: 0px -3px 15px 0px hsla(155, 92%, 47%, 0.25) inset;
        font-family: "Manrope";
        font-size: 1rem;
        width: 450px;
        margin: 4rem auto;
        padding: 20px 30px;

        background-color: #000000;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .modal-header {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .create_question_model-enter-from,
    .create_question_model-leave-to {
        opacity: 0;
    }

    .create_question_model-enter-from .modal-container,
    .create_question_model-leave-to .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
@media screen and  (min-width: 360px)
{
    .btn_save{
        padding: 3px 45px 5px 45px;
    }
    .modal-background {
        position: fixed;
        z-index: 999998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }
  
    .modal-background.modal-wrapper {
        display: table-cell;
        vertical-align: middle;
        height: 10%;

    }

    .modal-container {
        border-radius: 50px;

        border: none;
        border-radius: 13px;

        box-shadow: 0px -3px 15px 0px hsla(155, 92%, 47%, 0.25) inset;
        font-family: "Manrope";
        font-size: 1rem;
        width: 350px;
        margin: 4rem auto;
        padding: 10px 20px;

        background-color: #000000;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .modal-header {
        margin-top: 0;
        color: #42b983;
        /* text-align: right; */
        justify-content: center;
    }

    .modal-body {
        margin: 20px 0;
        justify-content:center;


    }

    .create_question_model-enter-from,
    .create_question_model-leave-to {
        opacity: 0;
    }

    .create_question_model-enter-from .modal-container,
    .create_question_model-leave-to .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

}
@media screen and  (min-width: 740px)
{
    .btn_save{
        padding: 3px 45px 5px 45px;
    }
    .modal-background {
        position: fixed;
        z-index: 999998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }
    
    .modal-background.modal-wrapper {
        display: table-cell;
        vertical-align: middle;
        height: 10%;

    }

    .modal-container {
        border-radius: 50px;

        border: none;
        border-radius: 13px;

        box-shadow: 0px -3px 15px 0px hsla(155, 92%, 47%, 0.25) inset;
        font-family: "Manrope";
        font-size: 1rem;
        width: 450px;
        margin: 4rem auto;
        padding: 10px 20px;

        background-color: #000000;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .modal-header {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
        text-align: right;
    }

    .create_question_model-enter-from,
    .create_question_model-leave-to {
        opacity: 0;
    }

    .create_question_model-enter-from .modal-container,
    .create_question_model-leave-to .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

}
</style>
