<template>
  <BaseFormField
    v-slot="{ readonly, fieldId }"
    :resource-name="resourceName"
    :field="field"
    :value="model"
    :is-floating="isFloating"
  >
    <FormFieldGroup
      :field="field"
      :label="field.label"
      :field-id="fieldId"
      :validation-errors="validationErrors"
    >
      <MailEditor
        :id="fieldId"
        v-model="model"
        :disabled="readonly"
        v-bind="field.attributes"
      />
    </FormFieldGroup>
  </BaseFormField>
</template>

<script setup>
import isNil from 'lodash/isNil'

import FormFieldGroup from '@/Core/fields/FormFieldGroup.vue'

import MailEditor from '../../components/MailEditor.vue'

const props = defineProps({
  field: { type: Object, required: true },
  resourceName: String,
  resourceId: [String, Number],
  validationErrors: Object,
  isFloating: Boolean,
})

const emit = defineEmits(['setInitialValue'])

const model = defineModel()

function setInitialValue() {
  emit('setInitialValue', !isNil(props.field.value) ? props.field.value : '')
}

setInitialValue()
</script>
