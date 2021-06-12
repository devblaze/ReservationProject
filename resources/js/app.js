import './bootstrap';
import Vue from "vue";
import ExampleComponent from "./components/ExampleComponent";
import Notification from "./components/Notification";
import VenueInfo from "./components/VenueInfo";
import InstantSearch from 'vue-instantsearch';
import EventsList from "./components/EventsList";

Vue.use(InstantSearch);

let app = new Vue ({
    el: '#app',

    components: {
        ExampleComponent,
        Notification,
        VenueInfo,
        EventsList
    }
});
