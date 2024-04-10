import axios from 'axios';

const Client = axios.create({
    baseURL: window.storage.request.host,
    timeout: 30000,
    headers: {
        'Content-Type': 'application/json'
    }
});

export { Client };
