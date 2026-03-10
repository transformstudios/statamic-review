<template>
    <div>
        <Button
            @click="copyToClipboard"
            :disabled="!show"
            :text="__('Copy Review URL to Clipboard')"
        />
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { Fieldtype } from '@statamic/cms';
import { toast } from '@statamic/cms/api';
import { Button, injectPublishContext } from '@statamic/cms/ui';

const { isDirty, isWorkingCopy, revisionsEnabled, values } = injectPublishContext();
const props = defineProps(Fieldtype.props);

const entryDate = computed(() => {
    let dateTime = values.value.date;

    if (!dateTime) {
        return null
    }

    return new Date(dateTime);
});

const isFuture = computed(() => entryDate.value > Date.now());
const show = computed(() => {
    if (isDirty.value) {
        return false;
    }

    return isWorkingCopy.value || !values.value.published || isFuture.value;
});

function copyToClipboard() {
    navigator.clipboard.writeText(props.meta.site_url);
    toast.success(__("Review URL copied to clipboard"));
};
</script>
