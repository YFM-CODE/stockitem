/**
 * Core SPA Router Engine (Murni Vanilla JS)
 * resources/js/core/router.js
 */
export class Router {
    static routes = new Map();
    static containerId = 'app';
    static basePath = '';

    static setBasePath(base) {
        this.basePath = base.replace(/\/$/, '');
    }

    static register(path, handler) {
        this.routes.set(path, handler);
    }

    static setContainer(id) {
        this.containerId = id;
    }

    static navigate(path) {
        let cleanPath = path;
        if (this.basePath && cleanPath.startsWith(this.basePath)) {
            cleanPath = cleanPath.slice(this.basePath.length) || '/';
        }
        if (!cleanPath.startsWith('/')) {
            cleanPath = '/' + cleanPath;
        }
        const fullPath = `${this.basePath}${cleanPath}`;
        window.history.pushState({}, '', fullPath);
        this.resolve();
    }

    static resolve() {
        let path = window.location.pathname || '/';
        if (this.basePath && path.startsWith(this.basePath)) {
            path = path.slice(this.basePath.length) || '/';
        }

        const handler = this.routes.get(path);
        if (handler) {
            handler();
        } else {
            const container = document.getElementById(this.containerId);
            if (container) {
                container.innerHTML = '<h2>404 - Halaman Tidak Ditemukan</h2>';
            }
        }
    }

    static init() {
        document.addEventListener('click', (e) => {
            const target = e.target;
            const anchor = target.closest('a');
            if (anchor) {
                const href = anchor.getAttribute('href');
                if (href && (href.startsWith('/') || href.startsWith(this.basePath))) {
                    e.preventDefault();
                    this.navigate(href);
                }
            }
        });

        window.addEventListener('popstate', () => this.resolve());
        this.resolve();
    }
}
