# Writing on Caffeine Podcast WordPress Plugin

## Overview

The **Writing on Caffeine Podcast** plugin is a custom WordPress plugin designed to create a dedicated page for displaying all podcast episodes from the **"Podcast Episode"** category. It provides a custom page template that lists episodes grouped by year in descending order (newest to oldest), complete with titles, publication dates, and excerpts.

## Features

- **Custom Page Template**: Adds a "WritingOnCaffeine Franzone Template" to WordPress, accessible via the page slug `podcast-episodes` or the Page Attributes dropdown.
- **Podcast Episode Listing**: Automatically pulls all posts from the "Podcast Episode" category.
- **Yearly Grouping**: Organizes episodes by publication year with `<h3>` headers.
- **Episode Details**: Displays each episode with a clickable title, date, and excerpt.
- **Styling**: Includes a dedicated CSS file loaded only on the custom template page for efficient performance.

## Installation

1. **Download**: Clone this repository or download the ZIP file.

   ```
   bash
   git clone https://github.com/franzone/writingoncaffeine-podcast-plugin.git
   ```

2. **Upload**: Upload the writingoncaffeine-franzone-podcast folder to your WordPress site's /wp-content/plugins/ directory.

3. **Activate**: Go to the WordPress admin panel, navigate to Plugins, and activate "WritingOnCaffeine Franzone Podcast".

4. **Create Page**: Create a new page with the slug `episodes-archive`.

## Usage

- Ensure you have a category named **"Podcast Episode"** (slug: `podcast-episode`) in WordPress.
- Add podcast episodes as posts assigned to this category.
- Visit the page with the slug episodes-archive (e.g., https://writingoncaffeine.com/episodes-archive/) to see the list of episodes.

## File Structure
```
writingoncaffeine-franzone-podcast/
├── css/
│   └── writingoncaffeine-franzone-styles.css  # Styles for the template
├── templates/
│   └── writingoncaffeine-franzone-template.php  # Custom page template
├── writingoncaffeine-franzone-podcast.php  # Main plugin file
└── README.md  # This file
```

## Customization

- **Template Stub**: Modify $template_stub in writingoncaffeine-franzone-podcast.php to change the page slug (default: podcast-episodes).
- **Styles**: Edit css/writingoncaffeine-franzone-styles.css to adjust the appearance of the episode list.
- **Template**: Customize templates/writingoncaffeine-franzone-template.php to add more post details or change the layout.

## Requirements

- WordPress 5.0 or higher
- PHP 7.0 or higher
- A WordPress theme that supports custom page templates

## License

This plugin is licensed under the GPLv2 or later.

## Author

- Jonathan Franzone
- Website: https://about.franzone.com

## Contributing

Feel free to fork this repository and submit pull requests with improvements or bug fixes!

## Support

For issues or questions, please open an issue on this GitHub repository.

Happy podcasting with **Writing on Caffeine**!

