import './bootstrap';
import Vue from "vue";
import ExampleComponent from "./components/ExampleComponent";
import Notification from "./components/Notification";
import VenueInfo from "./components/VenueInfo";
import InstantSearch from 'vue-instantsearch';
import EventsList from "./components/EventsList";
import SeatReservation from "./components/SeatReservation";
import DevComp from "./components/DevComp";
import Seats from "./components/Seats";
import Table from "./components/Table";
import Box from "./components/Box";
import CUForm from "./components/CUForm";
import Label from "./components/Label";
import Wrapper from "./components/Wrapper";

Vue.use(InstantSearch);

let app = new Vue ({
    el: '#app',

    components: {
        ExampleComponent,
        Notification,
        VenueInfo,
        EventsList,
        SeatReservation,
        DevComp,
        Seats,
        Table,
        Box,
        CUForm,
        Label,
        Wrapper
    }
});
