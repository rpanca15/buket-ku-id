/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'x-purple': '#E506F5',
                'x-green': '#279F51',
                'x-yellow': '#FFA610',
                'x-grey': '#FAFAFA',
                'x-red': '#FF3333',
            },
        },
    },
    plugins: [],
};
