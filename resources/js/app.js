import './bootstrap';

import Vue from 'vue';
import { createApp, h } from 'vue';
import { createInertiaApp ,Link,Head} from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import DefaultLayout from './Layouts/Default';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const page = require(`./Pages/${name}.vue`).default
        page.layout = page.layout || DefaultLayout
        return page
    },
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .mixin({ methods: { route } })
            .mixin(require('./base'))
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
