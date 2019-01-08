<template>
<div class="container">
    <div class="row">
        <div class="flex-center position-ref">
            <h1>Your Beerventory</h1>
            <a :href="untappd_auth_url">Link Untappd</a>
        </div>
    </div>
    <div class="beerventory-page row">
        <div class="beer-card col-lg-5 col-md-12" @click="select_beer(beer)" v-for="beer in data" :style="{ backgroundImage: 'url(' + beer.beer_label + ')' }" >
            <div class="beer-card__overlay"></div>
            <div class="beer-card__content" >
                <div class="beer-card__buttons" v-if="selected_beer === beer"e> 
                    <i class="fas fa-trash" @click="delete_beer"></i>
                    <i class="fas fa-check" @click="update_beer"></i>
                </div>
                <div class="beer-card__header beer-card-dashboard">
                    <a :href="'beers/' + beer.beer_id ">
                        <h4 class="beer-card__title">{{ beer.name }}</h4>
                    </a>
                    <h4 class="beer-card__info">{{ beer.brewery_name }}</h4>
                </div>
                <p class="beer-card__desc">
                    {{ beer.style }}<br>
                    {{ beer.abv }}% ABV
                </p>
                <div class="text-left">
                    <h6 class="text-center">Quantity</h6>
                    <button class="btn btn-outline beer-card__button quantity-button" type="button" v-if="selected_beer === beer" @click="change_quantity('subtract')">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button class="btn btn-outline beer-card__button" type="button">
                        {{ beer.quantity }}
                    </button>
                    <button class="btn btn-outline beer-card__button quantity-button" type="button" v-if="selected_beer === beer" @click="change_quantity('add')">
                        <i class="fas fa-plus"></i>
                    </button>
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
            data: [],
            untappd_auth_url: '',
            selected_beer: null
        };
    },
    mounted: function() {
        this.untappd_auth_url =
            'https://untappd.com/oauth/authenticate/?client_id=8C9489E6C79A8932CA45D7F3B55C2504FB70DD2B&response_type=token&redirect_url=https://beerventory.dev/dashboard';
        let self = this;
        axios
            .get('/api/dashboard', {})
            .then(function(response) {
                self.data = response.data.user_beers;
                // self.results = response.data.response.beers.items;
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    watch: {},
    methods: {
        select_beer: function(beer) {
            this.selected_beer = beer;
        },
        change_quantity: function(operator) {
            let self = this;
            if (operator === 'add') {
                self.selected_beer.quantity = self.selected_beer.quantity + 1;
            } else {
                if (self.selected_beer.quantity !== 0) {
                    self.selected_beer.quantity = self.selected_beer.quantity - 1;
                }
            }
        },
        delete_beer: function() {
            let self = this;
            axios
                .put('/api/delete_beerventory', {
                    beer_id: self.selected_beer.beer_id
                })
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        update_beer: function() {
            let self = this;
            axios
                .put('/api/update_beerventory', {
                    beer_id: self.selected_beer.beer_id,
                    quantity: self.selected_beer.quantity
                })
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
};
</script>

<style scoped>
</style>
