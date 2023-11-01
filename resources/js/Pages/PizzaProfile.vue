<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    name: "PizzaProfile",
    props: ['pizza'],
    components: {
    },
    data()
    {
        return{
            modalSelectIngredients: false,
            messageText: '',
            sendMessage: 0,
            pizza:{
                name:'',
                selectIngredients: []
            },
            ingredient:{
                name:'',
                cost: 0,
            }
        }
    },
    methods:
        {
        },
    mounted() {
    }
}

</script>

<template>
    <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="p-12">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M169.7 .9c-22.8-1.6-41.9 14-47.5 34.7L110.4 80c.5 0 1.1 0 1.6 0c176.7 0 320 143.3 320 320c0 .5 0 1.1 0 1.6l44.4-11.8c20.8-5.5 36.3-24.7 34.7-47.5C498.5 159.5 352.5 13.5 169.7 .9zM399.8 410.2c.1-3.4 .2-6.8 .2-10.2c0-159.1-128.9-288-288-288c-3.4 0-6.8 .1-10.2 .2L.5 491.9c-1.5 5.5 .1 11.4 4.1 15.4s9.9 5.6 15.4 4.1L399.8 410.2zM176 208a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm64 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM96 384a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                    <div class="ml-4 text-lg leading-7 font-semibold">
                        <h1 class="underline text-gray-900 dark:text-white">Existing Pizzas</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>

.filtrarTituloBar{
    padding: 12px 16px;
    border-bottom: 1px solid var(--lavender, #D3D0DF);
    background: var(--white, #FFF);
    color: var(--black, #1A1A1C);
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    letter-spacing: 0.14px;
    border-bottom: 1px solid #D3D0DF;
}

.opcionesFiltro
{
    height: 208px;
    padding: 16px;
    gap: 12px;
    overflow: auto;
    text-align: start;
    color: var(--black, #1A1A1C);
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    letter-spacing: 0.14px;
}
.checkFiltro{
    width: 20px;
    height: 20px;
    margin-right: 10px;
}

.listaFiltro{
    display: flex;
    align-items: center;
}

.itemFiltro{
    margin-top: 6px;
    margin-bottom: 6px;
}


.seleccionarBarrio{
    min-width: 327px;
    border-radius: 8px;
    border: 1px solid #8A8B92;
    box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.03), 0px 8px 18px 0px rgba(0, 0, 0, 0.03), 0px 32px 32px 0px rgba(0, 0, 0, 0.02), 0px 72px 43px 0px rgba(0, 0, 0, 0.01), 0px 128px 51px 0px rgba(0, 0, 0, 0.00), 0px 200px 56px 0px rgba(0, 0, 0, 0.00);
    position: absolute;
    background-color: white;
}
.Barrio{
    margin-left: 5px;
    margin-right: 5px;
}
.inputBarrio{
    border-radius: 8px;
    border: 1px solid black;
    background: var(--white, #FFF);
    height: 40px;
    padding: 7px 12px;
    display: flex;
    align-items: center;
    color: var(--black, #1A1A1C);
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    letter-spacing: 0.12px;
    justify-content: space-between;
    margin-bottom: 3%;
}


</style>
