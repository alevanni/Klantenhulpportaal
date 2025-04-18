export interface User {
    id: number;
    firstName: string;
    lastName: string;
    email: string;
    isAdmin: boolean;
    created_on: string;
    updated_on: string;
}

export interface Ticket {
    id: number;
    created_by: number;
    title: string;
    description: string;
    categories: { id: number }[];
    status: number;
    assigned_to: number;
    created_on: string;
    updated_on: string;
}

export interface Category {
    id: number;
    name: string;
    created_on: string;
    updated_on: string;
}

export interface Comment {
    id: number;
    created_by: number;
    ticket_id: number;
    body: string;
    created_on: string;
    updated_on: string;
}

export interface Note {
    id: number;
    created_by: number;
    ticket_id: number;
    body: string;
    created_on: string;
    updated_on: string;
}
