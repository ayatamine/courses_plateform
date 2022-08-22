<template>
  <div :class="$attrs.class">
    <label v-if="label" class="form-label block text-lg font-semibold" :for="id">{{ label }}:</label>
    <textarea rows="8" :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="form-input block border border-gray-400 p-2 mt-2 w-full rounded-sm" :class="{ error: error }"  :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ></textarea>
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
    modelValue: String,
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