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
                primary: '#D2A941',
                primaryhover: '#b48e2b',
                secondary: '#FCF8F3',
                secondaryhover: '#E5E1D4',
                white: '#FDFDFD',
                black: '#1B1B1B',
                success:'#349012',
                warning:'#f6c23e',
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
