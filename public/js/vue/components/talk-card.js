Vue.component('talk-card', {
    template: '#talk-template',

    props: {
        filterStartDate: String,
        filterPrice: String
    },

    data: function () {
        return {
            talks: []
        }
    },

    filters: {
        truncate: function(string, value) {
            return string.substring(0, value) + '...';
        }

    },

    created: function () {
        this.fetchtalkList();
    },

    methods: {
        fetchtalkList: function () {
            $.getJSON('api/talks', function (talk) {
                this.talks = talk;
            }.bind(this));
        }
    }
});

new Vue({
    el: '#mytalks',
    data: {
        searchStartDate: '',
        searchPrice: ''
    }
});