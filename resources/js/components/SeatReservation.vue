<template>
    <div>
        <h4>Seat Reservation</h4>
        <div class="seats">
            <div :class="['seat',!seat.occupied ? 'seat-unavail' : 'seat-avail']" v-for="seat in seats"
                 @click="occupy(seat.num)">
                Seat #{{ seat.num }}
                <div v-if="!seat.occupied">Reserved</div>
            </div>
        </div>

        <div class="inputs">
            <div v-for="seat in occupiedSeats" v-if="!seat.occupied">
                seat#{{ seat.num }}
                firstname:<input type="text" v-model="seats[seat.num-1].firstname">
                lastname:<input type="text" v-model="seats[seat.num-1].lastname">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            seats: [
                {
                    num: 1,
                    place: [1,3],
                    occupied: false,
                    firstname: "",
                    lastname: ""
                },
                {
                    num: 2,
                    occupied: true,
                    firstname: "",
                    lastname: ""
                },
                {
                    num: 3,
                    occupied: false,
                    firstname: "",
                    lastname: ""
                },
                {
                    num: 4,
                    occupied: false,
                    firstname: "",
                    lastname: ""
                },
                {
                    num: 5,
                    occupied: false,
                    firstname: "",
                    lastname: ""
                }
            ]
        }
    },
    methods: {
        occupy: function (num) {
            this.seats[num - 1].occupied = !(this.seats[num - 1].occupied)
        },

    },
    computed: {
        occupiedSeats: function () {
            var newSeats = []
            newSeats = this.seats.filter(function (e) {
                return !e.occupied
            })
            return newSeats
        }
    }
}
</script>

<style>
.seat {
    width: 100px;
    height: 100px;
    display: inline-block;
    border: 1px solid black;
    text-align: center;
    padding: 30px 10px;
    margin-right: 10px;
}


.seat-avail {
    background-color: green;
}

.seat-unavail {
    background-color: red;
}

.seats {
    display: flex;
    flex-direction: row;
}

.inputs {
    display: flex;
    flex-direction: column;
}

</style>
