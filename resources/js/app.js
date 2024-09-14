import { createApp, h } from 'vue'
import { createInertiaApp,Head } from '@inertiajs/vue3'

createInertiaApp({
     title: (title)=>`${title}`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Head",Head)
      .mount(el)
  },
  progress:{
    // delay:100,
    color:'hsl(155, 100%, 65%)',
    includeCSS:true,
    showSpinner:true,
  }
})
