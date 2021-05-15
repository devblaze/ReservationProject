<template>
    <div :class="'alert alert-' + alertClass + ' alert-dismissible fade show'" role="alert"
    v-show="show"
    v-text="notification">

        <button type="button" class="close" aria-label="Close"
        @click="destroyNotification">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<style>
</style>

<script>
export default {
    props: ['type', 'message'],

    data() {
        return {
            show: false,
            notification: this.message,
            alertClass: this.type,
            hideTimeout: false
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
            }, 5000);
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
