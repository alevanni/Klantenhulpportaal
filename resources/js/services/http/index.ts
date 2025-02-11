// AXIOS FACADE

import axios from "axios";

// We use a "baseURL" so we don't have to put /api in front of everything
const baseURL = "/api";

const http = axios.create({
    baseURL,
    headers: {
        // With this header you indicate what type of content you expect to get back from the server.
        Accept: "application/json",
        // This header indicates in which format the body of the request was sent to the server.
        "Content-Type": "application/json",
    },
});

/**
 * send a get request to the given endpoint
 */
export const getRequest = (endpoint: string) => http.get(endpoint);

/**
 * send a post/put/delete request to the given endpoint with the given data
 */
export const postRequest = (endpoint: string, data: any) =>
    http.post(endpoint, data);

export const updateRequest = (endpoint: string, data: any) =>
    http.put(endpoint, data);

export const deleteRequest = (endpoint: string, data: any) =>
    http.delete(endpoint, data);
