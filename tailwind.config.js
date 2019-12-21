module.exports = {
    theme: {
        screens: {
            sm: '480px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
        },
        colors: {
          transparent: 'transparent',

          black: '#000',
          white: '#fff',

          brand: {
              200: '#dbf2e9',
              300: '#9ad7c0',
              400: '#5aba96',
              500: '#3ab07e',
              600: '#147853',
              700: '#0c543a',
              800: '#062f20',
          },

          gray: {
            100: '#eeeeee',
            200: '#dddddd',
            300: '#cccccc',
            400: '#bbbbbb',
            500: '#aaaaaa',
            600: '#888888',
            700: '#555555',
            800: '#333333',
            900: '#1a1a1a',
          },
          red: {
            100: '#fff5f5',
            200: '#fed7d7',
            300: '#feb2b2',
            400: '#fc8181',
            500: '#f56565',
            600: '#e53e3e',
            700: '#c53030',
            800: '#9b2c2c',
            900: '#742a2a',
          },
          orange: {
            100: '#fffaf0',
            200: '#feebc8',
            300: '#fbd38d',
            400: '#f6ad55',
            500: '#ed8936',
            600: '#dd6b20',
            700: '#c05621',
            800: '#9c4221',
            900: '#7b341e',
          },
          yellow: {
            100: '#fffff0',
            200: '#fefcbf',
            300: '#faf089',
            400: '#f6e05e',
            500: '#ecc94b',
            600: '#d69e2e',
            700: '#b7791f',
            800: '#975a16',
            900: '#744210',
          },
          green: {
            100: '#f0fff4',
            200: '#c6f6d5',
            300: '#9ae6b4',
            400: '#68d391',
            500: '#48bb78',
            600: '#38a169',
            700: '#2f855a',
            800: '#276749',
            900: '#22543d',
          },
          teal: {
            100: '#e6fffa',
            200: '#b2f5ea',
            300: '#81e6d9',
            400: '#4fd1c5',
            500: '#38b2ac',
            600: '#319795',
            700: '#2c7a7b',
            800: '#285e61',
            900: '#234e52',
          },
          blue: {
            100: '#ebf8ff',
            200: '#bee3f8',
            300: '#90cdf4',
            400: '#63b3ed',
            500: '#4299e1',
            600: '#3182ce',
            700: '#2b6cb0',
            800: '#2c5282',
            900: '#2a4365',
          },
          indigo: {
            100: '#ebf4ff',
            200: '#c3dafe',
            300: '#a3bffa',
            400: '#7f9cf5',
            500: '#667eea',
            600: '#5a67d8',
            700: '#4c51bf',
            800: '#434190',
            900: '#3c366b',
          },
          purple: {
            100: '#faf5ff',
            200: '#e9d8fd',
            300: '#d6bcfa',
            400: '#b794f4',
            500: '#9f7aea',
            600: '#805ad5',
            700: '#6b46c1',
            800: '#553c9a',
            900: '#44337a',
          },
          pink: {
            100: '#fff5f7',
            200: '#fed7e2',
            300: '#fbb6ce',
            400: '#f687b3',
            500: '#ed64a6',
            600: '#d53f8c',
            700: '#b83280',
            800: '#97266d',
            900: '#702459',
          },
        },

        fontFamily: {
            sans: [
                '"schnebel-sans-pro"',
                '-apple-system',
                'BlinkMacSystemFont',
                '"Segoe UI"',
                'Roboto',
                '"Oxygen-Sans"',
                'Ubuntu',
                'Cantarell',
                '"Helvetica Neue"',
                'sans-serif'
            ],
            titles:  [
                '"ropa-soft-pro"',
                '-apple-system',
                'BlinkMacSystemFont',
                '"Segoe UI"',
                'Roboto',
                '"Oxygen-Sans"',
                'Ubuntu',
                'Cantarell',
                '"Helvetica Neue"',
                'sans-serif'
            ],
        },

        container: {
            center: true,
        },
        spacing: {
            px: '1px',
            '0': '0',
            '1': '0.25rem',
            '2': '0.5rem',
            '3': '0.75rem',
            '4': '1rem',
            '5': '1.25rem',
            '6': '1.5rem',
            '8': '2rem',
            '10': '2.5rem',
            '12': '3rem',
            '16': '4rem',
            '20': '5rem',
            '24': '6rem',
            '32': '8rem',
            '40': '10rem',
            '48': '12rem',
            '56': '14rem',
            '64': '16rem',
            '72': '18rem',
            '80': '20rem',
            '96': '24rem',
        },


    },
    variants: {
        boxShadow: ['responsive', 'hover', 'focus', 'active'],
    },
    plugins: [],
}
