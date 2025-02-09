import "./bootstrap";
//in your `main.js` file
import "/node_modules/flowbite-vue/dist/index.css";
import "flowbite";
import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/vue3";
import { ZiggyVue } from "ziggy-js";

import { createHead } from "@unhead/vue";
import { VueRecaptchaPlugin } from "vue-recaptcha";
import { Checkbox } from "vue-recaptcha";
createInertiaApp({
    progress: {
        color: "white",
        showSpinner: true,
    },
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(createHead)
            .use(VueRecaptchaPlugin, {
                v2SiteKey: "6Lcq9ZIqAAAAAIgQwdxCtkO7JfjwldLMLCnAbIgS",
                // v3SiteKey: "YOUR_V3_SITEKEY_HERE",
            })
            .component("Checkbox", Checkbox)
            .component("Link", Link)
            .mount(el);
    },
});
