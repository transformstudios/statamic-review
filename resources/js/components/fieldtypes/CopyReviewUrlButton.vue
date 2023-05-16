<template>
    <div>
        <button
            type="button"
            class="btn"
            :disabled="!show"
            @click="copyToClipboard"
            v-text="__('Copy Review URL to Clipboard')"
        >
        </button>
    </div>
</template>

<script>
    export default {
        mixins: [Fieldtype],

        computed: {
            isFuture() {
                let entryDate = moment(this.publishForm.values.date);

                return entryDate.isAfter(moment());
            },

            publishForm() {
                let vm = this;
                while (true) {
                    let parent = vm.$parent;

                    if (!parent) {
                        return false;
                    }

                    if (parent.$options._componentTag == "entry-publish-form") {
                        return parent;
                    }
                    vm = parent;
                }
            },

            show() {
                if (!this.publishForm) {
                    return false;
                }

                if (this.publishForm.isDirty) {
                    return false;
                }

                return (
                    this.publishForm &&
                    !this.publishForm.isDirty &&
                    (this.publishForm.isWorkingCopy || !this.publishForm.published)
                );
            },
        },
        methods: {
            copyToClipboard() {
                navigator.clipboard.writeText(this.meta.site_url);
                this.$toast.success(__("Review URL copied to clipboard"));
            },
        },
    };
</script>
