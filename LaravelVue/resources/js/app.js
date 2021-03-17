/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import home from "./components/HomeComponent.vue";
import Task from "./components/TaskComponent.vue";

const routes = [
    {
        path: "/home",
        component: home
    },
    {
        path: "/tasks",
        component: Task
    }
];

const router = new VueRouter({ routes });

/*Vue.component(
    "home-component",
    require("./components/HomeComponent.vue").default
);*/

const app = new Vue({
    el: "#app",
    router: router
});
