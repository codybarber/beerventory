<template>
<div class="container">
    <div class="row">
        <div class="flex-center position-ref">
            <a :href="untappd_auth_url">Link Untappd</a>
        </div>
    </div>
    <div class="beerventory-page row">
        
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {};
    },
    mounted: function() {},
    props: {
        untappd_auth_url: {
            type: String
        }
    },
    watch: {},
    methods: {}
};
</script>

<style scoped>
</style>
