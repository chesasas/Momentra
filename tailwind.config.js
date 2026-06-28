import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: '#B88E2F',
                primaryhover: '#a5802a',
                secondary: '#FCF8F3',
                secondaryhover: '#E5E1D4',
                white: '#FDFDFD',
                black: '#1B1B1B',
                success:'#349012',
                warning:'#fb923c',
                danger:'#FF5858',
            },
            fontFamily: {
                heading: ['Montserrat', 'sans-serif'],
                body: ['Poppins', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};
