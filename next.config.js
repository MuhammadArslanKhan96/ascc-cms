/** @type {import('next').NextConfig} */
module.exports = {
  reactStrictMode: true,
  images: {
    remotePatterns: [
      {
        protocol: 'http',
        hostname: 'phpstack-742041-3320223.cloudwaysapps.com',
        port: '',
        pathname: '/uploads/**',
      },
    ],
  },
}
