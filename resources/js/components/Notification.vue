<template>
    <div :class="'alert alert-' + alertClass + ' alert-dismissible fade show'" role="alert"
         v-show="show"
         v-text="notification"
         @click="destroyNotification">
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
        type: String,
        message: String,
        messageTimer: Number
    },

    data() {
        return {
            show: false,
            notification: this.message,
            alertClass: this.type,
            hideTimeout: false,
            timerTimeout: this.timer ? this.timer : 5000
        }
    },

    created () {
        if (this.notification) {
            this.showNotification();
        }

        // window.events.$on('showNotification', (message, type) => {
        //     this.notification = message;
        //     this.alertClass = type;
        //     this.showNotification();
        // });
    },

    methods: {
        showNotification() {
            this.show = true;
            this.hideNotification();
        },

        hideNotification() {
            this.hideTimeout = setTimeout(() => {
                this.destroyNotification()
            }, this.timerTimeout);
        },

        destroyNotification() {
            this.show = false;
            axios
                .get('/clearMessage');
            clearTimeout(this.hideTimeout);
        }
    }
}
</script>
