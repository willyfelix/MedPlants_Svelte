import { writable } from "svelte/store";

export const logado = writable(false);
export const page = writable('home');

export const users = writable(
    localStorage.getItem('users') ? 
        JSON.parse(localStorage.getItem('users')) : 
        []
);

export const currentUser = writable(
    localStorage.getItem('currentUser') ? 
        JSON.parse(localStorage.getItem('currentUser')) : 
        []
);

users.subscribe(value => {
    localStorage.setItem('users', JSON.stringify(value))
})

currentUser.subscribe(value => {
    localStorage.setItem('currentUser', JSON.stringify(value))
})