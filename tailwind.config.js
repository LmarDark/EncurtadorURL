import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontSize: {
                '9xl': '9rem'
            },

            animation: {
                fadeIn: 'fadeIn 1s ease-out forwards',
                fadeInOut: 'fadeinout 6s ease-in-out forwards',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0', transform: 'scale(0.9)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                fadeinout: {
                    '0%': { opacity: 0, visibility: 'hidden' },
                    '20%': { opacity: 1, visibility: 'visible' },
                    '60%': { opacity: 1, visibility: 'visible' },
                    '100%': { opacity: 0, visibility: 'hidden' },
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],

};
