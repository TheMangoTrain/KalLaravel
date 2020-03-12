<template>
    <div class="view_PrintSheets view">
        <h1>PRINT SHEETS</h1>

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
    name: "PrintSheets",
    components: {
        Table
    },

    data: function() {
        return {
            resultsItems: null,
            contentType: "PrintSheet",
            contentKey: "ps_id",
            columns: ["ps_id", "type", "sheet_url"],
            filterApplied: []
        };
    },

    mounted() {
        this.getData();
    },

    computed: {
        resultsFiltered: function() {
            if (this.resultsItems != null) {
                return this.resultsItems.data;
            } else {
                return null;
            }
        }
    },

    methods: {
        getData: function() {
            HTTP.get("api/printsheets").then(response => {
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
