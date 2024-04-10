import { Client } from "@/services/AxiosService";

/*
 * Fetch products from API
 */
export function fetchProducts() {
    return new Promise((resolve, reject) => {
        Client.get('/api/v1/products/')
            .then(response => resolve(response))
            .catch(error => reject(error))
        ;
    });
}

/*
 * Fetch product from API by ID
 */
export function fetchProductById(id) {
    return new Promise((resolve, reject) => {
        Client.get('/api/v1/products/' + id)
            .then(response => resolve(response))
            .catch(error => reject(error))
        ;
    });
}