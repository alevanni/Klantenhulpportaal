import type { AxiosError, AxiosRequestConfig, AxiosResponse } from "axios";
import type { User } from "../../domains/types";
import type { LocationQueryValue } from "vue-router";

export type RequestMiddleware = (request: AxiosRequestConfig) => void;
export type ResponseMiddleware = (response: AxiosResponse) => void;
export type ResponseErrorMiddleware = (error: AxiosError) => void;

export type LoggedInUser = User;

export type InvitedUser = Pick<
    Required<RegisterData>,
    "id" | "firstName" | "lastName" | "email"
>;

export interface LoginCredentials {
    email: string;
    password: string;
    rememberMe: boolean;
}

export interface ResetPasswordData {
    email: string;
    password: string;
    password_confirmation: string;
    token: LocationQueryValue | LocationQueryValue[];
}

export interface RegisterData {
    id?: number;
    firstName: string;
    lastName: string;
    email: string;
    password: string;
    repeatPassword: string;
    inviteToken: LocationQueryValue | LocationQueryValue[];
}
