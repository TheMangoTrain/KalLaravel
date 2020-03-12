<template>
    <table>
        <thead>
            <tr>
                <th v-for="(column, index) in columns" :key="index"  @click="sort(column)" v-bind:class="{ active: column == currentSort }">
                    {{ column }}
                    <div class="arrow" v-bind:class="currentSortDir"></div>
                </th>
                <th>
                    actions
                </th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="(item, index) in computedItems"
                :key="index"
                v-bind:index="index"
            >
                <router-link
                    :to="{
                        name: contentType,
                        params: { id: item[contentKey] }
                    }"
                    tag="td"
                    v-for="(data, column) in item"
                    :key="column"
                    v-if="columns.includes(column) ? true : false"
                >
                    {{ data ? data : "-" }}
                </router-link>

                <td>
                    <router-link
                        :to="{
                            name: contentType,
                            params: { id: item[contentKey] }
                        }"
                    >
                        details
                    </router-link>

                    <div
                        @click="deleteFromDB(contentType, item[contentKey], index)"
                    >
                        delete
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import HTTP from "@/js/http";

export default {
    name: "Table",

    props: {
        contentType: String,
        contentKey: String,
        search: String,
        items: Array,
        columns: Array,
        focusedID: Number
    },

    data: function() {
        return {
            currentSort: "",
            currentSortDir: "asc"
        };
    },

    computed: {
        computedItems() {
            if (this.items != null) {
                return (
                    this.items

                        // Using .slice to get a copy of original items, so .sort can mutate it as it needs.
                        .slice()

                        .sort((a, b) => {
                            if (this.currentSortDir === "asc") {
                                return (
                                    a[this.currentSort] >= b[this.currentSort]
                                );
                            }
                            return a[this.currentSort] <= b[this.currentSort];
                        })
                );
            } else {
                return [];
            }
        }
    },

    methods: {
          sort: function(s) {
            // Reversing direction if user toggles existing sort (ie same column)

            console.log("attempting sort")
            if (s === this.currentSort) {
                this.currentSortDir = this.currentSortDir === "asc" ? "desc" : "asc";
            }

            this.currentSort = s;
        },
        
        deleteFromDB: function(type, id, index) {
            HTTP.delete("api/" + type.toLowerCase() + "/delete/" + id).then(
                response => {
                   // SHOW NOTIFICATION
                }
            );

            this.items.splice(index, 1);
        }
       
    }
};
</script>

<style lang="scss" scoped>
table {
    border-collapse: separate;
    border-spacing: 0;
}

thead th {
    cursor: pointer;
    padding: 1em;
}

thead th:hover {
    background-color: #999999;
}

thead th:last-child {
    cursor: inherit;
}

thead th:last-child:hover {
    background-color: transparent;
}

thead th .arrow {
    display: none;
}

thead th.active .arrow {
    display: inline-block !important;
    position: absolute;
}

thead th .arrow.asc:after {
    content: "\25BC";
}

thead th .arrow.desc:after {
    content: "\25B2";
}

tbody tr {
    cursor: pointer;
}

tbody td {
    padding: 1em;
}

tbody td a {
    padding: 0.5em;
}

tbody tr:hover {
    background-color: #dddddd;
}

td {
}
</style>
