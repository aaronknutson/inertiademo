import { createApp, h } from 'vue'
import Layout from './Layouts/Layout.vue'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'


createInertiaApp({
  resolve: async name => {
      let page = (await import(`./Pages/${name}`)).default;

      page.layout ??= Layout;

      return page;
    },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .component('Head', Head)
      .mount(el)
  },

  title: title => `My App: ${title}`
});

InertiaProgress.init({
    color: 'cyan',
    showSpinner: true,
})
