<template>
  <div class="mb-2 flex items-center justify-between">
    <ITextDisplay>
      {{ cardTitle }}

      <IText
        v-show="total > 0"
        class="ml-0.5 inline"
        :text="'(' + total + ')'"
      />
    </ITextDisplay>

    <div class="flex items-center space-x-2">
      <ILink
        v-if="total > limit"
        class="shrink-0 text-sm sm:text-xs"
        :text="!showAll ? $t('core::app.show_all') : $t('core::app.show_less')"
        @click="showAll = !showAll"
      />

      <ITextSmall
        v-if="total > limit"
        v-show="!showAll"
        v-t="{ path: 'core::app.has_more', args: { count: total - limit } }"
      />

      <slot name="top-actions" />
    </div>
  </div>

  <ul class="divide-y divide-neutral-200 dark:divide-neutral-500/30">
    <li
      v-for="(contact, index) in localContacts"
      v-show="index <= limit - 1 || showAll"
      :key="contact.id"
      class="group flex items-center space-x-2 py-3 last:pb-0"
    >
      <div class="shrink-0 self-start">
        <IAvatar size="sm" :src="contact.avatar_url"></IAvatar>
      </div>

      <div class="min-w-0 flex-1">
        <div class="max-w-44 truncate sm:max-w-full">
          <ILink
            class="font-medium"
            :href="contact.path"
            :text="contact.display_name"
            basic
            @click="
              floatResource({
                resourceName: resourceName,
                resourceId: contact.id,
                mode: floatMode,
              })
            "
          />

          <IText class="truncate" :text="contact.job_title" />
        </div>
      </div>

      <div class="block shrink-0 md:hidden md:group-hover:block">
        <div class="flex items-center sm:space-x-1">
          <IButton
            v-if="contact.authorizations.view"
            class="hidden sm:inline-flex"
            :text="$t('core::app.view_record')"
            :to="contact.path"
            basic
            small
          />

          <IButton
            v-if="contact.authorizations.view"
            class="inlnie-flex sm:hidden"
            icon="ChevronRightSolid"
            :to="contact.path"
            small
            basic
          />

          <slot name="actions" :contact="contact" />
        </div>
      </div>
    </li>
  </ul>

  <IText
    v-show="!hasContacts"
    class="lowercase first-letter:uppercase"
    :text="emptyText"
  />
</template>

<script setup>
import { computed, ref } from 'vue'
import { useI18n } from 'vue-i18n'
import castArray from 'lodash/castArray'
import orderBy from 'lodash/orderBy'

import { useFloatingResourceModal } from '@/Core/composables/useFloatingResourceModal'

const props = defineProps({
  contacts: { type: [Object, Array], required: true },
  limit: { type: Number, default: 3 },
  emptyText: String,
  title: String,
  floatMode: { type: String, default: 'detail' },
})

const resourceName = Innoclapps.resourceName('contacts')

const { t } = useI18n()
const { floatResource } = useFloatingResourceModal()

const showAll = ref(false)

const localContacts = computed(() =>
  orderBy(castArray(props.contacts), contact => new Date(contact.created_at), [
    'asc',
  ])
)

const total = computed(() => localContacts.value.length)

const hasContacts = computed(() => total.value > 0)

const cardTitle = computed(() => props.title || t('contacts::contact.contacts'))
</script>
