import { createRouter, createWebHistory } from 'vue-router'

import LinkIndex from '../components/link/LinkIndex'
import LinkShow from '../components/link/LinkShow'

const routes = [
    {
        path: '/',
        name: 'links.index',
        component: LinkIndex
    },
    {
        path: '/:slug(.*)',
        name: 'links.show',
        component: LinkShow,
        props: true
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})