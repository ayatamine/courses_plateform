const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'body': '#f0f5fb',
                'selected-text': '#A3A3FF',
                'theme': '#2e6d90',
                'nav': '#e5e7eb',
                'secondary': '#474645',
                'badge': '#ff5672',
                // 'input-border': '#fff',
                // 'input': '#fff',
                'defaut-text-color':'#474547',
                'btn-bg' :'#ff5672',
                'main-hover-color' :'#ff5672',
                'darken-bg':'#252841',
                'darken-btn' :"#222"

            },
            fontFamily: {
                'cairo': ["'Cairo'", 'sans-serif']
            },
            theme: {
                fontSize: {
                    xs: ['0.775rem', '1.25rem']
                }
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
