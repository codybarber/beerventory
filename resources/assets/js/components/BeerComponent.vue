<template>
<div class="container">
    <div class="row" v-if="loading">Loading...</div>
    <div v-else class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <img v-if="details.beer_label_hd.length > 0" alt="Beer Label" class="beer-label" :src="details.beer_label_hd" />
                    <img v-else alt="Beer Label" class="beer-label" :src="details.beer_label" />
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>{{ details.beer_name }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>{{ details.brewery.brewery_name }}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>{{ details.brewery.location.brewery_city }}, {{ details.brewery.location.brewery_state }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Quantity <button class="btn btn-outline-secondary" v-if="quantity > 0" @click="open_add_beer"><i class="fas fa-pencil-alt"> </i></button></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" v-if="user_beer">
                            <h4 v-if="!adding">{{ user_beer.quantity }}</h4>
                            <div v-if="adding">
                                <button class="btn btn-outline beer-card__button quantity-button" type="button" @click="change_quantity('subtract')">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button class="btn btn-outline beer-card__button" type="button">
                                    {{ quantity }}
                                </button>
                                <button class="btn btn-outline beer-card__button quantity-button" type="button" @click="change_quantity('add')">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button class="btn btn-primary" @click="add_beer">Add Beer</button>
                            </div>
                        </div>
                        <div class="col-md-12" v-else>
                            <div v-if="!adding">
                                <h5>You don't have this in your beerventory</h5>
                                <button class="btn btn-secondary" @click="open_add_beer">Add Beer?</button>
                            </div>
                            <div v-if="adding">
                                <button class="btn btn-outline beer-card__button quantity-button" type="button" @click="change_quantity('subtract')">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button class="btn btn-outline beer-card__button" type="button">
                                    {{ quantity }}
                                </button>
                                <button class="btn btn-outline beer-card__button quantity-button" type="button" @click="change_quantity('add')">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button class="btn btn-primary" @click="add_beer">Add Beer</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div v-if="success" class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Beer added to your Beerventory.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>{{ details.beer_description }}</p>
                </div>
                <div class="col-md-4">
                    <form>
                        <div class="form-group row">
                            <label for="style" class="col-sm-6 col-form-label">Style</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="style" :value="details.beer_style">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="abv" class="col-sm-6 col-form-label">ABV</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="abv" :value="details.beer_abv + '%'">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="score" class="col-sm-6 col-form-label">Untappd Rating</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="score" :value="details.rating_score.toFixed(2)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site" class="col-sm-6 col-form-label">Untappd Link</label>
                            <div class="col-sm-6">
                                <a class="form-control-plaintext" id="site" target="_blank" :href="'https://untappd.com/b/' + details.brewery.brewery_slug + '-' + details.brewery.contact.url + '/' + details.bid">Link</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site" class="col-sm-6 col-form-label">Brewery Website</label>
                            <div class="col-sm-6">
                                <a class="form-control-plaintext" id="site" target="_blank" :href="'http://' + details.brewery.contact.url">Link</a>
                            </div>
                        </div>
                    </form>
                </div>
        
                <div class="col-md-4">
                    <carousel :perPage="1" :paginationPadding="4">
                        <slide v-for="(image, index) in details.media.items" :key="image.checkin_id">
                            <img class="w-100" :src="image.photo.photo_img_lg">
                        </slide>
                    </carousel>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
export default {
    data() {
        return {
            untappd_id: null,
            details: null,
            loading: true,
            quantity: 0,
            user_beer: null,
            adding: false,
            success: false
        };
    },
    components: {
        Carousel,
        Slide
    },
    mounted: function() {
        let self = this;
        self.untappd_id = window.location.pathname.split('/').pop();
        self.get_beer_info();
    },
    methods: {
        get_beer_info: function($this) {
            let self = this;
            let add_params = {};
            if (self.untappd_token) {
                add_params.access_token = self.untappd_token;
            } else {
                add_params.client_id = '8C9489E6C79A8932CA45D7F3B55C2504FB70DD2B';
                add_params.client_secret = 'D11E789922926CC31767BAC8D46E974EC1942C82';
            }

            axios
                .get('https://api.untappd.com/v4/beer/info/' + self.untappd_id, {
                    params: add_params
                })
                .then(function(response) {
                    self.details = response.data.response.beer;
                    self.loading = false;
                })
                .catch(function(error) {
                    console.log(error);
                });

            axios
                .get('/api/beers/' + self.untappd_id, {})
                .then(function(response) {
                    self.user_beer = response.data.user_beers[0];
                    self.quantity = response.data.user_beers[0].quantity;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        open_add_beer: function() {
            this.adding = true;
        },
        change_quantity: function(operator) {
            let self = this;
            if (operator === 'add') {
                self.quantity = self.quantity + 1;
            } else {
                if (self.quantity !== 0) {
                    self.quantity = self.quantity - 1;
                }
            }
        },
        add_beer: function() {
            let self = this;
            let label;
            if (self.details.beer_label_hd) {
                label = self.details.beer_label_hd;
            } else {
                label = self.details.beer_label;
            }
            let current_quantity;
            if (self.user_beer) {
                current_quantity = self.user_beer.quantity;
            } else {
                current_quantity = 0;
            }
            let new_quantity = self.quantity - current_quantity;
            axios
                .post('/api/add_beer', {
                    untappd_id: self.details.bid,
                    quantity: new_quantity,
                    name: self.details.beer_name,
                    brewery_name: self.details.brewery.brewery_name,
                    brewery_untappd_id: self.details.brewery.brewery_id,
                    brewery_label: self.details.brewery.brewery_label,
                    beer_label: label,
                    style: self.details.beer_style,
                    year: null,
                    abv: self.details.beer_abv,
                    city: self.details.brewery.location.brewery_city,
                    state: self.details.brewery.location.brewery_state
                })
                .then(function(response) {
                    self.adding = false;
                    self.success = true;
                    self.get_beer_info();
                    console.log(response);
                    // window.location = '/dashboard';
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    },
    props: {
        untappd_token: {
            type: String
        }
    }
};
</script>

<style scoped>
.beer-label {
    max-width: 100%;
}
</style>
