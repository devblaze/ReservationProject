import './bootstrap';
import Vue from "vue";
import ExampleComponent from "./components/ExampleComponent";
import Notification from "./components/Notification";

let app = new Vue ({
    el: '#app',

    components: {
        ExampleComponent,
        Notification
    }
});
