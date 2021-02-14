const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        backgroundColor: theme => ({
            ...theme('colors'),
            primary: "#FF855C",
            secondary: "#ffffff",
        }),
        fontSize: {
            '4xl': '1.5rem',
            '5xl': '2.3rem',
            '6xl': '4rem'
        },
        letterSpacing: {
            normal: '0'
        },
        textColor: {
            primary: "#FF855C",
            secondary: "#0F133C",
        },
        borderWidth: {
            '0': '0'
        },

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundColor: {
                'dark-blue-900': "#0F133C",
                'dark-blue-800': "#141951",
                'dark-blue-700': "#2B2A66",
                'dark-blue-600': "#363571",
                'warning': '#8b070e',
                
                'primary-interact': "#E2673D",
                'secondary-interact': "#bbbbbb",
                'warning-interact': '#580a12',
            },
            height: {
                'content': "740px"
            },
            colors: {
                'white': '#ffffff'
            },
            textColor: {
                'primary-interact': "#E2673D"
            },
            borderWidth: {
                '3': '3px'
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
