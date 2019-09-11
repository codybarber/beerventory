<template>
<div class="container">
    <div class="row">
        <div class="flex-center position-ref">
            <h1>Your Beerventory</h1>
            <a :href="untappd_auth_url">Link Untappd</a>
        </div>
    </div>
    <div class="flex-center position-ref form-row">
        <div class="col">
            <label for="selected_brewery">Brewery</label>
            <select id="selected_brewery" v-model="selected_brewery">
                <option v-for="brewery in breweries" :value="brewery.id">{{ brewery.name }}</option>
            </select>
        </div>
        <div class="col">
            <label for="selected_style">Style</label>
            <select id="selected_style" v-model="selected_style">
                <option v-for="style in styles" :value="style">{{ style }}</option>
            </select>
        </div>
        <div class="col">
            <button class="btn btn-secondary" @click="clear_filters">Clear Filters</button>
        </div>
    </div>
    <div class="beerventory-page row">
        <div class="beer-card col-lg-5 col-md-12" @click="select_beer(beer)" v-for="beer in filtered_beers" :style="{ backgroundImage: 'url(' + beer.beer_label + ')' }" >
            <div class="beer-card__overlay"></div>
            <div class="beer-card__content" >
                <div class="beer-card__buttons" v-if="selected_beer === beer"> 
                    <i class="fas fa-trash" @click="delete_beer"></i>
                    <i class="fas fa-check" @click="update_beer"></i>
                </div>
                <div class="beer-card__header beer-card-dashboard">
                    <a :href="'beers/' + beer.untappd_id ">
                        <h4 class="beer-card__title">{{ beer.name }}</h4>
                    </a>
                    <h4 class="beer-card__info">{{ beer.brewery_name }}</h4>
                </div>
                <p class="beer-card__desc">
                    {{ beer.style }}<br>
                    {{ beer.abv }}% ABV<br>
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
            filtered_beers: [],
            untappd_auth_url: '',
            selected_beer: null,
            breweries: [],
            styles: [],
            selected_brewery: null,
            selected_style: null
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
            })
            .catch(function(error) {
                console.log(error);
            });
    },
    watch: {
        data: function() {
            let self = this;
            self.filtered_beers = _.clone(self.data, true);
            for (let i = 0; i < self.data.length; i++) {
                let brewery = { id: self.data[i].brewery_untappd_id, name: self.data[i].brewery_name };
                self.addOrReplace(brewery, self.breweries);
                self.styles.indexOf(self.data[i].style) === -1 ? self.styles.push(self.data[i].style) : '';
            }
            self.styles = self.styles.sort();
            self.breweries = self.breweries.sort(self.dynamic_sort('name'));
        },
        selected_brewery: function() {
            let self = this;
            if (self.selected_brewery !== null) {
                if (self.selected_style === null) {
                    self.filtered_beers.length = 0;
                    for (let i = 0; i < self.data.length; i++) {
                        if (self.data[i].brewery_untappd_id === self.selected_brewery) {
                            self.filtered_beers.push(self.data[i]);
                        }
                    }
                } else {
                    self.filtered_beers.length = 0;
                    for (let i = 0; i < self.data.length; i++) {
                        if (
                            self.data[i].brewery_untappd_id === self.selected_brewery &&
                            self.data[i].style === self.selected_style
                        ) {
                            self.filtered_beers.push(self.data[i]);
                        }
                    }
                }
            }
        },
        selected_style: function() {
            let self = this;
            if (self.selected_style !== null) {
                if (self.selected_brewery === null) {
                    self.filtered_beers.length = 0;
                    for (let i = 0; i < self.data.length; i++) {
                        if (self.data[i].style === self.selected_style) {
                            self.filtered_beers.push(self.data[i]);
                        }
                    }
                } else {
                    self.filtered_beers.length = 0;
                    for (let i = 0; i < self.data.length; i++) {
                        if (
                            self.data[i].style === self.selected_style &&
                            self.data[i].brewery_untappd_id === self.selected_brewery
                        ) {
                            self.filtered_beers.push(self.data[i]);
                        }
                    }
                }
            }
        }
    },
    methods: {
        select_beer: function(beer) {
            this.selected_beer = beer;
        },
        clear_filters: function() {
            this.selected_brewery = null;
            this.selected_style = null;
            this.filtered_beers = _.clone(this.data, true);
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
                    quantity: self.selected_beer.quantity,
                    untappd_id: self.selected_beer.untappd_id
                })
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        addOrReplace: function(object, arr) {
            const i = arr.findIndex(_object => _object.id === object.id);
            if (i > -1) {
                arr[i] = object; // (2)
            } else {
                arr.push(object);
            }
        },
        dynamic_sort: function(property) {
            var sortOrder = 1;
            if (property[0] === '-') {
                sortOrder = -1;
                property = property.substr(1);
            }
            return function(a, b) {
                var result = a[property] < b[property] ? -1 : a[property] > b[property] ? 1 : 0;
                return result * sortOrder;
            };
        }
    }
};
</script>

<style scoped>
</style>
