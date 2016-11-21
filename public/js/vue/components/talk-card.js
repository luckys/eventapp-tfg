Vue.component('talk-card', {
    template: '#talk-template',

    props: {
        filterStartDate: String,
        filterQuery: String,
        order: Number
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
                for (var i=0; i < this.talks.length; i++) {
                    this.talks[i].price = Number(this.talks[i].price);
                    this.events[i].total_tickets = Number(this.events[i].total_tickets);
                    this.events[i].promo = this.events[i].total_tickets < 6;
                }
            }.bind(this));
        }
    }
});

new Vue({
    el: '#mytalks',
    data: {
        searchStartDate: '',
        searchQuery: '',
        order: 1
    }
});