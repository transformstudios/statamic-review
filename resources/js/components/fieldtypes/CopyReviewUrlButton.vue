<template>
    <div>
        <button
            type="button"
            class="btn"
            :disabled="!show"
            @click="copyToClipboard"
        >
            Copy Review URL to Clipboard
        </button>
    </div>
</template>

<script>
    export default {
        mixins: [Fieldtype],

        computed: {
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
                return (
                    this.publishForm &&
                    !this.publishForm.isDirty &&
                    (this.publishForm.isWorkingCopy || !this.published)
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
