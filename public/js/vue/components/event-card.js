Vue.component('event-card', {
    template: '#event-template',

    props: {
        filterStartDate: String,
        filterQuery: String,
        order: Number
    },

    data: function () {
        return {
            events: []
        }
    },

    filters: {
        truncate: function(string, value) {
            return string.substring(0, value) + '...';
        }

    },

    created: function () {
        this.fetchEventList();
    },

    methods: {
        fetchEventList: function () {
            $.getJSON('api/events', function (event) {
                this.events = event;
                for (var i=0; i < this.events.length; i++) {
                    this.events[i].price = Number(this.events[i].price);
                    this.events[i].total_tickets = Number(this.events[i].total_tickets);
                    this.events[i].promo = this.events[i].total_tickets < 6;
                }
            }.bind(this));
        }
    }
});

new Vue({
    el: '#myEvents',
    data: {
        searchStartDate: '',
        searchQuery: '',
        order: 1
    }

});