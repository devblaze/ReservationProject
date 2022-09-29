<template>
    <div :key="key">
        <b-row align-h="between">
            <b-col cols="4" md="4" lg="6">
                <b-button @click="$emit('create')" variant="primary">
                    <span v-if="createName">{{ createName }}</span>
                    <b-icon v-else icon="plus" aria-hidden="true"/>
                </b-button>
            </b-col>

            <b-col cols="8" md="auto" lg="2">
                <Label label="Per page" cols="auto" right>
                    <b-form-select v-model="pageSize"
                                   :options="[
                            {value: 10, text: '10'},
                            {value: 20, text: '20'},
                            {value: 30, text: '30'},
                            {value: 40, text: '40'},
                            {value: 50, text: '50'}]"/>
                </Label>
            </b-col>

            <b-col cols="12" sm="12" md="5" lg="4" align-h="end">
                <Label label="Search" cols="auto" right>
                    <b-input-group>
                        <b-form-input type="search"
                                      v-model="searchText"
                                      placeholder="Type to Search"
                                      @keydown.enter="reload"/>
                        <b-input-group-append>
                            <b-button variant="primary" @click="reload">
                                <b-icon icon="search" aria-hidden="true"/>
                            </b-button>
                        </b-input-group-append>
                    </b-input-group>
                </Label>
            </b-col>
        </b-row>

        <b-spinner v-if="loading" class="spinner"/>

        <b-table
            show-empty
            :stacked="stacked"
            striped
            hover
            ref="table"
            :class="loading ? `invisible` : ``"
            :items="itemsProvider"
            :fields="fields"
            :current-page="page"
            :per-page="pageSize"
            :sort-by.sync="orderBy"
            :sort-desc.sync="sortDesc"
            no-local-sorting
            @row-clicked="(item, index, event) => { $emit('click', item, index, event) }"
            @row-hovered="$emit('hover', $event)">

            <template #empty>
                <h5 class="text-primary">No Data...</h5>
            </template>

            <template v-slot:[`cell(${c.name})`]="row" v-for="c in customColumns">
                <div class="text-left" :key="c.type + '-' + c.name + '-' + Math.random()">
                    <b-badge
                        v-for="value in row.value"
                        :key="c.type + '-' + value + '-' + Math.random()" class="m-1"
                        :variant="'primary'">
                        {{ row.value.find(x => x === value) }}
                    </b-badge>
                </div>
            </template>
        </b-table>

        <b-row>
            <b-col>
                <strong>Total:</strong> {{ total }}
            </b-col>
            <b-col>
                <b-pagination align="right"
                              v-model="page"
                              :total-rows="total"
                              :per-page="pageSize" />
            </b-col>
        </b-row>
    </div>
</template>

<style>
.spinner {
    position: fixed;
    top: 33%;
    left: 50%; }
</style>

<script>
const Label = () => import('./Label.vue')
export default {
    components: { Label, },
    props: {
        'api': { required: true },
        'fields': { default: () => [] },
        'customColumns': { default: false },
        'createName': { default: null },
        'stacked': { default: 'lg' },
    },
    data() {
        return {
            key: UID(),
            page: 1,
            total: 0,
            pageSize: 20,
            orderBy: null,
            sortDesc: false,
            items: [],
            searchText: '',
            loading: false,
        }
    },
    methods: {
        async itemsProvider() {
            const params = {
                page: this.page,
                pageSize: this.pageSize,
                orderBy: this.orderBy,
                sortDesc: this.sortDesc,
                searchText: this.searchText, }
            this.loading = true
            const res = await this.api(params)
            this.total = res.total
            this.loading = false
            this.items = res.data
            return res.data
        },
        async reload() {
            this.page = 1
            this.key = UID()
        },
    },
}
</script>
