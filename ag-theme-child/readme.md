## Assignment 3: WordPress Child Theme

### Child Themes

Child themes are used to customize or extend an existing theme without modifying the original files. Instead of creating a completely new theme, a child theme inherits the functionality and styling of its parent theme while allowing specific changes to be made. Files can be copied from the parent into the child theme and modified there. This approach is important because it prevents customizations from being lost when the parent theme is updated.

### Template Hierarchy

WordPress uses the template hierarchy to decide which file to use when displaying different types of content. It looks for the most specific template first and then falls back to more general ones, such as index.php, if needed. Child themes affect this process because WordPress checks the child theme before the parent theme. If a template exists in the child theme, it overrides the parent version without changing the original files. In my project, I added a single.php file in the child theme, so WordPress uses that version instead of the parent template to display posts differently.

### Real-World Reflection

In my child theme, I removed the featured image from single.php to improve readability and focus on the article content. Since the featured image is already shown on the previous page, displaying it again adds unnecessary scrolling for the user. By simplifying the layout, readers can access the article text more quickly and have a cleaner reading experience.
