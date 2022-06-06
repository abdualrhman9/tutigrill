<template>
  <!-- Start Menu -->
    <section class="menu" id="menu">
        <div class="container">
            
            <div class="head">
                <small>select your meal</small>
                <h2>
                    Popular <span>Food</span>
                </h2>
            </div>
            
            <div class="menu row" data-menu>
                <div class="col-md-3" data-aos="fade-right"
                data-aos-easing="ease-in-sine">
                    <ul class="nav-menu" data-menu-categories>
                        <li 
                            class="menu-item"
                            v-for="section in sections"
                            :key="section.id"
                        >
                            <a 
                                href="#" 
                                @click.prevent="setView(section.id)" 
                                class="menu-item"
                                data-tab="tab" 
                                data-tab-target="targetName"
                                v-bind:class="{active: isActive(section.id)}"
                            > {{ section.name }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9" data-aos="fade-right" data-aos-easing="ease-in-sine" data-menu-meals>                        
                    
                    <div 
                        class="menu-preview"
                        data-tab-view="sandwiches" 
                        id="sandwiches"
                        v-for="section in sections"
                        :key="section.id"
                        v-bind:class="{active: isActive(section.id)}" 
                    >
                                        
                        <meal-card
                            v-for="meal in section.meals"
                            :key="meal.id"
                            :meal="meal" 
                            :inCart="inCart(meal.id)"
                        >
                        </meal-card>

                    </div>
                    
                </div>

            </div>
            
        
            
        </div>

    </section>
    <!-- End Menu -->
</template>

<script>
import MealCard from "./MealCard.vue";
import axios from "axios";
export default {
    mounted: function () {
        //
    },
    metaInfo: {
    },
    data: function () {
        return {
            activeView: 1,
            sections: [
                {
                    id: 1,
                    name: "BreakFast Test Name",
                    meals: [
                        { id: 1, name: "Meal01", price: 20.99, quantity: 1 },
                        { id: 2, name: "Meal02", price: 14.99, quantity: 1 },
                    ]
                },
                {
                    id: 2,
                    name: "Sandwitches",
                    meals: [
                        { id: 3, name: "Meal03", price: 20.99, quantity: 1 },
                        { id: 4, name: "Meal04", price: 14.99, quantity: 1 },
                    ]
                }
            ],
        };
    },
    methods: {
        isActive: function (sectionId) {
            return sectionId === this.activeView;
        },
        setView: function (sectionId) {
            this.activeView = sectionId;
        },
        inCart: function(iD) {
            let products = JSON.parse(sessionStorage.getItem('cart')??'[]');
            let index = products.findIndex((p)=>{
                return p.id == iD;
            });

            if(index == -1)
                return false;
            return true;
        }
    },
    computed: {
        
    },
    components: { MealCard, MealCard }
}
</script>

<style>

</style>