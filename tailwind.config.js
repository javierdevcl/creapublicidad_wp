/**
 * @type {import('tailwindcss/tailwind-config').TailwindConfig }
 */
module.exports = {
    content: [
      './**/*.{php,html,twig}',
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {},
    },
    plugins: [
      require('flowbite/plugin')
    ],
};
