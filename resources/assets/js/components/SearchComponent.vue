<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Untappd.svg/1200px-Untappd.svg.png" class="img-fluid" alt="Responsive image"> -->
                    </div>
                </div>
                <div clas="row">
                    <h2>Add a beer to your Beerventory</h2>
                    <div class="col-lg-12 justify-content-center">
                        <div class="input-group">
                            <input type="text" class="beer-search-input" v-model="search_item" placeholder="Search for a beer or brewery here">
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
        <div class="">
            <div class="row">
                <div v-for="result in results" class="col-lg-4 col-md-12">

                    <div>
                        <div class="beer-card" @click="select_beer(result)" :style="{ backgroundImage: 'url(' + result.beer.beer_label + ')' }">
                            <div class="beer-card__overlay"></div>
                            
                            <div class="beer-card__content">
                                <div class="beer-card__header">
                                    <h4 class="beer-card__title">{{result.beer.beer_name}}</h4>
                                    <h4 class="beer-card__info">{{result.brewery.brewery_name}}</h4>
                                    <div class="beer-card__share">
                                        <span class="beer-card__icon">
                                          {{result.brewery.location.brewery_city}}, {{result.brewery.location.brewery_state}}
                                        </span>
                                    </div>
                                </div>
                                <p class="beer-card__desc">
                                    {{result.beer.beer_style}}<br>
                                    {{result.beer.beer_abv}}% ABV
                                </p>
                                <div class="text-left" v-if="selected_beer === result" style="z-index: 9999">
                                    <h6 class="text-center">Quantity</h6>
                                    <button class="btn btn-outline beer-card__button quantity-button" type="button" @click="change_quantity('subtract')">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="btn btn-outline beer-card__button" v-model="quantity">
                                        {{quantity}}
                                    </span>
                                    <button class="btn btn-outline beer-card__button quantity-button" type="button" @click="change_quantity('add')">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <br>
                                    <button class="btn btn-primary" @click="add_beer">Add Selected Beer</button>
                                </div>
                            </div>
                        </div>
                    </div>

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
            details: [],
            selected_beer: null,
            selected: null,
            quantity: 0,
            add_params: {}
        };
    },
    mounted: function() {},
    watch: {
        selected_beer: function() {
            this.quantity = 0;
        }
    },
    props: {
        untappd_token: {
            type: String
        }
    },
    methods: {
        select_beer: function(beer) {
            this.selected_beer = beer;
        },
        change_quantity: function(operator) {
            if (operator === 'add') {
                this.quantity = this.quantity + 1;
            } else {
                if (this.quantity !== 0) {
                    this.quantity = this.quantity - 1;
                }
            }
        },
        truncate_word: function(string, chars) {
            if (string.length > chars) {
                return string.substring(0, chars) + '...';
            } else {
                return string;
            }
        },
        search_for_beer: function($this) {
            let self = this;
            let search_params = {};
            if (self.untappd_token) {
                search_params.q = this.search_item;
                search_params.access_token = self.untappd_token;
            } else {
                search_params.q = this.search_item;
                search_params.client_id = '8C9489E6C79A8932CA45D7F3B55C2504FB70DD2B';
                search_params.client_secret = 'D11E789922926CC31767BAC8D46E974EC1942C82';
            }
            axios
                .get('https://api.untappd.com/v4/search/beer', {
                    params: search_params
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
            let add_params = {};
            if (self.untappd_token) {
                add_params.access_token = self.untappd_token;
            } else {
                add_params.client_id = '8C9489E6C79A8932CA45D7F3B55C2504FB70DD2B';
                add_params.client_secret = 'D11E789922926CC31767BAC8D46E974EC1942C82';
            }
            axios
                .get('https://api.untappd.com/v4/beer/info/' + this.selected_beer.beer.bid, {
                    params: add_params
                })
                .then(function(response) {
                    self.details.length = 0;
                    self.details = response.data.response.beer;
                    let label;
                    if (self.details.beer_label_hd) {
                        label = self.details.beer_label_hd;
                    } else {
                        label = self.details.beer_label;
                    }
                    axios
                        .post('/api/add_beer', {
                            untappd_id: self.selected_beer.beer.bid,
                            quantity: self.quantity,
                            name: self.selected_beer.beer.beer_name,
                            brewery_name: self.selected_beer.brewery.brewery_name,
                            brewery_untappd_id: self.selected_beer.brewery.brewery_id,
                            brewery_label: self.selected_beer.brewery.brewery_label,
                            beer_label: label,
                            style: self.selected_beer.beer.beer_style,
                            year: null,
                            abv: self.selected_beer.beer.beer_abv,
                            city: self.selected_beer.brewery.location.brewery_city,
                            state: self.selected_beer.brewery.location.brewery_state
                        })
                        .then(function(response) {
                            console.log(response);
                            window.location = '/dashboard';
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
};
</script>

<style scoped>
.beer-card {
    cursor: pointer;
    border: 1px solid black;
    margin: 5px;
}
.selected-beer-card {
    border: 1px solid #10aded;
    margin: 5px;
}
label > input {
    visibility: hidden;
    position: absolute;
}
</style>
