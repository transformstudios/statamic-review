## Meet Review

Review helps teams streamline content approvals by making it easy to share draft content with anyone. Editors can generate a review URL for any unpublished content and send it to clients, teammates, or stakeholders. Reviewers can immediately view the content without needing a Statamic user account. Review also works with revisions, allowing teams to share the latest working copy of an entry while edits continue.

### Key Features

- **Share Drafts with Anyone** – Generate a public review link for any unpublished entry. Anyone with the link can view the content.
- **Streamline Content Approvals** – Share review links with stakeholders and collect feedback without slowing down your publishing workflow.
- **Works with Revisions** – Share the latest working copy of an entry while edits continue.

---

## How It Works

After installing the addon package via composer, add the Review fieldtype to the sidebar of an entry blueprint.

The fieldtype provides a "Copy Review URL" button that copies a review link for the entry to your clipboard. This link can then be shared with collaborators.

The review link displays the unpublished draft or working copy of the entry.

### Requirements

The "Copy Review URL" button works when:

- The field is added to a blueprint _(not a fieldset due to a Statamic limitation)_
- The site is served over HTTPS
- The content is not published

### Things to Know

- Review URLs are public. Anyone with the link can access the content.
- When the entry is published, the review URL redirects to the live page unless a working copy exists.

---

## Localization

To localize the Review fieldtype button text, add a language file in `/resources/lang` matching your locale. For example `ar.json`:

```
{
  "Copy Review URL": "انسخ عنوان URL الخاص بالمراجعة"
}
```
