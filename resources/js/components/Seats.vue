<template>
    <div class="container">
        <grid-layout
            :layout.sync="layout"
            :col-num="column"
            :row-height="1"
            :is-draggable="draggable"
            :is-resizable="resizable"
            :responsive="false"
            :vertical-compact="false"
            :prevent-collision="true"
            :use-css-transforms="true"
            :margin=[10,10]
        >

            <grid-item v-for="item in layout"
                       :style="{background: item.color === 1 ? 'red' : 'green'}"
                       :x="item.x"
                       :y="item.y"
                       :w="item.w"
                       :h="item.h"
                       :i="item.i"
                       :key="item.i">
                {{ item.i }}
            </grid-item>
        </grid-layout>
    </div>
</template>

<script>
import VueGridLayout from 'vue-grid-layout';

export default {
    components: {
        GridLayout: VueGridLayout.GridLayout,
        GridItem: VueGridLayout.GridItem
    },

    props: {
        seats: Array,
        candrag: Boolean
    },

    data() {
        return {
            layout: this.seats,
            column: 100,
            draggable: this.candrag,
            resizable: false
        }
    },
    mounted() {
        this.index = this.layout.length;
    },
    methods: {
        addItem: function () {
            // Add a new item. It must have a unique key!
            this.layout.push({
                x: (this.layout.length * 2) % (this.colNum || 12),
                y: this.layout.length + (this.colNum || 12), // puts it at the bottom
                w: 2,
                h: 2,
                i: this.index,
            });
            // Increment the counter to ensure key is always unique.
            this.index++;
        },
        removeItem: function (val) {
            const index = this.layout.map(item => item.i).indexOf(val);
            this.layout.splice(index, 1);
        },
    },
}
</script>

<style>
.container .vue-grid-item {
    background: green;
    width: 25px !important;
    height: 25px !important;
}
</style>
