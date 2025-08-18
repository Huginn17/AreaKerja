import flowbite from 'flowbite/plugin'
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
            },
            colors: {
                orange: {
                    500: '#FF6600',
                    600: '#E65C00',
                }
            }
        },
    },
    plugins: [
        require('flowbite/plugin'),
    ],
}