<template>
  <BaseDetailField
    v-slot="{ hasValue, value }"
    :field="field"
    :is-floating="isFloating"
    :resource="resource"
    :resource-name="resourceName"
    :resource-id="resourceId"
  >
    {{ hasValue ? localizedDate(value) : '' }}
    <span v-if="!hasValue">&mdash;</span>
  </BaseDetailField>
</template>

<script setup>
import { useDates } from '../../composables/useDates'

defineProps(['resource', 'resourceName', 'resourceId', 'field', 'isFloating'])

const { localizedDate } = useDates()
</script>
