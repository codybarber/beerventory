<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <h2>Add a beer to your collection</h2>
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="text" class="beer-search-input" v-model="search_item">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary beer-search-button btn-block" @click="search_for_beer" type="button">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-primary" @click="add_beer">Add Selected Beer</button>
        </div>
        <div class="row justify-content-center">
            <!-- <div class="col-md-4"> -->

                <div v-for="result in results">
                    <div class="card crd-default" :class="[selected_beer === result  ? 'selected-beer-card' : 'beer-card']">
                        <label class="search-beer-cards">
                            <input type="radio" :name="result.beer.beer_name" :value="result" v-model="selected_beer"/>
                            <div class="card-header">{{result.beer.beer_name}}</div>
                            <div class="card-body">
                                <img :src="result.beer.beer_label"/>
                            </div>
                        </label>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                search_item: '',
                info: null,
                results: [],
                selected_beer: null,
                selected: null
            }
        },
        methods: {
            search_for_beer: function($this) {
                let self = this;
                axios.get('https://api.untappd.com/v4/search/beer', {
                    params: {
                        q: this.search_item,
                        client_id: '8C9489E6C79A8932CA45D7F3B55C2504FB70DD2B',
                        client_secret: 'D11E789922926CC31767BAC8D46E974EC1942C82'
                    }
                })
                .then(function(response) {
                    self.results.length = 0;
                    self.results = response.data.response.beers.items;
                })
                .catch(function(error) {
                    console.log(error);
                });
            },
            add_beer: function($this) {
                let self = this;
                axios.post('/api/add_beer', {
                    untappd_id: this.selected_beer.beer.bid,
                    name: this.selected_beer.beer.beer_name,
                    brewery_name: this.selected_beer.brewery.brewery_name,
                    brewery_untappd_id: this.selected_beer.brewery.brewery_id,
                    brewery_label: this.selected_beer.brewery.brewery_label,
                    beer_label: this.selected_beer.beer.beer_label,
                    style: this.selected_beer.beer.beer_style,
                    year: null,
                    abv: this.selected_beer.beer.beer_abv,
                    city: this.selected_beer.brewery.location.brewery_city,
                    state: this.selected_beer.brewery.location.brewery_state

                })
                .then(function(response) {
                    console.log(response);
                    window.location = '/dashboard';
                })
                .catch(function(error) {
                    console.log(error);
                });

            }
        }
        // watch: {
        //     selected_beer: function() {
        //         this.selected.
        //     }
        // }
    }
</script>

<style scoped>
.beer-card {
    cursor: pointer;
    border:1px solid black;
    margin: 5px;
}
.selected-beer-card {
    border:1px solid #10ADED;
    margin: 5px;
}
label > input{ /* HIDE RADIO */
  visibility: hidden; /* Makes input not-clickable */
  position: absolute; /* Remove input from document flow */
}
</style>
