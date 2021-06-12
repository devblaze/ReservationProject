<template>
    <ais-instant-search
        :search-client="searchClient"
        index-name="events"
    >
        <div class="search-panel">
            <div class="search-panel__filters">
                <ais-refinement-list attribute="categories" searchable />
            </div>

            <div class="search-panel__results">
                <ais-search-box placeholder="Search here…" class="searchbox" />

                <ais-hits>
                    <div class="row" slot-scope="{ items, sendEvent }">
                        <div class="col my-3" v-for="item in items" :key="item.objectID">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1769f8b6c08%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1769f8b6c08%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ item.name }}</h5>
                                    <p class="card-text">{{ item.description }}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        {{ item.location }}
                                    </li>
                                    <li class="list-group-item">
                                        Ending: {{ item.end_time }}
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <a href="" class="btn btn-success">
                                        Check in before
                                        <br>

                                    </a>
                                    <p class="text-danger">Not available seats</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </ais-hits>

                <div class="pagination"><ais-pagination /></div>
            </div>

        </div>
    </ais-instant-search>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';
import 'instantsearch.css/themes/satellite-min.css';

export default {
    data() {
        return {
            searchClient: algoliasearch(
                '5NTWW4SNW1',
                'e9a035e2d1ded057cf6a8c8b650708ed'
            ),
        };
    },
};
</script>

<style>
body { font-family: sans-serif; padding: 1em; }
.ais-SearchBox { margin: 1em 0; }

</style>
