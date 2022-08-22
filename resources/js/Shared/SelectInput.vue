<template>
  <div :class="$attrs.class">
    <label v-if="label"  class="form-label block text-lg font-semibold" :for="id">{{ label }}:</label>
    <select :id="id" ref="input" v-model="selected" v-bind="{ ...$attrs, class: null }" class="form-input block border border-gray-400 p-2 mt-2 w-full rounded-sm" :class="{ error: error }">
      <slot />
    </select>
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
        return `select-input-${Math.random()}`
      },
    },
    error: String,
    label: String,
    modelValue: [String, Number, Boolean],
  },
  emits: ['update:modelValue'],
  data() {
    return {
      selected: this.modelValue,
    }
  },
  watch: {
    selected(selected) {
      this.$emit('update:modelValue', selected)
    },
  },
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
  },
}
</script>