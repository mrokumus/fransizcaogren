const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: {
        content:
            [
                './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
                './vendor/laravel/jetstream/**/*.blade.php',
                './storage/framework/views/*.php',
                './resources/views/**/*.blade.php',
            ],
    },
    theme: {
        extend: {
            fontFamily: {
                'playfair-display': ['"Playfair Display"','serif'],
                'quicksand': ['Quicksand','sans'],
            },
            colors: {
                frblack: {
                    '50':
                        '#0013f2',
                    '100':
                        '#000fc4',
                    '200':
                        '#000c96',
                    '300':
                        '#000869',
                    '400':
                        '#00053b',
                    '500':
                        '#00010d',
                    '600':
                        '#00010a',
                    '700':
                        '#000107',
                    '800':
                        '#000003',
                    '900':
                        '#000000',
                },
                frblue: {
                    '50':
                        '#335edf',
                    '100':
                        '#2a4eba',
                    '200':
                        '#213e95',
                    '300':
                        '#182e70',
                    '400':
                        '#0f1e4b',
                    '500':
                        '#060e26',
                    '600':
                        '#050b1d',
                    '700':
                        '#030713',
                    '800':
                        '#02040a',
                    '900':
                        '#000000',
                },
                frblue_l: {
                    '50':
                        '#99f0fa',
                    '100':
                        '#7cdee9',
                    '200':
                        '#5fccd8',
                    '300':
                        '#42bac8',
                    '400':
                        '#25a8b7',
                    '500':
                        '#0896a6',
                    '600':
                        '#06717d',
                    '700':
                        '#044b53',
                    '800':
                        '#02262a',
                    '900':
                        '#000000',
                },
                frred: {
                    '50':
                        '#ffffff',
                    '100':
                        '#ffdddb',
                    '200':
                        '#ffbab6',
                    '300':
                        '#ff9892',
                    '400':
                        '#ff756d',
                    '500':
                        '#ff5349',
                    '600':
                        '#e54037',
                    '700':
                        '#ca2e25',
                    '800':
                        '#b01b12',
                    '900':
                        '#950800',
                },
                frred_l: {
                    '50':
                        '#ffffff',
                    '100':
                        '#fcdbdb',
                    '200':
                        '#fab7b6',
                    '300':
                        '#f79392',
                    '400':
                        '#f56f6d',
                    '500':
                        '#f24b49',
                    '600':
                        '#d53b39',
                    '700':
                        '#b92b29',
                    '800':
                        '#9c1b19',
                    '900':
                        '#7f0b09',
                },
                frgreen: {
                    '50':
                        '#ffffff',
                    '100':
                        '#dbffef',
                    '200':
                        '#b6ffdf',
                    '300':
                        '#92ffce',
                    '400':
                        '#6dffbe',
                    '500':
                        '#49ffae',
                    '600':
                        '#37e597',
                    '700':
                        '#25ca81',
                    '800':
                        '#12b06a',
                    '900':
                        '#009553',
                },
                frgreen_l: {
                    '50':
                        '#ffffff',
                    '100':
                        '#eafff6',
                    '200':
                        '#d5ffec',
                    '300':
                        '#bfffe3',
                    '400':
                        '#aaffd9',
                    '500':
                        '#95ffd0',
                    '600':
                        '#70f8bb',
                    '700':
                        '#4bf0a7',
                    '800':
                        '#25e992',
                    '900':
                        '#00e17d',
                },
                frorange: {
                    '50':
                        '#ffffff',
                    '100':
                        '#fcdcd9',
                    '200':
                        '#fab9b3',
                    '300':
                        '#f7968d',
                    '400':
                        '#f57367',
                    '500':
                        '#f25041',
                    '600':
                        '#d44133',
                    '700':
                        '#b53125',
                    '800':
                        '#972216',
                    '900':
                        '#781208',
                },
                frorange_l: {
                    '50':
                        '#ffffff',
                    '100':
                        '#fce6e1',
                    '200':
                        '#facdc4',
                    '300':
                        '#f7b5a6',
                    '400':
                        '#f59c89',
                    '500':
                        '#f2836b',
                    '600':
                        '#dd6c54',
                    '700':
                        '#c8553d',
                    '800':
                        '#b23e25',
                    '900':
                        '#9d270e',
                },
            }
        },
    },
    variants: {
        extend: {
            opacity: ['active'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
    enabled: true,
};
