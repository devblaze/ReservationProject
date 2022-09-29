<template>
    <b-form-group :label-cols="cols"
                  :label-cols-sm="ccols.sm"
                  :label-cols-md="ccols.md"
                  :label-cols-lg="ccols.lg"
                  :label-align="calign"
                  :label="label"
                  label-for="input-slot">
        <slot id="input-slot"/>
    </b-form-group>
</template>

<script>
const empty_true = x => x === "" || x

export default {
    computed: {
        ccols() {
            var cols = {}
            cols.sm = this.sm? this.sm: this.cols
            cols.md = this.md? this.md: this.cols
            cols.lg = this.lg? this.lg: this.cols
            return cols
        },
        cleft() { return empty_true(this.left) },
        cright() { return empty_true(this.right) },
        calign() {
            if (this.align) return this.align
            else if (this.cleft) return 'left'
            else if (this.cright) return 'right'
            else return 'center'
        },
    },
    props: {
        label: { required: true, type: String },
        cols: { default: 'auto' },
        sm: { default: 'none' },
        md: { default: 'none' },
        lg: { default: 'none' },
        left: { default: null },
        right: { default: null },
        align: { default: null },
    },
}
</script>
