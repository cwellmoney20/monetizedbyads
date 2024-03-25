const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            'screens': {
                'md1': '887px',
                'lg1': '1047px',
                'lg2': '1193px',
            }
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
    safelist: [
        { pattern: /bg-(cyan|indigo|violet|emerald|yellow|zinc|orange|pink)-600/ },
        { pattern: /text-(cyan|indigo|violet|emerald|yellow|zinc|orange|pink)-50/ },
    ]
}
