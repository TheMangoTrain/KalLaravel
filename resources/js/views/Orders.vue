<template>
    <div class="view_Orders view">
        <h1>ORDERS</h1>

        <Table
            :items="this.resultsFiltered"
            :columns="columns"
            :contentType="contentType"
            :contentKey="contentKey"
        />
    </div>
</template>

<script>
import HTTP from "@/js/http";
import Table from "@/js/components/Table.vue";

export default {
    name: "Orders",
    components: {
        Table
    },

    data: function() {
        return {
            resultsItems: null,
            contentType: "Order",
            contentKey: "order_id",
            columns: [
                "order_id",
                "order_number",
                "customer_id",
                "total_price",
                "fulfillment_status",
                "order_status"
            ],
            filterApplied: []
        };
    },

    mounted() {
        this.getData();
    },

    computed: {
        resultsFiltered: function() {
            if (this.resultsItems != null) {
                // Filtering logic
                // return ...

                return this.resultsItems.data;
            } else {
                return null;
            }
        }
    },

    methods: {
        getData: function() {
            HTTP.get("api/orders").then(response => {
                this.processData(response.data);
            });
        },

        processData: function(data) {
            // ...

            this.resultsItems = data;

            this.filterResults;
        }
    }
};
</script>
