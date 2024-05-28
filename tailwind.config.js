/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sometype: ["Sometype Mono", "monospace"],
            },
            colors: {
                "primary": colors.blue["500"],
                "primary-hover": colors.blue["600"],
                "secondary": colors.blue["400"],
                "secondary-hover": colors.blue["500"],
                "danger": colors.red["500"],
                "danger-hover": colors.red["600"],
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
    ],
}
