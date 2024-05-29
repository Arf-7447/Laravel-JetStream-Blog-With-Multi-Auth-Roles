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
    ],
    darkMode: 'media',
    // darkMode: 'class',
    theme: {
        extend: {
            // fontFamily: {
            //     sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            // },
            fontFamily: {
                //Inter Var
                //Madimi One
                sans: ['Quicksand', ...defaultTheme.fontFamily.sans],
                madimi: ['"Madimi One"', 'sans-serif'],
                quicksand: ['Quicksand', 'sans-serif'],
            },
        },
    },

    plugins: [forms, typography],
};
