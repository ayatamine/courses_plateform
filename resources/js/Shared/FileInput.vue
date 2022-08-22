<template>
  <div :class="$attrs.class">
    <label v-if="label" class="form-label block text-lg font-semibold" :for="id">{{ label }}:</label>
    <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="form-input block border border-gray-400 p-2 mt-2 w-full rounded-sm" :class="{ error: error }" type="file" @input="$emit('update:modelValue', $event.target.files[0])" />
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${Math.random()}` 
      },
    },
    error: String,
    label: String,
    modelValue: File,
  },
  emits: ['update:modelValue'],
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
    setSelectionRange(start, end) {
      this.$refs.input.setSelectionRange(start, end)
    },
  },
}
</script>