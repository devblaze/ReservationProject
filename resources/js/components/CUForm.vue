<template>
    <div>
        <b-form @submit.prevent="submit">
            <slot/>

            <div class="float-right">
                <b-button variant="dark" @click="$emit('done')">Cancel</b-button>
                <b-button variant="primary" type="submit">{{ buttonName }}</b-button>
            </div>
        </b-form>

        <b-modal ref="success"
                 no-close-on-esc
                 no-close-on-backdrop
                 ok-only
                 ok-variant="primary"
                 okTitle="OK"
                 :title="update?
                `Update ${objectType} ${objectName}`:
                useSubmit?
                    `Submit ${objectType} ${objectName}`:
                    `Create ${objectType} ${objectName}`"
                 @ok="$emit('done')">
            <p v-if="update" class="my-2">
                {{objectType}} {{objectName}} has been successfully updated!
            </p>
            <p v-else-if="useSubmit" class="my-2">
                {{objectType}} {{objectName}} has been successfully submitted!
            </p>
            <p v-else class="my-2">
                {{objectType}} {{objectName}} has been successfully created!
            </p>
        </b-modal>
    </div>
</template>

<script>
export default {
    props: {
        'verification': { required: true, type: Function },
        'creation': { required: true, type: Function },
        'useSubmit': { default: false, type: Boolean },
        'objectType': { required: true, type: String },
        'objectName': { default: '', type: String },
    },
    computed: {
        update() {
            return location.pathname.endsWith('/update');
        },
        buttonName() {
            return this.update?
                `Update ${this.objectType}`:
                this.useSubmit?
                    `Submit ${this.objectType}`:
                    `Create ${this.objectType}`
        }
    },
    methods: {
        async submit() {
            if (!this.verification)
                throw 'Please fill the required fields and press the button again!'

            await this.creation()
            // this.$emit('created')

            try {
                await Promise.modal(this.$refs.success)
                this.$emit('done')
            }
            catch(e) {
                this.$emit('stay')
            }
        },
    },
}
</script>
