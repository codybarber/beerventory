<template>
<div class="container">
    <div v-if="loading">Loading...</div>
    <div v-else class="row profile">
        <div class="col-lg-3">
            <div class="bg-image" v-bind:style="{ backgroundImage: 'url(' + details.beer_label_hd + ')' }"></div>
            <div class="bg-content">
                <div class="profile-userpic">
                    <img :src="details.beer_label_hd" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{ details.beer_name}}
                    </div>
                    <div class="profile-usertitle-job">
                        {{ details.brewery.brewery_name }}
                    </div>
                </div>
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Beer Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Brewery Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Media</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="profile-content">
               Some user related content goes here...
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            untappd_id: null,
            details: null,
            loading: true
        };
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
                    let label;
                    if (self.details.beer_label_hd) {
                        label = self.details.beer_label_hd;
                    } else {
                        label = self.details.beer_label;
                    }
                    self.loading = false;
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
.profile {
    margin: 20px 0;
}

/* Profile sidebar */
/*.profile-sidebar {
    padding: 20px 0 10px 0;
}
*/
.profile-userpic {
    margin-top: 50px;
}
.profile-userpic img {
    float: none;
    margin: 0 auto;
    width: 50%;
    height: 50%;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    /*-webkit-border-radius: 50% !important;
    -moz-border-radius: 50% !important;
    border-radius: 50% !important;*/
}

.profile-usertitle {
    text-align: center;
    margin-top: 20px;
}

.profile-usertitle-name {
    color: #222222;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 7px;
}

.profile-usertitle-job {
    text-transform: uppercase;
    color: #222222;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 15px;
}

.profile-userbuttons {
    text-align: center;
    margin-top: 10px;
}

.profile-userbuttons .btn {
    text-transform: uppercase;
    font-size: 11px;
    font-weight: 600;
    padding: 6px 15px;
    margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
    margin-right: 0px;
}

.profile-usermenu {
    margin-top: 30px;
}

.profile-usermenu ul li a {
    color: #444444;
    font-size: 14px;
    font-weight: 400;
}

.profile-usermenu ul li a i {
    margin-right: 8px;
    font-size: 14px;
}

.profile-usermenu ul li a:hover {
    cursor: pointer;
    color: white;
    background-color: rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.profile-usermenu .active {
    color: white;
    background-color: rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

/*.profile-usermenu ul li.active a {
    color: white;
    border-left: 2px solid #5b9bd1;
    margin-left: -2px;
}*/

/* Profile Content */
.profile-content {
    padding: 20px;
    background: #fff;
    min-height: 460px;
}

.bg-image {
    /* Add the blur effect */
    filter: blur(8px);
    -webkit-filter: blur(8px);

    /* Full height */
    height: 100%;
    width: 100%;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.bg-content {
    font-weight: bold;
    background-color: rgba(255, 255, 255, 0.3);
    border-radius: 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 100%;
    height: 105%;
    /*padding: 20px;*/
    text-align: center;
}
</style>
