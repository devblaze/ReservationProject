import './bootstrap';
import Vue from "vue";
import ExampleComponent from "./components/ExampleComponent";
import Notification from "./components/Notification";
import VenueInfo from "./components/VenueInfo";
import InstantSearch from 'vue-instantsearch';
import EventsList from "./components/EventsList";
import SeatReservation from "./components/SeatReservation";
import DevComp from "./components/DevComp";

Vue.use(InstantSearch);

let app = new Vue ({
    el: '#app',

    components: {
        ExampleComponent,
        Notification,
        VenueInfo,
        EventsList,
        SeatReservation,
        DevComp
    }
});
