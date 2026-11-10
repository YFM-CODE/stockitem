/**
 * Application Entry Point (Murni Vanilla JS)
 * resources/js/main.js
 */
import { Router } from './core/router.js';
import './components/NavbarComponent.js';
import './pages/ProductPage.js';

Router.setBasePath('/stokitem/public');
Router.setContainer('main-content');

Router.register('/', () => {
    const mainEl = document.getElementById('main-content');
    if (mainEl) mainEl.innerHTML = '<h2>Selamat Datang di Dashboard Utama Murni</h2>';
});

Router.register('/product', () => {
    const mainEl = document.getElementById('main-content');
    if (mainEl) {
        mainEl.innerHTML = '<page-product></page-product>';
    }
});

document.addEventListener('DOMContentLoaded', () => {
    Router.init();
});
