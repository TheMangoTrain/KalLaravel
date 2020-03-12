import Vue from "vue";
import VueRouter from "vue-router";
import Home from "@/js/views/Home.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home
    },
    {
        path: "/products",
        name: "Products",
        component: () =>
            import(/* webpackChunkName: "products" */ "@/js/views/Products.vue")
    },
    {
        path: "/product/:id/",
        name: "Product",
        component: () =>
            import(/* webpackChunkName: "product" */ "@/js/views/Product.vue"),
        props: true
    },
    {
        path: "/product/delete/:id/",
        name: "ProductDelete",
        props: true
    },

    {
        path: "/orders",
        name: "Orders",
        component: () =>
            import(/* webpackChunkName: "orders" */ "@/js/views/Orders.vue")
    },
    {
        path: "/order/:id/",
        name: "Order",
        component: () =>
            import(/* webpackChunkName: "order" */ "@/js/views/Order.vue"),
        props: true
    },
    {
        path: "/order/delete/:id/",
        name: "OrderDelete",
        props: true
    },

    {
        path: "/printsheets",
        name: "PrintSheets",
        component: () =>
            import(
                /* webpackChunkName: "printsheets" */ "@/js/views/PrintSheets.vue"
            )
    },
    {
        path: "/printsheet/:id/",
        name: "PrintSheet",
        component: () =>
            import(
                /* webpackChunkName: "printsheet" */ "@/js/views/PrintSheet.vue"
            ),
        props: true
    },
    {
        path: "printsheet/delete/:id/",
        name: "PrintSheetDelete",
        props: true
    },

    {
        path: "/printsheetitems",
        name: "PrintSheetItems",
        component: () =>
            import(
                /* webpackChunkName: "printsheetitems2" */ "@/js/views/PrintSheetItems.vue"
            )
    },
    {
        path: "/printsheetitem/:id/",
        name: "PrintSheetItem",
        component: () =>
            import(
                /* webpackChunkName: "printsheetitem2" */ "@/js/views/PrintSheetItem.vue"
            ),
        props: true
    },
    {
        path: "printsheetitem/delete/:id/",
        name: "PrintSheetItemDelete",
        props: true
    }
];

const router = new VueRouter({
    routes
});

export default router;
