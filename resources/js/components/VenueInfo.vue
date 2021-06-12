<template>
    <div>
        <img class="card-img-top" :src=source alt="Card image cap" @click="swtichShowInfo()">

        <div class="modal" tabindex="-1" role="dialog" v-show="show">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.alert {
    position: fixed;
    bottom: 0px;
    right: 10px;
}
</style>

<script>
export default {
    props: {
        src: String,
    },

    data() {
        return {
            show: false,
            source: this.src
        }
    },

    created () {
        if (this.notification) {
            this.showNotification();
        }
    },

    methods: {
        swtichShowInfo() {
            this.show = this.show === false;
        },

        hideInfo() {

        }
    }
}
</script>
