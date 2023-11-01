<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    name: "Welcome",
    props: ['ingredients','pizzas'],
    components: {
    },
    data()
    {
        return{
            modalSelectIngredients: false,
            messageText: '',
            sendMessage: 0,
            pizzaSelected: 0,
            modalPizzaSelected: false,
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
            saveIngredient(){
                if (this.ingredient.name != '' && this.ingredient.cost > 0){
                    axios.post('/createIngredient', this.ingredient);
                    this.ingredient.name = '';
                    this.ingredient.cost = 0;
                }
            },
            updatePizza(){
                axios.post('/updatePizza', this.pizzaSelected);
                this.modalPizzaSelected = false;
            },
            deletePizza(){
                axios.post('/deletePizza/' + this.pizzaSelected.id);
            },
            savePizza(){
                if (this.pizza.name != '' && this.pizza.selectIngredients != []){
                    axios.post('/createPizza', this.pizza);
                    this.pizza.name = '';
                    this.pizza.cost = 0;
                    this.pizza.selectIngredients = [];
                    this.modalSelectIngredients = false;
                }
            },
            seePizza($pizza){
                this.pizzaSelected = $pizza;
                this.modalPizzaSelected = !this.modalPizzaSelected;
            },
            openSelectIngredients(){
                this.modalSelectIngredients = !this.modalSelectIngredients;
            }
        },
    mounted() {
    }
}

</script>

<template>
    <Head title="Welcome" />
    <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-12">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M169.7 .9c-22.8-1.6-41.9 14-47.5 34.7L110.4 80c.5 0 1.1 0 1.6 0c176.7 0 320 143.3 320 320c0 .5 0 1.1 0 1.6l44.4-11.8c20.8-5.5 36.3-24.7 34.7-47.5C498.5 159.5 352.5 13.5 169.7 .9zM399.8 410.2c.1-3.4 .2-6.8 .2-10.2c0-159.1-128.9-288-288-288c-3.4 0-6.8 .1-10.2 .2L.5 491.9c-1.5 5.5 .1 11.4 4.1 15.4s9.9 5.6 15.4 4.1L399.8 410.2zM176 208a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm64 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM96 384a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <h1 class="underline text-gray-900 dark:text-white">Existing Pizzas</h1>
                            </div>
                        </div>
                        <div style="width: 500px">
                            <div id="app">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Cost</th>
                                        <th>Detail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(piz,i) in pizzas" :key="i">
                                        <th scope="row">{{i + 1}}</th>
                                        <td>{{ piz.name }}</td>
                                        <td>{{ piz.cost }}</td>
                                        <td>
                                            <button @click="seePizza(piz)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    <div v-if="modalPizzaSelected" class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="p-12">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M169.7 .9c-22.8-1.6-41.9 14-47.5 34.7L110.4 80c.5 0 1.1 0 1.6 0c176.7 0 320 143.3 320 320c0 .5 0 1.1 0 1.6l44.4-11.8c20.8-5.5 36.3-24.7 34.7-47.5C498.5 159.5 352.5 13.5 169.7 .9zM399.8 410.2c.1-3.4 .2-6.8 .2-10.2c0-159.1-128.9-288-288-288c-3.4 0-6.8 .1-10.2 .2L.5 491.9c-1.5 5.5 .1 11.4 4.1 15.4s9.9 5.6 15.4 4.1L399.8 410.2zM176 208a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm64 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM96 384a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                    <div class="ml-4 text-lg leading-7 font-semibold">
                        <h1 class="underline text-gray-900 dark:text-white" style="text-align: center;">{{pizzaSelected.name}}</h1>
                    </div>
                </div>
                <div class="Barrio">
                    <div  style="margin-bottom: 3%">
                        <div class="opcionesFiltro">
                            <template v-for="ing in ingredients">
                                <div class="listaFiltro">
                                    <input type="checkbox" :value="ing.id" v-model="pizzaSelected.ingredients"
                                           class="checkFiltro"  />
                                    <div class="itemFiltro">
                                        {{ ing.name }} - {{ ing.cost}} eur
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div style="margin-top: 10%">
                            <button style="background-color: black; color: white; padding: 1%; font-size: 20px; width: 48%; margin-right: 2%" @click="updatePizza()">Save</button>
                            <button style="background-color: red; color: white; padding: 1%; font-size: 20px; width: 48%; margin-left: 2%" @click="deletePizza">Delete</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" style="margin-bottom: 10%">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M169.7 .9c-22.8-1.6-41.9 14-47.5 34.7L110.4 80c.5 0 1.1 0 1.6 0c176.7 0 320 143.3 320 320c0 .5 0 1.1 0 1.6l44.4-11.8c20.8-5.5 36.3-24.7 34.7-47.5C498.5 159.5 352.5 13.5 169.7 .9zM399.8 410.2c.1-3.4 .2-6.8 .2-10.2c0-159.1-128.9-288-288-288c-3.4 0-6.8 .1-10.2 .2L.5 491.9c-1.5 5.5 .1 11.4 4.1 15.4s9.9 5.6 15.4 4.1L399.8 410.2zM176 208a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm64 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM96 384a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <h1 class="underline text-gray-900 dark:text-white">Pizza</h1>
                        </div>
                    </div>
                    <div class="ml-12">
                        <div style="margin-bottom: 3%">
                            <input type="text" v-model="pizza.name" placeholder="Name" style="width: 45%; margin-right: 5%; float: left">
                            <div class="Barrio">
                                <div  @click="openSelectIngredients(7)"  class="inputBarrio">
                                    <div>Select Ingredients</div>

                                    <div class="FlechaBarrio">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                            <path d="M6.00166 8.25703L2.81416 5.06953C2.59385 4.84922 2.59385 4.49297 2.81416 4.275L3.34385 3.74531C3.56416 3.525 3.92041 3.525 4.13838 3.74531L6.39775 6.00469L8.65713 3.74531C8.87744 3.525 9.23369 3.525 9.45166 3.74531L9.98135 4.275C10.2017 4.49531 10.2017 4.85156 9.98135 5.06953L6.79385 8.25703C6.57822 8.47734 6.22197 8.47734 6.00166 8.25703Z" fill="#1A1A1C"/>
                                        </svg>
                                    </div>
                                </div>
                                <div v-if="modalSelectIngredients == true" style="margin-bottom: 3%"  class="seleccionarBarrio" >

                                    <div class="filtrarTituloBar">
                                        Filtrar por barrio
                                    </div>
                                    <div class="opcionesFiltro">
                                        <template v-for="ing in ingredients">
                                            <div class="listaFiltro">
                                                <input type="checkbox" :value="ing.id" v-model="pizza.selectIngredients"
                                                       class="checkFiltro"  />
                                                <div class="itemFiltro">
                                                    {{ ing.name }} - {{ ing.cost}} eur
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <button style="background-color: black; color: white; padding: 1%; font-size: 20px; width: 60%; margin-left: 20%" @click="savePizza">Save</button>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <h1 class="underline text-gray-900 dark:text-white">Ingredient</h1>
                        </div>
                    </div>
                    <div class="ml-12">
                        <div style="margin-bottom: 3%">
                            <input type="text" v-model="ingredient.name" placeholder="Name" style="width: 45%; margin-right: 5%">
                            <input type="number" v-model="ingredient.cost" placeholder="Cost" style="width: 45%; margin-left: 5%">
                        </div>
                        <div>
                            <button style="background-color: black; color: white; padding: 1%; font-size: 20px; width: 60%; margin-left: 20%" @click="saveIngredient">Save</button>
                        </div>
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
