import { usePage } from "@inertiajs/inertia-vue3"

export function useLoadOverlay() {
  //   hide and show the loading overlay
  function show(event) {
    usePage().props.value.loading = true
  }
  function hide(event) {
    usePage().props.value.loading = false
  }

  return { show, hide }
}