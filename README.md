# Project for Carrefour based on Symfony + Vue.js

This project is an example of setting up a Symfony 7 application with a Vue.js front end. It does not require a database, and no `.env` file needs to be configured.

## Prerequisites

Make sure you have the following software installed on your machine:

- PHP >= 8.3
- Composer
- Node.js
- npm or Yarn

## Installation

1. **Clone the project**

    ```bash
    git clone https://github.com/agazzi/carrefour-kata.git
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install JavaScript dependencies**

    ```bash
    npm install
    # or
    yarn install
    ```

## Build

To build the application and use it, you need to compile the front-end files for optimization:

```bash
npm run build
# or
yarn build

# after link symfony assets
php bin/console assets:install
```

## Running the Development Server

To start the Symfony development server, run the following command:

```bash
symfony server:start
```

## Usage

Once the development server is running, you can access the application at the following URL:

http://localhost:8000
