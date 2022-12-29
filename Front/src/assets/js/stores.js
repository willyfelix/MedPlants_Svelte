import { writable } from "svelte/store";

export const logado = writable(false);
export const page = writable("ervas");
export const usuario = writable();
export const ervas = writable([]);


export function changePage(v) {
  page.update(() => v);
}

logado.subscribe((value) => {
  if (value) {
    changePage("ervas");
  } else {
    changePage("login");
  }
});