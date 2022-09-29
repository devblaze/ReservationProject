<template>
    <Draggable v-bind="draggableOptions" @start="onStart" @move="onMove" @stop="onStop" class="box">
        <b-card :border-variant="color"
                :header-bg-variant="color"
                :text-variant="'black'"
                :header-text-variant="color === 'light'? 'black': 'white'"
                :header="title"
                class="text-center m-3">
            <b-card-text>{{ description }}</b-card-text>
            <slot></slot>
        </b-card>
    </Draggable>
</template>

<style>
.box {
    max-width: 30rem;
    width: 25rem;
}
</style>

<script>
import { Draggable, DraggableEvent } from '@braks/revue-draggable';

export default {
    components: { Draggable },
    props: {
        id: {
            required: true,
            type: Number
        },
        color: {
            required: false,
            default: "primary",
            type: String
        },
        title: {
            required: false,
            type: String
        },
        description: {
            required: false,
            type: String
        },
        draggableOptions: {
            required: false,
            default: { grid: [150, 50], bounds: 'body' },
            type: Object
        },
        saveData: {
            required: false,
            type: Boolean
        }
    },
    watch: {
        'saveData'() {
            this.onSave()
        }
    },
    data() {
        return {
            currentEvent: {},
            activeDrags: 0,
            deltaPosition: {
                x: 0,
                y: 0
            },
        }
    },
    computed: {
        event() {
            return {
                data: { ...this.currentEvent.data }
            }
        }
    },
    methods: {
        onStart(e, name) {
            this.activeDrags++
            console.log('onStart-------------------------------')
            console.log('activeDrags: ', this.activeDrags)
        },
        onMove(e, name) {
            this.currentEvent = e
            const { x, y } = this.deltaPosition
            this.deltaPosition = {
                x: x + e.data.deltaX,
                y: y + e.data.deltaY
            }
            console.log('onMove-------------------------------')
            console.log('currentEvent: ', this.currentEvent)
            console.log('x: ', this.deltaPosition.x, 'y: ', this.deltaPosition.y)
        },
        onStop() {
            this.activeDrags--
            console.log('onStop-------------------------------')
            console.log('activeDrags: ', this.activeDrags)
        },
        onSave() {
            var box = {
                id: this.id,
                title: this.title,
                description: this.description,
                color: this.color,
                deltaPosition: this.deltaPosition
            }
            console.log('box --------------> ', box)
            this.$emit('save', box)
        },
    },
}
</script>
